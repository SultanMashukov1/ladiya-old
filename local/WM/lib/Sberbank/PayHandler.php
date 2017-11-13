<?php

namespace WM\Sberbank;

/**
 * Class PayHandler
 * @package WM\Sberbank
 */

class PayHandler
{
    private $order = null;
    private $orderId = null;

    private $paymentOrderId = null;
    private $paymentFormUrl = null;
    private $client = null;

    private $username = null;
    private $password = null;

    private $returnUrl = null;
    private $additionalParams = array();

    private $onlinePaymentId = null;

    private $changeOrderStatus = false;

    private static $DEBUG = false;
    private static $TEST = true;

    /**
     * PayHandler constructor.
     * @param array $params
     */
    public function __construct(array $params = array())
    {
        isset($params['username'])            && $this->setUsername($params['username']);
        isset($params['password'])            && $this->setPassword($params['password']);
        isset($params['returnUrl'])           && $this->setReturnUrl($params['returnUrl']);
        isset($params['additionalParams'])    && $this->setAdditionalParams($params['additionalParams']);
        isset($params['onlinePaymentId'])     && $this->setOnlinePaymentId($params['onlinePaymentId']);
        isset($params['changeOrderStatus'])   && $this->setChangeOrderStatus($params['changeOrderStatus']);
        isset($params['debug'])               && $this->setDebugMode($params['debug']);
        isset($params['testMerchant'])        && $this->setTestMerchant($params['testMerchant']);

        if(isset($params['orderId']))
            $this->load($params['orderId']);
        elseif(isset($params['orderNumber']))
            $this->loadByAccNumber($params['orderNumber']);
    }

    /**
     * set username for api
     *
     * @param $username
     * @return $this
     */
    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }

    /**
     * set password for api
     *
     * @param $password
     * @return $this
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    /**
     * set shop return url
     *
     * @param $returnUrl
     * @return $this
     */
    public function setReturnUrl($returnUrl)
    {
        $this->returnUrl = $returnUrl;
        return $this;
    }

    /**
     * set additional params
     *
     * @param $params
     * @return $this
     */
    public function setAdditionalParams($params)
    {
        $this->additionalParams = $params;
        return $this;
    }

    /**
     * set shop payment id
     *
     * @param $paymentId
     * @return $this
     */
    public function setOnlinePaymentId($paymentId)
    {
        $this->onlinePaymentId = $paymentId;
        return $this;
    }

    /**
     * set change or not status to F
     *
     * @param $change
     * @return $this
     */
    public function setChangeOrderStatus($change)
    {
        $this->changeOrderStatus = (bool) $change;
        return $this;
    }

    /**
     * set use or not debug mode (in debug mode order sum == 0.01)
     *
     * @param $isDebugMode
     * @return $this
     */
    public function setDebugMode($isDebugMode)
    {
        static::$DEBUG = (bool) $isDebugMode;
        return $this;
    }

    /**
     * set test or not merchant
     *
     * @param $isTestMerchant
     * @return $this
     */
    public function setTestMerchant($isTestMerchant)
    {
        static::$TEST = (bool) $isTestMerchant;
        return $this;
    }

    /**
     * load order by id
     *
     * @param $orderId
     * @return $this
     */
    public function load($orderId)
    {
        $this->order = \Bitrix\Sale\Order::load((int) $orderId);
        $this->orderId = $this->order->getId();
        return $this;
    }

    /**
     * load order by account number
     *
     * @param $orderNumber
     * @return $this
     */
    public function loadByAccNumber($orderNumber)
    {
        $this->order = \Bitrix\Sale\Order::loadByAccountNumber($orderNumber);
        $this->orderId = $this->order->getId();
        return $this;
    }

    /**
     * set sberbank client with given data
     *
     * @return $this
     * @throws \Exception
     */
    public function setClient()
    {
        $this->checkData();

        $apiUri = static::$TEST ? Client::API_URI_TEST : Client::API_URI;

        $this->client = new Client(array(
            'userName' => $this->username,
            'password' => $this->password,
            'apiUri' => $apiUri,
        ));
        return $this;
    }

    /**
     * pay order (show pay form or return order info
     *
     * @return array
     *
     * @throws \Exception
     */
    public function payOrder()
    {
        $this->setClient();

        $this->checkClient();

        try
        {
            $info = $this->getOrderInfo(null, array('orderNumber' => $this->orderId));
            $exists = isset($info['orderStatus']) && $info['orderStatus'] >= OrderStatus::CREATED;
        }
        catch(Exception\ActionException $e)
        {
            //echo $e->getMessage();
        }

        //order already created
        if($exists)
        {
            $orderId = null;
            if(isset($info['attributes']) && is_array($info['attributes']))
            {
                foreach($info['attributes'] as $attribute)
                    if($attribute['name'] == 'mdOrder')
                        $orderId = $attribute['value'];
            }
            if(isset($orderId))
            {
                $this->order->setField('COMMENTS', $orderId);
                $this->order->save();
                //show payment page
                if($info['orderStatus'] == OrderStatus::CREATED)
                {
                    $uri = static::$TEST ? Client::API_URI_TEST : Client::API_URI;
                    $user = str_replace('-api', '', $this->username);
                    $this->paymentFormUrl = str_replace('rest/', 'merchants/' . $user . '/payment_ru.html?mdOrder=' . $orderId, $uri);
                }
            }
        }
        else
        {
            if(static::$DEBUG) //set order sum == 0.01
                $result = $this->client->registerOrder($this->orderId, 1, $this->returnUrl, $this->additionalParams);
            else
                $result = $this->client->registerOrder($this->orderId, $this->order->getPrice() * 100, $this->returnUrl, $this->additionalParams);

            $this->paymentOrderId = $result['orderId'];
            $this->paymentFormUrl = $result['formUrl'];
        }

        if(!empty($this->paymentFormUrl))
        {
            header('Location: ' . $this->paymentFormUrl);
            exit;
        }

        return array(
            'payed'     => $info['orderStatus'] == OrderStatus::DEPOSITED,
            'failed'    => $info['orderStatus'] != OrderStatus::DEPOSITED,
            'declined'  => $info['orderStatus'] == OrderStatus::DECLINED,
        );
    }

    /**
     * get order status
     *
     * @param null $orderId
     * @param bool $statusInString
     * @param array $data
     * @return int|string
     *
     * @throws \Exception
     */
    public function getOrderStatus($orderId = null, $statusInString = false, array $data = array())
    {
        $this->setClient();

        $this->checkData();
        $this->checkClient();

        $result = $this->client->getOrderStatusExtended((isset($orderId) ? $orderId : $this->orderId), $data);

        return $statusInString ? OrderStatus::statusToString($result['orderStatus']) : (int) $result['orderStatus'];
    }

    /**
     * get order info
     *
     * @param $orderId
     * @param array $data
     *
     * @return array
     *
     * @throws \Exception
     */
    public function getOrderInfo($orderId, array $data = array())
    {
        $this->setClient();

        $this->checkData();
        $this->checkClient();

        return $this->client->getOrderStatusExtended($orderId, $data);
    }

    /**
     * update order (set order id in comments, change pay/order status if needed)
     *
     * @param $orderId
     * @param null $status
     *
     * @return array
     *
     * @throws \Exception
     */
    public function updateOrder($orderId, $status = null)
    {
        $this->setClient();

        $this->checkData();
        $this->checkClient();

        if(empty($status))
            $status = $this->getOrderStatus($orderId, false);

        $this->order->setField('COMMENTS', $orderId);
        $this->order->save();

        $payed = false;
        if($status == OrderStatus::DEPOSITED)
        {
            $paymentCollection = $this->order->getPaymentCollection();
            foreach($paymentCollection as $payment)
                $payment->setPaid('Y');
            $payed = ($this->changeOrderStatus ? $this->order->setField('STATUS_ID', 'F') : true) && $this->order->save();
        }

        return array(
            'payed' => $payed,
            'failed' => !$payed,
            'declined' => $status == OrderStatus::DECLINED,
        );
    }

    /**
     * start check order
     * return false if it's not online pay
     * or return array with order info
     *
     * @param null $orderId
     *
     * @return array|bool
     *
     * @throws \Exception
     */
    public function checkOrder($orderId = null)
    {
        $this->checkData();
        if(empty($this->onlinePaymentId) || current($this->order->getPaymentSystemId()) != $this->onlinePaymentId)
            return false;

        if(isset($orderId))
            return $this->updateOrder($orderId);

        if($this->order->isPaid() && $this->order->getField('STATUS_ID') == 'F')
        {
            return array(
                'payed' => true,
                'failed' => false,
                'declined' => false,
            );
        }

        try {
            return $this->payOrder();
        }
        catch(Exception\ActionException $e) {
            return array(
                'payed' => false,
                'failed' => true,
                'declined' => false,
            );
        }
    }

    /**
     * deposit order
     *
     * @param $orderId
     * @return mixed
     *
     * @throws \Exception
     */
    public function depositOrder($orderId)
    {
        $this->setClient();

        $this->checkData();
        $this->checkClient();

        if(static::$DEBUG) //set order sum == 0.01
            $result = $this->client->deposit($orderId, 1);
        else
            $result = $this->client->deposit($orderId, $this->order->getPrice() * 100);
        return $result;
    }

    /**
     * get online payment system
     *
     * @return mixed
     *
     * @throws \Exception
     */
    public function getPaymentSystem()
    {
        $this->checkData();
        foreach($this->order->getPaymentCollection() as $payment)
            return $payment->getPaySystem();
    }

    /**
     * check order and user/pass for empty
     *
     * @access protected
     *
     * @return void
     *
     * @throws \Exception
     */
    protected function checkData()
    {
        if(empty($this->order))
            throw new \Exception('Order not loaded');
        if(empty($this->username) || empty($this->password))
            throw new \Exception('Username and/or password are empty');
    }

    /**
     * check client sberbank
     *
     * @access protected
     *
     * @return void
     *
     * @throws \Exception
     */
    protected function checkClient()
    {
        if(empty($this->client))
            throw new \Exception('Client is empty!');
    }
}
<?php

namespace WM\Base;


class StepAgentBase
{
    protected static $STEP_SIZE = 100;
    protected static $AGENT_INTERVAL_SECONDS = 180;
    protected static $interValTime = 1800;
    protected static $closure = null;

    /**
     * @param $closure
     */
    public static function start($closure)
    {
        static::$closure = $closure;
        static::addAgent();
    }

    /**
     * @param int $step
     * @param $closure
     */
    public static function startAgents($step = 1, $closure)
    {
        $step = $closure($step);
        if(($step))
        {
            static::removeStepAgent($step - 1);
            static::addStepAgent($step);
        }
        else
            static::removeStepAgent($step);
    }

    /**
     * @return null
     */
    public static function addAgent()
    {
        $res = \CAgent::GetList(array('ID' => 'DESC'), array('NAME' => get_called_class() . '::startAgents(%'));
        if($row = $res->Fetch())
        {
            return null;
        }
        //exit;
        \CAgent::AddAgent(
            get_called_class() . '::startAgents(1, "' . static::$closure . '");',
            '',
            'N',
            static::$interValTime,
            date('d.m.Y H:i:s', strtotime('+'.static::$AGENT_INTERVAL_SECONDS.' second')),
            'Y',
            date('d.m.Y H:i:s', strtotime('+'.static::$AGENT_INTERVAL_SECONDS.' second')),
            30
        );
    }

    /**
     * @param $step
     */
    protected static function addStepAgent($step)
    {
        \CAgent::AddAgent(
            get_called_class().'::startAgents('.intval($step).', "' . static::$closure . '");', // имя функции
            '',
            'N',
            86400,
            date('d.m.Y H:i:s',strtotime('+'.static::$AGENT_INTERVAL_SECONDS.' second')),
            'Y',                                  // агент активен
            date('d.m.Y H:i:s',strtotime('+'.static::$AGENT_INTERVAL_SECONDS.' second')),
            30
        );
    }

    /**
     * @param $step
     */
    protected static function removeStepAgent($step)
    {
        \CAgent::RemoveAgent(get_called_class().'::startAgents('.intval($step).', "' . static::$closure . '");');
    }
}
<?
$arUrlRewrite = array(
	array(
		"CONDITION" => "#^/hotel/#",
		"RULE" => "",
		"ID" => "bitrix:news",
		"PATH" => "/hotel/index.php",
	),
	array(
		"CONDITION" => "#^/tours/#",
		"RULE" => "",
		"ID" => "bitrix:news",
		"PATH" => "/tours/index.php",
	),
    array(
        'CONDITION' => '#^/transport/([^/]+)/?(?:\\?(.*))?$#',
        'RULE' => 'CODE=$1&$2',
        'ID' => '',
        'PATH' => '/transport/detail.php',
    ),
);

?>
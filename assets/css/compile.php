<?php
require 'lessc.inc.php';
$less = new lessc;
//file_put_contents('style.css', $less->parse());
$less->checkedCompile("style.less", "style.css");
?>

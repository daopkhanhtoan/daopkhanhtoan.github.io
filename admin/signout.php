<?php 

require_once 'core/init.php';

// xóa session
$session->detroy();
new redirect($_DOMAIN);

?>
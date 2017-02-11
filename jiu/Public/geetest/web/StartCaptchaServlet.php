<?php 
/**
 * 使用Get的方式返回：challenge和capthca_id 此方式以实现前后端完全分离的开发模式 专门实现failback
 * @author Tanxu
 */
//error_reporting(0);
require_once dirname(dirname(__FILE__)) . '/lib/class.geetestlib.php';
require_once dirname(dirname(__FILE__)) . '/config/config.php';
$GtSdk = new GeetestLib(f00315d301a604ffdebe7a7b7ea5ec1a, b5152bddd71c2ee3c3a7c13e6b90fdc1);
session_start();
$user_id = "test";
$status = $GtSdk->pre_process($user_id);
$_SESSION['gtserver'] = $status;
$_SESSION['user_id'] = $user_id;
echo $GtSdk->get_response_str();
 ?>
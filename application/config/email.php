<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['protocol']='smtp';
$config['smtp_crypto']='tls';
$config['smtp_host'] = 'smtp.live.com';
$config['smtp_port'] = '587';
$config['smtp_user'] = 'touchfyp@outlook.com';
$config['smtp_pass'] = 'touchpassword1';
$config['smtp_timeout']='30';
$config['charset']='utf-8';
$config['newline']="\r\n";
$config['wordwrap'] = TRUE;
$config['mailtype'] = 'html';

?>
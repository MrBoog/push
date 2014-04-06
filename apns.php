<?php
	$deviceToken = $_POST['token'];
	$message = $_POST['message'];
	$badge = $_POST['badge'];
	$mode = $_POST['pushmode'];

	//'08cc4452 b50d6556 cb8f2734 7171f420 9bbafdb3 63c98ce3 50c0a8af 93d23ca5';
  
	$body = array("aps" => array("alert" => $message, "badge" => $badge, "sound"=>'default'));
  
	$ctx = stream_context_create();
	$fp;
	if($mode == "development")
	{
		stream_context_set_option($ctx, "ssl", "local_cert", "apns_dev.pem");
		$fp = stream_socket_client("ssl://gateway.sandbox.push.apple.com:2195", $err, $errstr, 60, STREAM_CLIENT_CONNECT, $ctx);
	}
	else
	{
		stream_context_set_option($ctx, "ssl", "local_cert", "apns_pro.pem");
		$fp = stream_socket_client("ssl://gateway.push.apple.com:2195", $err, $errstr, 60, STREAM_CLIENT_CONNECT, $ctx);
	}
	
	stream_context_set_option($ctx, "ssl", "passphrase", "123123");
	if (!$fp) {
		echo "Failed to connect $err $errstrn";
		return;
	}
	
	if($mode == "development")
	{
		echo "Connection OK ==> apns_dev.pem ==> ssl://gateway.sandbox.push.apple.com:2195<br>";
	}
	else
	{
		echo "Connection OK ==> apns_pro.pem ==> ssl://gateway.push.apple.com:2195<br>";
	}
	
	$payload = json_encode($body);
	$msg = chr(0) . pack("n",32) . pack("H*", str_replace(' ', '', $deviceToken)) . pack("n",strlen($payload)) . $payload;
	echo "---------------------------------<br>";
	
	echo "Sending token:".$deviceToken.'<br>';
	echo "Sending message :" . $payload . "<br>";
	echo "---------------------------------<br>";
	fwrite($fp, $msg);
	fclose($fp);
?>


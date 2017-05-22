<?php 
header('Content-Type: text/html; charset=utf-8');
if ($_GET["name"]){
	$message=messageGet($_GET["name"],$_GET["message"]);
	if (sendMail('marjnazhjrnova@yandex.ru',$message,$_GET["from"])) {
		echo '1';
	} else echo '0';
}
function messageGet($name,$message){
	return 'Имя: '.$name. "\r\n"."Сообщение: ".$message;
}
function sendMail($to,$message,$from){

     
    $subject ='with_portfolio';


    $body = '<html>'. "\n";
    $body .= '<head> <title></title>'. "\n";
    $body .= '</head>'. "\n";
    $body .= '<body>'. "\n";
    $body .= $message. "\n";    
    //$body .= chunk_split(base64_encode($message))."\n";
    //$body .= "--".$boundary ."--\n";
    $body .= '</body>'. "\n";
    $body .= '</html>'. "\n";
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

    // Дополнительные заголовки
    $headers .= 'To: Client <'.$to.'>' . "\r\n";
    $headers .= 'From: Portfolio site <'.$from.'>' . "\r\n";

    return mail($to, $subject, $body, $headers,"-f".$from);
}

?>

<?php

function format_email($info, $format){

	//set the root
	$root = $_SERVER['DOCUMENT_ROOT'].'/registration';

	//grab the template content
	$template = file_get_contents($root.'/signup_template.'.$format);
			
	//replace all the tags
	$template = preg_replace('/\{NAME\}/', $info['name'], $template);
	$template = preg_replace('/\{EMAIL\}/', $info['email'], $template);
	$template = preg_replace('/\{KEY\}/', $info['key'], $template);
	$template = preg_replace('/\{SITEPATH\}/','http://imagine.hackbca.com', $template);
		
	//return the html of the template
	return $template;

}

function format_passemail($info, $format){

	//set the root
	$root = $_SERVER['DOCUMENT_ROOT'].'/registration';

	//grab the template content
	$template = file_get_contents($root.'/passemail.'.$format);
			
	//replace all the tags
	$template = preg_replace('/\{EMAIL\}/', $info['email'], $template);
	$template = preg_replace('/\{PASSWORD\}/', $info['password'], $template);
	$template = preg_replace('/\{SITEPATH\}/','http://imagine.hackbca.com', $template);
		
	//return the html of the template
	return $template;

}

//send the welcome letter
function send_email($info){
		
	//format each email
	$body = format_email($info,'html');
	$body_plain_txt = format_email($info,'txt');

	//setup the mailer
	$transport = Swift_MailTransport::newInstance();
	$mailer = Swift_Mailer::newInstance($transport);
	$message = Swift_Message::newInstance();
	$message ->setSubject('Welcome to Imagine 2018!');
	$message ->setFrom(array('contact@hackbca.com' => 'Imagine 2018'));
	$message ->setTo(array($info['email'] => $info['name']));
	
	$message ->setBody($body_plain_txt);
	$message ->addPart($body, 'text/html');
			
	$result = $mailer->send($message);
	
	return $result;
	
}

//send the welcome letter
function send_password($info){
		
	//format each email
	$body = format_passemail($info,'html');
	$body_plain_txt = format_passemail($info,'txt');

	//setup the mailer
	$transport = Swift_MailTransport::newInstance();
	$mailer = Swift_Mailer::newInstance($transport);
	$message = Swift_Message::newInstance();
	$message ->setSubject('Imagine 2018 Reset Password');
	$message ->setFrom(array('contact@hackbca.com' => 'Imagine 2018'));
	$message ->setTo(array($info['email'] => $info['name']));
	
	$message ->setBody($body_plain_txt);
	$message ->addPart($body, 'text/html');
			
	$result = $mailer->send($message);
	
	return $result;
	
}

//cleanup the errors
function show_errors($action){

	$error = false;

	if(!empty($action['result'])){
	
		$error = "<ul class=\"alert $action[result]\">"."\n";

		if(is_array($action['text'])){
	
			//loop out each error
			foreach($action['text'] as $text){
			
				$error .= "<li><p>$text</p></li>"."\n";
			
			}	
		
		}else{
		
			//single error
			$error .= "<li><p>$action[text]</p></li>";
		
		}
		
		$error .= "</ul>"."\n";
		
	}

	return $error;

}
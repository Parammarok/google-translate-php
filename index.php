<?php
require_once ('vendor/autoload.php');
use Stichoza\GoogleTranslate\GoogleTranslate;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
ignore_user_abort(true);
ini_set('default_socket_timeout', 5);
error_reporting(E_ALL);
ini_set("memory_limit", "4500M");
set_time_limit(0);
$tr = new GoogleTranslate(); // Translates to 'en' from auto-detected language by default
$from = $_REQUEST['from'];
$to= $_REQUEST['to'];

$tr->setSource($from); // Translate from English
$tr->setSource(); // Detect language automatically
$tr->setTarget($to); // Translate to Georgian

$text = $_REQUEST['q'];
  if (empty($text)) {
    echo "Query is empty";
  } else {
//echo  '{"translatedText":"'.$tr->translate($text).'"}';
    
    $output = array(
    	'translatedText' =>$tr->translate($text)

	);
  
    print_r(json_encode($output, JSON_UNESCAPED_SLASHES));
    
    
    }

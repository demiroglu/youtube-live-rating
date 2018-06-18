<?php header('Content-Type: text/html; charset=utf-8');
function curl_connect($url){
$curl = curl_init(); 
curl_setopt($curl, CURLOPT_URL, $url); 
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); 
curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER["HTTP_USER_AGENT"]);
$content = curl_exec($curl); 
curl_close($curl); 
return $content;
}
?>
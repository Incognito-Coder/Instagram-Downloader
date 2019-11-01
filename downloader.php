<?php
// API Created By Alireza Ahmand
error_reporting(0);
if(isset($_GET['url'])){
	$get = file_get_contents($_GET['url']);
	preg_match('/property="og:image" content="(.*)"/',$get,$match);
	preg_match('/property="og:video" content="(.*)"/',$get,$match3);
	preg_match('/property="og:type" content="(.*)"/',$get,$match2);
	preg_match('/property="og:title" content="(.*)"/',$get,$match4);
	$caption = str_replace(" on Instagram: “","\n",$match4[1]); 
	$final_caption = str_replace("”"," ",$caption);
}
if($match2[1] == "instapp:photo"){
	$pic = str_replace("$match2[1]","photo",$match2[1]);
	Echo json_encode(["type"=>"$pic","link"=>"$match[1]","caption"=>"$final_caption"]);
}
elseif($match2[1] == "video"){
	Echo json_encode(["type"=>"$match2[1]","link"=>"$match3[1]","caption"=>"$final_caption"]);
}
unlink('error_log');
?>
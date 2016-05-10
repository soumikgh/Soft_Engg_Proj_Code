<?php

$input = $argv[1];

$handle = fopen($input, "r");
while(!feof($handle))
{
	$line = fgets($handle);

	$split_line = explode(',', $line, 2);

	$bugID = $split_line[0];
	$title = str_replace(array('"'), '', $split_line[1]);
	
	var_dump($bugID, $title);

	$url = 'https://bugs.debian.org/cgi-bin/bugreport.cgi?bug=' . $bugID;

	$doc = new DOMDocument;

	// We don't want to bother with white spaces
	$doc->preserveWhiteSpace = false;

	// Most HTML Developers are chimps and produce invalid markup...
	$doc->strictErrorChecking = false;
	$doc->recover = true;

	$doc->loadHTMLFile($url);

	$xpath = new DOMXPath($doc);

	$query = "//pre[@class='message']";

	$entries = $xpath->query($query);
	$text = $entries->item(0)->textContent;
	
	if(strpos($text, "-- System Information:"))
	{
		//Remove all text after "-- System Information:"
		$text = strstr($text, "-- System Information:", TRUE);
	}
	//Remove line breaks
	//$text = str_replace(array("\r", "\n"), '', $text);
	//Dump text
	//var_dump($text);
	//Write to file
	file_put_contents('./reports/' . $bugID . '.txt', $title . "\n" . $text . "\n", FILE_APPEND | LOCK_EX);
}
fclose($handle);

?>

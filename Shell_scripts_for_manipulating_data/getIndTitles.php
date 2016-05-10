<?php

$file = $argv[1];

$handle = fopen($file, "r");
while(!feof($handle))
{
	$line = fgets($handle);
	$data = explode("\t", $line, 2);
	file_put_contents('./results/' . $data[0] . '.txt', $data[1] . "\n", FILE_APPEND | LOCK_EX);
}
fclose($handle);
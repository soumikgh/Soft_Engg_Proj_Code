<?php
$handle = @fopen("ftbfs.txt", "r");
if ($handle) {
    while (($buffer = fgets($handle, 4096)) !== false) {
        $temp = preg_match('/^([0-9]+)[^\S]+(.+)/', $buffer, $matches);
        var_dump($matches);
        file_put_contents('FTBFS_title/' . $matches[1] . ".txt", $matches[2]);
    }
    if (!feof($handle)) {
        echo "Error: unexpected fgets() fail\n";
    }
    fclose($handle);
}

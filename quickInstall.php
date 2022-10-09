<?php

$flex = [
    "version" => "1.0",
    "update_link" => "https://github.com/itbrok/Flex/raw/main/update.json",
];


$url = $flex['update_link'];

$values = json_decode(file_get_contents($url), true);


$file = "update.zip";

file_put_contents($file, file_get_contents($values["zip"]));


$path = pathinfo(realpath($file), PATHINFO_DIRNAME);

$zip = new ZipArchive;
$res = $zip->open($file);
if ($res === TRUE) {
    $zip->extractTo($path);
    $zip->close();
    unlink(__FILE__);
    unlink($file);
    header("location: index.php");
} else {
    echo "Error extracting";
}

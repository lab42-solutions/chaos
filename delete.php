<?php


spl_autoload_register(function ($name){
    include_once "${name}.php";
});

function deleteFile($file){
	if (file_exists($file)){
		unlink($file);
	}
}

$allowedExtenstions = ['gif', 'jpg'];

$name = $_GET['filename'];
$file = preg_replace('/\.\.\//i', '', $name);
$fExt = strtolower(end(explode('.', $file)));

if (! in_array($fExt,$allowedExtenstions)){
    echo "File extension not allowed";
    die();
}
if (strpos($file, 'uploads')) {
	deleteFile($file);
	die();
}
else {
	deleteFile('uploads/' . $file);
	die();
}
?>

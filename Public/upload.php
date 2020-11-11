<?php
$ds = DIRECTORY_SEPARATOR;

$storeFolder = 'img';

if (!empty($_FILES)) 
{
       $tempFile = $_FILES['file']['tmp_name'];

       $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;

       $file_name = str_replace(array('\'', '"', ' ', '`'), '_', $_FILES['file']['name']);

       $targetFile =  $targetPath. $file_name;

       if(move_uploaded_file($tempFile,$targetFile)){
             die($storeFolder . "/" . $file_name );
        }else{
             die('Fail');
        }

 }
	?>	
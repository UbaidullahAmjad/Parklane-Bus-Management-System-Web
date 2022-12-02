<?php

$targetFolder = $_SERVER['DOCUMENT_ROOT'].'/projects/parklane2/storage/app/public';
// echo $targetFolder;exit;
$linkFolder = $_SERVER['DOCUMENT_ROOT'].'/projects/parklane2/public/storage';
symlink($targetFolder,$linkFolder);
echo 'Symlink process successfully completed';
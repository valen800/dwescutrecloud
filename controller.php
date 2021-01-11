<?php
require_once 'controller.lib.php';

if (isset($_REQUEST['upload'])){
    handleUploadRequest();
    header("Location: index.php");
}
else
{
    header("Location: index.php");
}
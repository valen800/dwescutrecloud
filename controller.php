<?php
require_once 'lib/controller.lib.php';

if (isset($_REQUEST['upload'])){
    handleUploadRequest();
    header("Location: index.php");
}
else
{
    header("Location: index.php");
}
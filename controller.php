<?php
require_once 'lib/controller.lib.php';
require_once 'lib/Security.php';

if (!Security::isAllowed()) {
    header("Location: index.php");
}

if (isset($_REQUEST['upload'])){
    handleUploadRequest();
    header("Location: index.php");
}
else
{
    header("Location: index.php");
}
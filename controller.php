<?php
require_once 'lib/Controller.php';
require_once 'lib/Security.php';

if (!Security::isAllowed()) {
    header("Location: index.php");
}

if (isset($_REQUEST['upload'])){
    $controller = new Controller();
    $controller->handleUploadRequest();
    header("Location: index.php");
}
else if (isset($_REQUEST['upload'])){
    $controller = new Controller();
    $controller->handleLoginRequest();
    header("Location: index.php");
}
else
{
    header("Location: index.php");
}
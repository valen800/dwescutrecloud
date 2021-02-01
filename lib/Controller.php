<?php
require_once 'App.php';
require_once 'Media.php';
require_once 'Security.php';

class Controller
{
    public function handleLoginRequest($user, $pass){
        if (Security::isValidUser($user, $pass)){
            Security::setAllowedUser(true);
        }
        else{
            Security::setAllowedUser(false);
        }
    }
    
    public function handleUploadRequest()
    {

        $ruta_temporal = $_FILES['inputFile']['tmp_name'];
        $name = $_FILES['inputFile']['name'];
        $file = $_FILES['inputFile'];

        if (Media::isValidFile($file)) {
            $folder = Media::getMediaFolder($file);
            $ruta_destino = "$folder/$name";
            move_uploaded_file($ruta_temporal, $ruta_destino);
        }
    }
}

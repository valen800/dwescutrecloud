<?php
require_once 'App.php';

class Media
{
    public static function isValidMediaType($type)
    {
        if (in_array($type, App::getAudioTypes()) ||
            in_array($type, App::getVideoTypes()) ||
            in_array($type, App::getImageTypes())) {
            return true;
        } else {
            return false;
        }
    }

    public static function isValidFile($uploadedFile)
    {
        if (self::isValidMediaType($uploadedFile['type']) ||
            self::isValidMediaType(mime_content_type($uploadedFile['tmp_name']))
           )
        {
            return true;
        } else {
            return false;
        }
    }

    public static function getMediaFolder($uploadedFile)
    {
        if(in_array($uploadedFile['type'], App::getImageTypes()) ||
           in_array(mime_content_type($uploadedFile['type']), App::getImageTypes())){

           return App::$imageFolder;
        }

        if(in_array($uploadedFile['type'], App::getAudioTypes()) ||
           in_array(mime_content_type($uploadedFile['type']), App::getAudioTypes())){

           return App::$audioFolder;
        }

        if(in_array($uploadedFile['type'], App::getVideoTypes()) ||
           in_array(mime_content_type($uploadedFile['type']), App::getVideoTypes())){

           return App::$videoFolder;
        }

        return 'trash';
    }
}
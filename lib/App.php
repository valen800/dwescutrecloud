<?php

class App{
    public static $mediaFolder = 'media';
    public static $imageFolder = 'media/images';
    public static $audioFolder = 'media/audio';
    public static $videoFolder = 'media/video';

    private static $imageTypes = array('image/png', 'image/jpeg');

    private static $audioTypes = array('audio/mpeg', 'audio/ogg');

    private static $videoTypes = array('video/x-msvideo','video/mpeg');

    public static function getAudioTypes(){
        return self::$audioTypes;
    }

    public static function getImageTypes(){
        return self::$imageTypes;
    }

    public static function getVideoTypes(){
        return self::$videoTypes;
    }
}
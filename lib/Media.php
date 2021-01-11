<?php
class Media
{
    public static function isValidMediaType($type)
    {
        switch ($type) {
            case 'image/png':
            case 'audio/mpeg':
            case 'video/mp4':
                $resultado = true;
                break;

            default:
                $resultado = false;
                break;
        }

        return $resultado;
    }

    public static function getMediaFolder($type)
    {
        switch ($type) {
            case 'image/png':
                $resultado = 'images';
                break;

            case 'video/mp4':
                $resultado = 'video';
                break;

            case 'audio/mpeg':
                $resultado = 'audio';
                break;

            default:
                $resultado = 'trash';
                break;
        }

        return $resultado;
    }
}

<?php
class Media
{
    public static function isValidFile($uploadedFile)
    {
        if (self::isValidMediaType($uploadedFile['type'])) {
            return true;
        } else {
            if ($exif_type = exif_imagetype($uploadedFile['tmp_name'])) {
                if ($exif_type == IMAGETYPE_JPEG) {
                    return true;
                } else {
                    return false;
                }

            }
        }
    }
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

    public static function getMediaFolder($type, $file='')
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
                if ($exif_type = exif_imagetype($file['tmp_name'])) {
                    if ($exif_type == IMAGETYPE_JPEG) {
                        $resultado =  'images';
                    } else {
                        $resultado = 'trash';
                    }

                }
                break;
        }

        return $resultado;
    }
}

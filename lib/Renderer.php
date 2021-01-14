<?php

require_once 'App.php';

class Renderer
{
    public static function html($seccion)
    {
        switch ($seccion) {
            case 'todo':
                return self::printFullMedia();
                break;
            case 'imagenes':
                return self::printImageMedia();
                break;
            case 'audios':
                return self::printAudioMedia();
                break;
            case 'videos':
                return self::printVideoMedia();
                break;
            default:
                return self::printFullMedia();
                break;
        }
    }

    private static function printFullMedia()
    {

        $resultado = '<h2>Imágenes</h2>';
        $resultado .= self::printFolderList(App::$imageFolder);
        $resultado .= '<h2>Audio</h2>';
        $resultado .= self::printFolderList(App::$audioFolder);
        $resultado .= '<h2>Vídeo</h2>';
        $resultado .= self::printFolderList(App::$videoFolder);

        return $resultado;

    }

    private static function printAudioMedia()
    {
        return '';
    }

    private static function printVideoMedia()
    {
        return '';
    }

    private static function printImageMedia()
    {

        $directorio = App::$imageFolder;
        $ficheros = array_diff(scandir($directorio), array('..', '.'));

        foreach ($ficheros as $fichero) {
            $resultado .= '<img src="' . $directorio . '/' . $fichero . '" width="33%" class="img-fluid">';
        }

        return $resultado;

    }

    private static function printFolderList($directorio)
    {
        $ficheros = array_diff(scandir($directorio), array('..', '.'));

        $resultado = "<ul class=\"list-group\">\n";
        foreach ($ficheros as $fichero) {
            $resultado .= '<li class="list-group-item">';
            $resultado .= $fichero;
            $resultado .= "</li>\n";
        }
        $resultado .= "</ul>\n";

        return $resultado;
    }
}

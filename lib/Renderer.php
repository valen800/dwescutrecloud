<?php

require_once 'App.php';

class Renderer
{
    public static function html($seccion)
    {
        switch ($seccion) {
            case 'todo':
                printFullMedia();
                break;
            case 'imagenes':
                printImageMedia();
                break;
            case 'audios':
                printAudioMedia();
                break;
            case 'videos':
                printVideoMedia();
                break;
            default:
                printFullMedia();
                break;
        }
    }

    private static function printFullMedia()
    {
        return '';
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

        $directorio = App::imageFolder;
        $ficheros = array_diff(scandir($directorio), array('..', '.'));

        $resultado = "<ul class=\"list-group\">\n";

        foreach ($ficheros as $fichero) {
            $resultado .= '<li class="list-group-item">';
            $resultado .= '<a href="ver.php?nombre=' . urlencode($fichero) . '">' . $fichero . '</a> ';
            if (isAllowed()) {
                $resultado .= '<a class="btn btn-danger" href="borrar.php?nombre=' . urlencode($fichero) . '">Borrar</a> ';
                $resultado .= '<a class="btn btn-warning" href="editar.php?nombre=' . urlencode($fichero) . '">Editar</a>';
            }
            $resultado .= "</li>\n";
        }

        $resultado .= "</ul>\n";

        return $resultado;

    }
}

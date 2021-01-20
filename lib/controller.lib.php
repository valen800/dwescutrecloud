<?php
require_once 'Media.php';

function handleUploadRequest()
{

    $base = 'media';
    $ruta_temporal = $_FILES['inputFile']['tmp_name'];
    $type = $_FILES['inputFile']['type'];
    $name = $_FILES['inputFile']['name'];
    $file = $_FILES['inputFile'];

    if (Media::isValidFile($file)) {
        $folder = Media::getMediaFolder($type, $file);
        $ruta_destino = "$base/$folder/$name";
        move_uploaded_file($ruta_temporal, $ruta_destino);
    }
}

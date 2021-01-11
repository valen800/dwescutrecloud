<?php
function handleUploadRequest()
{

    $base = 'media';
    $ruta_temporal = $_FILES['inputFile']['tmp_name'];
    $type = $_FILES['inputFile']['type'];
    $name = $_FILES['inputFile']['name'];

    if (isValidMediaType($type)) {
        $folder = getMediaFolder($type);
        $ruta_destino = "$base/$folder/$name";
        move_uploaded_file($ruta_temporal, $ruta_destino);
    }
}

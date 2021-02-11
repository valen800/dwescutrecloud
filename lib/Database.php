<?php
class Database
{
    private $conexion;
    private $conectado;

    public function __construct(){
        $this->connect();
    }

    public function uploadFile($file, $type)
    {
        $user = Security::getUser();

        $consulta = 'select id from Usuario ';
        $consulta .= "where email like '$user';";

        $resultado = $this->conexion->query($consulta);

        $usuario_fila = $resultado->fetch_assoc();

        $id = $usuario_fila['id'];

        $datos_fichero = base64_encode(file_get_contents($file['tmp_name']));

        $consulta = 'insert into Media (nombre, contenido, tipo, usuario_id) ';
        $consulta .= 'values(';
        $consulta .= "'{$file['name']}',";
        $consulta .= "'{$datos_fichero}',";
        $consulta .= "'{$type}',";
        $consulta .= "'{$id}'";
        $consulta .= ');';

        $resultado = $this->conexion->query($consulta);
    }

    public function getImages()
    {
        $user = Security::getUser();

        $consulta = 'select id from Usuario ';
        $consulta .= "where email like '$user';";

        $resultado = $this->conexion->query($consulta);

        $usuario_fila = $resultado->fetch_assoc();

        $id = $usuario_fila['id'];

        $consulta = 'select nombre, contenido from Media ';
        $consulta .= "where usuario_id = $id ";
        $consulta .= "and tipo like '".App::$imageType."';";

        $resultado = $this->conexion->query($consulta);

        return $resultado->fetch_all();
    }

    private function connect()
    {
        $this->conexion = new mysqli('127.0.0.1', 'cutrecloud', 'cloudcutre', 'cutrecloud');

        if ($this->conexion->connect_errno) {
            $this->conectado = false;
        } else {
            $this->conectado = true;
        }

    }


}

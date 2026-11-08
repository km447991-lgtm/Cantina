<?php
class logicaUsuario{
    public function guardar_usuario($id_Usuario, $contrasenia, $nombre )
    {
        if (!empty($nombre)
            && !empty($contrasenia) && is_numeric($id_Usuario)) {
            return true;
        }else{
            return false;
        }
    }
    public function registronombre($datonombre){}
    public function registrocontrasenia($datocontrasenia){}
}

?>
<?php

namespace Model;

class Vendedor extends ActiveRecord {
    // Base DE DATOS
    protected static $tabla = 'vendedores';
    protected static $columnasDB = ['id', 'nombre', 'apellido', 'telefono','email'];
    
    public $id;
    public $nombre;
    public $apellido;
    public $telefono;
    public $email;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        $this->email = $args['email']??'';
    }

    public function validar() {
        if(!$this->nombre) {
            self::$errores[] = "El Nombre es Obligatorio";
        }

        if(!$this->apellido) {
            self::$errores[] = "El Apellido es Obligatorio";
        }

        if(!$this->telefono) {
            self::$errores[] = "El Teléfono es Obligatorio";
        }else if(!preg_replace('/[^0-9]/', '', $this->telefono)||strlen($this->telefono ) > 10 ){
            self::$errores[]='Numero de telefono no valido';
        }
        if(!$this->email) {
            self::$errores[] = "El es email obligatorio";
        }else if(preg_replace('/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/','',$this->email)){
            self::$errores[]='Debes colocar un email valido';
        }


        return self::$errores;
    }

}
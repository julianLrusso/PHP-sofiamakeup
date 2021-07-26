<?php

/**
 * Class ValidadorProducto
 * 
 * Valida:
 * -Nombre obligatorio, mínimo 3 caracter y máximo 120. |
 * -Descripción obligatoria, mínimo 3 caracter y máximo 250. |
 * -Texto obligatorio, mínimo 3 caracter. |
 * -Precio obligatorio. |
 */
class ValidadorProducto {
    /**@var array La data a validar. */
    protected $datos = [];

    /**@var array Guarda los errores de validación. Array asociativo con claves iguales a la de los datos. */
    protected $errores = [];
    
    /**
     * ValidadorProducto constructor.
     * 
     * @param array $datos
     */
    public function __construct(array $datos)
    {
        $this->datos = $datos;
        $this->validar();
    }


    public function getErrores(): array
    {
        return $this->errores;
    }


    /**
     * Retorna true si ocurrió un error, false si no.
     * 
     * @return bool
     */
    public function falla(): bool
    {
        return count($this->errores) > 0;
    }

    /**
     * Ejecuta todas las validaciones.
     */
    protected function validar()
    {
        $this->validarNombre();
        $this->validarPrecio();
        $this->validarDescripcion();
        $this->validarTexto();
    }

    /**
     * Valida el nombre: obligatorio, 3 a 120 caracteres.
     */
    protected function validarNombre()
    {
        if(empty($this->datos['nombre'])){
            $this->errores['nombre'] = 'Este campo no puede quedar vacío';
        } else {
            $caracteres = strlen($this->datos['nombre']);
            if($caracteres < 3) {
                $this->errores['nombre'] = 'El nombre debe tener al menos 3 caracteres. Actualmente tiene: '. $caracteres;
            } elseif ($caracteres > 120){
                $this->errores['nombre'] = 'El nombre debe tener menos de 120 caracteres. Actualmente tiene: '. $caracteres;
            }
        }
    }

    /**
     * Valida el precio: obligatorio.
     */
    protected function validarPrecio()
    {
        if(empty($this->datos['precio'])){
            $this->errores['precio'] = 'Este campo no puede quedar vacío';
        }
    }

    /**
     * Valida la descripción: obligatorio, 3 a 250 caracteres.
     */
    protected function validarDescripcion()
    {
        if(empty($this->datos['descripcion'])){
            $this->errores['descripcion'] = 'Este campo no puede quedar vacío';
        } else {
            $caracteres = strlen($this->datos['descripcion']);
            if($caracteres < 3) {
                $this->errores['descripcion'] = 'La descripcion debe tener al menos 3 caracteres. Actualmente tiene: '. $caracteres;
            } elseif ($caracteres > 250){
                $this->errores['descripcion'] = 'La descripcion debe tener menos de 250 caracteres. Actualmente tiene: '. $caracteres;
            }
        }
    }

    /**
     * Valida el texto: obligatorio, mínimo 3 caracteres.
     */
    protected function validarTexto()
    {
        if(empty($this->datos['texto'])){
            $this->errores['texto'] = 'Este campo no puede quedar vacío';
        } else {
            $caracteres = strlen($this->datos['texto']);
            if($caracteres < 3) {
                $this->errores['texto'] = 'El texto debe tener al menos 3 caracteres. Actualmente tiene: '. $caracteres;
            }
        }
    }

}// fin class
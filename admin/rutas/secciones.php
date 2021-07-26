<?php 

function getSeccionesLista(): array {
    return [
        'login' => [
            'title' => 'Login de administración',
        ],
        'productos' => [
            'title' => 'Administrar productos',
            'requiresAuth' => true,
        ],
        'producto-agregar' => [
            'title' => 'Agregar productos',
            'requiresAuth' => true,
        ],
        'producto-editar' => [
            'title' => 'Editar un producto',
            'requiresAuth' => true,
        ],
        '404' => [
            'title' => 'Página no encontrada',
        ],
    ];
}

 ?>
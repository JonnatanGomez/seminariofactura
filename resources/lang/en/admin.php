<?php

return [
    'admin-user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
            'edit_profile' => 'Edit Profile',
            'edit_password' => 'Edit Password',
        ],

        'columns' => [
            'id' => 'ID',
            'last_login_at' => 'Last login',
            'first_name' => 'First name',
            'last_name' => 'Last name',
            'email' => 'Email',
            'password' => 'Password',
            'password_repeat' => 'Password Confirmation',
            'activated' => 'Activated',
            'forbidden' => 'Forbidden',
            'language' => 'Language',
                
            //Belongs to many relations
            'roles' => 'Roles',
                
        ],
    ],

    'producto' => [
        'title' => 'Producto',

        'actions' => [
            'index' => 'Producto',
            'create' => 'New Producto',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            
        ],
    ],

    'producto' => [
        'title' => 'Producto',

        'actions' => [
            'index' => 'Producto',
            'create' => 'New Producto',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'precio' => 'Precio',
            
        ],
    ],

    'cliente' => [
        'title' => 'Cliente',

        'actions' => [
            'index' => 'Cliente',
            'create' => 'New Cliente',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nit' => 'Nit',
            'nombre' => 'Nombre',
            
        ],
    ],

    'producto' => [
        'title' => 'Producto',

        'actions' => [
            'index' => 'Producto',
            'create' => 'New Producto',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'precio' => 'Precio',
            
        ],
    ],

    'factura' => [
        'title' => 'Factura',

        'actions' => [
            'index' => 'Factura',
            'create' => 'New Factura',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'total' => 'Total',
            'idcliente' => 'Idcliente',
            
        ],
    ],

    'operacion' => [
        'title' => 'Operacion',

        'actions' => [
            'index' => 'Operacion',
            'create' => 'New Operacion',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'total' => 'Total',
            'idcliente' => 'Idcliente',
            
        ],
    ],

    'detalle' => [
        'title' => 'Detalle',

        'actions' => [
            'index' => 'Detalle',
            'create' => 'New Detalle',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'idoperacion' => 'Idoperacion',
            'idproducto' => 'Idproducto',
            
        ],
    ],

    // Do not delete me :) I'm used for auto-generation
];
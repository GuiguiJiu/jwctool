<?php

use Spatie\Permission\Models\Permission;

return [

    'title' => '权限',

    'single' => '权限',

    'model' => Permission::class,

    'permission' => function() {
        return Auth::user()->can('manage_all');
    },

    'action_permissions' => [
        'create' => function($model) {
            return true;
        },
        'update' => function($model) {
            return true;
        },
        'delete' => function($model) {
            return true;
        },
        'view' => function($model) {
            return true;
        },
    ],

    'columns' => [
        'id' => [
            'title' => 'ID',
        ],
        'name' => [
            'title' => '标示',
        ],
        'operation' => [
            'title' => '管理',
            'sortable' => false,
        ],
    ],


    'edit_fields' => [
        'name' => [
            'title' => '标示(请慎重修改)',
            'hint' => '修改权限会影响代码的调用，请不要轻易修改'
        ],
        'roles' => [
            'title' => '角色',
            'type' => 'relationship',
            'name_field' => 'name',
        ],
    ],

    'filters' => [
        'name' => [
            'title' => '标示',
        ]
    ],
];

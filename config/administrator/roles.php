<?php

use Spatie\Permission\Models\Role;

return [

    'title' => '角色',

    'single' => '角色',

    'model' => Role::class,

    'permission' => function() {
        return Auth::user()->can('manage_all');
    },

    'columns' => [
        'id' => [
            'title' => 'ID',
        ],
        'name' => [
            'title' => '标识',
        ],
        'permission' => [
            'title' => '权限',
            'output' => function($value, $model) {
                $model->load('permissions');
                $result = [];
                foreach($model->permissions as $permission) {
                    $result[] = $permission->name;
                }
                return empty($result) ? 'N/A' : implode($result, ' | ');
            },
            'sortable' => false,
        ],
    ],


    'edit_fields' => [
        'name' => [
            'title' => '标识',
        ],
        'permissions' => [
            'title' => '权限',
            'type' => 'relationship',
            'name_field' => 'name',
        ],
    ],

    'filters' => [
        'id' => [
            'title' => 'ID',
        ],
        'name' => [
            'title' => '标识',
        ]
    ],

    'rules' => [
        'name' => 'required|max:15|unique:roles,name',
    ],

    'messages' => [
        'name.required' => '标识不能为空',
        'name.unique' => '标识已存在',

    ]

];

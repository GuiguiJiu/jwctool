<?php

use App\Models\College;

return [

    'title' => '学院管理',

    'single' => '学院',

    'model' => College::class,

    'permission' => function() {
        return Auth::user()->can('manage_colleges');
    },

    'action_permissions' => [
        'create' => function($model) {
            return Auth::user()->hasRole('SuperAdmin');
        },
        'delete' => function($model) {
            return Auth::user()->hasRole('SuperAdmin');
        },
        'update' => function($model) {
            return Auth::user()->hasRole('SuperAdmin');
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
            'title' => '学院名称',
        ],
        'active' => [
            'title' => '启用状态',
        ],
        'operation' => [
            'title' => '管理',
            'sortable' => false,
        ]
    ],


    'edit_fields' => [
        'name' => [
            'title' => '学院名称',
        ],
        'active' => [
            'title' => '启用状态',
        ],
    ],

    'filters' => [
        'id' => [
            'title' => '学院 ID',
        ],
        'name' => [
            'title' => '学院名称',
        ],
        'active' => [
            'title' => '启用状态',
        ],
    ],

    'rules' => [
        'name' => 'required|min:1|unique:colleges',
    ],

    'messages' => [
        'name.unique' => '已有该学院名，请选用其他名称',
        'name.required' => '请确保名称至少1个字符以上',
    ]
];

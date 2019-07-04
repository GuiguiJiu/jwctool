<?php

use App\Models\Major;

return [

    'title' => '专业管理',

    'single' => '专业',

    'model' => Major::class,

    'permission' => function() {
        return Auth::user()->can('manage_majors');
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
            'title' => '专业名称',
        ],
        'college_id' => [
            'title' => '所属学院',
            'output' => function($value, $model) {
                return '<a href="/admin/colleges/' . $model->college_id . '">' . $model->college->name . '</a>';
            }
        ],
        'active' => [
            'title' => '启用状态',
        ],
        'operation' => [
            'title' => '管理',
            'sortable' => false,
        ],
    ],


    'edit_fields' => [
        'name' => [
            'title' => '专业名称',
        ],
        'college' => [
            'title' => '所属学院',
            'type' => 'relationship',
            'name_field' => 'name'
        ],
        'active' => [
            'title' => '启用状态',
        ],
    ],

    'filters' => [
        'id' => [
            'title' => '专业 ID',
            'type' => 'text',
        ],
        'name' => [
            'title' => '专业名称',
        ],
        'college' => [
            'title' => '所属学院',
            'type' => 'relationship',
            'name_field' => 'name'
        ],
        'active' => [
            'title' => '启用状态',
        ],
    ],

    'rules' => [
        'name' => 'required|min:1|unique:majors',
    ],

    'messages' => [
        'name.unique' => '已有该专业名，请选用其他名称',
        'name.required' => '请确保名称至少1个字符以上',
    ]
];

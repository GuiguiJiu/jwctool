<?php

use App\Models\JxnuClass;

return [

    'title' => '班级管理',

    'single' => '班级',

    'model' => JxnuClass::class,

    'permission' => function() {
        return Auth::user()->can('manage_classes');
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
            'title' => '班级名称',
        ],
        'major_id' => [
            'title' => '所属学院',
            'output' => function($value, $model) {
                return '<a href="/admin/majors/' . $model->major_id . '">' . $model->major->name . '</a>';
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
            'title' => '班级名称',
            'type' => 'text'
        ],
        'major' => [
            'title' => '所属专业',
            'type' => 'relationship',
            'name_field' => 'name'
        ],
        'active' => [
            'title' => '启用状态',
        ],
    ],

    'filters' => [
        'id' => [
            'title' => '班级 ID',
            'type' => 'text',
        ],
        'name' => [
            'title' => '班级名称',
        ],
        'major' => [
            'title' => '所属专业',
            'type' => 'relationship',
            'name_field' => 'name'
        ],
        'active' => [
            'title' => '启用状态',
        ],
    ],

    'rules' => [
        'name' => 'required|min:1|unique:classes',
    ],

    'messages' => [
        'name.unique' => '已有该专业名，请选用其他名称',
        'name.required' => '请确保名称至少1个字符以上',
    ]
];

<?php

use App\Models\Teacher;

return [

    'title' => '教师管理',

    'single' => '教师',

    'model' => Teacher::class,

    'permission' => function() {
        return Auth::user()->can('manage_teachers');
    },

    'action_permissions' => [
        'create' => function($model) {
            return false;
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
            'title' => '教工号',
            'output' => function($value, $model) {
                return '<div style="min-width: 70px;">'.$value.'</div>';
            }
        ],
        'name' => [
            'title' => '姓名',
            'output' => function($value, $model) {
                return '<div style="min-width: 70px;">'.$value.'</div>';
            }
        ],
        'gender' => [
            'title' => '性别',
            'output' => function($value, $model) {
                return '<div style="min-width: 60px;">'.$value.'</div>';
            }
        ],
        'college_id' => [
            'title' => '学院',
            'output' => function($value, $model) {
                return '<a href="/admin/colleges/' . $model->college_id . '">' . $model->college->name . '</a>';
            }
        ],
        'title' => [
            'title' => '职称',
            'output' => function($value, $model) {
                return '<div style="min-width: 70px;">'.$value.'</div>';
            }
        ],
        'introduction' => [
            'title' => '教学简介',
            'output' => function($value, $model) {
                return '<div style="max-width: 200px;">'.$value.'</div>';
            }
        ],
        'email' => [
            'title' => '邮箱',
            'output' => function($value, $model) {
                return '<div style="min-width: 70px;">'.$value.'</div>';
            }
        ],
        'photo' => [
            'title' => '照片',
            'output' => function($value, $model) {
                return empty($value) ? '' : '<img src="' . $value . '" height="100px;">';
            }
        ],
        'operation' => [
            'title' => '管理',
            'sortable' => false,
        ],
    ],


    'edit_fields' => [
        'name' => [
            'title' => '姓名',
            'type' => 'text'
        ],
        'gender' => [
            'title' => '性别',
        ],
        'title' => [
            'title' => '职称',
        ],
        'introduction' => [
            'title' => '教学简介',
            'type' => 'textarea'
        ],
        'email' => [
            'title' => '邮箱',
        ],
        'college' => [
            'title' => '所属学院',
            'type' => 'relationship',
            'name_field' => 'name'
        ],
    ],

    'filters' => [
        'id' => [
            'title' => 'ID',
            'type' => 'text',
        ],
        'name' => [
            'title' => '姓名',
        ],
        'gender' => [
            'title' => '性别',
        ],
        'title' => [
            'title' => '职称',
        ],
        'email' => [
            'title' => '邮箱',
        ],
        'college' => [
            'title' => '所属学院',
            'type' => 'relationship',
            'name_field' => 'name'
        ],
    ],

//    'rules' => [
//        'name' => 'required|min:1|unique:classes',
//    ],
//
//    'messages' => [
//        'name.unique' => '已有该专业名，请选用其他名称',
//        'name.required' => '请确保名称至少1个字符以上',
//    ]
];

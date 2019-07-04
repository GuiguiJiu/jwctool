<?php

use App\User;

return [

    'title' => '用户',

    'single' => '用户',

    'model' => User::class,

    'permission' => function() {
        return Auth::user()->can('manage_all');
    },

    'columns' => [
        'id',
        'name' => [
            'title' => '姓名',
            'sortable' => false,
            'output' => function($name, $model) {
                return '<a href="/users/'. $model->id .'" target=_blank>'. $name .'</a>';
            }
        ],
        'type' => [
            'title' => '用户类型',
        ],
        'gender' => [
            'title' => '性别',
//            'output' => function($gender, $model) {
//                return $gender == 'm' ? '男' : '女';
//            }
        ],
//        'avatar',
        'created_at' => [
            'title' => '首次登录时间',

        ],
        'updated_at' => [
            'sortable' => false
        ],
        'operation' => [
            'title' => '管理',
            'sortable' => false
        ],
    ],


    'edit_fields' => [
        'name' => [
            'title' => '姓名',
        ],
        'type' => [
            'title' => '用户类型',
        ],
        'gender' => [
            'title' => '性别',
        ],
//        'password' => [
//            'title' => '密码',
//            'type' => 'password',
//        ],
        'roles' => [
            'title' => '用户角色',
            'type' => 'relationship',
            'name_field' => 'name',
        ],
    ],

    'filters' => [
        'id' => [
            'title' => '用户 ID',
            'type' => 'text'
        ],
        'name' => [
            'title' => '姓名'
        ],
        'type' => [
            'title' => '用户类型'
        ],
        'gender' => [
            'title' => '性别'
        ],
    ]

];

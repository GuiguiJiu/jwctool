<?php

use App\Models\Student;

return [

    'title' => '学生管理',

    'single' => '学生',

    'model' => Student::class,

    'permission' => function() {
        return Auth::user()->can('manage_students');
    },

    'action_permissions' => [
        'create' => function($model) {
            return false;
        },
        'delete' => function($model) {
            return true;
        },
        'update' => function($model) {
            return true;
        },
        'view' => function($model) {
            return true;
        },
    ],

    'columns' => [
        'id' => [
            'title' => '学号',
        ],
        'name' => [
            'title' => '姓名',
        ],
        'gender' => [
            'title' => '性别',
        ],
        'college_id' => [
            'title' => '学院',
            'output' => function($value, $model) {
                return '<a href="/admin/colleges/' . $model->college_id . '">' . $model->college->name . '</a>';
            }
        ],
        'major_id' => [
            'title' => '专业',
            'output' => function($value, $model) {
                return '<a href="/admin/majors/' . $model->major_id . '">' . $model->major->name . '</a>';
            }
        ],
        'class_id' => [
            'title' => '班级',
            'output' => function($value, $model) {
                return '<a href="/admin/classes/' . $model->class_id . '">' . $model->class->name . '</a>';
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
        'college' => [
            'title' => '所属学院',
            'type' => 'relationship',
            'name_field' => 'name'
        ],
        'major' => [
            'title' => '所属专业',
            'type' => 'relationship',
            'name_field' => 'name'
        ],
        'class' => [
            'title' => '所属班级',
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
        'college' => [
            'title' => '所属学院',
            'type' => 'relationship',
            'name_field' => 'name'
        ],
        'major' => [
            'title' => '所属专业',
            'type' => 'relationship',
            'name_field' => 'name'
        ],
        'class' => [
            'title' => '所属班级',
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

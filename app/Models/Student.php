<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $connection = 'mysql_jwc';
    protected $table = 'jxnu_students';

    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'id', 'name', 'gender', 'college_id', 'major_id', 'class_id', 'photo', 'active'
    ];

    public function college()
    {
        return $this->belongsTo('App\Models\College', 'college_id', 'id')
            ->withDefault([
                'name' => '未知学院'
            ]);
    }

    public function major()
    {
        return $this->belongsTo('App\Models\Major', 'major_id', 'id')
            ->withDefault([
                'name' => '未知专业'
            ]);
    }

    public function class()
    {
        return $this->belongsTo('App\Models\JxnuClass', 'class_id', 'id')
            ->withDefault([
                'name' => '未知班级'
            ]);
    }

}

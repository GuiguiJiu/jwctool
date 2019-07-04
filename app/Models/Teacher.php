<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $connection = 'mysql_jwc';
    protected $table = 'jxnu_teachers';

    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'id', 'name', 'gender', 'college_id', 'title', 'introduction', 'email', 'photo', 'active'
    ];

    public function college()
    {
        return $this->belongsTo('App\Models\College', 'college_id', 'id')
            ->withDefault([
                'name' => '未知学院'
            ]);
    }

}

<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    protected $connection = 'mysql_jwc';
    protected $table = 'jxnu_majors';

    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'id', 'name', 'college_id', 'active'
    ];

    public function college()
    {
        return $this->belongsTo('App\Models\College', 'college_id', 'id')
            ->withDefault([
                'name' => '未知学院'
            ]);
    }

    public function classes()
    {
        return $this->hasMany('App\Models\JxnuClass', 'major_id', 'id');
    }

    public function students()
    {
        return $this->hasMany('App\Models\Student', 'major_id', 'id');
    }

}

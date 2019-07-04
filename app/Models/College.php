<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class College extends Model
{
    protected $connection = 'mysql_jwc';
    protected $table = 'jxnu_colleges';

    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'id', 'name', 'active'
    ];

    public function majors()
    {
        return $this->hasMany('App\Models\Major', 'college_id', 'id');
    }

    public function students()
    {
        return $this->hasMany('App\Models\Student', 'college_id', 'id');
    }
}

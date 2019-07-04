<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class JxnuClass extends Model
{
    protected $connection = 'mysql_jwc';
    protected $table = 'jxnu_classes';

    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'id', 'name', 'major_id', 'active'
    ];

    public function major()
    {
        return $this->belongsTo('App\Models\Major', 'major_id', 'id')
            ->withDefault([
                'name' => '未知专业'
            ]);
    }

    public function students()
    {
        return $this->hasMany('App\Models\Student', 'class_id', 'id');
    }

}

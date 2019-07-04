<?php

use Illuminate\Database\Seeder;

class JxnuCollegesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('mysql_jwc')->unprepared(file_get_contents(__DIR__ . '/../sql/jxnu_colleges.sql'));
    }

    public function backup()
    {
        $info = [
            ['id' => '37000', 'name' => '军事教研部（武装部）', 'active' => 1],
            ['id' => '450', 'name' => '继续教育学院', 'active' => 1],
            ['id' => '46000', 'name' => '马克思主义学院', 'active' => 1],
            ['id' => '48000', 'name' => '地理与环境学院', 'active' => 1],
            ['id' => '49000', 'name' => '心理学院', 'active' => 1],
            ['id' => '50000', 'name' => '教育学院', 'active' => 1],
            ['id' => '51000', 'name' => '文学院', 'active' => 1],
            ['id' => '52000', 'name' => '外国语学院', 'active' => 1],
            ['id' => '53000', 'name' => '音乐学院', 'active' => 1],
            ['id' => '54000', 'name' => '商学院', 'active' => 1],
            ['id' => '55000', 'name' => '数学与信息科学学院', 'active' => 1],
            ['id' => '56000', 'name' => '体育学院', 'active' => 1],
            ['id' => '57000', 'name' => '公费师范生院', 'active' => 1],
            ['id' => '58000', 'name' => '历史文化与旅游学院', 'active' => 1],
            ['id' => '59000', 'name' => '政法学院', 'active' => 1],
            ['id' => '60000', 'name' => '物理与通信电子学院', 'active' => 1],
            ['id' => '61000', 'name' => '化学化工学院', 'active' => 1],
            ['id' => '62000', 'name' => '计算机信息工程学院', 'active' => 1],
            ['id' => '63000', 'name' => '城市建设学院', 'active' => 1],
            ['id' => '64000', 'name' => '新闻与传播学院', 'active' => 1],
            ['id' => '65000', 'name' => '美术学院', 'active' => 1],
            ['id' => '66000', 'name' => '生命科学学院', 'active' => 1],
            ['id' => '67000', 'name' => '软件学院', 'active' => 1],
            ['id' => '68000', 'name' => '财政金融学院', 'active' => 1],
            ['id' => '69000', 'name' => '国际教育学院', 'active' => 1],
            ['id' => '81000', 'name' => '科学技术学院', 'active' => 1],
            ['id' => '82000', 'name' => '初等教育学院', 'active' => 1],
            ['id' => 'jwc', 'name' => '教务处', 'active' => 1]
        ];
        DB::connection('mysql_jwc')->table('jxnu_colleges')->insert($info);
    }
}

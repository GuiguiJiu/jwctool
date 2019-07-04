<?php

use Illuminate\Database\Seeder;

class JxnuClassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('mysql_jwc')->unprepared(file_get_contents(__DIR__ . '/../sql/jxnu_classes.sql'));
    }
}

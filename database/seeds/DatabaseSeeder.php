<?php

use Illuminate\Database\Seeder;

use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = new User([
            'id' => 1,
            'name' => 'SuperAdmin',
            'type' => 'Admin',
            'gender' => 'm',
            'password' => bcrypt('jxnu.admin')
        ]);
        $user->save();
        $user->assignRole('SuperAdmin');

        $user = User::find('201626703004');
        $user->assignRole('Admin');

//        $this->call(JxnuCollegesTableSeeder::class);
//        $this->call(JxnuMajorsTableSeeder::class);
//        $this->call(JxnuClassesTableSeeder::class);
//        $this->call(JxnuStudentsTableSeeder::class);
    }
}

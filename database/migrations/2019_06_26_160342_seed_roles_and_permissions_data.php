<?php /** @noinspection PhpUndefinedConstantInspection */

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Support\Facades\DB;

class SeedRolesAndPermissionsData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 需先清除缓存
        app(Spatie\Permission\PermissionRegistrar::class)
            ->forgetCachedPermissions();

        // 创建权限
        Permission::create(['name' => 'manage_colleges']);
        Permission::create(['name' => 'manage_majors']);
        Permission::create(['name' => 'manage_classes']);
        Permission::create(['name' => 'manage_students']);
        Permission::create(['name' => 'manage_teachers']);


        // 创建超级管理员
        $superAdmin = Role::create(['name' => 'SuperAdmin']);
        $superAdmin->givePermissionTo('manage_colleges');
        $superAdmin->givePermissionTo('manage_majors');
        $superAdmin->givePermissionTo('manage_classes');
        $superAdmin->givePermissionTo('manage_students');
        $superAdmin->givePermissionTo('manage_teachers');

        // 创建管理员
        $admin = Role::create(['name' => 'Admin']);
        $admin->givePermissionTo('manage_students');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // 需先清除缓存
        app(Spatie\Permission\PermissionRegistrar::class)
            ->forgetCachedPermissions();

        // 清空所有数据表
        $tableNames = config('permission.table_names');

        Model::unguard();
        DB::table($tableNames['role_has_permissions'])->delete();
        DB::table($tableNames['model_has_roles'])->delete();
        DB::table($tableNames['model_has_permissions'])->delete();
        DB::table($tableNames['roles'])->delete();
        DB::table($tableNames['permissions'])->delete();
        Model::reguard();
    }
}

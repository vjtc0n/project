<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(PermissionsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(PermissionUsersTableSeeder::class);

        Model::reguard();
    }
}

class PermissionsTableSeeder extends Seeder {
    public function run() {
        $now = date('Y-m-d H:i:s');
        DB::table('permissions')->insert([
            ['slug' => 'admin', 'name' => 'Admin', 'description' => '', 'created_at' => $now, 'updated_at' => $now],
            ['slug' => 'clusterstaffmanager', 'name' => 'Cluster Staff Manager', 'description' => '', 'created_at' => $now, 'updated_at' => $now],
            ['slug' => 'clusterstaff', 'name' => 'Cluster Staff', 'description' => '', 'created_at' => $now, 'updated_at' => $now],
            ['slug' => 'universitystaff', 'name' => 'University Staff', 'description' => '', 'created_at' => $now, 'updated_at' => $now],
            ['slug' => 'student', 'name' => 'Student', 'description' => '', 'created_at' => $now, 'updated_at' => $now]
        ]);
    }
}

class UsersTableSeeder extends Seeder {
    public function run() {
        $now = date('Y-m-d H:i:s');
        DB::table('users')->insert([
            ['username' => 'admin', 'password' => Hash::make('admin'), 'name' => 'Admin', 'created_at' => $now, 'updated_at' => $now]
        ]);
    }
}

class PermissionUsersTableSeeder extends Seeder {
    public function run() {
        $now = date('Y-m-d H:i:s');
        DB::table('permission_user')->insert(
            ['permission_id' => 1, 'user_id' => 1, 'created_at' => $now, 'updated_at' => $now]
        );
    }
}

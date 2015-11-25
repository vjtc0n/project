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
        // $this->call(UserTableSeeder::class);

        Model::reguard();
    }
}

class PermissionsTableSeeder extends Seeder {
    public function run() {
        DB::table('permissions')->insert([
            ['slug' => 'admin', 'name' => 'Admin', 'description' => ''],
            ['slug' => 'clusterstaffmanager', 'name' => 'Cluster Staff Manager', 'description' => ''],
            ['slug' => 'clusterstaff', 'name' => 'Cluster Staff', 'description' => ''],
            ['slug' => 'universitystaff', 'name' => 'University Staff', 'description' => ''],
            ['slug' => 'student', 'name' => 'Student', 'description' => '']
        ]);
    }
}

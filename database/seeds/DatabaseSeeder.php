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
        $this->call(TruongsTableSeeder::class);
        $this->call(NganhsTableSeeder::class);
        $this->call(ThiSinhsTableSeeder::class);
        $this->call(DiemsTableSeeder::class);

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
            ['username' => 'admin', 'password' => Hash::make('admin'), 'name' => 'Admin', 'created_at' => $now, 'updated_at' => $now],
            ['username' => 'staffmanager', 'password' => Hash::make('123'), 'name' => 'staffmanager', 'created_at' => $now, 'updated_at' => $now],
            ['username' => 'cstaff', 'password' => Hash::make('123'), 'name' => 'cstaff', 'created_at' => $now, 'updated_at' => $now],
            ['username' => 'bka', 'password' => Hash::make('123'), 'name' => 'bka', 'created_at' => $now, 'updated_at' => $now],
            ['username' => 'Nguyen Van A', 'password' => Hash::make('123'), 'name' => 'Nguyễn Văn A', 'created_at' => $now, 'updated_at' => $now],
            ['username' => 'Nguyen Thi B', 'password' => Hash::make('123'), 'name' => 'Nguyễn Thị B', 'created_at' => $now, 'updated_at' => $now],
            ['username' => 'neu', 'password' => Hash::make('123'), 'name' => 'neu', 'created_at' => $now, 'updated_at' => $now]
        ]);
    }
}

class PermissionUsersTableSeeder extends Seeder {
    public function run() {
        $now = date('Y-m-d H:i:s');
        DB::table('permission_user')->insert([
            ['permission_id' => 1, 'user_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['permission_id' => 2, 'user_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['permission_id' => 3, 'user_id' => 3, 'created_at' => $now, 'updated_at' => $now],
            ['permission_id' => 4, 'user_id' => 4, 'created_at' => $now, 'updated_at' => $now],
            ['permission_id' => 5, 'user_id' => 5, 'created_at' => $now, 'updated_at' => $now],
            ['permission_id' => 5, 'user_id' => 6, 'created_at' => $now, 'updated_at' => $now],
            ['permission_id' => 4, 'user_id' => 7, 'created_at' => $now, 'updated_at' => $now]
        ]);
    }
}

class TruongsTableSeeder extends Seeder {
    public function run() {
        $now = date('Y-m-d H:i:s');
        DB::table('truongs')->insert([
            ['matr' => 'BKA', 'tentr' => 'Đại học Bách khoa Hà Nội', 'nhanvienquanly_user_id' => 4, 'created_at' => $now, 'updated_at' => $now],
            ['matr' => 'NEU', 'tentr' => 'Đại học Kinh tế Quốc dân', 'nhanvienquanly_user_id' => 7, 'created_at' => $now, 'updated_at' => $now]
        ]);
    }
}

class NganhsTableSeeder extends Seeder {
    public function run() {
        $now = date('Y-m-d H:i:s');
        DB::table('nganhs')->insert([
            ['manganh' => 'BKACNTT', 'tennganh' => 'Công nghệ thông tin', 'diemchuan' => 26, 'truong_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['manganh' => 'NEUTUD', 'tennganh' => 'Toán ứng dụng', 'diemchuan' => 24, 'truong_id' => 2, 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}

class ThiSinhsTableSeeder extends Seeder {
    public function run() {
        $now = date('Y-m-d H:i:s');
        DB::table('thi_sinhs')->insert([
            ['ten' => 'Nguyễn Văn A', 'gioitinh' => 'Nam', 'namsinh' => 1997, 'quequan' => 'Hà Nội', 'khuvuc' => '1', 'user_id' => 5, 'created_at' => $now, 'updated_at' => $now],
            ['ten' => 'Nguyễn Thị B', 'gioitinh' => 'Nữ', 'namsinh' => 1997, 'quequan' => 'Hà Nội', 'khuvuc' => '2', 'user_id' => 6, 'created_at' => $now, 'updated_at' => $now]
        ]);
    }
}

class DiemsTableSeeder extends Seeder {
    public function run() {
        $now = date('Y-m-d H:i:s');
        DB::table('diems')->insert([
            ['sbd' => 'BKA1234', 'mon1' => 9, 'mon2' => 8, 'mon3' => 7, 'khoi' => 'A', 'thisinh_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['sbd' => 'BKA1235', 'mon1' => 6, 'mon2' => 8, 'mon3' => 10, 'khoi' => 'D1', 'thisinh_id' => 2, 'created_at' => $now, 'updated_at' => $now]
        ]);
    }
}

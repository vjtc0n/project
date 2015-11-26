<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Trang chủ
Route::get('/', function () {
    return view('base');
});
Route::get('url/full',function () { 
    return URL::full(); 
});

// Xem bảng xếp hạng các trường DH theo điểm thấp nhất của các khoa trong trường
Route::post('/', [    
'uses' => 'SearchController@getUniversityChart'
]);
Route::get('tuyen-sinh',function(){
    return view('home/regi');
});
Route::get('xem-dt',function(){
    return view('home/xemdt');
});

Route::get('login','UserController@getLogin');
Route::post('login','UserController@postLogin');
Route::get('logout','UserController@getLogout');

// Công việc của Admin
Route::group(['prefix'=>'admin'],function()
{
    Route::get('/',function(){
        return view('');
    });

    Route::get('taoTaiKhoanQuanLyNhanVienCum', [
        'middleware' => ['auth', 'permissions.required'],
        'permissions' => ['admin'],
        'uses' => 'AdminController@getTaoTaiKhoanQuanLyNhanVienCum'
    ]);

    Route::post('taoTaiKhoanQuanLyNhanVienCum', [
        'middleware' => ['auth', 'permissions.required'],
        'permissions' => ['admin'],
        'uses' => 'AdminController@postTaoTaiKhoanQuanLyNhanVienCum'
    ]);

    Route::get('congKhaiDiem', [
        'middleware' => ['auth', 'permissions.required'],
        'permissions' => ['admin'],
        'uses' => 'AdminController@congKhaiDiem'
    ]);

    Route::get('thietLapNguyenVongTruong', [
        'middleware' => ['auth', 'permissions.required'],
        'permissions' => ['admin'],
        'uses' => 'AdminController@thietLapNguyenVongTruong'
    ]);
});

// Công việc của Quản lý nhân viên cụm
Route::group(['prefix'=>'cluster-staff-manager'],function()
{
    Route::get('/',function(){
        return view('');
    });

    Route::get('taoTaiKhoanNhanVienCum', [
        'middleware' => ['auth', 'permissions.required'],
        'permissions' => ['clusterstaffmanager'],
        'uses' => 'ClusterStaffManagerController@getTaoTaiKhoanNhanVienCum'
    ]);

    Route::post('taoTaiKhoanNhanVienCum', [
        'middleware' => ['auth', 'permissions.required'],
        'permissions' => ['clusterstaffmanager'],
        'uses' => 'ClusterStaffManagerController@postTaoTaiKhoanNhanVienCum'
    ]);

});

Route::group(['prefix'=>'cluster-staff'],function()
{
    Route::get('/',function(){
        return view('');
    });
    Route::group(['prefix' => 'quan-ly-thong-tin-thi-sinh'], function() {
        Route::post('add', [
            'middleware' => ['auth', 'permissions.required'],
            'permissions' => ['clusterstaff'],
            'uses' => 'ClusterStaffController@addStudent'
        ]);

        Route::post('edit', [
            'middleware' => ['auth', 'permissions.required'],
            'permissions' => [ 'clusterstaff'],
            'uses' => 'ClusterStaffController@editStudent'
        ]);

        Route::get('delete', [
            'middleware' => ['auth', 'permissions.required'],
            'permissions' => [ 'clusterstaff'],
            'uses' => 'ClusterStaffController@deleteStudent'
        ]);
    });

    Route::group(['prefix' => 'quan-ly-thong-tin-diem-thi'], function() {
        Route::post('add', [
            'middleware' => ['auth', 'permissions.required'],
            'permissions' => [ 'clusterstaff'],
            'uses' => 'ClusterStaffController@addScore'
        ]);

        Route::post('edit', [
            'middleware' => ['auth', 'permissions.required'],
            'permissions' => [ 'clusterstaff'],
            'uses' => 'ClusterStaffController@editScore'
        ]);
    });
});


// Công việc của nhân viên trường
Route::post('university-register/register', [
    'middleware' => ['auth', 'permissions.required'],
    'permissions' => ['universitystaff'],
    'uses' => 'UserController@addUniversity'
]);


Route::group(['prefix'=>'university-staff'],function()
{
    Route::get('/',function(){
        return view('');
    });

    Route::post('them-khoa', [
        'middleware' => ['auth', 'permissions.required'],
        'permissions' => ['universitystaff'],
        'uses' => 'UniversityStaffController@addMajor'
    ]);

    Route::post('sua-khoa', [
        'middleware' => ['auth', 'permissions.required'],
        'permissions' => ['universitystaff'],
        'uses' => 'UniversityStaffController@editMajor'
    ]);

    Route::get('xoa-khoa', [
        'middleware' => ['auth', 'permissions.required'],
        'permissions' => ['universitystaff'],
        'uses' => 'UniversityStaffController@deleteMajor'
    ]);

    Route::get('diem', [
        'middleware' => ['auth', 'permissions.required'],
        'permissions' => ['universitystaff'],
        'uses' => 'UniversityStaffController@setScore'
    ]);
});


// Công việc của thí sinh
Route::post('nop-ho-so', [
    'middleware' => ['auth', 'permissions.required'],
    'permissions' => ['student'],
    'uses' => 'StudentController@submit'
]);


Route::post('rut-ho-so', [
    'middleware' => ['auth', 'permissions.required'],
    'permissions' => ['student'],
    'uses' => 'StudentController@withdraw'
]);

// Xem điểm các thí sinh
Route::group(['prefix'=>'tra-cuu'],function()
{
    Route::get('thi-sinh', ['uses' => 'SearchController@getStudentInformation']);
});

//Test Chart
Route::get('/api/data','ChartController@lineChart');
Route::get('/line-chart', function(){
    return view('line-chart');
});

Route::get('/column-chart','ChartController@columnChart');

Route::any('{all?}', function() {
    return redirect('/');
}) ->where('all', '.*');

/*
// Allow users with the permission "access" to see the page.
Route::get('/test', [
    'middleware' => ['auth', 'permissions.required'],
    'permissions' => 'access',
    'uses' => 'MyController@myAction'
]);

// Allow users with "access" OR "admin" to see the page.
Route::get('/test', [
    'middleware' => ['auth', 'permissions.required'],
    'permissions' => ['access', 'admin'],
    'uses' => 'MyController@myAction'
]);

// Allow users with "access" AND "admin" to see the page.
Route::get('/test', [
    'middleware' => ['auth', 'permissions.required'],
    'permissions' => ['access', 'admin'],
    'permissions_require_all' => true,
    'uses' => 'MyController@myAction'
]); 
*/
//

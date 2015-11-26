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

// Xem bảng xếp hạng các trường DH theo điểm thấp nhất của các khoa trong trường
Route::post('/', [    
'uses' => 'SearchController@getUniversityChart'
]);

Route::get('/login','UserController@getLogin');
Route::post('/login','UserController@postLogin');
Route::get('/logout','UserController@getLogout');

// Công việc của Admin

Route::group(['prefix'=>'admin'],function()
{
    Route::get('/',function(){
        return view('');
    });

    Route::post('/taoTaiKhoanQuanLyNhanVienCum', [
        'middleware' => ['auth', 'permissions.required'],
        'permissions' => ['admin'],
        'uses' => 'AdminController@taoTaiKhoanNhanVienCum'
    ]);

    Route::get('/congKhaiDiem', [
        'middleware' => ['auth', 'permissions.required'],
        'permissions' => ['admin'],
        'uses' => 'AdminController@congKhaiDiem'
    ]);

    Route::get('/thietLapNguyenVongTruong', [
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

    Route::post('/taoTaiKhoanNhanVienCum', [
        'middleware' => ['auth', 'permissions.required'],
        'permissions' => ['clusterstaffmanager'],
        'uses' => 'ClusterStaffManagerController@taoTaiKhoanNhanVienCum'
    ]);

});

Route::group(['prefix'=>'admin'],function()
{
    //Route::get('/',function(){
        //return view('');
    //});
    
     Route::group(['prefix' => 'point'],function(){
        //Route::get('list',['as' => 'admin.cate.list','uses' => 'CateController@getList']);
        Route::get('add',['as' => 'admin.point.getAdd','uses' => 'PointController@getAdd']);
        Route::post('add',['as' => 'admin.point.postAdd','uses' => 'PointController@postAdd']);
        //Route::get('delete/{id}',['as' => 'admin.cate.getDelete','uses' => 'CateController@getDelete']);
        //Route::get('edit/{id}',['as' => 'admin.cate.getEdit','uses' => 'CateController@getEdit']);
        //Route::post('edit/{id}',['as' => 'admin.cate.postEdit','uses' => 'CateController@postEdit']);
        
    });


    Route::post('/quan-ly-thong-tin-thi-sinh/add', [
        //'middleware' => ['auth', 'permissions.required'],
        'permissions' => ['clusterstaff'],
        'uses' => 'ClusterStaffController@addStudent'
    ]);

    Route::post('/quan-ly-thong-tin-thi-sinh/edit', [
        //'middleware' => ['auth', 'permissions.required'],
        'permissions' => [ 'clusterstaff'],
        'uses' => 'ClusterStaffController@editStudent'
    ]);

    Route::get('/quan-ly-thong-tin-thi-sinh/delete', [
        //'middleware' => ['auth', 'permissions.required'],
        'permissions' => [ 'clusterstaff'],
        'uses' => 'ClusterStaffController@deleteStudent'
    ]);

    Route::post('/quan-ly-thong-tin-diem-thi/add', [
        //'middleware' => ['auth', 'permissions.required'],
        'permissions' => [ 'clusterstaff'],
        'uses' => 'ClusterStaffController@addScore'
    ]);

    Route::post('/quan-ly-thong-tin-diem-thi/edit', [
        //'middleware' => ['auth', 'permissions.required'],
        'permissions' => [ 'clusterstaff'],
        'uses' => 'ClusterStaffController@editScore'
    ]);

});


// Công việc của nhân viên trường

Route::get('/university-register',function(){
    return view('');
});
Route::post('/university-register', [
    'uses' => 'UserController@checkCode'
]);

Route::get('/university-register/register', function () {
    return view('');
});

Route::post('/university-register/register', [
    'middleware' => ['auth', 'permissions.required'],
    'permissions' => ['universitystaff'],
    'uses' => 'UserController@addUniversity'
]);


Route::group(['prefix'=>'university-staff'],function()
{
    Route::get('/',function(){
        return view('');
    });

    Route::post('/them-khoa', [
        'middleware' => ['auth', 'permissions.required'],
        'permissions' => ['universitystaff'],
        'uses' => 'UniversityStaffController@addMajor'
    ]);

    Route::post('/sua-khoa', [
        'middleware' => ['auth', 'permissions.required'],
        'permissions' => ['universitystaff'],
        'uses' => 'UniversityStaffController@editMajor'
    ]);

    Route::get('/xoa-khoa', [
        'middleware' => ['auth', 'permissions.required'],
        'permissions' => ['universitystaff'],
        'uses' => 'UniversityStaffController@deleteMajor'
    ]);

    Route::get('/diem', [
        'middleware' => ['auth', 'permissions.required'],
        'permissions' => ['universitystaff'],
        'uses' => 'UniversityStaffController@setScore'
    ]);
});


// Công việc của thí sinh
Route::post('/nop-ho-so', [
    'middleware' => ['auth', 'permissions.required'],
    'permissions' => ['student'],
    'uses' => 'StudentController@submit'
]);


Route::post('/rut-ho-so', [
    'middleware' => ['auth', 'permissions.required'],
    'permissions' => ['student'],
    'uses' => 'StudentController@withdraw'
]);

// Xem điểm các thí sinh
Route::group(['prefix'=>'search'],function()
{
    Route::get('/thi-sinh', [    
    'uses' => 'SearchController@getStudentInformation'
    ]);

});


//Route::any('{all?}', function() {
   // return redirect('/');
//}) ->where('all', '.*');

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

//Route::get('test',function(){
  // return view('admin.point.add'); 
//});

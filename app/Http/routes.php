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

Route::get('home', 'UserController@getTrangChu');
Route::get('xem-dt',function(){
    return view('home/xemdt');
});

Route::get('tra-diem', ['as' => 'tra-diem', 'uses' => 'UserController@getTraDiem']);
Route::post('tim-truong', ['as' => 'tim-truong', 'uses' => 'StudentController@postTimTruong']);
Route::get('liet-ke-nganh', ['as' => 'liet-ke-nganh', 'uses' => 'StudentController@getLietKeNganh']);
Route::get('dang-ky', [
        'as' => 'dang-ky',
        'middleware' => ['auth', 'permissions.required'],
        'permissions' => ['student'],
        'uses' => 'StudentController@getDangKy'
]);

Route::get('/login','UserController@getLogin');
Route::post('/login','UserController@postLogin');
Route::get('/logout','UserController@getLogout');

Route::get('/doi-mat-khau', [
        'middleware' => ['auth', 'permissions.required'],
        'permissions' => ['admin', 'clusterstaffmanager','clusterstaff','universitystaff','student'],
        'uses' => 'UserController@getchangePasswd'
    ]);


Route::post('/doi-mat-khau', [
        'middleware' => ['auth', 'permissions.required'],
        'permissions' => ['admin', 'clusterstaffmanager','clusterstaff','universitystaff','student'],
        'uses' => 'UserController@changePasswd'
    ]);



// Công việc của Admin
Route::group(['prefix'=>'admin'],function()
{
    Route::get('/',function(){
        return view('');
    });

    Route::get('/taoTaiKhoanQuanLyNhanVienCum', [
        'middleware' => ['auth', 'permissions.required'],
        'permissions' => ['admin'],
        'uses' => 'AdminController@getTaoTaiKhoanQuanLyNhanVienCum'
    ]);

    Route::post('/taoTaiKhoanQuanLyNhanVienCum', [
        'middleware' => ['auth', 'permissions.required'],
        'permissions' => ['admin'],
        'uses' => 'AdminController@postTaoTaiKhoanQuanLyNhanVienCum'
    ]);
});

// Công việc của Quản lý nhân viên cụm
Route::group(['prefix'=>'cluster-staff-manager'],function()
{
    Route::get('/',function(){
        return view('');
    });

    Route::get('/taoTaiKhoanNhanVienCum', [
        'middleware' => ['auth', 'permissions.required'],
        'permissions' => ['clusterstaffmanager'],
        'uses' => 'ClusterStaffManagerController@getTaoTaiKhoanNhanVienCum'
    ]);

    Route::post('/taoTaiKhoanNhanVienCum', [
        'middleware' => ['auth', 'permissions.required'],
        'permissions' => ['clusterstaffmanager'],
        'uses' => 'ClusterStaffManagerController@postTaoTaiKhoanNhanVienCum'
    ]);

    Route::get('taoTaiKhoanNhanVienTruong', [
        'middleware' => ['auth', 'permissions.required'],
        'permissions' => ['clusterstaffmanager'],
        'uses' => 'ClusterStaffManagerController@getTaoTaiKhoanNhanVienTruong'
    ]);

    Route::post('taoTaiKhoanNhanVienTruong', [
        'middleware' => ['auth', 'permissions.required'],
        'permissions' => ['clusterstaffmanager'],
        'uses' => 'ClusterStaffManagerController@postTaoTaiKhoanNhanVienTruong'
    ]);

});

Route::group(['prefix'=>'cluster-staff'],function()
{
    Route::get('/',function(){
    return view('');
    });
    
     //Route::group(['prefix' => 'point'],function(){
        //Route::get('list',['as' => 'admin.point.list','uses' => 'PointController@getList']);
       // Route::get('add',['as' => 'admin.point.getAdd','uses' => 'PointController@getAdd']);
       // Route::post('add',['as' => 'admin.point.postAdd','uses' => 'PointController@postAdd']);
        //Route::get('delete/{id}',['as' => 'admin.cate.getDelete','uses' => 'CateController@getDelete']);
        //Route::get('edit/{id}',['as' => 'admin.cate.getEdit','uses' => 'CateController@getEdit']);
        //Route::post('edit/{id}',['as' => 'admin.cate.postEdit','uses' => 'CateController@postEdit']);
        
    //});


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
Route::group(['prefix'=>'university-staff'],function()
{
    Route::get('/', [
        'middleware' => ['auth', 'permissions.required'],
        'permissions' => ['universitystaff'],
        'uses' => 'UniversityStaffController@getListMajor'
    ]);

    Route::get('them-khoa', [
        'middleware' => ['auth', 'permissions.required'],
        'permissions' => ['universitystaff'],
        'uses' => 'UniversityStaffController@getAddMajor'
    ]);

    Route::post('them-khoa', [
        'middleware' => ['auth', 'permissions.required'],
        'permissions' => ['universitystaff'],
        'uses' => 'UniversityStaffController@postAddMajor'
    ]);

    Route::get('sua-khoa/{id}', [
        'as' => 'university-staff.sua-khoa',
        'middleware' => ['auth', 'permissions.required'],
        'permissions' => ['universitystaff'],
        'uses' => 'UniversityStaffController@getEditMajor'
    ]);

    Route::post('sua-khoa/{id}', [
        'as' => 'university-staff.sua-khoa',
        'middleware' => ['auth', 'permissions.required'],
        'permissions' => ['universitystaff'],
        'uses' => 'UniversityStaffController@postEditMajor'
    ]);

    Route::get('xoa-khoa/{id}', [
        'as' => 'university-staff.xoa-khoa',
        'middleware' => ['auth', 'permissions.required'],
        'permissions' => ['universitystaff'],
        'uses' => 'UniversityStaffController@deleteMajor'
    ]);
});

// Công việc của thí sinh
Route::get('tuyen-sinh', [
    'middleware' => ['auth', 'permissions.required'],
    'permissions' => ['student'],
    'uses' => 'StudentController@getTuyenSinh'
]);

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

Route::group(['prefix'=>'tra-cuu'],function()
{
    Route::get('/thi-sinh', [    
    'uses' => 'SearchController@getStudentInformation'
    ]);

});

//Test Chart
Route::get('/api/data','ChartController@lineChart');
Route::get('/line-chart', function(){
    return view('line-chart');
});

Route::get('/column-chart','ChartController@columnChart');

//Route::get('/{id}/{diemTong}','NotificationController@setScore');
Route::get('/api/notification','TestNotificationController@getNotice');



Route::any('{all?}', function() {
    return view('khong-tim-thay-trang');
    //  echo("Không tìm thấy trang mà bạn yêu cầu");
    // // return redirect('/');
}) ->where('all', '.*');

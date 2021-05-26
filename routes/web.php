<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('student.student');
});
Route::get('/admin', function () {
    return view('admin.admin');
});
Route::post('/adminlogin','AdminController@login_dashboard');
Route::get('/adminsignup','AdminController@signup');
Route::get('/studentsignup','StudentController@signup');
Route::post('/studentregister','StudentController@register');
Route::post('/user/login/process','StudentController@login_process');
Route::get('/friends','StudentController@friends');
Route::get('/my-teacher','StudentController@teacher');
Route::get('/student/all','AdminController@all_students');
Route::get('/user/dashboard','StudentController@dashboard');
Route::get('/logout','StudentController@logout');
Route::get('/admin/dashboard','AdminController@dashboard');
Route::get('/teacher/add','AdminController@addTeacher');\
Route::post('teacher/add/process','AdminController@addTeacherProcess');
Route::get('teacher/all','AdminController@allTeacher');
Route::get('admin/logout','AdminController@logout');
Route::get('admin/student/view/{id}','AdminController@studentView');
Route::get('admin/student/edit/{id}','AdminController@studentEdit');
Route::get('admin/student/delete/{id}','AdminController@studentDelete');
Route::get('admin/teacher/view/{id}','AdminController@teacherView');
Route::get('admin/teacher/edit/{id}','AdminController@teacherEdit');
Route::get('admin/teacher/delete/{id}','AdminController@teacherDelete');
Route::post('admin/teacher/update/{id}','AdminController@teacherUpdate');
Route::post('admin/student/update/{id}','AdminController@studentUpdate');
Route::get('user/teacher/view/{id}','StudentController@teacherView');
Route::get('user/student/view/{id}','StudentController@studentView');
Route::get('user/invoice/{id}','StudentController@invoiceView');
Route::get('user/payment/verify/{id}','StudentController@verify_payment');
Route::get('admin/notice/add','AdminController@add_notice');
Route::post('admin/notice/add/process','AdminController@uploadNotice');
Route::get('user/notification/{id}','StudentController@notification');
Route::get('notify/count/{id}','StudentController@count_notify');
Route::get('user/notice/details/{id}','StudentController@notice_details');
Route::get('user/invoice/pdf/{id}','StudentController@invoice_pdf');

// SSLCOMMERZ Start
Route::get('/user/invoice/pay/{id}', 'SslCommerzPaymentController@exampleEasyCheckout');
Route::get('/example2', 'SslCommerzPaymentController@exampleHostedCheckout');

Route::post('/pay', 'SslCommerzPaymentController@index');
Route::post('/pay-via-ajax', 'SslCommerzPaymentController@payViaAjax');

Route::post('/success', 'SslCommerzPaymentController@success');
Route::post('/fail', 'SslCommerzPaymentController@fail');
Route::post('/cancel', 'SslCommerzPaymentController@cancel');

Route::post('/ipn', 'SslCommerzPaymentController@ipn');
//SSLCOMMERZ END

Route::get('payment-copy/{tnx}','StudentController@payment_copy');
Route::post('user/payment/verify/confirm/{id}','StudentController@confirm_verify');
Route::get('admin/tuition-fee','AdminController@tuition_fee');

Route::get('admin/live-class','AdminController@live_class_info');

Route::post('admin/live-class/confirm','AdminController@live_class_confirm');

Route::get('user/live-class/{id}','StudentController@live_class');

Route::get('live/count','StudentController@live_count');

Route::get('user/forget-password','StudentController@forget_password');

Route::post('user/forget-password/confirm','StudentController@confirm_forget_password');

Route::get('user/reset-pass/{id}/{rand}','StudentController@reset_pass');

Route::post('user/reset-pass/confirm/{id}','StudentController@reset_pass_confirm');

Route::get('user/verify-email/{id}','StudentController@verify_email');

Route::post('user/confirm/email/{id}','StudentController@confirm_email');
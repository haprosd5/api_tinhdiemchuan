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
    return view('welcome');
});
// route lien quan den thong tin cac truong
Route::get('tentruong/all', 'TentruongController@index');
Route::get('tentruong/{name}', 'TentruongController@getTruongWithName');
// route tra cuu thong tin diem chuan
Route::get('diemchuan/{id}', 'DiemchuanController@getDiemchuanWithID');

Route::get('diemchuan/ss/{diemchuan}', 'DiemchuanController@sosanhDiemChuanDuKienTheo01Thamso');
Route::get('diemchuan/ss/{diemchuan}/{tohopmon}', 'DiemchuanController@sosanhDiemChuanDuKienTheo02Thamso');
Route::get('diemchuan/ss/{diemchuan}/{tohopmon}/{truong}', 'DiemchuanController@sosanhDiemChuanDuKienTheo03Thamso');

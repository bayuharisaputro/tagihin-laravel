<?php

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

Route::get('/data', function () {
    $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_PORT => "5984",
        CURLOPT_URL => 'http://127.0.0.1:5984/tagihin/_design/view1/_view/new-view',
        //CURLOPT_URL => 'http://tanggon:tanggon@localhost:5984/dbuser/_design/jumlahTagihan/_view/new-view?key="'.p;-.liio9.'"',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_POSTFIELDS => "",
        CURLOPT_HTTPHEADER => array(
        "content-type: application/json"
        ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
        echo "cURL Error #:" . $err;
        } else {
            return response($response,200)->header("Content-Type","application/json");
        }
});


Route::get('/check/{hp}', function ($hp) {
    $data = json_decode(file_get_contents("php://input"), TRUE);
    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_PORT => "5984",
    CURLOPT_URL => 'http://127.0.0.1:5984/tagihin/_design/view1/_view/new-view?key="'.$hp.'"',
    //CURLOPT_URL => 'http://tanggon:tanggon@localhost:5984/dbuser/_design/jumlahTagihan/_view/new-view?key="'.p;-.liio9.'"',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_POSTFIELDS => "",
    CURLOPT_HTTPHEADER => array(
    "content-type: application/json"
    ),
    ));
    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);

    if ($err) {
    echo "cURL Error #:" . $err;
    } else {
        return response($response,200)->header("Content-Type","application/json");
    }
});

Route::get('/user', function () {
    $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_PORT => "5984",
        CURLOPT_URL => 'http://127.0.0.1:5984/tagihin/_design/view1/_view/new-view?key="81293812938"',
        //CURLOPT_URL => 'http://tanggon:tanggon@localhost:5984/dbuser/_design/jumlahTagihan/_view/new-view?key="'.p;-.liio9.'"',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_POSTFIELDS => "",
        CURLOPT_HTTPHEADER => array(
        "content-type: application/json"
        ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
        echo "cURL Error #:" . $err;
        } else {
            return response($response,200)->header("Content-Type","application/json");
        }
});


Route::post('/version', function () {
    $data = json_decode(file_get_contents("php://input"), TRUE);
    $namaPenerima = $data["namaPenerima"];
    $hpPenerima = $data['noHp'];
    $hpPenagih = $data['noHpPenagih'];
    $emailPenerima =$data['email'];
    $namaPenagih = $data['namPenagih'];
    $cat = $data['catatan'];
    $tagihan = $data['jumlahTagihan'];
    $tgl = date("Y-m-d H:i:s");
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_PORT => "5984",
      CURLOPT_URL => "http://bayuharisaputro:bayu0707@127.0.0.1:5984/tagihin",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => "{\"type\":\"tagihan\",\n\t\t\t\t\"namapenerima\": \"$namaPenerima\",\n\t\t\t\t\"nohp\": \"$hpPenerima\",\n\t\t\t\t\"email\": \"$emailPenerima\",\n\t\t\t\t\"nampenagih\": \"$namaPenagih\",\n\t\t\t\t\"nohppenagih\": \"$hpPenagih\",\n\t\t\t\t\"jumlahtagihan\": $tagihan,\n\t\t\t\t\"catatan\": \"$cat \",\n\t\t\t\t\"tanggal\": \"$tgl\",\n\t\"status\": \"open\"\n}",
      CURLOPT_COOKIE => "XSRF-TOKEN=eyJpdiI6ImVMQUl4ajJIS0dOZnRkYTBlRUYxc2c9PSIsInZhbHVlIjoidHVIUmlUK3grYmpobkxBWDV0S3JIYng0MjNQbllPdnhZXC9MaFwvOU4wQjFjdXBjK1lBTmRpOG9WRDk0c1pSK1pENVdZTllvTkVMSkk0ZmVmaHYzYm5QZz09IiwibWFjIjoiOTk5MDgyNjI5NTBjNDYwMzhjMDdkZDlhMzdlMWRkMDlhZjRlOTdlNzMzMWIyN2QyZTVmY2UyZTlmYTY1ZDdkOSJ9; laravel_session=eyJpdiI6Inh0MnNXa2R2RDg4MVwvWFc3VjdnU09nPT0iLCJ2YWx1ZSI6IkpwdlBreHpTY2RabHFLYnBQR29nY0NUS0pEWXZEMVA5OXg4SEdMWUQ3RVwvejhjdzNPQzZCU0szYjA4WVE1SFJyd0JMREFcL3BOR1VobWd6Q25RbytQMWc9PSIsIm1hYyI6IjhmZTA4YmMyNzI3ZjI1NzY3ODg0MThjYTAyZDliM2FhMzEyZjliMWMzNDhiYzg3MzJhZjJhODM2M2RhODQ2YzAifQ%253D%253D",
      CURLOPT_HTTPHEADER => array(
        "content-type: application/json"
      ),
    ));
    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);
    if ($err) {
      echo "cURL Error #:" . $err;
    } else {
      echo $response;
    }
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('bios','BioController');

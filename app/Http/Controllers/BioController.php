<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BioController extends Controller
{

    public function index()
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_PORT => "5984",
        CURLOPT_URL => "http://127.0.0.1:5984/tagihin/_design/jumlahTagihan/_view/new-view",
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
    $bios= json_decode($response, TRUE);;
    return view('index',compact('bios'));
  
    }

       
    }
     public function create()
    {
        return view('create');
    }
    public function store(Request $request)
    {
        $curl = curl_init();
            $namaPenerima = $request->get('namaPenerima');
            $hpPenerima = $request->get('hpPenerima');
            $emailPenerima =$request->get('emailPenerima');
            $namaPenagih = $request->get('namaPenagih');
            $hpPenagih = $request->get('hpPenagih');
            $cat = $request->get('catatan');
            $tagihan = $request->get('tagihan');
            $tgl = date("Y/m/d");
            curl_setopt_array($curl, array(
            CURLOPT_PORT => "5984",
            CURLOPT_URL => "http://bayuharisaputro:bayu0707@127.0.0.1:5984/tagihin/",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{\n\t\t\t\t\"namaPenerima\": \"$namaPenerima\",\n\t\t\t\t\"noHp\": \"$hpPenerima\",\n\t\t\t\t\"email\": \"$emailPenerima\",\n\t\t\t\t\"namPenagih\": \"$namaPenagih\",\n\t\t\t\t\"noHpPenagih\": \"$hpPenagih\",\n\t\t\t\t\"jumlahTagihan\": $tagihan,\n\t\t\t\t\"catatan\": \"$cat \",\n\t\t\t\t\"tanggal\": \"$tgl\"\n\t\t\t}",
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
            return redirect('bios')->with('success', 'Information has been added');
            }
   
        
       
        
    }
    public function edit($id)
    {
        $bio = \App\Bio::find($id);
        return view('edit',compact('bio','id'));
    }
    public function update(Request $request, $id)
    {
        $bio= \App\bio::find($id);
        $bio->name=$request->get('name');
        $bio->email=$request->get('email');
        $bio->number=$request->get('number');
        $bio->office=$request->get('office');
        $bio->save();
        return redirect('bios');
    }
}

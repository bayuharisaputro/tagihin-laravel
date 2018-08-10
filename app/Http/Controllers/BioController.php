<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
class BioController extends Controller
{
    
    public function index()
    {
        //$hp = $_GET['hp'];
        //$hpPenagih="123123";

        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_PORT => "5984",
        CURLOPT_URL => 'http://tanggon:tanggon@localhost:5984/dbuser/_design/jumlahTagihan/_view/new-view',
        //CURLOPT_URL => 'http://tanggon:tanggon@localhost:5984/dbuser/_design/jumlahTagihan/_view/new-view?key=["'.$hpPenagih.'"]',
       
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
        date_default_timezone_set("Asia/Jakarta");
        $stats="good";
        $hpPenagih = $request->get('hpPenagih');
        //$hpPenagih = '081359868716';        
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_PORT => "5984",
        CURLOPT_URL => 'http://tanggon:tanggon@localhost:5984/dbuser/_design/jumlahTagihan/_view/new-view?key=["'.$hpPenagih.'"]',
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
            
            for($count = 0 ;$count <count($bios["rows"]); $count ++){
                if(strtotime(date('Y-m-d H:i:s'))-strtotime($bios["rows"][$count]["value"][8])>86400){
                    $stats=="failed";
                    return redirect('bios')->with('success', 'Failed to add! Number have an overdue bills!');    
                }

            }
                  
            if($stats=="failed"){
                return redirect('bios')->with('success', 'Failed to add! Number have an overdue bills!');    
            }else if($stats=="good"){ 
                $curl = curl_init();
                $namaPenerima = $request->get('namaPenerima');
                $hpPenerima = $request->get('hpPenerima');
                $emailPenerima =$request->get('emailPenerima');
                $namaPenagih = $request->get('namaPenagih');
                $cat = $request->get('catatan');
                $tagihan = $request->get('tagihan');
                $tgl = date("Y-m-d H:i:s");
                curl_setopt_array($curl, array(
                CURLOPT_PORT => "5984",
                CURLOPT_URL => "http://tanggon:tanggon@localhost:5984/dbuser/",
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
                    $curl = curl_init();
                    curl_setopt_array($curl, array(
                      CURLOPT_URL => "http:///206.189.80.98:8081/apiv1/digiroin/sms",
                      CURLOPT_RETURNTRANSFER => true,
                      CURLOPT_ENCODING => "",
                      CURLOPT_MAXREDIRS => 10,
                      CURLOPT_TIMEOUT => 30,
                      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                      CURLOPT_CUSTOMREQUEST => "POST",
                      CURLOPT_POSTFIELDS => "{\n    \"phone\":\"$hpPenerima\",\n    \"message\":\"jumlah : $tagihan ($cat)\"\n}",
                      CURLOPT_HTTPHEADER => array(
                        "apikey: q1jsewrjzizV7wmXCB3GxIRdI8ILL749",
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
                return redirect('bios')->with('success', 'Information has been added');
                }             
            }
           
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

@extends('layouts.app')

@section('content')
<template>
    <div class="container-fluid top">
        <div class="col-lg-4 col-centered"></div>
        <div class="col-lg-4 col-centered">
       
            

           <div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">
                  	  <h1 class="mb"><i class="fa fa-angle-right font"></i> N</h1>
                        <span class="help-block fsize">Cara mudah mengirim tagihan</span>
                        
                      <form class="form-horizontal style-form" method="get">
                            <div>
                                <p class="box1">Pengirim</p>           
                            </div>
                          
                          <!-- =====PENGIRIM===== -->
                            <div class="form-group">
                                <div class="inner-addon left-addon">
                                    <i class="icon"> <img src="url({{ URL::asset('icon/user.jpg') }})" height="15" weight="15"></i>
                                    <input type="text" class="form-control inp" placeholder="Nama Pengirim" />
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="inner-addon left-addon">
                                    <i class="icon"> <img src="phone.png" height="15" weight="15"></i>
                                    <input type="number" class="form-control inp" placeholder="Nomor Handphone Pengirim" />
                                </div>
                            </div>
                          <!-- =========== -->


                            <div>
                                <p class="box1">Penerima</p>           
                            </div>

                          <!-- =====PENERIMA===== -->
                            <div class="form-group">
                                <div class="inner-addon left-addon">
                                    <i class="icon"> <img src="user.png" height="15" weight="15"></i>
                                    <input type="text" class="form-control inp" placeholder="Nama Penerima" />
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="inner-addon left-addon">
                                    <i class="icon"> <img src="mail.png" height="15" weight="15"></i>
                                    <input type="email" class="form-control inp" placeholder="Email Penerima" />
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="inner-addon left-addon">
                                    <i class="icon"> <img src="phone.png" height="15" weight="15"></i>
                                    <input type="number" class="form-control inp" placeholder="Nomor Handphone Penerima" />
                                </div>
                            </div>
                          <!-- =========== -->

                            <div>
                                <p class="box1">Tagihan</p>           
                            </div>
                          <!-- =====TAGIHAN===== -->
                            <div class="form-group">
                                <div class="inner-addon left-addon">
                                    <i class="icon"> <img src="receipt.png" height="15" weight="15"></i>
                                    <input type="number" class="form-control inp" placeholder="Jumlah" />
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="inner-addon left-addon">
                                    <i class="icon"> <img src="note.png" height="15" weight="15"></i>
                                    <input type="text" class="form-control inp" placeholder="Catatan" />
                                </div>
                            </div>
                          <!-- =========== -->
                          
                      </form>
                  </div>
          		</div><!-- col-lg-12-->      	
          	</div><!-- /row -->

            <button type="button" class="btn btn-primary btn-block button1">Tagih</button>
                
        </div>
        <div class="col-lg-4 col-centered"></div>
    </div>
</template>

<script>
    
</script>

<style>
    .top{
        margin-top: -40px;
    }
    .font{
        font-size:30px;
        color:blue;
        font-family: serif;
    }
    .box1{
        text-align: centered;
        font-weight: bold;
        color: white;
        height: 40px;
        width: 100px;
        margin-bottom:30px;
        margin-top:20px;
        padding-top: 10px;
        padding-right: 75px;
        padding-left: 40px;
        background-color: #4286F1;
    }
    .inner-addon { 
        position: relative; 
    }

    /* style icon */
    .inner-addon .icon {
        position: absolute;
        padding: 10px;
        pointer-events: none;
    }

    /* align icon */
    .left-addon .icon  { left:  50px;}
    .right-addon .icon { right: 0px;}

    /* add padding  */
    .left-addon input  { 
        padding-left:  35px; 
    }

    .right-addon input { 
        padding-right: 35px; 
    }

    .fsize{
        font-size:15px;
    }

    .inp { 
        width:86%;
        background-color: transparent; 
        border-width: 0px 0px 1px 0px; 
        border-color: #7F8C8D;
        border-style: solid; 
        margin-left:50px;
    }
    .button1 {
        background-color: #4286F1;
        height: 40px;
       
    }
    
</style> 
@endsection

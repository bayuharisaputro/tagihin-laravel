<template>
<div class="container-fluid top" >
    <div class="col-lg-4 col-centered"></div>
    <div class="col-lg-4 col-centered">
        <div class="form-panel">
        
            <div class="row">
                <div class="col-xs-8 col-md-8">
                <!-- <span class="leftTitle">Riwayat Transaksi</span> -->
                <p class="leftTitle">Riwayat Transaksi</p>

                </div>
                
                <div id="rcorners1" class="col-xs-4 col-md-4">
                    <p>Overdue</p> 
                </div>
            </div>
            

            <div>
                <p class="bluebox">Invoice</p>           
            </div>

    
            <div>
                    <p class="bold">Nama</p>
                    <p class="left">Adryan</p>

                    <br>

                    <p class="bold">Nomor Handphone</p>
                    <p class="left">0321433</p>

                    <br>

                    <p class="bold">Email</p>
                    <p class="left" >adryan@digiro.in</p>

            <!-- line -->
                    <hr>
                    <!-- <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label bold">Jumlah</label>
                        <div class="col-sm-6">
                            <label class="col-sm-5 col-sm-5 control-label txt">Rp 446.980</label>
                        </div>
                    </div>
                    <br><br>
                    <div>
                        <label class="col-sm-3 col-sm-3 control-label">Catatan</label>
                        <div class="col-sm-6">
                            <label class="col-sm-5 col-sm-5 control-label left">Jangan lupa buat beli kebutuhan harian keluarga</label>
                        </div>
                    </div>
                    <br> -->

                    <div class="row">
                        <div class="col-xs-5 col-md-7">
                            <p class="bold">Jumlah</p>
                        </div>
                        <div class="col-xs-7 col-md-5">
                            <label class="control-label txt">Rp 446.980</label>
                        </div>
                    </div>
            


                    <!-- <p class="bold">Jumlah 
                    <label class="col-sm-5 col-sm-5 control-label txt">Rp 446.980</label>
                    </p> -->

                    <p class="bold">Catatan</p>
                    <p class="left">Jangan lupa buat beli kebutuhan harian keluarga</p>

                    <br>
                    <br>
                        


                        


                    <!-- BUTTON -->
                    <button type="button" class="btn btn-primary btn-block button">Tutup</button>
                    <input type="submit" class="btn btn-primary btn-block button" value="Tutup" name="" id="">

            </div>
        </div>
    </div>
    <div class="col-lg-4 col-centered"></div>
</div>    
</div>    
</template>

<script>
    

</script>


<style>
    .pdgall{
        margin: 10px;
    }
    .leftTitle{ 
        text-align: left;
        color: black;
        padding-left: 30px;
        font-weight: bold;
        font-size: 20px;
        margin-top: 10px;
    }
    .left{
        text-align: left;
        color: black;
        font-weight: bold;
        margin-top: 10px;
        margin-left: 30px;
    }
    .pdg{
        background-color: #4286F1;
        padding-top: 10px;
        padding-right: 10px;
        padding-bottom: 10px;
        padding-left: 10px;
        color: white;
    }
    p.bold{
        font-weight: bold;
        color: grey;
        text-align: left;
        margin-left: 30px;
    }
 
    .txt{
        font-size: 30px;
        color: #4286F1;
        text-align: right;
    }

    .bluebox{
        text-align: right;
        font-weight: bold;
        color: white;
        height: 40px;
        width: 100px;
        padding-top: 10px;
        padding-right: 10px;
        padding-left: 40px;
        margin-bottom:30px;
        margin-top:20px;
        background-color: #4286F1;
    }
    
    .button {
        background-color: #4286F1;
        /* border-radius: 8px;
        border: none;
        color: white;
        padding: 15px 150px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer; */
       
    }

    #rcorners1 {
        border-radius: 80px 0px 0px 80px;
        background: #F83E24;
        color:white;
        font-weight: bold;
        text-align:left;
        padding: 10px;
        padding-right: 135px; 
        padding-left: 15px;
        width: 100px;
        height: 40px; 
    }

</style>
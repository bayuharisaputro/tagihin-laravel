<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Index Page</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
  </head>
  <body>
    <div class="container">
    <br />
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
    <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nama Penerima</th>
        <th>Nomor Hp Penerima</th>
        <th>Email Penerima</th>
        <th>Nama Penagih</th>
        <th>Nomor Hp Penagih</th>
        <th>Jumlah Tagihan</th>
        <th>Catatan</th>
        <th>Tanggal</th>
      </tr>
    </thead>
<<<<<<< HEAD
    <?php 
    
   // print_r($bios["rows"]);
//   echo ($bios["rows"][$count]["value"][$counter]);
// echo date('Y-m-d',1533885240-strtotime($bios["rows"][$count]["value"][8]))
// echo 1533945600-strtotime($bios["rows"][$count]["value"][8])
//    strtotime(date('Y-m-d H:i:s'))-strtotime($bios["rows"][$count]["value"][8]);
=======
    <?php
>>>>>>> d5677786463f979d85bd253b13385893f3c0e955
    ?>
    <tbody>
      
      <?php 
      date_default_timezone_set("Asia/Jakarta");
      for($count = 0 ;$count <count($bios["rows"]); $count ++ ){    
        echo "<tr>";
        for($counter = 0 ;$counter <count($bios["rows"][0]["value"]);$counter++ ) {
      ?>
          <td>
          <?php
            echo ($bios["rows"][$count]["value"][$counter]);
          ?>
          </td>
        <?php
        }
        echo "</tr>";
      }
      ?>
    </tbody>
  </table>
  </div>
  </body>
</html>

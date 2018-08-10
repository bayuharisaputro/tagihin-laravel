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
    <?php
    ?>
    <tbody>
      
      <?php 
      for($count = 0 ;$count <count($bios["rows"]); $count ++ ){
      echo "<tr>";
      for($counter = 0 ;$counter <count($bios["rows"][0]["value"]);$counter++ ) { ?>
        <td><?php 
    echo ($bios["rows"][$count]["value"][$counter]);
    ?></td>
      <?php }
        echo "</tr>";
    } ?>
        

      
    </tbody>
  </table>
  </div>
  </body>
</html>

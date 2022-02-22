<?php 
require"../../functions.php";
$stok=tampil("SELECT * FROM satuan");
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>LEMBAR CETAK</title>
  </head>
  <body>
   <table id="data_tabel" class="table table-striped" >
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Satuan</th>
                                            <th>Nama Satuan</th>
                                         
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>   <?php $i=1; ?>
                                            <?php foreach($stok as $data): ?>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $data["kd_satuan"] ;?></td>
                                            <td><?php echo $data["nama_satuan"]; ?></td>
                                        </tr>
                                      <?php $i++; ?>
                                      <?php endforeach; ?>
                                    </tbody>
                                </table>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
 <script>
  window.print();
</script>
  </body>
</html>
<?php 
require"../../functions.php";
$stok=tampil("SELECT * FROM pemasok");
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
    
  <table id="datatablesSimple" class="table table-striped" >
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                             <th>Kode Pemasok</th>
                                            <th>Nama Pemasok</th>
                                            <th>Telepon</th>
                                            <th>Alamat</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>   <?php $i=1; ?>
                                            <?php foreach($stok as $data): ?>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $data["kd_pemasok"]; ?></td>
                                            <td><?php echo $data["nama_pemasok"]; ?></td>
                                            <td><?php echo $data["telepon_pemasok"]; ?></td>
                                            <td><?php echo $data["alamat_pemasok"]; ?></td>
                                        </tr>
                                      <?php $i++; ?>
                                      <?php endforeach; ?>
                                    </tbody>
                                </table>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script>
  window.print();
</script>
  </body>
</html>

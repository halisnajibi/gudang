
<?php 
require'../../functions.php';
//menampilkan tabel barang masuk
$stok=tampil("SELECT * FROM stok INNER JOIN data_gudang ON stok.id_gudang=data_gudang.id_gudang INNER JOIN pemasok ON stok.id_pemasok=pemasok.id_pemasok INNER JOIN satuan ON stok.id_satuan=satuan.id_satuan");
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
    <h1>CV . HALIS NAJIBI</h1>
    <h4>electronic security system,time attendace,cctv,automatic door</h4>
    <h5>jl bukhari desa wasah hulu kecematan simpur hulu sungai selatan kalimantan selatan</h5>
    <p>telp :09876544890</p>
    <p>website :halisnajibi.com email :dusdhaua@cmc.com</p>

                                <table id="data_tabel" class="table" >
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                             <th>Kode Barang</th>
                                            <th>Nama Barang</th>
                                            <th>Quantity</th>
                                            <th>Pemasok</th>
                                            <th>Kode Gudang</th>
                                            <th>Satuan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1; ?>
                                            <?php foreach($stok as $data): ?>
                                        <tr>   
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $data["kode_barang"]; ?></td>
                                            <td><?php echo $data["nama_barang"]; ?></td>
                                            <td><?php echo $data["jumlah"]; ?></td>
                                            <td><?php echo $data["nama_pemasok"]; ?></td>
                                            <td><?php echo $data["kd_gudang"]; ?></td>
                                            <td><?php echo $data["nama_satuan"]; ?></td>
    
                                        </td>
                                            
                                        </tr>
                                      <?php $i++; ?>
                                      <?php endforeach; ?>
                                    </tbody>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script>
  window.print();
</script>
  </body>
</html>
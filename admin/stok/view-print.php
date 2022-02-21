<?php 
require'../../functions.php';
//menampilkan tabel barang masuk
$stok=tampil("SELECT * FROM stok INNER JOIN data_gudang ON stok.id_gudang=data_gudang.id_gudang INNER JOIN pemasok ON stok.id_pemasok=pemasok.id_pemasok INNER JOIN satuan ON stok.id_satuan=satuan.id_satuan");
//codingan simpan data
if(isset($_POST["simpan"]) ){
    if(tambah_stok($_POST) > 0){
        echo"
        <script>
                alert('data berhasil di tambahkan');
                  document.location.href='view.php';
         </script>
            ";
    }else{
        echo"
        <script>
                alert('data gagal di tambahkan');
         </script>
            ";
    }
    var_dump($_POST["simpan"]);
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - GUDANG Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="../../css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="../../assets/fontawesome-free/css/all.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="../../assets/datatable/datatables.min.css">
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
       <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css">
       <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.bootstrap5.min.css">
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="../../index.php">gudang kita</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                       <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                           <a class="nav-link" href="../../index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">master data</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Tables
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="view.php">Barang</a> 
                                    <a class="nav-link" href="../gudang/view.php">Gudang</a>
                                    <a class="nav-link" href="../suplier/view.php">Suplier</a>
                                     <a class="nav-link" href="../satuan/view.php">Satuan</a>
                                    <a class="nav-link" href="../karyawan/view.php">Karyawan</a>
                            </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h3 class="mt-4">Table Stok Barang</h3>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia magnam nisi, harum sed dolorem ducimus incidunt explicabo. Voluptate inventore, illum mollitia alias neque similique dolor, expedita cumque perferendis laborum quidem?</li>
                        </ol>
                         <div class="card mb-4">
                            <div class="card-header">
                                <a href="cetak.php" target="_BLANK" > <button type="button" class="btn btn-success">
                               Print
                                </button></a>
                              
                            </div>
                            <div class="card-body">
                        <!-- codingan tampil data -->
                      
                                <table id="data_tabel" class="table table-striped" >
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                             <th>Kode Barang</th>
                                            <th>Nama Barang</th>
                                            <th>Quantity</th>
                                            <th>Pemasok</th>
                                            <th>Kode Gudang</th>
                                            <th>Satuan</th>
                                            <th>Aksi</th>
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
                                            <td> 
                                            <a href="edit.php?id_barang=<?php echo $data["id_barang"] ?>"><button type="submit" name="edit" class="btn btn-warning">Edit</button> </a>
                                            <a href="hapus.php?id_barang=<?php echo $data["id_barang"] ?>" onclick="return confirm('anda yakin untuk menghapus')
                                            "><button type="submit" name="hapus" class="btn btn-danger">Hapus</button> </a>
                                        </td>
                                            
                                        </tr>
                                      <?php $i++; ?>
                                      <?php endforeach; ?>
                                    </tbody>
                                </table>
                        
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2022</div>
                           
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <!-- modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Stok</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- membuat codingan kode barang otomatis -->
                    <?php                            
                                    // mengambil data barang dengan kode paling besar
                                    $query = mysqli_query($conn, "SELECT max(kode_barang) as kodeTerbesar FROM stok");
                                    $data = mysqli_fetch_array($query);
                                    $kodeBarang = $data['kodeTerbesar'];
                                    
                                    // mengambil angka dari kode barang terbesar, menggunakan fungsi substr
                                    // dan diubah ke integer dengan (int)
                                    $urutan = (int) substr($kodeBarang, 3, 3);
                                    
                                    // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
                                    $urutan++;
                                    
                                    // membentuk kode barang baru
                                    // perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
                                    // misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
                                    // angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
                                    $huruf = "KDB";
                                    $kodeBarang = $huruf . sprintf("%03s", $urutan);
                      ?>
                     <form action="" method="post">
                         <label for="exampleFormControlInput1" class="form-label">Kode Barang</label>
                          <input type="text" class="form-control" id="exampleFormControlInput1" name="kd_brg"  readonly value="<?php echo $kodeBarang ?> " autocomplete="off" required>
                        <label for="exampleFormControlInput1" class="form-label mt-2">Nama Barang</label>
                         <input type="text" class="form-control" id="exampleFormControlInput1" name="nama_barang" autocomplete="off">
                          <label for="exampleFormControlInput1" class="form-label mt-2"">Quantity</label>
                         <input type="number" class="form-control" id="exampleFormControlInput1" name="qty">
                         <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-2"">Nama Pemasok</label>
                            <select name="pemasok" id="" class="form-control">
                                <?php 
                               $q=mysqli_query($conn,"SELECT * FROM pemasok");
                               while($data=mysqli_fetch_assoc($q)){
                                echo' <option  value=" '.$data["id_pemasok"] .' ">'.$data["nama_pemasok"].'</option> ';
                               }
                               ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-2"">Kode Gudang</label>
                            <select name="kd_gudang" id="" class="form-control">
                                <?php 
                               $q=mysqli_query($conn,"SELECT * FROM data_gudang");
                               while($data=mysqli_fetch_assoc($q)){
                                echo' <option  value=" '.$data["id_gudang"] .' ">'.$data["kd_gudang"].'</option> ';
                               }
                               ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-2"">Satuan</label>
                            <select name="satuan" id="" class="form-control">
                                <?php 
                               $q=mysqli_query($conn,"SELECT * FROM satuan");
                               while($data=mysqli_fetch_assoc($q)){
                                echo' <option  value=" '.$data["id_satuan"] .' ">'.$data["nama_satuan"].'</option> ';
                               }
                               ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3" name="simpan">Simpan</button>
                      </form>    
                </div>
                <div class="modal-footer">
                   
                </div>
                </div>
            </div>
            </div>
        <!-- akhir modal -->
          <script src="../../assets/datatable/jquery.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../../js/scripts.js"></script>
         <script src="../../assets/datatable/datatables.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.bootstrap5.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="
        https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.colVis.min.js"></script>
        <script>
                    $(document).ready(function() {
                var table = $('#data_tabel').DataTable( {
                    buttons: [  'copy', 'csv', 'excel'],
                   lengthMenu:[
                        [5,10,25,50,100,-1],
                        [5,10,25,50,100,"ALL"]
                    ]
                } );
                table.buttons().container()
                    .appendTo( '#data_tabel_wrapper .col-md-6:eq(0)' );
            } );
        </script>
    </body>
    
</html>

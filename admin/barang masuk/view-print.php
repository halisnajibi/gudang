<?php 
require'../../functions.php';
//menampilkan tabel barang masuk
$bm=tampil("SELECT * FROM brg_masuk INNER JOIN stok ON brg_masuk.id_barang=stok.id_barang INNER JOIN karyawan ON brg_masuk.id_karyawan=karyawan.id_karyawan");
//codingan simpan data
if(isset($_POST["submit_masuk"]) ){
    if(barang_masuk($_POST) > 0){
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
    var_dump($_POST["submit_masuk"]);
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
        <!-- <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" /> -->
        <link rel="stylesheet" href="../../assets/datatable/datatables.min.css">
        <link href="../../css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../../assets/fontawesome-free-6.0.0-web/css/all.min.css">
          <link rel="stylesheet" href="../../assets/datatable/datatables.min.css">
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
       <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css">
       <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.bootstrap5.min.css">
       <link rel="stylesheet" href="../../assets/fontawesome-free-6.0.0-web/css/all.min.css">
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">gudang kita</a>
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
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="../../index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Laporan Transaksi</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#transaksi" aria-expanded="false" aria-controls="transaksi">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-book-open"></i>
                                </div>
                              Laporan Transaksi
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="transaksi" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="view-print.php">Barang Masuk</a>
                                    <a class="nav-link" href="../barang keluar/view-print.php">Barang Keluar</a>
                            </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h3 class="mt-4">Laporan Barang Masuk</h3>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia magnam nisi, harum sed dolorem ducimus incidunt explicabo. Voluptate inventore, illum mollitia alias neque similique dolor, expedita cumque perferendis laborum quidem?</li>
                        </ol>
                         <div class="card mb-4">
                            <div class="card-header">
                                <a href="cetak.php">
                               <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                               Print
                                </button>
                             </a>
                            </div>
                            <div class="card-body">
                        <!-- codingan tampil data -->
                      
                             <table id="data_tabel" class="table table-striped" >
                                <thead>
                                    <tr>
                                        <th>no</th>
                                        <th>kode transaksi</th>
                                        <th>nama barang</th>
                                        <th>tanggal</th>
                                         <th>quantity</th>
                                         <th>nama karyawan</th>
                                        <th>keterangan</th>
                                      
                                    </tr>
                                </thead>  
                                    <?php $i=1; ?>
                                   <tbody>    
                                 <?php foreach($bm as $data): ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $data["kd_bm"]; ?></td>
                                            <td><?php echo $data["nama_barang"]; ?></td>
                                            <td><?php echo $data["tanggal"]; ?></td>
                                            <td><?php echo $data["qty_masuk"]; ?></td>
                                             <td><?php echo $data["nama_karyawan"]; ?></td>
                                            <td><?php echo $data["keterangan_masuk"]; ?></td>
                                           
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Barang Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                   <!-- membuat codingan kode barang otomatis -->
                    <?php                            
                                    // mengambil data barang dengan kode paling besar
                                    $query = mysqli_query($conn, "SELECT max(kd_bm) as kodeTerbesar FROM brg_masuk");
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
                                    $huruf = "BM";
                                    $kodeBarang = $huruf . sprintf("%03s", $urutan);
                      ?>
                     <form action="" method="post">
                         <label for="exampleFormControlInput1" class="form-label">Kode Transaksi</label>
                          <input type="text" class="form-control" id="exampleFormControlInput1" name="kd_bm"  readonly value="<?php echo $kodeBarang ?> " autocomplete="off" required>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama Barang</label>
                            <select name="brg_masuk" id="" class="form-control">
                                <?php 
                               $q=mysqli_query($conn,"SELECT * FROM stok");
                               while($data=mysqli_fetch_assoc($q)){
                                echo' <option  value=" '.$data["id_barang"] .' ">'.$data["nama_barang"].'</option> ';
                               }
                               ?>
                            </select>
                        </div>
                        <div class="mb-3">
                             <label for="exampleInputPassword1" class="form-label">Quantity</label>
                            <input type="number" class="form-control" id="exampleInputPassword1" name="qty_masuk"> 
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama Karyawan</label>
                            <select name="karyawan" id="" class="form-control">
                                <?php 
                               $q=mysqli_query($conn,"SELECT * FROM karyawan");
                               while($data=mysqli_fetch_assoc($q)){
                                echo' <option  value=" '.$data["id_karyawan"] .' ">'.$data["nama_karyawan"].'</option> ';
                               }
                               ?>
                            </select>
                        </div>
                         <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Keterangan</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" name="keterangan_masuk" autocomplete="off"> 
                             <div class="mb-3">
                        </div>
                             <button type="submit" class="btn btn-primary mt-3" name="submit_masuk">Simpan</button>
                          </div>
                      </form>
                       
                </div>
                <div class="modal-footer">
                   
                </div>
                </div>
            </div>
            </div>
        <!-- akhir modal -->
        <!-- modal edit -->

<!-- akhir modal edit -->
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
                    buttons: [ 'copy', 'excel', 'pdf' ],
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

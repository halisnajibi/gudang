<?php 
require'../../functions.php';


// tangkap data yg dikirm
$id=$_GET["id_karyawan"];
//menampilkan tabel barang masuk
$pemasok=tampil("SELECT * FROM karyawan WHERE id_karyawan=$id")[0];

//codingan simpan data
if(isset($_POST["update_karyawan"]) ){
    if(update_karyawan($_POST) > 0){
        echo"
        <script>
                alert('data berhasil di update');
                  document.location.href='view.php';
         </script>
            ";
    }else{
        echo"
        <script>
                alert('data gagal di update');
                
         </script>
            ";
    }

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
                            <a class="nav-link" href="index.php">
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
                                    <a class="nav-link" href="../stok/view.php">Barang</a> 
                                    <a class="nav-link" href="../gudang/view.php">Gudang</a>
                                    <a class="nav-link" href="../suplier/view.php">Suplier</a>
                                     <a class="nav-link" href="../satuan/view.php">Satuan</a>
                                    <a class="nav-link" href="view.php">Karyawan</a>
                            </div>
                              <div class="sb-sidenav-menu-heading">Transaksi</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#transaksi" aria-expanded="false" aria-controls="transaksi">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-handshake"></i></div>
                                Data Transaksi
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="transaksi" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="admin/barang masuk/view.php">Barang Masuk</a>
                                    <a class="nav-link" href="admin/barang keluar/view.php">Barang Keluar</a>
                            </div>
                                <div class="sb-sidenav-menu-heading">Laporan</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#laporan" aria-expanded="false" aria-controls="laporan">
                                  <div class="sb-nav-link-icon"><i class="fa-solid fa-book-open"></i></div>
                                Laporan
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="laporan" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="admin/barang masuk/view.php">Barang Masuk</a>
                                    <a class="nav-link" href="admin/barang keluar/view.php">Barang Keluar</a>
                                    <a class="nav-link" href="admin/stok/view.php">Stok</a>
                                </nav> 
                            </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h3 class="mt-4">Edit Karyawan</h3>
                         <div class="card mb-4">
                            <div class="card-header">
                              
                            </div>
                            <div class="card-body">
                               <form action="" method="post">
                                    <input type="hidden" name="id_karyawan" value="<?php echo $pemasok["id_karyawan"];?>">
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Nama Karyawan</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" name="nama_karyawan" autocomplete="off" value="<?php echo $pemasok["nama_karyawan"] ?>">    
                            </div>
                             <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Email</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" name="email" autocomplete="off" value="<?php echo $pemasok["email"] ?>">    
                            </div>
                        <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Telepon</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" name="telepon" autocomplete="off" value="<?php echo $pemasok["telepon"] ?>">    
                            </div>
 <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" name="alamat" autocomplete="off" value="<?php echo $pemasok["alamat"] ?>">    
                            </div>
                       
                             <button type="submit" class="btn btn-primary mt-3" name="update_karyawan">Update</button>
                          </div>
                      </form>
                       
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="../../assets/demo/chart-area-demo.js"></script>
        <script src="../../assets/demo/chart-bar-demo.js"></script>
        <!-- <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="../../js/datatables-simple-demo.js"></script> -->
         <script src="../../assets/datatable/datatables.min.js"></script>
        <script>
            $(document).ready( function () {
             $('#data_tabel').DataTable();
            } );
        </script>
    </body>
</html>

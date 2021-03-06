<?php 
require'../../functions.php';
//menampilkan tabel barang masuk
$stok=tampil("SELECT * FROM data_gudang");
//codingan simpan data
if(isset($_POST["simpan"]) ){
    if(tambah_gudang($_POST) > 0){
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
                            <div class="sb-sidenav-menu-heading">master data</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Tables
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="../stok/view.php">Barang</a> 
                                    <a class="nav-link" href="view.php">Gudang</a>
                                    <a class="nav-link" href="../suplier/view.php">Suplier</a>
                                     <a class="nav-link" href="../satuan/view.php">Satuan</a>
                                    <a class="nav-link" href="../karyawan/view.php">Karyawan</a>
                            </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h3 class="mt-4">Table Gudang</h3>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia magnam nisi, harum sed dolorem ducimus incidunt explicabo. Voluptate inventore, illum mollitia alias neque similique dolor, expedita cumque perferendis laborum quidem?</li>
                        </ol>
                         <div class="card mb-4">
                            <div class="card-header">
                               <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                               Tambah Gudang
                                </button>
                            </div>
                            <div class="card-body">
                        <!-- codingan tampil data -->
                      
                                <table id="datatablesSimple" class="table table-striped" >
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                             <th>Kode Gudang</th>
                                            <th>Nama Gudang</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>   <?php $i=1; ?>
                                            <?php foreach($stok as $data): ?>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $data["kd_gudang"]; ?></td>
                                            <td><?php echo $data["nama_gudang"]; ?></td>
                                            <td> 
                                            <a href="edit.php?id_gudang=<?php echo $data["id_gudang"] ?>"><button type="submit" name="edit" class="btn btn-warning">Edit</button> </a>
                                            <a href="hapus.php?id_gudang=<?php echo $data["id_gudang"] ?>" onclick="return confirm('anda yakin untuk menghapus')
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
                                    $query = mysqli_query($conn, "SELECT max(kd_gudang) as kodeTerbesar FROM data_gudang");
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
                                    $huruf = "GD";
                                    $kodeBarang = $huruf . sprintf("%03s", $urutan);
                      ?>
                     <form action="" method="post">
                         <label for="exampleFormControlInput1" class="form-label">Kode Gudang</label>
                          <input type="text" class="form-control" id="exampleFormControlInput1" name="kd_gudang"  readonly value="<?php echo $kodeBarang ?> " autocomplete="off" required>
                        <label for="exampleFormControlInput1" class="form-label mt-2">Nama Gudang</label>
                         <input type="text" class="form-control" id="exampleFormControlInput1" name="nama_gudang" autocomplete="off">
                         
                        <button type="submit" class="btn btn-primary mt-3" name="simpan">Simpan</button>
                      </form>    
                </div>
                <div class="modal-footer">
                   
                </div>
                </div>
            </div>
            </div>
        <!-- akhir modal -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../../js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="../../assets/demo/chart-area-demo.js"></script>
        <script src="../../assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="../../js/datatables-simple-demo.js"></script>
       <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    </body>
    <!-- <script>
            swal({
  title: "Yakin Untuk Menghapus?",
  text: "Data Yang Anda Delete Tidak Bisa Di Pulihkan Lagi!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    swal("Berhasil,Data Terhapus!", {
      icon: "success",
    });
  } else {
    swal("Anda Gagal Menghapus Data!");
  }
})
    </script> -->
</html>

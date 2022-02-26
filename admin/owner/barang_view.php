<?php 
require'../../functions.php';
//menampilkan tabel barang masuk
$stok=tampil("SELECT * FROM stok INNER JOIN data_gudang ON stok.id_gudang=data_gudang.id_gudang INNER JOIN pemasok ON stok.id_pemasok=pemasok.id_pemasok INNER JOIN satuan ON stok.id_satuan=satuan.id_satuan");
//codingan simpan data
if(isset($_POST["simpan"]) ){
    if(tambah_stok($_POST) > 0){
       echo "
       <script>
       Swal.fire(
  'Good job!',
  'You clicked the button!',
  'success'
)
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
       <link rel="stylesheet" href="../../assets/datatable/datatables.min.css">
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
       <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css">
       <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.bootstrap5.min.css">
       <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
             <link rel="stylesheet" href="../../assets/fontawesome-free-6.0.0-web/css/all.min.css"> 
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">HN Gudang</a>
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
                           <a class="nav-link" href="owner.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                                    <div class="sb-sidenav-menu-heading">Laporan</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#laporan_master" aria-expanded="false" aria-controls="laporan_master">
                                  <div class="sb-nav-link-icon"><i class="fa-solid fa-book-open"></i></div>
                                Laporan Master Data
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="laporan_master" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="barang_view.php">Barang</a> 
                                    <a class="nav-link" href="admin/gudang/view-print.php">Gudang</a>
                                    <a class="nav-link" href="admin/suplier/view-print.php">Suplier</a>
                                     <a class="nav-link" href="admin/satuan/view-print.php">Satuan</a>
                                    <a class="nav-link" href="admin/karyawan/view-print.php">Karyawan</a>
                                </nav>
                            </div>
                            
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#laporan" aria-expanded="false" aria-controls="laporan">
                                  <div class="sb-nav-link-icon"><i class="fa-solid fa-book-open"></i></div>
                                Laporan Transaksi
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="laporan" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="admin/barang masuk/view-print.php">Barang Masuk</a>
                                    <a class="nav-link" href="admin/barang keluar/view-print.php">Barang Keluar</a>
                                 
                                </nav> 
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
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
        <!-- <script>
                    $(document).ready(function() {
            $('#data_tabel').DataTable( {
                "order": [[ 3, "desc" ]],
                lengthMenu:[
                        [5,10,25,50,100,-1],
                        [5,10,25,50,100,"ALL"]
                    ]
            } );
        } );
        </script> -->

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

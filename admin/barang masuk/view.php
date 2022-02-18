<?php 
require'../../functions.php';
//menampilkan tabel barang masuk
$bm=tampil("SELECT * FROM brg_masuk,stok WHERE brg_masuk.id_barang=stok.id_barang");
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
                                    <a class="nav-link" href="view.php">Barang Masuk</a>
                                    <a class="nav-link" href="../barang keluar/view.php">Barang Keluar</a>
                                    <a class="nav-link" href="../stok/view.php">Stok</a>
                                </nav>
                            </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h3 class="mt-4">Table Barang Masuk</h3>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia magnam nisi, harum sed dolorem ducimus incidunt explicabo. Voluptate inventore, illum mollitia alias neque similique dolor, expedita cumque perferendis laborum quidem?</li>
                        </ol>
                         <div class="card mb-4">
                            <div class="card-header">
                               <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                               Tambah Barang
                                </button>
                            </div>
                            <div class="card-body">
                        <!-- codingan tampil data -->
                      
                             <table id="data_tabel" class="table table-striped" >
                                <thead>
                                    <tr>
                                        <th>no</th>
                                        <th>nama barang</th>
                                        <th>tanggal</th>
                                         <th>quantity</th>
                                        <th>keterangan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>  
                                    <?php $i=1; ?>
                                   <tbody>    
                                 <?php foreach($bm as $data): ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $data["nama_barang"]; ?></td>
                                            <td><?php echo $data["tanggal"]; ?></td>
                                            <td><?php echo $data["qty_masuk"]; ?></td>
                                            <td><?php echo $data["keterangan_masuk"]; ?></td>
                                            <td>
                                                <a href="edit.php?id_bm=<?php echo $data["id_bm"]; ?>"><button type="submit" name="edit" class="btn btn-warning">Edit</button></a>
                                                 <a href="hapus.php?id_bm=<?php echo $data["id_bm"];?>" onclick="return confirm('anda yakin untuk menghapus?')"><button type="submit" name="hapus" class="btn btn-danger">Hapus</button></a>
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Barang Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                     <form action="" method="post">
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
                            <label for="exampleInputPassword1" class="form-label">Keterangan</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" name="keterangan_masuk" autocomplete="off"> 
                             <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama Barang</label>
                         
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="../../assets/demo/chart-area-demo.js"></script>
        <script src="../../assets/demo/chart-bar-demo.js"></script>
        <!-- <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="../../js/datatables-simple-demo.js"></script> -->
         <script src="../../assets/datatable/datatables.min.js"></script>
        <script>
            $(document).ready( function () {
             $('#data_tabel').DataTable({
                 lengthMenu:[
                 [5,10,25,50,100,-1],
                 [5,10,25,50,100,"ALL"]
             ]
             } );
            
            } );
        </script>
       
    </body>
</html>

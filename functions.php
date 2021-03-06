<?php 
//koneksi database
$conn=mysqli_connect("localhost","root","","gudang");

//menampilkan isi tabel dalam database
function tampil($query){
    global $conn;
    $result=mysqli_query($conn,$query);
    $rows=[];
    while($row=mysqli_fetch_assoc($result) ){
        $rows[]=$row;
    }
    return $rows;
}


//insert tabel stok
function tambah_stok($pos){
    global $conn;
    $kd_brg=htmlspecialchars($pos["kd_brg"]);
     $nama_barang=htmlspecialchars($pos["nama_barang"]);
    $qty=htmlspecialchars($pos["qty"]);
    $pemasok=htmlspecialchars($pos["pemasok"]);
    $kd_gudang=htmlspecialchars($pos["kd_gudang"]);
    $satuan=htmlspecialchars($pos["satuan"]);
    
 
    $query="INSERT INTO stok 
            VALUES
            ('','$kd_gudang','$pemasok','$satuan','$kd_brg','$nama_barang','$qty')
            ";
   mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}

//insert gudang
function tambah_gudang($pos){
    global $conn;
    $kd_gudang=htmlspecialchars($pos["kd_gudang"]);
    $nama_gudang=htmlspecialchars($pos["nama_gudang"]);
    $sql="INSERT INTO data_gudang
            VALUES
            ('','$kd_gudang','$nama_gudang')";
            mysqli_query($conn,$sql);
          return  mysqli_affected_rows($conn);
}
// insert suplier
function tambah_pemasok($pos){
    global $conn;
    $kd=$pos["kd_pemasok"];
    $nama_pemasok=htmlspecialchars($pos["nama_pemasok"]);
    $telepon=htmlspecialchars($pos["telepon"]);
    $alamat=htmlspecialchars($pos["alamat"]);

    $sql="INSERT INTO pemasok
            VALUES
            ('','$kd','$nama_pemasok','$telepon','$alamat')";
            mysqli_query($conn,$sql);
            return mysqli_affected_rows($conn);
}

//insert satuan
function tambah_satuan($pos){
    global $conn;
    $kd=$pos["kd_satuan"];
    $nama=htmlspecialchars($pos["nama_satuan"]);

    $sql="INSERT INTO satuan
            VALUES
            ('','$kd','$nama')";
            mysqli_query($conn,$sql);
            return mysqli_affected_rows($conn);
}

//insert karyawan
function tambah_karyawan($pos){
    global $conn;
    $kd=$pos["kd_karyawan"];
    $nama=htmlspecialchars($pos["nama_karyawan"]);
    $email=htmlspecialchars($pos["email"]);
    $telepon=htmlspecialchars($pos["telepon"]);
    $alamat=htmlspecialchars($pos["alamat"]);

    $sql="INSERT INTO karyawan
            VALUES
            ('','$kd','$nama','$email','$telepon','$alamat')";
            mysqli_query($conn,$sql);
            return mysqli_affected_rows($conn);
}

//insert tabel barang masuk
function barang_masuk($pos){
    global $conn;
    $nb=htmlspecialchars($pos["brg_masuk"]);
    $qty=htmlspecialchars($pos["qty_masuk"]);
    $ket=htmlspecialchars($pos["keterangan_masuk"]);
    $karyawan=htmlspecialchars($pos["karyawan"]);
    $kd_bm=$pos["kd_bm"];
    $query="INSERT INTO brg_masuk
            VALUES
            ('','$karyawan','$kd_bm','$nb',current_timestamp(),'$qty','$ket')";  
     mysqli_query($conn,$query);

//cek stok sekarang
$semua_data=mysqli_query($conn,"SELECT * FROM stok WHERE id_barang='$nb'");
$ambil_data=mysqli_fetch_assoc($semua_data);
$stok_sekarang=$ambil_data["jumlah"];
//tambah stok
$tambah=$stok_sekarang + $qty;
//sql
    $query_update="UPDATE stok SET jumlah='$tambah' WHERE id_barang=$nb";

   mysqli_query($conn,$query_update);
    return mysqli_affected_rows($conn);
}

//insert barang keluar
function barang_keluar($pos){
    global $conn;
    $kd=$pos["kd_transaksi"];
    $nama_brg=htmlspecialchars($pos["brg_keluar"]);
    $qty_keluar=htmlspecialchars($pos["qty_keluar"]);
    $penerima=htmlspecialchars($pos["penerima"]);
$nk=htmlspecialchars($pos["karyawan"]);
    $keterangan_keluar=htmlspecialchars($pos["keterangan_keluar"]);

    $query="INSERT INTO brg_keluar
            VALUES
            ('','$kd','$nama_brg','$nk',current_timestamp(),'$qty_keluar','$penerima','$keterangan_keluar')";  
     mysqli_query($conn,$query);
//cek stok sekarang
$semua_data=mysqli_query($conn,"SELECT * FROM stok WHERE id_barang='$nama_brg'");
$ambil_data=mysqli_fetch_assoc($semua_data);
$stok_sekarang=$ambil_data["jumlah"];
//tambah stok
$kurang=$stok_sekarang - $qty_keluar;
//sql
    $query_update="UPDATE stok SET jumlah='$kurang' WHERE id_barang=$nama_brg";

   mysqli_query($conn,$query_update);


    return mysqli_affected_rows($conn);

}


// hapus
    function hapus_stok($id_barang){
        global $conn;
        mysqli_query($conn,"DELETE FROM stok WHERE id_barang=$id_barang");
      return  mysqli_affected_rows($conn);
    }

function hapus_bm($id){
    global $conn;
    mysqli_query($conn,"DELETE FROM brg_masuk WHERE id_bm=$id");
    return mysqli_affected_rows($conn);
}

function hapus_keluar($id){
    global $conn;
    mysqli_query($conn,"DELETE FROM brg_keluar WHERE id_bk=$id");
    return mysqli_affected_rows($conn);
}

function hapus_gudang($id){
    global $conn;
    mysqli_query($conn,"DELETE FROM data_gudang WHERE id_gudang=$id");
    return mysqli_affected_rows($conn);
}

function hapus_pemasok($id){
global $conn;
mysqli_query($conn,"DELETE FROM pemasok WHERE id_pemasok=$id");
return mysqli_affected_rows($conn);
}

function hapus_satuan($id){
    global $conn;
    mysqli_query($conn,"DELETE FROM satuan WHERE id_satuan=$id");
  return  mysqli_affected_rows($conn);
}

function hapus_karyawan($id){
    global $conn;
    mysqli_query($conn,"DELETE from karyawan WHERE id_karyawan=$id");
    return mysqli_affected_rows($conn);
}

//update
function update_masuk($pos){
global $conn;
$id=$pos["id_bm"];
$nk=htmlspecialchars($pos["karyawan"]);
$ket=htmlspecialchars($pos["keterangan_masuk"]);

$sql="UPDATE brg_masuk SET
        id_karyawan='$nk',
        tanggal=current_timestamp(),
        keterangan_masuk='$ket'
        WHERE id_bm=$id
        ";
mysqli_query($conn,$sql);
return mysqli_affected_rows($conn);
}

function update_stok($pos){
    $id=$pos["id_barang"];
    global $conn;
    $nb=htmlspecialchars($pos["nama_barang"]);
    $jumlah=htmlspecialchars($pos["jumlah"]);
     $pemasok=htmlspecialchars($pos["pemasok"]);
    $kd_gudang=htmlspecialchars($pos["kd_gudang"]);
    $satuan=htmlspecialchars($pos["satuan"]);
    $sql="UPDATE stok SET 
            id_gudang='$kd_gudang',
            id_pemasok='$pemasok',
            id_satuan='$satuan',
           nama_barang='$nb',
           jumlah='$jumlah'
           WHERE id_barang=$id ";
    mysqli_query($conn,$sql);
   return  mysqli_affected_rows($conn);
}

function update_keluar($pos){
    global $conn;
    $id=$pos["id_bk"];
    $nk=$pos["karyawan"];
    $penerima=$pos["penerima"];
    $ket=$pos["keterangan_keluar"];

    $Sql="UPDATE brg_keluar SET
            id_karyawan='$nk',
          penerima='$penerima',
          keterangan_keluar='$ket'
          WHERE id_bk=$id";
          mysqli_query($conn,$Sql);
          return mysqli_affected_rows($conn);
}

function update_gudang($pos){
    global $conn;
    $id=$pos["id_gudang"];
    $nama_gudang=htmlspecialchars($pos["nama_gudang"]);
    $sql="UPDATE data_gudang SET
        nama_gudang='$nama_gudang'
        WHERE id_gudang=$id
        ";
        mysqli_query($conn,$sql);
        return mysqli_affected_rows($conn);
}

function update_pemasok($pos){
    global $conn;
    $id=$pos["id_pemasok"];
    $nama_pemasok=htmlspecialchars($pos["nama_pemasok"]);
    $telepon=htmlspecialchars($pos["telepon"]);
    $alamat=htmlspecialchars($pos["alamat_pemasok"]);

    $sql="UPDATE pemasok SET
            nama_pemasok='$nama_pemasok',
            telepon_pemasok='$telepon',
            alamat_pemasok='$alamat'
            WHERE id_pemasok=$id";
            mysqli_query($conn,$sql);
            return mysqli_affected_rows($conn);
}

function update_karyawan($pos){
    global $conn;
    $id=$pos["id_karyawan"];
    $nama=htmlspecialchars($pos["nama_karyawan"]);
    $email=htmlspecialchars($pos["email"]);
    $telepon=htmlspecialchars($pos["telepon"]);
    $alamat=htmlspecialchars($pos["alamat"]);

    $sql="UPDATE karyawan SET
            nama_karyawan='$nama',
            email='$email',
            telepon='$telepon',
            alamat='$alamat'
            WHERE id_karyawan=$id";
            mysqli_query($conn,$sql);
            return mysqli_affected_rows($conn);
}
 ?>
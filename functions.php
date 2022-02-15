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
    
 
    $query="INSERT INTO stok 
            VALUES
            ('','$kd_brg','$nama_barang','$qty')
            ";
   mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}

//insert tabel barang masuk
function barang_masuk($pos){
    global $conn;
    $nb=htmlspecialchars($pos["brg_masuk"]);
    $qty=htmlspecialchars($pos["qty_masuk"]);
    $ket=htmlspecialchars($pos["keterangan_masuk"]);

    $query="INSERT INTO brg_masuk
            VALUES
            ('','$nb',current_timestamp(),'$qty','$ket')";  
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
    $nama_brg=htmlspecialchars($pos["brg_keluar"]);
    $qty_keluar=htmlspecialchars($pos["qty_keluar"]);
    $penerima=htmlspecialchars($pos["penerima"]);
    $keterangan_keluar=htmlspecialchars($pos["keterangan_keluar"]);

    $query="INSERT INTO brg_keluar
            VALUES
            ('','$nama_brg',current_timestamp(),'$qty_keluar','$penerima','$keterangan_keluar')";  
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

//update

 ?>
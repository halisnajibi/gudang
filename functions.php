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
//cek stok sekarang
$semua_data=mysqli_query($conn,"SELECT * FROM stok WHERE id_barang='$nb'");
$ambil_data=mysqli_fetch_assoc($semua_data);
$stok_sekarang=$ambil_data["jumlah"];
//tambah stok
$tambah=$stok_sekarang + $qty;
//sql
    $query_update="UPDATE stok SET jumlah='$tambah' WHERE id_barang=$nb";
   mysqli_query($conn,$query);
   mysqli_query($conn,$query_update);
    return mysqli_affected_rows($conn);
}


 ?>
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

//inset tabel barang masuk
function tambah_bm($pos){
    global $conn;
    $nama_barang=htmlspecialchars($pos["brg_masuk"]);
    $jumlah=htmlspecialchars($pos["jumlah"]);
    $keterangan=htmlspecialchars($pos["keterangan"]);
 
    $query="INSERT INTO brg_masuk 
            VALUES
            ('','$nama_barang','$jumlah','$keterangan')
            ";
    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}


//insert tabel stok
function tambah_stok($pos){
    global $conn;
     $nama_barang=htmlspecialchars($pos["nama_barang"]);
    $jumlah=htmlspecialchars($pos["jumlah"]);
    $keterangan=htmlspecialchars($pos["keterangan"]);
 
    $query="INSERT INTO stok 
            VALUES
            ('','$nama_barang','$jumlah','$keterangan')
            ";
   mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}


 ?>
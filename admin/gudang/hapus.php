<?php 
require'../../functions.php';
$id=$_GET["id_gudang"];
if(hapus_gudang($id) > 0){
     echo"
    <script>
    alert('data berhasil di hapus');   
    document.location.href='view.php'; 
    </script>
    ";
}else{
    echo"
    <script>
    alert('data gagal di hapus');
    </script>
    ";
}

?>
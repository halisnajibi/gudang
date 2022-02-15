<?php 
require'../../functions.php';
$id=$_GET["id_barang"];
$brg_masuk=tampil("SELECT * FROM brg_masuk WHERE id_barang=$id")[0];

?>

<!DOCTYPE html>
<html lang="en">
<head>
       <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   
    <title>Document</title>
</head>
<body>
  <?php var_dump($brg_masuk);?>
<!-- Modal -->
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit">
  Launch demo modal
</button>
<div class="modal fade" id="edit">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <form action="" method="post">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama Barang</label>
                            <select name="brg_masuk" id="" class="form-control" value="<?php echo $brg_masuk["id_barang"]; ?>">
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
                            <input type="number" class="form-control" id="exampleInputPassword1" name="qty_masuk"  value="<?php echo $brg_masuk["qty_masuk"]; ?>"> 
                        </div>
                         <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Keterangan</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" name="keterangan_masuk" autocomplete="off" value="<?php echo $brg_masuk["keterangan_masuk"]; ?>"> 
                             <button type="submit" class="btn btn-primary mt-3" name="submit_masuk">Simpan</button>
                          </div>
                      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>
</html>


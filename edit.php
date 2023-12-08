<?php
include "koneksi.php";
$no1 = rand(1, 15);
$no2 = rand(1, 15);

$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM capca WHERE id='$id'");
$id = mysqli_fetch_array($data);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EDIT DATA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    <h2 style="text-align: center; margin:10px; margin-top:10px;">FORM EDIT</h2>
  <form action="" method="post">
  <div class="mb-3">
    <div class="card">
      <div class="card-body">
    <input type="hidden" name="id" value="<?php echo $id['id']; ?>">
    <label for="" class="form-label">Nama</label>
    <input name="nama" type="text" maxlength="25" style="margin: 2px auto;" value="<?php echo$id['nama']; ?>" class="form-control">

    <label for="" class="form-label">Email address</label>
    <input name="email" type="email" style="margin: 2px auto;" value="<?php echo$id['email']; ?>" class="form-control">

    <label for="" class="form-label">Phone</label>
    <input name="telepon" type="number" maxlength="13" style="margin: 2px auto;" value="<?php echo$id['phone']; ?>" class="form-control">

    <label for="" class="form-label">Website</label>
    <input name="website" type="url" style="margin: 2px auto;" value="<?php echo$id['website']; ?>" class="form-control">
    
    <label for="" class="form-label">Message</label>
    <textarea name="message" id="" class="form-control"><?php echo$id['message'] ?></textarea>

    <label for="id">Captcha <?php echo $no1."+".$no2 ?></label>
        <input type="hidden" name="no1" value="<?php echo $no1 ?>">
        <input type="hidden" name="no2" value="<?php echo $no2 ?>">
        <input type="text" name="jawaban" placeholder="Masukkan Captcha">
  
    <input type="submit" name="submit" value="submit" class="btn btn-success" style="margin: 10px auto;">
    <button class="btn btn-danger mt-2"><a href="table.php" style="color: white;">KEMBALI</a></button>
  </div>  
</div>
  </div>
</form>

<?php
if(isset($_REQUEST['submit'])) {
  $number1 = $_REQUEST['no1'];
  $number2 = $_REQUEST['no2'];
  $jawaban = $_REQUEST['jawaban'];
  $total = $number1+$number2;
  if($total==$jawaban) {


$id = $_POST['id'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$telepon = $_POST['telepon'];
$website = $_POST['website'];
$message = $_POST['message'];

mysqli_query($koneksi, "UPDATE capca set nama='$nama', email='$email', phone='$telepon', website='$website', message='$message' where id='$id' ");
    
    echo "<script>
    alert('Data berhasil diubah');
    document.location.href='table.php';</script>";

  }
  
}

?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>
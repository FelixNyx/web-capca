<?php
include "koneksi.php";
$no1 = rand(1, 15);
$no2 = rand(1, 15);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>capca</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="contact-form">
    <h1>Contact</h1>
    <form method="POST" action="">
        <input type="text" maxlength="50" name="nama" placeholder="Masukkan Nama" required>
        <input type="email" name="email" placeholder="Masukkan Email" required>
        <input type="text" maxlength="13" name="telepon" placeholder="Masukkan Telepon" required>
        <input type="url" name="website" placeholder="Masukkan Website" required>
        <textarea name="message" maxlength="200" placeholder="Masukkan Pesan" required></textarea>

        <label for="id">Captcha <?php echo $no1."+".$no2 ?></label>
        <input type="hidden" name="no1" value="<?php echo $no1 ?>">
        <input type="hidden" name="no2" value="<?php echo $no2 ?>">
        <input type="text" name="jawaban" placeholder="Masukkan Captcha">

        <input type="submit" value="submit" name="submit" class="btn btn-success">
       
    </form>
    </div>

    <?php
    if(isset($_REQUEST['submit'])) {
        $number1 = $_REQUEST['no1'];
        $number2 = $_REQUEST['no2'];
        $jawaban = $_REQUEST['jawaban'];
        $total = $number1+$number2;
        if($total==$jawaban) {

    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];
    $website = $_POST['website'];
    $message = $_POST['message'];
    mysqli_query ($koneksi, "INSERT INTO capca value('$nama', '$email', '$telepon', '$website', '$message')");

            echo "<script>
            alert('data berhasil masuk');
            document.location.href='table.php';</script>";

        }else{
            echo "<script>
            alert('data tidak berhasil masuk');
            document.location.href='index.php';</script>";
        }
    }
    ?>

    
    
</body>
</html>
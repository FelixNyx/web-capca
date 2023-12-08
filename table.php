<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>tampilan data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
  <table class="table">
  <thead>
    <button class="btn btn-success mt-2"><a href="index.php" style="color: white;">KEMBALI</a></button>
    <tr>
      <th scope="col" style="text-align: center;">Id</th>
      <th scope="col" style="text-align: center;">Nama</th>
      <th scope="col" style="text-align: center;">Email</th>
      <th scope="col" style="text-align: center;">Phone</th>
      <th scope="col" style="text-align: center;">Website</th>
      <th scope="col" style="text-align: center;">Message</th>
      <th scope="col" style="text-align: center;">Action</th>
    </tr>
  </thead>
  <?php
  include "koneksi.php";
  $no = '1';
  $data = mysqli_query($koneksi, "SELECT * FROM capca");
  while($id = $data->fetch_assoc()) {
    ?>
    <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $id['nama']; ?></td>
        <td><?php echo $id['email']; ?></td>
        <td><?php echo $id['telepon']; ?></td>
        <td><?php echo $id['website']; ?></td>
        <td><?php echo $id['message']; ?></td>
        <td>
          <a href="edit.php?id=<?php echo $id='id'; ?>">EDIT</a>
          <a href="hapus.php?id=<?php echo $id='id'; ?>">HAPUS</a>
        </td>
    </tr>
    <?php
  }
  ?>
</table>
</body>
</html>
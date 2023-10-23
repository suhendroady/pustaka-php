<?php
// inisialisasi variabel untuk tangkap ISBN menggunakan method GET
$isbn = $_GET['id'];

//query untuk ambil data buku sesuai ISBN
$query = "SELECT * FROM muda_buku WHERE isbn='$isbn'";
$conn  = mysqli_query($connection, $query);
$data  = mysqli_fetch_array($conn);
?>

<div class='card'>
  <div class='card-header'>
    <h3>Edit Data Buku</h3>
  </div>
  <div class='card-body'>
    <h4><em>Edit Data Buku Perpustakaan</em></h4>
    <form action="module/buku/aksi.php?module=buku&act=update" method="post">
      <input type="hidden" name="isbn" value="<?= $data['isbn']; ?>">
      <div class="mb-3">
        <label for="judul" class="form-label">Judul Buku</label>
        <input type="text" name="judul" value="<?= $data['judul_buku']; ?>" class="form-control" required>
      </div>
      <div class="mb-3">
        <label for="pengarang" class="form-label">Pengarang</label>
        <input type="text" name="pengarang" value="<?= $data['pengarang']; ?>" class="form-control" required>
      </div>
      <div class="mb-3">
        <label for="penerbit" class="form-label">Penerbit</label>
        <input type="text" name="penerbit" value="<?= $data['penerbit']; ?>" class="form-control" required>
      </div>
      <div class="mb-3">
        <label for="tahun" class="form-label">Tahun Terbit</label>
        <input type="text" name="tahun" value="<?= $data['tahun_terbit']; ?>" class="form-control" required>
      </div>
      <div class="mb-3">
        <label for="jenis" class="form-label">Jenis Buku</label>
        <select name="jenis" class="form-select">
          <option value="<?= $data['jenis_buku']; ?>" selected><?= $data['jenis_buku']; ?></option>
          <option value="Paket">Buku Paket</option>
          <option value="Ensiklopedia">Ensiklopedia</option>
          <option value="Novel">Novel</option>
          <option value="Biografi">Biografi</option>
          <select>
      </div>
      <div class="mb-3">
        <label for="stok" class="form-label">Jumlah Buku</label>
        <input type="text" name="stok" value="<?= $data['stok']; ?>" class="form-control" required>
      </div>
      <div class="mb-3">
        <a href="?module=buku" class="btn btn-secondary">Batal</a>
        <button type="submit" class="btn btn-primary">Update Data</button>
      </div>

    </form>
  </div>
</div>
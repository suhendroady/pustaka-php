<div class='card'>
  <div class='card-header'>
    <h3>Data Buku</h3>
  </div>
  <div class='card-body'>
    <!-- munculkan pesan alert -->
    <?php
    if (!empty($_SESSION['alert'])) :
      echo $_SESSION['alert'];
    endif;
    unset($_SESSION['alert']);
    ?>
    <!-- tombol tambah data buku -->
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary px-5 mb-3" data-bs-toggle="modal" data-bs-target="#bukuModal">
      Tambah Data Buku
    </button>

    <!-- bagian table buku -->
    <table class="table table-striped table-bordered">
      <thead class="text-center">
        <th>No.</th>
        <th>ISBN</th>
        <th>Judul Buku</th>
        <th>Penerbit</th>
        <th>Tahun</th>
        <th>Stok</th>
        <th>Aksi</th>
      </thead>
      <tbody>
        <?php
        $no = 1;
        // Query SELECT data buku
        $query = "SELECT * FROM muda_buku";
        $conn  = mysqli_query($connection, $query);
        while ($data = mysqli_fetch_array($conn)) {
        ?>
          <!-- fetch data buku -->
          <tr>
            <td><?= $no; ?>.</td>
            <td><?= $data['isbn']; ?></td>
            <td><?= $data['judul_buku']; ?></td>
            <td><?= $data['penerbit']; ?></td>
            <td><?= $data['tahun_terbit']; ?></td>
            <td><?= $data['stok']; ?></td>
            <td>
              <a href="?module=edit-buku&id=<?= $data['isbn']; ?>" class="btn btn-sm btn-warning">EDIT</a> |
              <a href="module/buku/aksi.php?module=buku&act=delete&id=<?= $data['isbn']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data <?= $data['judul_buku']; ?>?');">HAPUS</a>
            </td>
          </tr>
        <?php
          $no++;
        }
        ?>
      </tbody>
    </table>
  </div>
</div>

<!-- Modal Buku -->
<div class="modal fade" id="bukuModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Buku</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="module/buku/aksi.php?module=buku&act=insert" method="post">
          <!-- form input data buku -->
          <div class="mb-3">
            <label for="ISBN" class="form-label">ISBN</label>
            <input type="text" name="isbn" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="judul" class="form-label">Judul Buku</label>
            <input type="text" name="judul" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="pengarang" class="form-label">Pengarang/Penulis</label>
            <input type="text" name="pengarang" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="penerbit" class="form-label">Penerbit</label>
            <input type="text" name="penerbit" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="tahun" class="form-label">Tahun Terbit</label>
            <select name="tahun" class="form-select">
              <option value="">- PILIH TAHUN -</option>
              <?php $now = date('Y'); ?>
              <?php for ($i = $now; $i > ($now - 10); $i--) : ?>
                <option value="<?= $i; ?>"><?= $i; ?></option>
              <?php endfor; ?>
            </select>
          </div>
          <div class="mb-3">
            <label for="jenis-buku" class="form-label">Jenis Buku</label>
            <select name="jenis" class="form-select">
              <option value="">- PILIH JENIS -</option>
              <option value="Paket">Buku Paket</option>
              <option value="Ensiklopedia">Ensiklopedia</option>
              <option value="Novel">Novel</option>
              <option value="Biografi">Biografi</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="stock" class="form-label">Jumlah Buku</label>
            <input type="text" name="stok" class="form-control" required>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
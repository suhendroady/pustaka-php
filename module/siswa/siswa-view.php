<div class='card'>
  <div class='card-header'>
    <h3>Data Siswa</h3>
  </div>
  <div class='card-body'>
    <!-- munculkan pesan alert -->
    <?php
    if (!empty($_SESSION['alert'])) :
      echo $_SESSION['alert'];
    endif;
    unset($_SESSION['alert']);
    ?>
    <!-- tombol tambah data siswa -->
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary px-5 mb-3" data-bs-toggle="modal" data-bs-target="#siswaModal">
      Tambah Data Siswa
    </button>

    <!-- bagian table siswa -->
    <table class="table table-striped">
      <thead>
        <th>No.</th>
        <th>NISN</th>
        <th>Nama Siswa</th>
        <th>Jurusan</th>
        <th>Jenis Kelamin</th>
        <th>Aksi</th>
      </thead>
      <tbody>
        <?php
        $no = 1;
        // Query SELECT data Siswa
        $query = "SELECT * FROM muda_siswa";
        $conn  = mysqli_query($connection, $query);
        while ($data = mysqli_fetch_array($conn)) {
        ?>
          <!-- fetch data siswa -->
          <tr>
            <td><?= $no; ?>.</td>
            <td><?= $data['nisn']; ?></td>
            <td><?= $data['nama_siswa']; ?></td>
            <td><?= $data['jurusan']; ?></td>
            <td><?= $data['jenis_kelamin']; ?></td>
            <td>
              <a href="?module=edit-siswa&id=<?= $data['nisn']; ?>" class="btn btn-warning">EDIT</a> |
              <a href="module/siswa/aksi.php?module=siswa&act=delete&id=<?= $data['nisn']; ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data <?= $data['nama_siswa']; ?>?');">HAPUS</a>
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

<!-- Modal Siswa -->
<div class="modal fade" id="siswaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Siswa</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="module/siswa/aksi.php?module=siswa&act=insert" method="post">
          <!-- form input data siswa -->
          <div class="mb-3">
            <label for="NISN" class="form-label">NISN</label>
            <input type="text" name="nisn" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="nama" class="form-label">Nama Siswa</label>
            <input type="text" name="nama_siswa" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="jurusan" class="form-label">Jurusan</label>
            <select name="jurusan" class="form-select">
              <option value="">-Pilih Jurusan-</option>
              <option value="PPLG">PPLG</option>
              <option value="TJKT">TJKT</option>
              <option value="DKV">DKV</option>
              <option value="AKL">AKL</option>
              <option value="MPLB">MPLB</option>
              <option value="Pemasaran">Pemasaran</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-select">
              <option value="L">Laki-laki</option>
              <option value="P">Perempuan</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="no_telp" class="form-label">No. HP</label>
            <input type="text" name="no_hp" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea name="alamat" rows="3" class="form-control"></textarea>
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
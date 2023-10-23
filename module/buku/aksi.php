<?php
include "../../config/koneksi.php"; // include file koneksi

// inisiasi module dan act
$module = $_GET['module'];
$act    = $_GET['act'];

// bagian insert data
if ($module == 'buku' and $act == 'insert') :
  // inisiasi nama field ke dalam variabel
  $isbn      = $_POST['isbn'];
  $judul     = $_POST['judul'];
  $pengarang = $_POST['pengarang'];
  $penerbit  = $_POST['penerbit'];
  $tahun     = $_POST['tahun'];
  $jenis     = $_POST['jenis'];
  $stok      = $_POST['stok'];

  // query insert
  $query = "INSERT INTO muda_buku (isbn, judul_buku, pengarang, penerbit, tahun_terbit, jenis_buku, stok)
            VALUES ('$isbn', '$judul', '$pengarang', '$penerbit', '$tahun', '$jenis', '$stok')";

  //kondisi pengecekan apakah data berhasil dimasukkan atau tidak
  if ($connection->query($query)) {

    // munculkan alert sukses simpan data dengan session
    session_start();
    $_SESSION["alert"] = "
    <div class='alert alert-success' role='alert'>
      Data Buku Berhasil di Simpan.
    </div>
    ";

    //redirect ke halaman awal 
    header("location: ../../media.php?module=" . $module);
  } else {

    //pesan error gagal insert data
    echo "Data Gagal Disimpan!";
  }

// --------- Bagian Edit Data Buku --------

elseif ($module == 'buku' and $act == 'update') :

  // inisialisasi data yang dikirim ke dalam variabel
  $id        = $_POST['isbn'];
  $judul     = $_POST['judul'];
  $pengarang = $_POST['pengarang'];
  $penerbit  = $_POST['penerbit'];
  $tahun     = $_POST['tahun'];
  $jenis     = $_POST['jenis'];
  $stok      = $_POST['stok'];

  // query update data
  $query = "UPDATE muda_buku SET
            judul_buku   = '$judul',
            pengarang    = '$pengarang',
            penerbit     = '$penerbit',
            tahun_terbit = '$tahun',
            jenis_buku   = '$jenis',
            stok         = '$stok'
            WHERE isbn   = $id";

  //kondisi pengecekan apakah data berhasil diupdate
  if ($connection->query($query)) {

    // munculkan alert sukses update data dengan session
    session_start();
    $_SESSION["alert"] = "
      <div class='alert alert-success' role='alert'>
        Data Buku Berhasil di Update!
      </div>
    ";

    //redirect ke halaman awal 
    header("location: ../../media.php?module=" . $module);
  } else {

    //pesan error gagal Update data
    echo "Data Gagal diupdate!";
  }

// --------- Bagian Hapus Data Buku --------

elseif ($module == 'buku' and $act == 'delete') :

  // ambil id
  $id = $_GET['id'];

  // query delete data
  $query = "DELETE FROM muda_buku WHERE isbn = $id";

  //kondisi pengecekan apakah data berhasil dihapus
  if ($connection->query($query)) {

    // munculkan alert sukses hapus data dengan session
    session_start();
    $_SESSION["alert"] = "
    <div class='alert alert-success' role='alert'>
      Data Buku Berhasil di Hapus.
    </div>
    ";

    //redirect ke halaman awal 
    header("location: ../../media.php?module=" . $module);
  } else {

    //pesan error gagal Hapus data
    echo "Data Gagal dihapus!";
  }

endif;

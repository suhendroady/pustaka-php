<?php
include "../../config/koneksi.php"; // include file koneksi
date_default_timezone_set('Asia/Jakarta');


// inisiasi module dan act
$module = $_GET['module'];
$act    = $_GET['act'];

// bagian insert data peminjaman
if ($module == 'pinjam' and $act == 'insert') :
  // inisiasi nama field ke dalam variabel
  $isbn    = $_POST['buku'];
  $nisn    = $_POST['siswa'];
  $kembali = $_POST['tanggal_kembali'];
  $id      = date('dmyHis');
  $pinjam  = date('Y-m-d');
  $status  = 'pinjam';

  // query ambil data stock
  $query = "SELECT isbn, stok FROM muda_buku WHERE isbn = $isbn";
  $result  = mysqli_query($connection, $query);
  $row = mysqli_fetch_array($result);
  // masukkan jumlah stok ke variabel
  $stok = $row['stok'];
  // lakukan pengurangan stok (-1) 
  $newStok = $stok - 1;


  // query insert peminjaman
  $query_pinjam = "INSERT INTO muda_peminjaman (id_peminjaman, nisn, isbn, tanggal_pinjam, tanggal_kembali, status)
                    VALUES ('$id', '$nisn', '$isbn', '$pinjam', '$kembali', '$status')";

  // query Update Stok Buku
  $query_stok = "UPDATE muda_buku SET stok = $newStok WHERE isbn = '$isbn'";

  //kondisi pengecekan apakah data berhasil dimasukkan atau tidak
  if ($connection->query($query_pinjam)) {

    // munculkan alert sukses simpan data dengan session
    session_start();
    $_SESSION["alert"] = "
    <div class='alert alert-success' role='alert'>
      Data Peminjaman Berhasil di Simpan.
    </div>
    ";

    // jalankan query update stok
    $connection->query($query_stok);

    // redirect ke halaman awal 
    header("location: ../../media.php?module=" . $module);
  } else {

    //pesan error gagal insert data
    echo "Data Gagal Disimpan!";
  }

// bagian hapus data peminjaman
elseif ($module == 'pinjam' and $act == 'delete') :

  // ambil id peminjaman
  $id = $_GET['id'];
  // ambil isbn
  $isbn = $_GET['isbn'];

  // query ambil data stock
  $query = "SELECT isbn, stok FROM muda_buku WHERE isbn = $isbn";
  $result  = mysqli_query($connection, $query);
  $row = mysqli_fetch_array($result);
  // masukkan jumlah stok ke variabel
  $stok = $row['stok'];
  // lakukan penambahan stok (+1) 
  $newStok = $stok + 1;

  // query delete peminjaman
  $query_hapus = "DELETE FROM muda_peminjaman WHERE id_peminjaman = $id";

  // query update stok
  $query_stok = "UPDATE muda_buku SET stok = $newStok WHERE isbn = '$isbn'";

  //kondisi pengecekan apakah data berhasil dimasukkan atau tidak
  if ($connection->query($query_hapus)) {

    // munculkan alert sukses simpan data dengan session
    session_start();
    $_SESSION["alert"] = "
    <div class='alert alert-success' role='alert'>
      Data Peminjaman Berhasil di Hapus.
    </div>
    ";

    // jalankan query update stok
    $connection->query($query_stok);

    // redirect ke halaman awal 
    header("location: ../../media.php?module=" . $module);
  } else {

    //pesan error gagal insert data
    echo "Data Gagal Disimpan!";
  }

endif;

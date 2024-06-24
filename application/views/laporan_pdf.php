<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Laporan Pengaduan Masyarakat</title>

  <!-- Custom fonts for this template-->
  <link href="<?= base_url() ?>assets/backend/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Lora:700|Montserrat:200,400,600|Pacifico&display=swap" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= base_url() ?>assets/backend/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <style type="text/css">
    body {
      font-family: arial;
    }

    .rangkasurat {
      width: 100%;
      margin: 0 auto;
      background-color: #fff;
      height: 100px;
      padding: 20px;
    }

    table {
      border-bottom: 5px solid #000;
      padding: 2px
    }

    .tengah {
      text-align: center;
      line-height: 5px;
    }

    .table-data {
      width: 100%;
      border-collapse: collapse;
    }

    .table-data tr th,
    .table-data tr td {
      border: 1px solid black;
      font-size: 11pt;
      font-family: Verdana;
      padding: 10px 10px 10px 10px;
    }

    .table-data th {
      background-color: grey;
    }

    h1 {
      font-family: Verdana;
    }
  </style>

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <div class="rangkasurat">
        <table width="100%">
          <tr>
            <td class="tengah">
              <h2>PEMERINTAH DAERAH PROVINSI JAWA TENGAH</h2>
              <h2>KECAMATAN PEDAN</h2>
              <h1>KELURAHAN SOBAYAN</h1>
              <b>Jl. Sobayan, Polaharjo, Sobayan, Kec. Pedan, Kab. Klaten, Jawa Tengah 57468</b>
            </td>
          </tr>
        </table>
      </div>
      <h2 class="h4 text-dark">Laporan Pengaduan Masyarakat</h2>
      <table class="table-data">
        <thead class="thead-dark">
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Kategori</th>
            <th scope="col">Laporan</th>
            <th scope="col">Tgl Pengaduan</th>
            <th scope="col">Status</th>
            <th scope="col">Tanggapan</th>
            <th scope="col">Tgl Tanggapan</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; ?>
          <?php foreach ($laporan as $l) : ?>
            <tr>
              <td scope="row"><?= $no++; ?></td>
              <td><?= $l['nama'] ?></td>
              <td><?= $l['jenis_pengaduan'] ?></td>
              <td><?= $l['isi_laporan'] ?></td>
              <td><?= $l['tgl_pengaduan'] ?></td>
              <td>
                <?php
                if ($l['status'] == '0') :
                  echo '<span class="badge badge-secondary">Sedang di verifikasi</span>';
                elseif ($l['status'] == 'proses') :
                  echo '<span class="badge badge-primary">Sedang di proses</span>';
                elseif ($l['status'] == 'selesai') :
                  echo '<span class="badge badge-success">Selesai di kerjakan</span>';
                elseif ($l['status'] == 'tolak') :
                  echo '<span class="badge badge-danger">Pengaduan di tolak</span>';
                else :
                  echo '-';
                endif;
                ?>
              </td>
              <td><?= $l['tanggapan'] == null ? '-' : $l['tanggapan']; ?></td>
              <td><?= $l['tgl_tanggapan'] == null ? '-' : $l['tgl_tanggapan']; ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>

    </div>
    <!-- /.container-fluid -->

  </div>
  <!-- End of Main Content -->

  <!-- Footer -->
  <!-- <footer class="sticky-footer bg-white">
  <div class="container my-auto">
    <div class="copyright text-center my-auto">
      <span><center>Copyright &copy; Kelompok 4</center></span>
    </div>
  </div>
</footer> -->
  <!-- End of Footer -->

  </div>
  <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->


  <script src="<?= base_url() ?>assets/backend/vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url() ?>assets/backend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url() ?>assets/backend/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url() ?>assets/backend/js/sb-admin-2.min.js"></script>


</body>

</html>
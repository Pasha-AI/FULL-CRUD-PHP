<?php 

session_start();

// membatasi halaman sebelum login
if (!isset($_SESSION["login"])) {
    echo "<script>
    alert('login dulu bos');
    document.location.href = 'login.php';
    </script>";
    exit;
}

// membatasi halaman sesuai user login
if ($_SESSION["level"] != 1 and $_SESSION["level"] != 3) {
    echo "<script>
        alert('Anda tidak memiliki hak akses');
        document.location.href = 'crud-modal.php';
        </script>";
        exit;
}

$title = 'Daftar Mahasiswa';

include 'layout/header.php';

// menampilkan data mahasiswa
$data_mahasiswa = select("SELECT * FROM mahasiswa ORDER BY id_mahasiswa DESC");

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>150</h3>

                <p>New Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>Bounce Rate</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>44</h3>

                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>

                <p>Unique Visitors</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
            <div class="container mt-5">
    <h1>Data Mahasiswa</h1>
    <hr>
    <a href="tambah-mahasiswa.php" class="btn btn-primary mb-1"><i class="fas fa-plus-circle"></i>Tambah</a>
    <a href="download-excel-mahasiswa.php" class="btn btn-success mb-1"><i class="fa fa-file-excel"></i>Download Excel</a>
    <a href="download-pdf-mahasiswa.php" class="btn btn-danger mb-1"> <i class="fa fa-file-pdf"></i>Download PDF</a>
    
    <table class="table table-bordered table-striped mt-3" id="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Prodi</th>
                <th>Jenis Kelamin</th>
                <th>Telepon</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
           <?php $no = 1; ?>
           <?php foreach ($data_mahasiswa as $mahasiswa): ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $mahasiswa['nama']; ?></td>
                <td><?= $mahasiswa['prodi']; ?></td>
                <td><?= $mahasiswa['jk']; ?></td>
                <td><?= $mahasiswa['telepon']; ?></td>
                <td class="text-center" width="25%">
                    <a href="detail-mahasiswa.php?id_mahasiswa=<?= $mahasiswa['id_mahasiswa']; ?>" class="btn btn-secondary btn-sm">Detail</a>
                    <a href="ubah-mahasiswa.php?id_mahasiswa=<?= $mahasiswa['id_mahasiswa']; ?>" class="btn btn-success btn-sm">Ubah</a>
                    <a href="hapus-mahasiswa.php?id_mahasiswa=<?= $mahasiswa['id_mahasiswa']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin data mahasiswa akan dihapus?')">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
                
              <!-- /.card-header -->
              <div class="card-body pt-0">
                <!--The calendar -->
                <div id="calendar" style="width: 100%"></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include 'layout/footer.php'; ?>
 
<?php 

session_start();

// membatasi halaman sebelum login
if (!isset($_SESSION["login"])) {
    echo "<script>
    alert('Mohon Untuk Login Terlebih Dahulu!!!');
    document.location.href = 'login.php';
    </script>";
    exit;
}

$title = 'Kirim Email';

include 'layout/header.php';

use PHPMailer\PHPMailer\PHPMailer;
// Load Composer's autoloader
require 'vendor/autoload.php';
$mail = new PHPMailer(true);
// Server settings
$mail->SMTPDebug = 2;                                                               //Enable
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'pashaajayakan@gmail.com';
$mail->Password = 'riutckgpnronekuh';
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
$mail->Port = 465;

if (isset($_POST['kirim'])) {
  // Recipient
  $mail->setFrom('pashaajayakan@gmail.com', 'Tutorial Memakai Layla');
  $mail->addAddress($_POST['email_penerima']);
  $mail->addReplyTo('pashaajayakan@gmail.com', 'Tutorial Memakai Layla');

  $mail->Subject = $_POST['subject'];
  $mail->Body = $_POST['pesan'];

  if ($mail->send()) {
    echo "<script>
        alert('Email Berhasil Dikirimkan');
        document.location.href = 'email.php';
    </script>";
  } else {
    echo "<script>
        alert('Email Gagal Dikirimkan');
        document.location.href = 'email.php';
    </script>";
  }
  exit();
}

// if (isset($_POST['kirim'])) {
    // if (create_barang($_POST) > 0) {
    //     echo "<script>
    //     alert('Data Email Berhasil Ditambahkan');
    //     document.location.href = 'index.php';
    //     </script>";
    // } else {
    //     echo "<script>
    //     alert('Data Email Tidak Berhasil');
    //     document.location.href = 'index.php';
    //     </script>";
    // }
    
// }
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="padding-bottom: 20px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">
              <i class="fas fa-envelope"></i>Kirim Email
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Kirim Email</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

   <!-- maint content -->
<section class="content">
  <div class="container-fluid">
    <div class="email-form-container" style="padding-bottom: 50px;"> <!-- Container baru dengan padding -->
      <form action="" method="post">
        <div class="mb-3">
          <label for="email penerima" class="form-label">Email Penerima</label>
          <input type="text" class="form-control" id="email penerima" name="email penerima" placeholder="Email Penerima..." required>
        </div>

        <div class="mb-3">
          <label for="subject" class="form-label">Subject</label>
          <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject..." required>
        </div>

        <div class="mb-3">
          <label for="pesan" class="form-label">Pesan</label>
          <textarea name="pesan" id="pesan" cols="30" rows="10" class="form-control"></textarea>
        </div>
        
        <button type="submit" name="kirim" class="btn btn-primary" style="float: right;">Kirim</button>
      </form>
    </div>
  </div>
</section>
</div>
     
  <!-- /.content-wrapper -->
  <?php include 'layout/footer.php'; ?>
 
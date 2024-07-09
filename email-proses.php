use PHPMailer\PHPMailer\PHPMailer;
// Load Composer's autoloader
require 'vendor/autoload.php';
$mail = new PHPMailer(true);

// Server settings
$mail->SMTPDebug = 2; // Enable verbose debug output
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'pashaajayakan@gmail.com'; // Ganti dengan email Anda
$mail->Password = 'riutckgpnronekuh'; // Ganti dengan password email Anda
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
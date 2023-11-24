<?php
include 'components/connect.php';

session_start();

// Establece la cabecera X-Content-Type-Options para prevenir el MIME-sniffing
header('X-Content-Type-Options: nosniff');

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

if(isset($_POST['send'])){
   // Verificar el token CSRF
   if (isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {
      $name = $_POST['name'];
      $name = filter_var($name, FILTER_SANITIZE_STRING);
      $email = $_POST['email'];
      $email = filter_var($email, FILTER_SANITIZE_STRING);
      $number = $_POST['number'];
      $number = filter_var($number, FILTER_SANITIZE_STRING);
      $msg = $_POST['msg'];
      $msg = filter_var($msg, FILTER_SANITIZE_STRING);

      $select_message = $conn->prepare("SELECT * FROM `messages` WHERE name = ? AND email = ? AND number = ? AND message = ?");
      $select_message->execute([$name, $email, $number, $msg]);

      if($select_message->rowCount() > 0){
         $message[] = '¡Mensaje ya enviado!';
      }else{

         $insert_message = $conn->prepare("INSERT INTO `messages`(user_id, name, email, number, message) VALUES(?,?,?,?,?)");
         $insert_message->execute([$user_id, $name, $email, $number, $msg]);

         $message[] = '¡Mensaje enviado exitosamente!';

      }
   } else {
      // Manejar el error CSRF
      $message[] = 'Error CSRF detectado.';
   }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Contacto</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="stylesheet" href="css/style.css">
</head>
<body>
<script src="js/chatbot.js"></script>
<!-- header   start -->
<?php include 'components/user_header.php'; ?>
<!-- header  end -->

<div class="heading">
   <h3>Contacta con nosotros</h3>
   <p><a href="home.php">INICIO</a> <span> / contacto</span></p>
</div>

<!-- contact section starts  -->

<section class="contact">
   <div class="row">
      <div class="image">
         <img src="images/contact-img.svg" alt="">
      </div>
      <form action="" method="post">
         <h3>¡Cuéntanos algo!</h3>
         <input type="text" name="name" maxlength="50" class="box" placeholder="Introduce tu nombre" required>
         <input type="number" name="number" min="0" max="9999999999" class="box" placeholder="Introduce tu número" required maxlength="10">
         <input type="email" name="email" maxlength="50" class="box" placeholder="Introduce tu correo electrónico" required>
         <textarea name="msg" class="box" required placeholder="Introduce tu mensaje" maxlength="500" cols="30" rows="10"></textarea>
         <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token']; ?>">
         <input type="submit" value="Enviar mensaje" name="send" class="btn">
      </form>
   </div>
</section>

<!-- contact section ends -->

<!-- footer section starts  -->
<?php include 'components/footer.php'; ?>
<!-- footer section ends -->

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>

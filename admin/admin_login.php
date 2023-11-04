<?php

include '../components/connect.php';

session_start();

if(isset($_POST['submit'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $pass = sha1($_POST['pass']);
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);

   $select_admin = $conn->prepare("SELECT * FROM `admin` WHERE name = ? AND password = ?");
   $select_admin->execute([$name, $pass]);
   
   if($select_admin->rowCount() > 0){
      $fetch_admin_id = $select_admin->fetch(PDO::FETCH_ASSOC);
      $_SESSION['admin_id'] = $fetch_admin_id['id'];
      header('location:dashboard.php');
   }else{
      $message[] = '¡Nombre de usuario o contraseña incorrecta!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="../css/login_admin.css">
   <title>login</title>
</head>
<body>
   <?php
   if(isset($message)){
      foreach($message as $message){
         echo '
         <div class="message">
            <span>'.$message.'</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
         </div>
         ';
      }
   }
   ?>

   <section>
      <div class="form-box">
         <div class="form-value">
            <form action="" method="POST">
               <h2>Inicia sesión ahora</h2>
               
               <div class="inputbox">
                  
                  <ion-icon name="person-outline"></ion-icon>
                  <input type="text" name="name" maxlength="20" required placeholder="Ingrese su nombre de usuario" oninput="this.value = this.value.replace(/\s/g, '')">
               </div>
               <div class="inputbox">
                  <ion-icon name="lock-closed-outline"></ion-icon>
                  <input type="password" name="pass" maxlength="20" required placeholder="Ingresa tu contraseña" oninput="this.value = this.value.replace(/\s/g, '')">
               </div>
               <div class="forget">
                  <label for=""><input type="checkbox">Recordarme  </label>
               </div>
               <button name="submit">Ingresar</button>
               
            </form>
         </div>
      </div>
   </section>
   <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
   <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
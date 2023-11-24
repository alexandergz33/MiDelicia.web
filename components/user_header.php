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

<header class="header">
   <section class="flex">
      <a href="home.php" class="logo">Mi Delicia <i class="fa-solid fa-heart black-heart"></i></a>
      <nav class="navbar">
         <a href="home.php"><i class="fas fa-home"></i> INICIO</a>
         <a href="about.php"><i class="fas fa-users"></i> Nosotros</a>
         <a href="menu.php"><i class="fas fa-utensils"></i> Menú</a>
         <a href="orders.php"><i class="fas fa-shopping-cart"></i> Ordenes</a>
         <a href="contact.php"><i class="fas fa-envelope"></i> Contáctanos</a>
         <a href="reservas.php"><i class="fas fa-clock"></i> Reservas</a>
         <a href="promociones.php"><i class="fas fa-gift"></i> Promoción</a>
      </nav>
      <div class="icons">
         <?php
            $count_cart_items = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
            $count_cart_items->execute([$user_id]);
            $total_cart_items = $count_cart_items->rowCount();
         ?>
         <a href="search.php"><i class="fas fa-search"></i></a>
         <a href="cart.php"><i class="fas fa-shopping-cart"></i><span>(<?= $total_cart_items; ?>)</span></a>
         <div id="user-btn" class="fas fa-user"></div>
         <div id="menu-btn" class="fas fa-bars"></div>
      </div>
      <div class="profile">
         <?php
            $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
            $select_profile->execute([$user_id]);
            if ($select_profile->rowCount() > 0) {
               $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
         <p class="name"><?= $fetch_profile['name']; ?></p>
         <div class="flex">
            <a href="profile.php" class="btn">Tú perfil</a>
            <a href="components/user_logout.php" onclick="return confirm('¿Cerrar sesión en este sitio web?');" class="delete-btn">cerrar sesión</a>
         </div>
         <p class="account">
            <a href="login.php">Login</a> o
            <a href="register.php">Registro</a>
         </p>
         <?php
            } else {
         ?>
            <p class="name">¡Por favor ingresa primero!</p>
            <a href="login.php" class="btn">Login</a>
         <?php
            }
         ?>
      </div>
   </section>
</header>

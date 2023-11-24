<?php

include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
   header('location:admin_login.php');
}

if (isset($_POST['add_promotion'])) {
   $title = $_POST['title'];
   $title = filter_var($title, FILTER_SANITIZE_STRING);

   $description = $_POST['description'];
   $description = filter_var($description, FILTER_SANITIZE_STRING);

   $product_image = $_FILES['product_image']['name'];
   $product_image = filter_var($product_image, FILTER_SANITIZE_STRING);
   $product_image_size = $_FILES['product_image']['size'];
   $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
   $product_image_folder = '../uploaded_img/' . $product_image;

   $start_date = $_POST['start_date'];
   $end_date = $_POST['end_date'];

   $original_price = $_POST['original_price'];
   $original_price = filter_var($original_price, FILTER_SANITIZE_STRING);

   $discount = $_POST['discount'];
   $discount = filter_var($discount, FILTER_SANITIZE_STRING);

   $final_price = $original_price - ($original_price * $discount / 100);

   $select_promotions = $conn->prepare("SELECT * FROM `promotions` WHERE title = ?");
   $select_promotions->execute([$title]);

   if ($select_promotions->rowCount() > 0) {
      $message[] = '¡El título de la promoción ya existe!';
   } else {
      if ($product_image_size > 2000000) {
         $message[] = '¡El tamaño de la imagen es demasiado grande!';
      } else {
         move_uploaded_file($product_image_tmp_name, $product_image_folder);

         $insert_promotion = $conn->prepare("INSERT INTO `promotions`(title, description, product_image_path, start_date, end_date, original_price, discount, final_price) VALUES(?,?,?,?,?,?,?,?)");
         $insert_promotion->execute([$title, $description, $product_image, $start_date, $end_date, $original_price, $discount, $final_price]);

         $message[] = '¡Nueva promoción añadida!';
      }
   }
}

if (isset($_GET['delete'])) {
   $delete_id = $_GET['delete'];
   $delete_promotion_image = $conn->prepare("SELECT * FROM `promotions` WHERE id = ?");
   $delete_promotion_image->execute([$delete_id]);
   $fetch_delete_image = $delete_promotion_image->fetch(PDO::FETCH_ASSOC);
   unlink('../uploaded_img/' . $fetch_delete_image['product_image_path']);
   $delete_promotion = $conn->prepare("DELETE FROM `promotions` WHERE id = ?");
   $delete_promotion->execute([$delete_id]);
   header('location:promotions.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Promociones</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/admin_style.css">
</head>
<body>

<?php include '../components/admin_header.php' ?>

<!-- add promotions section starts  -->
<section class="add-promotions-container">
   <form action="" method="POST" enctype="multipart/form-data" class="add-promotions-form">
      <h3>Agregar promoción</h3>
      <input type="text" required placeholder="Título de la promoción" name="title" maxlength="100" class="input-box">
      <textarea required placeholder="Descripción de la promoción" name="description" class="input-box"></textarea>
      <input type="file" name="product_image" class="input-box" accept="image/jpg, image/jpeg, image/png, image/webp" required>
      <label for="start_date">Fecha de inicio:</label>
      <input type="date" name="start_date" required>
      <label for="end_date">Fecha de fin:</label>
      <input type="date" name="end_date" required>
      <label for="original_price">Precio original:</label>
      <input type="number" min="0" step="0.01" name="original_price" required>
      <label for="discount">Porcentaje de descuento:</label>
      <input type="number" min="0" max="100" step="1" name="discount" required>
      <input type="submit" value="Agregar promoción" name="add_promotion" class="submit-btn">
   </form>
</section>
<!-- add promotions section ends -->

<!-- show promotions section starts  -->
<section class="show-promotions-container" style="padding-top: 0;">
   <div class="promotions-box-container">
   <?php
      $show_promotions = $conn->prepare("SELECT * FROM `promotions`");
      $show_promotions->execute();
      if ($show_promotions->rowCount() > 0) {
         while ($fetch_promotions = $show_promotions->fetch(PDO::FETCH_ASSOC)) {
   ?>
   <div class="promotions-box">
      <img src="../uploaded_img/<?= $fetch_promotions['product_image_path']; ?>" alt="">
      <div class="flex">
         <div class="price"><span>$</span><?= $fetch_promotions['original_price']; ?><span>/-</span></div>
         <div class="discount"><?= $fetch_promotions['discount']; ?>% Descuento</div>
         <div class="final-price"><span>$</span><?= $fetch_promotions['final_price']; ?><span>/-</span></div>
      </div>
      <div class="title"><?= $fetch_promotions['title']; ?> - Válido hasta: <?= $fetch_promotions['end_date']; ?></div>
      <div class="description"><?= $fetch_promotions['description']; ?></div>
      <div class="flex-btn">
      <a href="update_promotion.php?update=<?= $fetch_promotions['id']; ?>" class="option-btn">Actualizar</a>
      <a href="delete_promotion.php?id=<?= $fetch_promotions['id']; ?>" class="delete-btn" onclick="return confirm('¿Eliminar esta promoción?');">Eliminar</a>
      </div>
   </div>
   <?php
         }
      } else {
         echo '<p class="empty">¡Aún no se han añadido promociones!</p>';
      }
   ?>
   </div>
</section>
<!-- show promotions section ends -->

<!-- ... (código posterior) -->

</body>
</html>

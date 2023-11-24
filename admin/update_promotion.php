<?php
include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
   header('location:admin_login.php');
}

if (isset($_GET['update'])) {
   $update_id = $_GET['update'];

   if (isset($_POST['update_promotion'])) {
      $updated_title = $_POST['updated_title'];
      $updated_description = $_POST['updated_description'];
      $updated_start_date = $_POST['updated_start_date'];
      $updated_end_date = $_POST['updated_end_date'];
      $updated_original_price = $_POST['updated_original_price'];
      $updated_discount = $_POST['updated_discount'];
      $updated_final_price = $updated_original_price - ($updated_original_price * $updated_discount / 100);

      // Puedes agregar más campos aquí según tu estructura de base de datos

      $update_promotion = $conn->prepare("UPDATE `promotions` SET 
         title=?, description=?, start_date=?, end_date=?, 
         original_price=?, discount=?, final_price=? 
         WHERE id=?");
      
      $update_promotion->execute([
         $updated_title, $updated_description, $updated_start_date, 
         $updated_end_date, $updated_original_price, $updated_discount, 
         $updated_final_price, $update_id
      ]);

      // Procesar la actualización de la imagen
      if ($_FILES['updated_product_image']['size'] > 0) {
         $updated_product_image = $_FILES['updated_product_image']['name'];
         $updated_product_image_tmp_name = $_FILES['updated_product_image']['tmp_name'];
         $updated_product_image_folder = '../uploaded_img/' . $updated_product_image;

         move_uploaded_file($updated_product_image_tmp_name, $updated_product_image_folder);

         // Actualiza el campo de imagen en la base de datos
         $update_promotion_image = $conn->prepare("UPDATE `promotions` SET product_image_path=? WHERE id=?");
         $update_promotion_image->execute([$updated_product_image, $update_id]);
      }

      // Redirige después de la actualización
      header('location:admin_promocion.php');
   }

   $select_promotion = $conn->prepare("SELECT * FROM `promotions` WHERE id = ?");
   $select_promotion->execute([$update_id]);
   $fetch_promotion = $select_promotion->fetch(PDO::FETCH_ASSOC);
} else {
   // Redirige si no se proporciona un ID válido para actualizar
   header('location:promotions.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Actualizar Promoción</title>
   <link rel="stylesheet" href="../css/admin_style.css">
</head>
<body>

<?php include '../components/admin_header.php' ?>

 

<section class="update-promotion-container">
   <form action="" method="POST" enctype="multipart/form-data">
      <h3>Actualizar Promoción</h3>
      <input type="text" required placeholder="Título actualizado" name="updated_title" value="<?= $fetch_promotion['title']; ?>" class="input-box">
      <textarea required placeholder="Descripción actualizada" name="updated_description" class="input-box"><?= $fetch_promotion['description']; ?></textarea>
      <label for="updated_start_date">Fecha de inicio actualizada:</label>
      <input type="date" name="updated_start_date" value="<?= $fetch_promotion['start_date']; ?>" required>
      <label for="updated_end_date">Fecha de fin actualizada:</label>
      <input type="date" name="updated_end_date" value="<?= $fetch_promotion['end_date']; ?>" required>
      <label for="updated_original_price">Precio original actualizado:</label>
      <input type="number" min="0" step="0.01" name="updated_original_price" value="<?= $fetch_promotion['original_price']; ?>" required>
      <label for="updated_discount">Porcentaje de descuento actualizado:</label>
      <input type="number" min="0" max="100" step="1" name="updated_discount" value="<?= $fetch_promotion['discount']; ?>" required>
      <label for="updated_product_image">Nueva imagen:</label>
      <input type="file" name="updated_product_image" accept="image/jpg, image/jpeg, image/png, image/webp">
      <!-- Otros campos adicionales según sea necesario -->

      <input type="submit" value="Actualizar promoción" name="update_promotion" class="submit-btn">
      <a href="admin_promocion.php" class="volver">Regresar</a>
   </form>
</section>

<!-- ... (código posterior) -->


</body>
</html>

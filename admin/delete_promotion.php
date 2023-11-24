<?php
include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
   header('location:admin_login.php');
}

if (isset($_GET['id'])) {
   $delete_id = $_GET['id'];

   $delete_promotion_image = $conn->prepare("SELECT * FROM `promotions` WHERE id = ?");
   $delete_promotion_image->execute([$delete_id]);
   $fetch_delete_image = $delete_promotion_image->fetch(PDO::FETCH_ASSOC);

   // Elimina la imagen asociada a la promoción
   unlink('../uploaded_img/' . $fetch_delete_image['product_image_path']);

   // Elimina la promoción de la base de datos
   $delete_promotion = $conn->prepare("DELETE FROM `promotions` WHERE id = ?");
   $delete_promotion->execute([$delete_id]);

   // Redirige después de la eliminación
   header('location: admin_promocion.php');
} else {
   // Redirige si no se proporciona un ID válido para eliminar
   header('location: promotions.php');
}
?>

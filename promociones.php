<?php

include 'components/connect.php';

session_start();

if (isset($_SESSION['user_id'])) {
   $user_id = $_SESSION['user_id'];
} else {
   $user_id = '';
};

include 'components/add_cart.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Menú</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<!-- header section starts  -->
<?php include 'components/user_header.php'; ?>
<!-- header section ends -->

<div class="heading">
   <h3>Nuestro menú</h3>
   <p><a href="home.php">INICIO</a> <span> / Menú</span></p>
</div>

<!-- menu section starts  -->

<section class="products">

   <h1 class="title">Últimas promociones</h1>

   <div class="box-container">

      <?php
         $select_promotions = $conn->prepare("SELECT * FROM `promotions`");
         $select_promotions->execute();
         if ($select_promotions->rowCount() > 0) {
            while ($fetch_promotions = $select_promotions->fetch(PDO::FETCH_ASSOC)) {
      ?>
      <form action="" method="post" class="box">
         <input type="hidden" name="pid" value="<?= $fetch_promotions['id']; ?>">
         <input type="hidden" name="title" value="<?= $fetch_promotions['title']; ?>">
         <input type="hidden" name="description" value="<?= $fetch_promotions['description']; ?>">
         <input type="hidden" name="product_image" value="<?= $fetch_promotions['product_image_path']; ?>">
         <input type="hidden" name="start_date" value="<?= $fetch_promotions['start_date']; ?>">
         <input type="hidden" name="end_date" value="<?= $fetch_promotions['end_date']; ?>">
         <input type="hidden" name="original_price" value="<?= $fetch_promotions['original_price']; ?>">
         <input type="hidden" name="discount" value="<?= $fetch_promotions['discount']; ?>">
         <input type="hidden" name="final_price" value="<?= $fetch_promotions['final_price']; ?>">
         <a href="quick_view_promotion.php?pid=<?= $fetch_promotions['id']; ?>" class="fas fa-eye"></a>
         <button type="submit" class="fas fa-shopping-cart" name="add_promotion_to_cart"></button>
         <img src="uploaded_img/<?= $fetch_promotions['product_image_path']; ?>" alt="">
         <div class="flex">
            <div class="price"><span>$</span><?= $fetch_promotions['final_price']; ?><span>/-</span></div>
            <div class="discount"><?= $fetch_promotions['discount']; ?>% Descuento</div>
         </div>
         <div class="title"><?= $fetch_promotions['title']; ?></div>
         <div class="description"><?= $fetch_promotions['description']; ?></div>
      </form>
      <?php
            }
         } else {
            echo '<p class="empty">¡Aún no se han añadido promociones!</p>';
         }
      ?>

   </div>

</section>
<!-- menu section ends -->

<!-- footer section starts  -->
<?php include 'components/footer.php'; ?>
<!-- footer section ends -->

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>

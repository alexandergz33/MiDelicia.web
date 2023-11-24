<?php
header('X-Frame-Options: DENY');
include 'components/connect.php';

session_start();

// Configura la cookie de sesión con HttpOnly y SameSite=Lax
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), $_COOKIE[session_name()], 0, '/', '', true, true); // Agrega el último true para HttpOnly
    session_regenerate_id(true);
    setcookie(session_name(), session_id(), 0, '/', '', true, true); // Agrega SameSite=Lax
}

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
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
   <title>MiDelicia</title>

   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
<script src="js/chatbot.js"></script>
 
<?php include 'components/user_header.php'; ?>



<section class="hero">

   <div class="swiper hero-slider">

      <div class="swiper-wrapper">

         <div class="swiper-slide slide">
            <div class="content">
               <span>comprar online</span>
               <h3>deliciosa pizza</h3>
               <a href="menu.php" class="btn">ver menú</a>
            </div>
            <div class="image">
               <img src="images/home-img-1.png" alt="">
            </div>
         </div>

         <div class="swiper-slide slide">
            <div class="content">
               <span>comprar online</span>
               <h3>hamburguesa con queso</h3>
               <a href="menu.php" class="btn">ver menú</a>
            </div>
            <div class="image">
               <img src="images/home-img-2.png" alt="">
            </div>
         </div>

         <div class="swiper-slide slide">
            <div class="content">
               <span>comprar online</span>
               <h3>pollo asado</h3>
               <a href= "menu.php" class="btn">ver menú</a>
            </div>
            <div class="image">
               <img src="images/home-img-3.png" alt="">
            </div>
         </div>

      </div>

      <div class="swiper-pagination"></div>

   </div>

</section>

<section class="category">

   <h1 class="title">categoría de comida</h1>

   <div class="box-container">

      <a href="category.php?category=Comida rapida" class="box">
         <img src="images/comida_rapida.png" alt="">
         <h3>Comida rápida</h3>
      </a>

      <a href="category.php?category=Plato principal" class="box">
         <img src="images/platos_principales.jpg" alt="">
         <h3>platos principales</h3>
      </a>

      <a href="category.php?category=Bebidas" class="box">
         <img src="images/bebidas.png" alt="">
         <h3>Bebidas</h3>
      </a>

      <a href="category.php?category=Postres" class="box">
         <img src="images/postres.png" alt="">
         <h3>Postres</h3>
      </a>

   </div>

</section>



   
<section class="products">

   <h1 class="title">últimos platos</h1>

   <div class="box-container">

      <?php
         $select_products = $conn->prepare("SELECT * FROM `products` LIMIT 6");
         $select_products->execute();
         if($select_products->rowCount() > 0){
            while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)){
      ?>
      <form action="" method="post" class="box">
         <input type="hidden" name="pid" value="<?= $fetch_products['id']; ?>">
         <input type="hidden" name="name" value="<?= $fetch_products['name']; ?>">
         <input type="hidden" name="price" value="<?= $fetch_products['price']; ?>">
         <input type="hidden" name="image" value="<?= $fetch_products['image']; ?>">
         <a href="quick_view.php?pid=<?= $fetch_products['id']; ?>" class="fas fa-eye"></a>
         <button type="submit" class="fas fa-shopping-cart" name="add_to_cart"></button>
         <img src="uploaded_img/<?= $fetch_products['image']; ?>" alt="">
         <a href="category.php?category=<?= $fetch_products['category']; ?>" class="cat"><?= $fetch_products['category']; ?></a>
         <div class="name"><?= $fetch_products['name']; ?></div>
         <div class="flex">
            <div class="price"><span>$</span><?= $fetch_products['price']; ?></div>
            <input type="number" name="qty" class="qty" min="1" max="99" value="1" maxlength="2">
         </div>
      </form>
      <?php
            }
         }else{
            echo '<p class="empty">¡Aún no se han añadido productos!</p>';
         }
      ?>

   </div>

   <div class="more-btn">
    <a href="recetas.php" class="btn <?php echo empty($user_id) ? 'show-message' : ''; ?>">Ver Recetas</a>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var verRecetasBtn = document.querySelector('.btn.show-message');
    
    if (verRecetasBtn) {
        verRecetasBtn.addEventListener('click', function(event) {
            event.preventDefault(); // Evita que el enlace realice la acción predeterminada (navegar a la página de recetas)
            
            // Muestra el mensaje
            alert('Por favor, inicia sesión primero.');
        });
    }
});
</script>
</section>


















<?php include 'components/footer.php'; ?>


<script src="js/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>

<script>

var swiper = new Swiper(".hero-slider", {
   loop:true,
   grabCursor: true,
   effect: "flip",
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
});

</script>

</body>
</html>
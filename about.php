<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Sobre nosostros</title>

   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />

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
<h3><i class="fas fa-info-circle"></i> Sobre nosotros</h3>

   <p><a href="home.php">INICIO</a> <span> / Sobre nosotros</span></p>
</div>

<!-- about section starts  -->

<section class="about">

   <div class="row">

      <div class="image">
         <img src="images/about-img.svg" alt="">
      </div>

      <div class="content">
         <h3>¿Por qué elegirnos?</h3>
         <p>"En 'Mi Delicia', te ofrecemos una experiencia culinaria excepcional. Nuestros platos están preparados con ingredientes frescos y de alta calidad, y nuestro equipo de chefs se esfuerza por sorprenderte con sabores auténticos. Te garantizamos un ambiente acogedor y un servicio excepcional en cada visita. Elije 'Mi Delicia' para disfrutar de lo mejor en gastronomía."</p>
         <a href="menu.php" class="btn">Nuestro menú</a>
      </div>

   </div>

</section>

<!-- about section ends -->

<!-- steps section starts  -->

<section class="steps">

   <h1 class="title">pasos simples</h1>

   <div class="box-container">

      <div class="box">
         <img src="images/step-1.png" alt="">
         <h3>Elegir orden</h3>
         <p>"En Mi Delicia, elegir tu orden es fácil. Ofrecemos una amplia variedad de opciones deliciosas para satisfacer tus gustos. ¿Qué plato te tentará hoy?"</p>
      </div>

      <div class="box">
         <img src="images/entrega.png" alt="">
         <h3>Entrega rápida</h3>
         <p>Nuestra entrega rápida te garantiza recibir tus productos en tiempo récord, sin comprometer la calidad ni la seguridad. Tu satisfacción es nuestra prioridad.</p>
      </div>

      <div class="box">
         <img src="images/step-3.png" alt="">
         <h3>Disfruta la comida</h3>
         <p>Sumérgete en una experiencia culinaria inolvidable, deleitándote con sabores excepcionales.</p>
      </div>

   </div>

</section>

<!-- steps section ends -->

<!-- reviews section starts  -->

<section class="reviews">

   <h1 class="title">opiniones del cliente</h1>

   <div class="swiper reviews-slider">

      <div class="swiper-wrapper">

         <div class="swiper-slide slide">
            <img src="images/pic-1.png" alt="">
            <p>"Mi Delicia, es increíble. La comida es deliciosa, el servicio es excelente y el ambiente es acogedor. Mi lugar favorito para cenar."</p>
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>john deo</h3>
         </div>

         <div class="swiper-slide slide">
            <img src="images/pic-2.png" alt="">
            <p>"Siempre que visito 'Mi Delicia', sé que voy a disfrutar de una comida excepcional. Los sabores son auténticos y deliciosos, y el personal es amable y atento."</p>
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star-half-alt"></i>
            </div>
            <h3> Isabella Rodríguez.</h3>
         </div>

         <div class="swiper-slide slide">
            <img src="images/pic-3.png" alt="">
            <p>"El restaurante 'Mi Delicia' es un verdadero tesoro culinario. Cada plato es una obra de arte y el ambiente es relajante. No puedo recomendarlo lo suficiente."</p>
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>Alejandro Pérez</h3>
         </div>

         <div class="swiper-slide slide">
            <img src="images/pic-4.png" alt="">
            <p>"Los sabores en 'Mi Delicia' son simplemente inigualables. La frescura de los ingredientes se nota en cada bocado. Definitivamente, es el lugar al que siempre vuelvo."</p>
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>Sofia García</h3>
         </div>

         <div class="swiper-slide slide">
            <img src="images/pic-5.png" alt="">
            <p>"'Mi Delicia' es el restaurante que supera mis expectativas en cada visita. La comida es deliciosa, el servicio es atento y  encantador. ¡No puedo tener suficiente de este lugar!"</p>
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>Carlos Sánchez</h3>
         </div>

         <div class="swiper-slide slide">
            <img src="images/pic-6.png" alt="">
            <p>"Nunca dejo de impresionarme con la calidad de la comida en 'Mi Delicia'. Cada plato es una deliciosa sorpresa y el personal es siempre servicial. Mi lugar preferido para cenar con amigos."</p>
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>Laura Morales</h3>
         </div>

      </div>

      <div class="swiper-pagination"></div>

   </div>

</section>

<!-- reviews section ends -->
<section class="category">

   <h1 class="title">Redes Sociales</h1>

   <div class="box-container">

      <a href="https://www.instagram.com/mideliciarestaurant/" class="box">
         <img src="images/instagram.png" alt="">
         <h3>Instagram</h3>
      </a>

      <a href="https://www.facebook.com/RestauranteMiDelicia.hn" class="box">
         <img src="images/facebook.png" alt="">
         <h3>Facebook</h3>
      </a>

      <a href="https://wa.me/940906407" class="box">
         <img src="images/whatssap.png" alt="">
         <h3>Whatsapp</h3>
      </a>

      

   </div>

</section>


















<!-- footer section starts  -->
<?php include 'components/footer.php'; ?>
<!-- footer section ends -->






<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>

<script>

var swiper = new Swiper(".reviews-slider", {
   loop:true,
   grabCursor: true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
   breakpoints: {
      0: {
      slidesPerView: 1,
      },
      700: {
      slidesPerView: 2,
      },
      1024: {
      slidesPerView: 3,
      },
   },
});

</script>

</body>
</html>
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
  <title>Comentarios de los comensales</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
  <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />


  <link rel="stylesheet" type="text/css" href="css/comentarios.css">
</head>

<body>


  <section class="comentarios">
  <h1 class="title">Opiniones del cliente</h1>
    <div class="swiper mySwiper container">
      <div class="swiper-wrapper content">

        <div class="swiper-slide card">
          <div class="card-content">
            <div class="image">
              <img src="images/pic-1.png" alt="">
            </div>

            <div class="social-media">
              <i class="fa-brands fa-facebook"></i>
              <i class="fa-brands fa-twitter"></i>
              <i class="fa-brands fa-github"></i>
            </div>

            <div class="name-profession">
              <span class="name">Jhon Deo</span>
              <span class="profession">Mi Delicia, es increíble. La comida es deliciosa, el servicio es excelente y el ambiente es acogedor. Mi lugar favorito para cenar</span>
            </div>

            <div class="rating">
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
            </div>

            <div class="button">
    <button class="aboutMe">
        <i class="fas fa-thumbs-up"></i>Recomendado
    </button>
          </div>
          </div>
        </div>
        <div class="swiper-slide card">
          <div class="card-content">
            <div class="image">
              <img src="images/pic-2.png" alt="">
            </div>

            <div class="social-media">
              <i class="fa-brands fa-facebook"></i>
              <i class="fa-brands fa-twitter"></i>
              <i class="fa-brands fa-github"></i>
            </div>

            <div class="name-profession">
              <span class="name">Laura Morales</span>
              <span class="profession">"Nunca dejo de impresionarme  en 'Mi Delicia'. Cada plato es una  sorpresa y el personal es siempre servicial.</span>
            </div>

            <div class="rating">
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
            </div>

            <div class="button">
    <button class="aboutMe">
        <i class="fas fa-thumbs-up"></i>Recomendado
    </button>
          </div>
          </div>
        </div>
        <div class="swiper-slide card">
          <div class="card-content">
            <div class="image">
              <img src="images/img2.jpg" alt="">
            </div>

            <div class="social-media">
              <i class="fa-brands fa-facebook"></i>
              <i class="fa-brands fa-twitter"></i>
              <i class="fa-brands fa-github"></i>
            </div>

            <div class="name-profession">
              <span class="name">Sofia García</span>
              <span class="profession">Los sabores en 'Mi Delicia' son  inigualables. La frescura de los ingredientes. Definitivamente, es el lugar al que siempre vuelvo."</span>
            </div>

            <div class="rating">
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-regular fa-star"></i>
            </div>

            <div class="button">
    <button class="aboutMe">
        <i class="fas fa-thumbs-up"></i>Recomendado
    </button>
          </div>
          </div>
        </div>
        <div class="swiper-slide card">
          <div class="card-content">
            <div class="image">
              <img src="/images/img5.jpg" alt="">
            </div>

            <div class="social-media">
              <i class="fa-brands fa-facebook"></i>
              <i class="fa-brands fa-twitter"></i>
              <i class="fa-brands fa-github"></i>
            </div>

            <div class="name-profession">
              <span class="name">Mariana Torres</span>
              <span class="profession">"'Mi Delicia' es el restaurante que supera mis expectativas . La comida es deliciosa, el servicio es atento y  encantador. ¡No puedo tener suficiente de este lugar!"</span>
            </div>

            <div class="rating">
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-regular fa-star"></i>
            </div>

            <div class="button">
    <button class="aboutMe">
        <i class="fas fa-thumbs-up"></i>Recomendado
    </button>
          </div>
          </div>
        </div>
        <div class="swiper-slide card">
          <div class="card-content">
            <div class="image">
              <img src="images/pic-4.png" alt="">
            </div>

            <div class="social-media">
              <i class="fa-brands fa-facebook"></i>
              <i class="fa-brands fa-twitter"></i>
              <i class="fa-brands fa-github"></i>
            </div>

            <div class="name-profession">
              <span class="name">Andrea Rojas</span>
              <span class="profession">"El restaurante 'Mi Delicia' es un verdadero tesoro culinario. Cada plato es una obra de arte y el ambiente es relajante. No puedo recomendarlo lo suficiente."</span>
            </div>

            <div class="rating">
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-regular fa-star"></i>
            </div>

              <div class="button">
    <button class="aboutMe">
        <i class="fas fa-thumbs-up"></i>Recomendado
    </button>
          </div>
          </div>
        </div>
        <div class="swiper-slide card">
          <div class="card-content">
            <div class="image">
              <img src="images/pic-6.png" alt="">
            </div>
            <div class="name-profession">
              <span class="name">Alexa García</span>
              <span class="profession">"Mi Delicia, es increíble. La comida es deliciosa, el servicio es excelente y el ambiente es acogedor. Mi lugar favorito para cenar con amigos."</span>
            </div>
            <div class="social-media">
              <i class="fa-brands fa-facebook"></i>
              <i class="fa-brands fa-twitter"></i>
              <i class="fa-brands fa-github"></i>
            </div>


            <div class="rating">
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
            </div>
            <div class="button">
    <button class="aboutMe">
        <i class="fas fa-thumbs-up"></i>Recomendado
    </button>
          </div>
        </div>

      </div>
    </div>

    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-pagination"></div>

    <div class="regresar">
              <a class="regresar-btn" href="about.php">Regresar</a>
       
            </div>
  </section>





  <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
  <script src="js/swiper.js"></script>
</body>

</html>
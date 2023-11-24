<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <link rel="stylesheet" href="css/recetas.css">

</head>
<body>
<div class="regresar">
              <a class="regresar-btn" href="home.php">Regresar</a>
       
            </div>
<section>
    <div class="card">
    <div class="card_landing" style="--i:url(images/ceviche.jpg)">
            <h6>Ceviche</h6>
        </div>
        <div class="card_info">
            <div class="head">
                <p class="title">Ceviche</p>
                <div class="description">
                    <div class="item">
                        <i class="fa-regular fa-clock"></i>
                        <p>40 min</p>
                    </div>
                    <div class="item">
                        <i class="fa-regular fa-user"></i>
                        <p>4</p>
                    </div>
                </div>
            </div>
            

            <div class="content">
                <p class="title">Ingredientes:</p>
                <ul class="list">
                    <li>1 kilogramo de pescado</li>
                    <li>1 cebolla cortada en julianas</li>
                    <li>1 taza de caldo de pescado</li>
                    <li>1 pizca de sal y pimienta</li>
                    <li>10 limones</li>
                    <li>1 ají amarillo picado</li>
                </ul>
            </div>
        
            <div class="action">
                <a href="#" class="btn" onclick="mostrarRecetaCeviche()">Ver receta</a>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="card">
    <div class="card_yassa" style="--i:url(uploaded_img/yassa.jpg)">
            <h6>Yassa</h6>
        </div>
        <div class="card_info">
            <div class="head">
                <p class="title">Yassa</p>
                <div class="description">
                    <div class="item">
                        <i class="fa-regular fa-clock"></i>
                        <p>60 min</p>
                    </div>
                    <div class="item">
                        <i class="fa-regular fa-user"></i>
                        <p>4</p>
                    </div>
                </div>
            </div>
            

            <div class="content">
                <p class="title">Ingredientes:</p>
                <ul class="list">
                    <li>Pollo: 1 kilogramo</li>
                    <li>4 Cebollas en julianas</li>
                    <li>Mostaza: 2 a 3 cucharadas</li>
                    <li>Ajo: 3 a 4 dientes, picados</li>
                    <li>Jengibre: 1 cuchara, rallado</li>
                    <li>Pimientos picantes: A gusto</li>
                </ul>
            </div>

            <div class="action">
            <a href="#" class="btn" onclick="mostrarRecetaYassa()">Ver receta</a>   
            </div>
        </div>
    </div>
</section>
<section>
    <div class="card">
    <div class="card_sushi" style="--i:url(images/sushi.jpg)">
           <h6>Sushi</h6> 
        </div>
        <div class="card_info">
            <div class="head">
                <p class="title">Sushi</p>
                <div class="description">
                    <div class="item">
                        <i class="fa-regular fa-clock"></i>
                        <p>35 min</p>
                    </div>
                    <div class="item">
                        <i class="fa-regular fa-user"></i>
                        <p>4</p>
                    </div>
                </div>
            </div>
            

            <div class="content">
                <p class="title">Ingredientes:</p>
                <ul class="list">
                    <li>Nori (hojas de alga): Varía</li>
                    <li>Arroz para sushi: 2 tazas </li>
                    <li>MVinagre de arroz: 1/2 taza.</li>
                    <li>Pescado fresco:200 .</li>
                    <li> 1 pepino.</li>
                    <li> 1-2 aguacates.</li>
                </ul>
            </div>
          

            <div class="action">
            <a href="#" class="btn" onclick="mostrarRecetaSushi()">Ver receta</a>
            </div>
        </div>
    </div>
</section>
<div class="receta-container" id="recetaContainer">
    <h3>Preparación:</h3>
    <p id="recetaContenido"></p>
    <button id="cerrarBtn" onclick="ocultarReceta()">Cerrar</button>

</div>
<script>
    // Función para mostrar la receta y su contenido
    function mostrarReceta(contenido) {
        document.getElementById("recetaContenido").innerText = contenido;
        document.getElementById("recetaContainer").classList.add("active");
    }

    // Función para ocultar la receta
    function ocultarReceta() {
        document.getElementById("recetaContainer").classList.remove("active");
    }

    // Funciones específicas para cada receta
    function mostrarRecetaCeviche() {
        var recetaPreparacion = "Preparación del Ceviche:\n" +
            "1. Lava el pescado con agua fría para eliminar impurezas. Sécalo con cuidado y córtalo en cubos de 1 a 2 cm de diámetro. Sazona los cubos de pescado con sal y reserva.\n" +
            "2. En un recipiente no reactivo, coloca los cubos de pescado y agrega el jugo de limón recién exprimido. Asegúrate de que el jugo cubra completamente el pescado. El ácido del limón cocinará ligeramente el pescado.\n" +
            "3. Incorpora el culantro finamente picado, la cebolla morada en julianas, el ají limo picado (puedes ajustar la cantidad según tu preferencia de picante), Ajo Siba y Pimienta Sibarita al gusto. Estos ingredientes le darán frescura y sabor al ceviche.\n" +
            "4. Mezcla suavemente los ingredientes para que se integren bien. Deja reposar la mezcla en el refrigerador por al menos 5 minutos. Este tiempo permitirá que los sabores se mezclen y el pescado se marine correctamente.\n" +
            "5. Sirve el ceviche inmediatamente en un plato hondo. Puedes decorar el plato con una hoja de lechuga, trozos de camote cocido y choclo. También puedes agregar canchita serrana para un toque crujiente.\n" +
            "6. ¡Listo para disfrutar de un delicioso ceviche fresco y lleno de sabor!\n" +
            "Consejo: Utiliza pescado fresco de alta calidad y asegúrate de que todos los ingredientes estén bien refrigerados antes de preparar el ceviche.";
        
        mostrarReceta(recetaPreparacion);
    }

    function mostrarRecetaYassa() {
        var recetaPreparacion = "Preparación del Yassa:\n" +
            "1. Cortar el pollo en trozos y sazonar con sal y pimienta.\n" +
            "2. Mezclar el pollo con cebolla, mostaza, ajo picado y jengibre rallado en un tazón.\n" +
            "3. Dejar marinar en la nevera durante al menos 1 hora. Esto permitirá que los sabores se absorban.\n" +
            "4. Calentar un poco de aceite en una sartén a fuego medio-alto.\n" +
            "5. Agregar la mezcla de pollo y cebolla a la sartén y cocinar hasta que el pollo esté dorado y cocido por completo.\n" +
            "6. Puedes añadir pimientos picantes al gusto para un toque extra de sabor.\n" +
            "7. Servir el Yassa caliente sobre arroz o tu guarnición favorita.\n" +
            "8. ¡Disfruta de esta deliciosa receta de Yassa!";
        
        mostrarReceta(recetaPreparacion);
    }

    function mostrarRecetaSushi() {
        var recetaPreparacion = "Preparación del Sushi:\n" +
            "1. Cocina el arroz y mézclalo con vinagre de arroz.\n" +
            "2. Extiende una hoja de alga nori sobre una esterilla de bambú.\n" +
            "3. Humedece tus manos para evitar que el arroz se pegue y distribúyelo uniformemente sobre el alga nori.\n" +
            "4. Coloca tiras de pescado, pepino y aguacate en la parte superior del arroz.\n" +
            "5. Enrolla el alga nori con los ingredientes utilizando la esterilla de bambú como guía.\n" +
            "6. Utiliza un cuchillo afilado para cortar el rollo en porciones.\n" +
            "7. Sirve el sushi en un plato acompañado de salsa de soja y wasabi al gusto.\n" +
            "8. ¡Listo para disfrutar de tu delicioso Sushi!";
        
        mostrarReceta(recetaPreparacion);
    }
    
</script>
</body>
</html>
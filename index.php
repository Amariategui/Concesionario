<?php
// index.php
require 'router.php'; // Incluye el archivo router.php que maneja el enrutamiento
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Concesionarios MARIATEGUI</title>
    <link rel="stylesheet" href="styles.css"> <!-- Enlace al archivo de estilos CSS -->
</head>
<body>

<header>
    <h1>Concesionarios MARIATEGUI</h1> <!-- Título principal de la página -->
</header>

<a href="login.php"><button id="login-button">Iniciar Sesión</button></a> <!-- Botón para iniciar sesión, enlazado a login.php -->

<div class="slideshow-container">
    <div class="mySlides">
        <img src="img/mercedes.png" alt="Imagen 1"> <!-- Imagen del slideshow, Mercedes -->
    </div>
    <div class="mySlides">
        <img src="img/seat.png" alt="Imagen 2"> <!-- Imagen del slideshow, SEAT -->
    </div>
    <div class="mySlides">
        <img src="img/toyota.png" alt="Imagen 3"> <!-- Imagen del slideshow, Toyota -->
    </div>
</div>

<div class="car-logos">
    <div class="car-logo">
        <img src="logos/audi.png" alt="Logo 1"> <!-- Logo de Audi -->
        <p>Audi</p> <!-- Nombre de la marca -->
    </div>
    <div class="car-logo">
        <img src="logos/ford.png" alt="Logo 2"> <!-- Logo de Ford -->
        <p>Ford</p> <!-- Nombre de la marca -->
    </div>
    <div class="car-logo">
        <img src="logos/honda.png" alt="Logo 3"> <!-- Logo de Honda -->
        <p>Honda</p> <!-- Nombre de la marca -->
    </div>
    <div class="car-logo">
        <img src="logos/lambo.png" alt="Logo 4"> <!-- Logo de Lamborghini -->
        <p>Lamborguini</p> <!-- Nombre de la marca (corregido el nombre) -->
    </div>
    <div class="car-logo">
        <img src="logos/skoda.png" alt="Logo 5"> <!-- Logo de Skoda -->
        <p>Skoda</p> <!-- Nombre de la marca -->
    </div>
    <div class="car-logo">
        <img src="logos/toyota.png" alt="Logo 6"> <!-- Logo de Toyota -->
        <p>Toyota</p> <!-- Nombre de la marca -->
    </div>
</div>

<footer>
    <p>Síguenos en nuestras redes sociales:</p>
    <p>Facebook | Twitter | Instagram</p>
</footer>

<script>
    let slideIndex = 0;
    showSlides();

    function showSlides() {
        let slides = document.getElementsByClassName("mySlides");
        for (let i = 0; i < slides.length; i++) {
            slides[i].style.display = "none"; // Oculta todas las imágenes del slideshow
        }
        slideIndex++;
        if (slideIndex > slides.length) { slideIndex = 1 } // Reinicia el índice si es mayor que el número de slides
        slides[slideIndex - 1].style.display = "block"; // Muestra la imagen actual del slideshow
        setTimeout(showSlides, 5000); // Cambia a la siguiente imagen cada 5 segundos
    }
</script>

</body>
</html>

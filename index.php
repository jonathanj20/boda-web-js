<?php
include 'connection_bd.php'
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="/dist/styles.css">
  <script src="https://kit.fontawesome.com/675de417d6.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <link rel="stylesheet" href="/src/fuentes.css">
</head>

<body>
  <header class="bg-white fixed w-full top-0 z-10">
    <div class="p-2 flex justify-between items-center md:flex-row-reverse md:w-8/12 md:mx-auto">
      <button class="border-2 p-1 border-black md:hidden" id="btnOpen">
        <svg class="h-8 w-8" data-slot="icon" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"></path>
        </svg>
      </button>
      <button id="btnClose" class="relative hidden border-2 border-black">
        <svg class="h-10 w-10" data-slot="icon" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"></path>
        </svg>
      </button>
      <nav class="hidden md:flex space-x-2">
        <ul class="flex space-x-6 font-montserrat uppercase">
          <li><a href="#outfit" class="hover:text-violet-600 menu-link">Vestimenta</a></li>
          <li><a href="#gallery" class="hover:text-violet-600 menu-link">Galería</a></li>
          <li><a href="#location" class="hover:text-violet-600 menu-link">Ubicación</a></li>
          <li><a href="#contact" class="hover:text-violet-600 menu-link">Contacto</a></li>
        </ul>
      </nav>
      <a href="#"><img src="../images/logoboda.png" alt="logo" class="hover:rotate-12 menu-link"></a>
    </div>
    <nav class="bg-fuchsia-200 w-full relative top-0 left-0 h-0 shadow-[0_h-full_0_0_rgba(0,0,0,0.5)] transition-all delay-100 ease-in-out overflow-hidden" id="nav">
      <div class="hidden" id="listContainer">
        <ul class="space-y-6 flex flex-col text-center py-5 font-montserrat uppercase">
          <li><a href="#outfit" class="link-nav hover:text-white transition-all menu-link">Vestimenta</a></li>
          <li><a href="#gallery" class="link-nav hover:text-white transition-all menu-link">Galería</a></li>
          <li><a href="#location" class="link-nav hover:text-white transition-all menu-link">Ubicación</a></li>
          <li><a href="#contact" class="link-nav hover:text-white transition-all menu-link">Contacto</a></li>
        </ul>
      </div>
    </nav>
  </header>
  <main class="mt-16 overflow-hidden">
    <section class="bg-[url('../images/background1.jpg')] bg-cover bg-no-repeat p-7">
      <div class="space-y-4 mb-5">
        <form action="" method="post">
          <label for="namePerson" class="block text-center font-monserrat uppercase">Ingrese su nombre y apellido</label>
          <div class="space-y-3 sm:flex sm:justify-center sm:items-center sm:space-y-0">
            <input type="text" placeholder="Ejemplo: Diego González" class="outline-none block mx-auto sm:mx-2" id="namePerson" name="guestName" />
            <button class="block mx-auto border-2 border-gray-500 rounded px-2 py-1 sm:mx-2" id="invitationsBtn" name="btnAceptar">Aceptar</button>
          </div>
        </form>
      </div>
      <div class="border-8 border-double border-amber-200 bg-white w-2/3 mx-auto space-y-4 p-3 bg-[url('../images/marcopase2.jpg')] bg-cover bg-no-repeat text-center font-monserrat" data-aos="zoom-in" data-aos-duration="2000">
        <h2 class="uppercase -tracking-tight">invitación para</h2>
        <?php
        if (isset($_POST['btnAceptar'])) {
          $nameGuest = $_POST['guestName'];

          /*mysqli_query ejecuta una consulta en la base de datos.
          Aquí se está ejecutando un select y si encuentra el resultado se guarda la fila en la variable
          result*/
          $result = mysqli_query($connection, "SELECT * FROM guests WHERE nameGuest='$nameGuest'");
          $existsUser = false;

          /**la función mysqli_fetch_array
           * Recupera una fila de resultados como un array asociativo, un array numérico  */
          while ($fila = mysqli_fetch_array($result)) {
            echo '<p class="text-4xl font-allura">' . $fila[1] . '</p>';

            if ($fila[3] > 0) {
              echo '<p class="uppercase">Adultos - ' . $fila[2] . '</p>';
              echo ' <p class="uppercase">Niños - ' . $fila[3] . '</p>';
            } else {
              echo '<p class="uppercase">Adultos</p>';
              echo '<p class="text-2xl">' . $fila[2] . '</p>';
            }

            echo '<div class="text-justify text-xs md:text-sm md:text-center font-montserrat">Los pases son personales e intransferibles con verificación en recepción.</div>';

            $existsUser = true;
          }

          if (!$existsUser) {
            echo '<p>No existe el invitado o el nombre fue escrito incorrectamente</p>';
          }
        }
        ?>
      </div>
    </section>
    <section>
      <audio src="../audio/si_tu_quieres.mp3" controls class="w-full bg-fuchsia-400"></audio>
    </section>
    <section class="p-3 w-3/4 mx-auto mt-5 border-8 border-amber-200 font-serif">
      <div>
        <p class="text-center font-allura text-6xl my-3 font-bold">¡Nos casamos!</p>
        <p class="font-montserrat mx-auto w-3/4 md:w-2/4 text-justify">Damos gracias a Dios por el gran privilegio de encontrarnos. Hoy, con el profundo amor que sentimos, hemos decidido unir nuestras vidas en matrimonio.</p>
      </div>
      <div data-aos="zoom-in" data-aos-duration="2000">
        <img src="../images/novios_prueba.png" alt="novios" class="w-60 md:w-80 mx-auto mt-5 rounded-full transition-all ease-in-out delay-75 hover:scale-110 cursor-pointer img">
      </div>
      <div class="mt-5">
        <p class="uppercase text-center text-base my-4">Los novios</p>
        <p class="mt-2 text-center font-bold text-4xl md:text-6xl font-alexbrush">Mercedes & Victor</p>
      </div>
      <div class="mt-5">
        <p class="text-center font-montserrat uppercase">Tenemos el honor de invitarlos a nuestra boda</p>
        <div class="text-center p-2 border-2 border-violet-500 mt-3 max-w-2xl mx-auto uppercase font-montserrat text-xl md:text-2xl" data-aos="zoom-in-up" data-aos-duration="2000">
          19 | octubre | 2024
        </div>
      </div>
    </section>
    <section class="bg-[url('../images/background1.jpg')] bg-cover bg-no-repeat p-7 mt-5 font-montserrat">
      <div class="h-16">
        <div class="flex justify-center items-center uppercase">
          <h2 class="text-center text-base md:text-xl ms-3 font-bold">En compañía de nuestros padres</h2>
        </div>
      </div>
      <div class="flex flex-col gap-y-11 mx-auto text-center sm:flex-row sm:w-3/6 sm:justify-between font-montserrat">
        <div data-aos="fade-down-right" data-aos-duration="2000">
          <p class="uppercase">Padres de la novia</p>
          <p class="text-base mt-3">Antonia Domínguez</p>
          <p class="text-base">Salvador Posada</p>
        </div>
        <div data-aos="fade-down-left" data-aos-duration="2000">
          <p class="uppercase">Padres del novio</p>
          <p class="text-base mt-3">Sandra Sicairos</p>
          <p class="text-base">Valentín Moreno <i class="fa-solid fa-cross"></i></p>
        </div>
      </div>
    </section>
    <section>
      <p class="uppercase font-montserrat text-center mt-2 text-violet-500 font-bold">Tú cuidaras de mí, yo de tí y Dios de nosotros.</p>
    </section>
    <section class="p-7 w-10/12 bg-white mx-auto mt-5 border-8 border-amber-200 font-serif text-center" id="outfit">
      <div class="h-14 mb-10 sm:mb-15">
        <div>
          <i class="fa-solid fa-champagne-glasses text-3xl"></i>
          <h2 class="font-rubik">Código de vestimenta</h2>
          <p class="text-center text-xl">Formal</p>
        </div>
      </div>
      <div class="space-y-16 sm:flex sm:flex-row sm:space-y-0 sm:w-3/6 sm:justify-between mx-auto font-bonodi text-xl mt-14">
        <div data-aos="zoom-in-right" data-aos-duration="2000">
          <img src="../images/vestido.png" alt="vestido para mujer" class="mx-auto" div>
          <p class="uppercase text-lg">Mujeres</p>
          <ul class="list-disc w-40 mx-auto mt-3 text-start">
            <li>
              <p>Vestido largo</p>
            </li>
            <li class="w-52">Conjunto de vestir</li>
            <li>
              <p class="ms-1">Evitar blanco, claro y rojo</p>
            </li>
          </ul>
        </div>
        <div data-aos="zoom-in-left" data-aos-duration="2000">
          <img src="../images/traje.png" alt="traje para hombre" class="mx-auto">
          <p class="uppercase text-lg">Hombres</p>
          <ul class="list-disc w-40 mx-auto mt-3">
            <li class="text-start">
              <p class="ms-1">Traje completo</p>
            </li>
            <li>Camisa de vestir</li>
            <li class="w-52 text-start">
              <p class="ms-1">Corbata y zapatos de colores oscuros</p>
            </li>
          </ul>
        </div>
      </div>
    </section>
    <section class="bg-[url('../images/background1.jpg')] bg-cover bg-no-repeat p-5 mt-5" id="gallery">
      <div class="flex justify-center items-center">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-3 h-10 w-10 inline-block">
          <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 0 1 5.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 0 0-1.134-.175 2.31 2.31 0 0 1-1.64-1.055l-.822-1.316a2.192 2.192 0 0 0-1.736-1.039 48.774 48.774 0 0 0-5.232 0 2.192 2.192 0 0 0-1.736 1.039l-.821 1.316Z" />
          <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0ZM18.75 10.5h.008v.008h-.008V10.5Z" />
        </svg>
        <h2 class="ms-3 font-montserrat uppercase font-bold">Galería de fotos</h2>
      </div>
      <div class="space-y-7 flex items-center flex-col bg-white py-10 md:space-y-0 md:grid md:place-items-center md:grid-cols-2 md:p-10 md:gap-5 lg:grid-cols-4 mt-5">
        <?php
        $srcs = array(
          "../images/fondo_8.jpg",
          "../images/fondo_10.png",
          "../images/fondo_11.png",
          "../images/fondo2.jpeg",
          "../images/fondo4.jpeg",
          "../images/novios_prueba.png",
          "../images/background1.jpg",
          "../images/background2.jpg"
        );

        foreach ($srcs as $src) {
          echo "<div class='transition-all ease-in-out delay-75 hover:scale-110 cursor-pointer'>
                  <img src=$src class='w-9/12 md:w-72 md:h-72 border-8 border-amber-200 mx-auto img-gallery' data-aos='flip-left' data-aos-duration='2000' />
                </div>";
        }
        ?>
      </div>
      <div class="hidden bg-black bg-opacity-30 p-5 fixed left-0 right-0 bottom-0 top-0 z-20 mx-auto" id="fullImageContainer">
        <button class="border-2 border-black hover:border-white hover:text-white" id="btnCloseFullImage">
          <svg class="h-10 w-10" data-slot="icon" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"></path>
          </svg>
        </button>
        <div class="hidden md:flex items-center justify-between">
          <button class="border-2 border-black hover:border-white hover:text-white" id="backButton">
            <svg class="w-10 h-10" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
            </svg>
          </button>
          <button class="border-2 border-black hover:border-white hover:text-white" id="advanceButton">
            <svg class="w-10 h-10" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
            </svg>
          </button>
        </div>
        <div class="swiper">
          <div class="swiper-wrapper">
            <?php
            $srcSlides = array(
              "../images/fondo_8.jpg",
              "../images/fondo_10.png",
              "../images/fondo_11.png",
              "../images/fondo2.jpeg",
              "../images/fondo4.jpeg",
              "../images/novios_prueba.png",
              "../images/background1.jpg",
              "../images/background2.jpg"
            );

            foreach ($srcSlides as $src) {
              echo "<div class='swiper-slide'>
                      <img src=$src class='w-9/12 h-80 md:mx-auto md:h-96 md:w-96 block mx-auto' />
                    </div>";
            }
            ?>
          </div>
        </div>
        <p class="text-center font-bold text-white" id="numberImage"></p>
      </div>
    </section>
    <section class="text-center bg-[url('../images/copasvino3.png')] bg-cover bg-no-repeat bg-center py-5" id="location">
      <div class="flex justify-center">
        <i class="fa-solid fa-location-dot text-white text-3xl"></i>
        <h2 class="text-white ms-3 font-rubik uppercase text-xl">Itinerario</h2>
      </div>
      <div class="space-y-16 md:flex md:space-y-0 md:items-center mt-5">
        <div class="border-8 p-5 border-amber-200 bg-slate-50 w-10/12 mx-auto md:w-2/6" data-aos="flip-left"
          data-aos-easing="ease-out-cubic"
          data-aos-duration="2000">
          <div class="flex justify-center items-center mb-5">
            <i class="fa-solid fa-church text-xl hover:text-purple-500 cursor-pointer"></i>
            <p class="ms-3 font-serif uppercase">Ceremonia religiosa</p>
          </div>
          <img src="../images/iglesia.jpg" alt="Iglesia" class="mb-5 mx-auto md:w-72 md:h-72 transition-all ease-in-out delay-75 hover:scale-110 cursor-pointer img">
          <p class="font-montserrat">Igleisa Betlehem</p>
          <p class="font-montserrat">5:15 PM</p>
          <img src="../images/separator2.png" alt="separador" class="mx-auto">
          <p class="font-montserrat">16 de Sept. y Padre Kino, Guerrero, 23020, La Paz, B.C.S.</p>
          <a class="block border-2 border-purple-500 bg-purple-400 p-3 mt-3 text-white hover:bg-white hover:text-purple-500 transition-all ease-in-out delay-75 rounded-md font-montserrat" href="https://www.google.com/maps/dir/24.144887,-110.297585/iglesia+bethlehem+ubicacion+la+paz/@24.1467437,-110.3005277,17z/data=!3m1!4b1!4m9!4m8!1m1!4e1!1m5!1m1!1s0x86afd3ef2462056f:0x5c00fbf878a18bab!2m2!1d-110.2987049!2d24.1486938?entry=ttu" target="_blank">Ver en GPS</a>
        </div>
        <div class="border-8 p-5 border-amber-200 bg-slate-50 w-10/12 mx-auto md:w-2/6" data-aos="flip-right"
          data-aos-easing="ease-out-cubic"
          data-aos-duration="2000">
          <div class="flex justify-center mb-5">
            <i class="fa-solid fa-map-pin text-xl hover:text-purple-500 cursor-pointer"></i>
            <p class="ms-3 font-serif uppercase">Recepción</p>
          </div>
          <img src="../images/sotres2.jpg" alt="Iglesia" class="mb-5 mx-auto md:w-72 md:h-72 transition-all ease-in-out delay-75 hover:scale-110 cursor-pointer img font-serif">
          <p class="font-montserrat">Salón Sotres</p>
          <p class="font-montserrat">8:30 PM</p>
          <img src="../images/separator2.png" alt="separador" class="mx-auto">
          <p class="font-montserrat">Pichilingue 19, Los Tabachines, 23048 La Paz, B.C.S.</p>
          <a class="block border-2 border-purple-500 bg-purple-400 p-3 mt-3 text-white hover:bg-white hover:text-purple-500 transition-all ease-in-out delay-75 rounded-md font-montserrat" href="https://www.google.com/maps/dir//Pichilingue+19,+Los+Tabachines,+23048+La+Paz,+B.C.S./@24.0679118,-110.3860395,12z/data=!4m8!4m7!1m0!1m5!1m1!1s0x86afcd66e6c76e9f:0x38a840618f577975!2m2!1d-110.3036379!2d24.0679339?entry=ttu" target="_blank">Ver en GPS</a>
        </div>
      </div>
    </section>
    <section class="p-5 mt-5">
      <h2 class="uppercase text-center text-xl font-montserrat">solo adultos</h2>
      <div class="w-96 md:w-[40rem] mx-auto mt-2">
        <p class="font-montserrat text-justify mt-2">Aunque amamos a sus pequeños, este es un evento sólo para adultos y jóvenes mayores de 15 años. Esperamos contar con su presencia y a los niños les deseamos dulces sueños en casita.</p>
      </div>
    </section>
    <section>
      <p class="font-montserrat uppercase text-center font-bold">El amor nunca se da por vencido, jamás pierde la fe, siempre tiene esperanzas y se mantiene firme en todas circunstancias.</p>
      <p class="text-center uppercase font-bold">1 Corintios 13:7</p>
    </section>
    <section class="p-5 text-center mt-5" id="contact">
      <div class="flex justify-center">
        <i class="fa-regular fa-calendar-check text-2xl hover:text-purple-500 cursor-pointer"></i>
        <h2 class="ms-3 font-montserrat uppercase font-bold">Confirmación de asistencia</h2>
      </div>
      <div class="border-4 border-purple-600 p-7 my-5 space-y-5 md:w-2/5 mx-auto" data-aos="flip-up" data-aos-duration="2000">
        <i class="fa-brands fa-whatsapp fa-bounce fa-5x mt-5" style="color: #8d11ca;"></i>
        <p class="font-montserrat">Confirmar por WhatsApp</p>
        <a href="https://wa.me/526121408800" target="_blank" class="block text-white text-lg bg-purple-400 border-2 border-purple-500 p-2 rounded-md hover:bg-white hover:text-purple-500 transition-all ease-in-out delay-75 font-montserrat">Con Mercedes</a>
        <a href="https://wa.me/5216121316339" target="_blank" class="block text-white text-lg bg-purple-400 border-2 border-purple-500 p-2 rounded-md hover:bg-white hover:text-purple-500 transition-all ease-in-out delay-75 font-montserrat">Con Victor</a>
      </div>
    </section>
    <div class="hidden bg-black bg-opacity-30 p-5 fixed left-0 right-0 bottom-0 top-0 z-30 mx-auto" id="containerFullImg">
      <button class="border-2 border-black hover:border-white hover:text-white" id="btnCloseNormalImg">
        <svg class="h-10 w-10" data-slot="icon" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"></path>
        </svg>
      </button>
      <img class="mx-auto md:h-96 md:w-96" id="fullNormalImg" />
    </div>

    <script type="module" src="/src/swiper.js"></script>
    <script src="/src/menu.js"></script>
    <script src="/src/photos.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
</body>

</html>
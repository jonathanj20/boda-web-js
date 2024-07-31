<?php
include 'connection_bd.php'
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../dist/styles.css">
</head>

<body class="transition-opacity">
  <header class="p-2 flex justify-between items-center md:flex-row-reverse md:w-8/12 md:mx-auto">
    <button class="border-8 p-1 border-black md:hidden" id="btnOpen">
      <svg class="h-8 w-8" data-slot="icon" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"></path>
      </svg>
    </button>
    <button id="btnClose" class="relative hidden border-8 border-black">
      <svg class="h-10 w-10" data-slot="icon" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"></path>
      </svg>
    </button>
    <nav class="hidden md:flex space-x-2">
      <ul class="flex space-x-6">
        <li><a href="#outfit" class="hover:text-violet-600 menu-link">Vestimenta</a></li>
        <li><a href="#gallery" class="hover:text-violet-600 menu-link">Galería</a></li>
        <li><a href="#" class="hover:text-violet-600 menu-link">Ubicación</a></li>
        <li><a href="#" class="hover:text-violet-600 menu-link">Contacto</a></li>
      </ul>
    </nav>
    <img src="../images/logoboda.png" alt="logo" class="hover:rotate-12">
  </header>
  <main class="">
    <nav class="bg-violet-300 py-5 w-screen relative top-0 left-0 hidden shadow-[0_h-full_0_0_rgba(0,0,0,0.5)]" id="nav">
      <ul class="space-y-6 flex flex-col text-center">
        <li><a href="#outfit" class="link-nav hover:text-white transition-all menu-link">Vestimenta</a></li>
        <li><a href="#gallery" class="link-nav hover:text-white transition-all menu-link">Galería</a></li>
        <li><a href="#" class="link-nav hover:text-white transition-all menu-link">Ubicación</a></li>
        <li><a href="#" class="link-nav hover:text-white transition-all menu-link">Contacto</a></li>
      </ul>
    </nav>
    <section class="bg-[url('../images/background1.jpg')] bg-cover bg-no-repeat p-7">
      <div class="space-y-4 mb-5">
        <form action="" method="post">
          <label for="namePerson" class="block text-center font-mono uppercase">Ingrese su nombre completo</label>
          <div class="space-y-3 sm:flex sm:justify-center sm:items-center sm:space-y-0">
            <input type="text" placeholder="Ingrese su nombre" class="outline-none block mx-auto sm:mx-2" id="namePerson" name="guestName" />
            <button class="block mx-auto border-2 border-gray-500 rounded px-2 py-1 sm:mx-2" id="invitationsBtn" name="btnAceptar">Aceptar</button>
          </div>
        </form>
      </div>
      <div class="border-4 border-amber-200 bg-white w-8/12 mx-auto space-y-4 p-3 text-center font-mono">
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
            echo '<p class="text-2xl">' . $fila[1] . '</p>';
            echo '<p class="uppercase">Adultos - ' . $fila[2] . '</p>';

            if ($fila[3] > 0) {
              echo ' <p class="uppercase">Niños - ' . $fila[3] . '</p>';
            }

            echo '<p class="uppercase">Número de mesa - ' . $fila[4] . '</p>';

            $existsUser = true;
          }

          if (!$existsUser) {
            echo 'No existe el invitado o el nombre fue escrito incorrectamente';
          }
        }
        ?>
      </div>
    </section>
    <section>
      <audio src="../audio/musica_prueba_boda.mp3" controls class="w-full bg-fuchsia-400"></audio>
    </section>
    <section class="p-7 w-10/12 bg-white mx-auto mt-5 border-8 border-amber-200 font-serif">
      <div>
        <p class="text-center text-lg">Boda de</p>
        <p class="text-center font-bold text-4xl">Mercedes & Victor</p>
      </div>
      <div>
        <img src="../images/novios_prueba.png" alt="novios" class="w-60 mx-auto mt-8 rounded-full transition-all ease-in-out delay-75 hover:scale-110">
      </div>
      <div class="mt-5">
        <p class="text-center">Te esperámos el</p>
        <div class="text-center p-2 border-2 border-violet-500 mt-3 max-w-2xl mx-auto">
          5 de abril del 2023
        </div>
      </div>
    </section>
    <section class="bg-[url('../images/background1.jpg')] bg-cover bg-no-repeat p-7 mt-5">
      <div class="h-20 mb-10">
        <h2 class="text-center text-xl">Nuestros padres</h2>
        <img src="../images/separator.png" alt="separator" class="mx-auto relative bottom-20">
      </div>
      <div class="flex flex-col gap-y-11 mx-auto text-center sm:flex-row sm:w-3/6 sm:justify-between">
        <div>
          <p class="text-2xl">Antonia y Salvador</p>
          <p>Padres de la novia</p>
        </div>
        <div>
          <p class="text-2xl">Sandra y Valentín</p>
          <p>Padres del novio</p>
        </div>
      </div>
    </section>
    <section class="p-7 w-10/12 bg-white mx-auto mt-5 border-8 border-amber-200 font-serif text-center" id="outfit">
      <div class="h-14 mb-5 sm:mb-15">
        <h2>Código de vestimenta</h2>
        <img src="../images/separator2.png" alt="separator" class="mx-auto relative bottom-14">
      </div>
      <div class="space-y-16 sm:flex sm:flex-row sm:space-y-0 sm:w-3/6 sm:justify-between mx-auto">
        <div>
          <img src="../images/vestido.png" alt="vestido para mujer" class="mx-auto">
          <p>Para mujeres</p>
          <p>Vestido o traje formal</p>
        </div>
        <div>
          <img src="../images/traje.png" alt="traje para hombre" class="mx-auto">
          <p>Para hombres</p>
          <p>Traje formal o camisa</p>
        </div>
      </div>
    </section>
    <section class="bg-[url('../images/background1.jpg')] bg-cover bg-no-repeat p-5 mt-5" id="gallery">
      <h2 class="text-center my-5">Galería de fotos</h2>
      <div class="space-y-7 flex items-center flex-col bg-white py-10 md:space-y-0 md:grid md:place-items-center md:grid-cols-2 md:p-10 md:gap-5 lg:grid-cols-4">
        <img src="../images/fondo_8.jpg" alt="" class="w-9/12 md:w-72 md:h-72 border-8 border-amber-200 transition-all ease-in-out delay-75 hover:scale-110 cursor-pointer img-gallery" />
        <img src="../images/fondo_10.png" alt="" class="w-9/12 md:w-72 md:h-72 border-8 border-amber-200 transition-all ease-in-out delay-75 hover:scale-110 cursor-pointer img-gallery" />
        <img src="../images/fondo_11.png" alt="" class="w-9/12 md:w-72 md:h-72 border-8 border-amber-200 transition-all ease-in-out delay-75 hover:scale-110 cursor-pointer img-gallery" />
        <img src="../images/fondo2.jpeg" alt="" class="w-9/12  md:w-72 md:h-72 border-8 border-amber-200 transition-all ease-in-out delay-75 hover:scale-110 cursor-pointer img-gallery" />
        <img src="../images/fondo4.jpeg" alt="" class="w-9/12 md:w-72 md:h-72 border-8 border-amber-200 transition-all ease-in-out delay-75 hover:scale-110 cursor-pointer img-gallery" />
        <img src="../images/novios_prueba.png" alt="" class="w-9/12 md:w-72 md:h-72 border-8 border-amber-200 transition-all ease-in-out delay-75 hover:scale-110 cursor-pointer img-gallery" />
        <img src="../images/background1.jpg" alt="" class="w-9/12 md:w-72 md:h-72 border-8 border-amber-200 transition-all ease-in-out delay-75 hover:scale-110 cursor-pointer img-gallery" />
        <img src="../images/background2.jpg" alt="" class="w-9/12 md:w-72 md:h-72 border-8 border-amber-200 transition-all ease-in-out delay-75 hover:scale-110 cursor-pointer img-gallery" />
      </div>
      <div class="hidden bg-black bg-opacity-30 p-5 fixed left-0 right-0 bottom-0 top-0 mx-auto" id="fullImageContainer">
        <button class="border-8 border-black hover:border-white hover:text-white" id="btnCloseFullImage">
          <svg class="h-10 w-10" data-slot="icon" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"></path>
          </svg>
        </button>
        <div class="hidden md:flex items-center justify-between">
          <button class="border-8 border-black hover:border-white hover:text-white" id="backButton">
            <svg class="w-10 h-10" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
            </svg>
          </button>
          <button class="border-8 border-black hover:border-white hover:text-white" id="advanceButton">
            <svg class="w-10 h-10" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
            </svg>
          </button>
        </div>
        <img class="md:mx-auto md:h-96 md:w-96" id="fullImg" />
        <p class="text-center font-bold" id="numberImage"></p>
      </div>
    </section>
    <section class="text-center bg-[url('../images/copasvino3.png')] bg-cover bg-no-repeat bg-center">
      <h2 class="text-white font-bold">Ubicaciones y horarios</h2>
      <img src="../images/separator2.png" alt="separador" class="mx-auto relative bottom-14">
      <div class="space-y-16 md:flex md:space-y-0 my-auto md:items-center">
        <div class="border-8 p-5 border-amber-200 bg-slate-50  w-10/12 mx-auto md:w-2/6 h-50">
          <p class="mb-5">Ceremonia religiosa</p>
          <img src="../images/iglesia.jpg" alt="Iglesia" class="mb-5 mx-auto md:w-72 md:h-72 transition-all ease-in-out delay-75 hover:scale-110 cursor-pointer">
          <p>Igleisa Betlehem</p>
          <p>6:00 PM</p>
          <img src="../images/separator2.png" alt="separador" class="mx-auto">
          <p>Padre kino, 16 de Septiembre esq, Guerrero, 23020 La Paz, B.C.S.</p>
          <a class="block border-2 border-purple-600 bg-purple-300 p-3 mt-3 text-white" href="https://www.google.com/maps/dir/24.144887,-110.297585/iglesia+bethlehem+ubicacion+la+paz/@24.1467437,-110.3005277,17z/data=!3m1!4b1!4m9!4m8!1m1!4e1!1m5!1m1!1s0x86afd3ef2462056f:0x5c00fbf878a18bab!2m2!1d-110.2987049!2d24.1486938?entry=ttu" target="_blank">Ver en GPS</a>
        </div>
        <div class="border-8 p-5 border-amber-200 bg-slate-50 w-10/12 mx-auto md:w-2/6 object-cover">
          <p class="mb-5">Recepción</p>
          <img src="../images/sotres2.jpg" alt="Iglesia" class="mb-5 mx-auto md:w-72 md:h-72 transition-all ease-in-out delay-75 hover:scale-110 cursor-pointer">
          <p>Salón Sotres</p>
          <p>6:00 PM</p>
          <img src="../images/separator2.png" alt="separador" class="mx-auto">
          <p>Pichilingue 19, Los Tabachines, 23048 La Paz, B.C.S.</p>
          <a class="block border-2 border-purple-600 bg-purple-300 p-3 mt-3 text-white" href="https://www.google.com/maps/dir//Pichilingue+19,+Los+Tabachines,+23048+La+Paz,+B.C.S./@24.0679118,-110.3860395,12z/data=!4m8!4m7!1m0!1m5!1m1!1s0x86afcd66e6c76e9f:0x38a840618f577975!2m2!1d-110.3036379!2d24.0679339?entry=ttu" target="_blank">Ver en GPS</a>
        </div>
      </div>
    </section>
  </main>
  <script src="menu.js"></script>
  <script src="gallery.js"></script>
</body>

</html>
//convierto el HTMLCollection a array, para poder usar el metodo findIndex
const imgGallery = Array.from(document.getElementsByClassName('img-gallery'));
const fullImg = document.getElementById('fullImg');
const fullImageContainer = document.getElementById('fullImageContainer');
const btnCloseFullImage = document.getElementById('btnCloseFullImage');
const backButton = document.getElementById('backButton');
const advanceButton = document.getElementById('advanceButton');
//numberImage es el parrafo para ir mostrando el número de imagen que voy viendo en la galería
const numberImage = document.getElementById('numberImage');

let currentIndexImage = 0;
let imageSelected = false;

for (let img of imgGallery) {
    img.addEventListener("click", () => {
        showFullImage(img.src);
        //obtengo el indice de la imagen actual
        currentIndexImage = imgGallery.findIndex(img => img.src === fullImg.src);
        numberImage.innerHTML = `Imagen ${currentIndexImage + 1} de ${imgGallery.length}`;
        numberImage.style.color = '#fff';
        imageSelected = true;
    });
}

function showFullImage(src) {
    fullImageContainer.classList.remove('hidden');
    fullImg.src = src;
}

btnCloseFullImage.addEventListener("click", () => {
    fullImageContainer.classList.add('hidden');
    imageSelected = false;
});


/*cuando le doy al boton de avanzar, el indice de
la imagen actual aumenta y se llama a la función showFullImage
con el src de la imagen actual*/
backButton.addEventListener("click", backGallery);

/*cuando le doy al boton de atrás, el indice de
la imagen actual se resta y se llama a la función showFullImage
con el src de la imagen actual*/
advanceButton.addEventListener("click", advanceGallery);

document.addEventListener("keydown", (e) => {
    if (e.key === 'ArrowLeft' && imageSelected) {
        backGallery();
    } else if (e.key === 'ArrowRight' && imageSelected) {
        advanceGallery();
    } else if (e.key === 'Escape') {
        fullImageContainer.classList.add('hidden');
        imageSelected = false;
    }
});

function advanceGallery() {
    if (currentIndexImage < imgGallery.length - 1) {
        currentIndexImage++;
    } else {
        currentIndexImage = 0;
    }

    showFullImage(imgGallery[currentIndexImage].src);
    numberImage.innerHTML = `Imagen ${currentIndexImage + 1} de ${imgGallery.length}`;
}

function backGallery() {
    if (currentIndexImage > 0) {
        currentIndexImage--;
    } else {
        currentIndexImage = imgGallery.length - 1;
    }

    showFullImage(imgGallery[currentIndexImage].src);
    numberImage.innerHTML = `Imagen ${currentIndexImage + 1} de ${imgGallery.length}`;
}

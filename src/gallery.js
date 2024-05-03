const imgGallery = document.getElementsByClassName('img-gallery');
const fullImg = document.getElementById('fullImg');
const fullImageContainer = document.getElementById('fullImageContainer');
const btnCloseFullImage = document.getElementById('btnCloseFullImage');
const backButton = document.getElementById('backButton');
const advanceButton = document.getElementById('advanceButton');

let indexImages = [];
let currentIndexImage = 0;

for (let img of imgGallery) {
    img.addEventListener("click", () => {
        showFullImage(img.src);
        getCurrentImage();
    });

}

function showFullImage(src) {
    fullImageContainer.classList.remove('hidden');
    fullImg.src = src;
}

btnCloseFullImage.addEventListener("click", () => {
    fullImageContainer.classList.add('hidden');
});

//obtengo la imagen actual
function getCurrentImage() {
    for (let i = 0; i < imgGallery.length; i++) {
        if (imgGallery[i].src === fullImg.src) {
            currentIndexImage = i;
        }
    }
}

/*cuando le doy al boton de avanzar, el indice de
la imagen actual aumenta y se llama a la función showFullImage
con el src de la imagen actual*/
backButton.addEventListener("click", () => {
    if (currentIndexImage > 0) {
        currentIndexImage--;
    }

    showFullImage(imgGallery[currentIndexImage].src);
});

/*cuando le doy al boton de atr+as, el indice de
la imagen actual se resta y se llama a la función showFullImage
con el src de la imagen actual*/
advanceButton.addEventListener("click", () => {
    if (currentIndexImage < 7) {
        currentIndexImage++;
    }

    showFullImage(imgGallery[currentIndexImage].src);
});
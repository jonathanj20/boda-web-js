import Swiper from 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.mjs';

const imgGallery = Array.from(document.querySelectorAll('.img-gallery'));
const fullImageContainer = document.getElementById('fullImageContainer');
const btnCloseFullImage = document.getElementById('btnCloseFullImage');
const numberImage = document.getElementById('numberImage');
const backButton = document.getElementById('backButton');
const advanceButton = document.getElementById('advanceButton');

let currentIndexImage = 0;

for (let img of imgGallery) {
    img.addEventListener("click", () => {
        fullImageContainer.classList.remove('hidden');
        currentIndexImage = imgGallery.findIndex(image => image === img);
        showSwiper();
        numberImage.innerHTML = `Imagen ${currentIndexImage + 1} de ${imgGallery.length}`;
    });
}

btnCloseFullImage.addEventListener("click", () => closeContainer());

document.addEventListener("keydown", (e) => {
    if (e.key === 'Escape') {
        closeContainer();
    }
});

function showSwiper() {
    const swiper = new Swiper('.swiper', {
        allowTouchMove: true,
        initialSlide: currentIndexImage,
        keyboard: true,
    });

    swiper.on('slideChange', () => {
        numberImage.innerHTML = `Imagen ${swiper.activeIndex + 1} de ${imgGallery.length}`;
    })

    advanceButton.addEventListener("click", () => swiper.slideNext());
    backButton.addEventListener("click", () => swiper.slidePrev());
}

function closeContainer() {
    fullImageContainer.classList.add('hidden');
    currentIndexImage = 0;
}
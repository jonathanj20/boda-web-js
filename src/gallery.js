const imgGallery = document.getElementsByClassName('img-gallery');
const fullImg = document.getElementById('fullImg');
const fullImageContainer = document.getElementById('fullImageContainer');
const btnCloseFullImage = document.getElementById('btnCloseFullImage');

for (let img of imgGallery) {
    img.addEventListener("click", () => {
        showFullImage(img.src);
    });
}

function showFullImage(src) {
    fullImageContainer.classList.remove('hidden');
    fullImg.src = src;
}

btnCloseFullImage.addEventListener("click", () => {
    fullImageContainer.classList.add('hidden');
});
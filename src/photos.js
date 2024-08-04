const photos = Array.from(document.getElementsByClassName('img'));
const container = document.getElementById('containerFullImg');
const photo = document.getElementById('fullNormalImg');
const btnCloseNormalImg = document.getElementById('btnCloseNormalImg');

photos.forEach((item) => {
    item.addEventListener("click", () => {
        container.classList.remove('hidden');
        photo.src = item.src;
    })
});

btnCloseNormalImg.addEventListener("click", () => {
    container.classList.add('hidden');
});

document.addEventListener("keydown", (e) => {
    if (e.key === 'Escape') {
        container.classList.add('hidden');
    }
});

const nav = document.getElementById('nav');
const btnClose = document.getElementById('btnClose');
const btnOpen = document.getElementById('btnOpen');
const links = document.getElementsByClassName('menu-link');

btnOpen.addEventListener("click", () => {
    btnOpen.classList.add('hidden');
    btnClose.classList.remove('hidden');
    nav.style.display = 'block';
});

btnClose.addEventListener("click", () => {
    btnOpen.classList.remove('hidden');
    btnClose.classList.add('hidden');
    nav.style.display = 'none';
});

for (let link of links) {
    link.addEventListener("click", () => {
        nav.style.display = 'none';
        btnOpen.classList.remove('hidden');
        btnClose.classList.add('hidden');
    });
}


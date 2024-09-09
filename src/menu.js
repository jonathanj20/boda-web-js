const nav = document.getElementById('nav');
const btnClose = document.getElementById('btnClose');
const btnOpen = document.getElementById('btnOpen');
const links = document.getElementsByClassName('menu-link');
const listContainer = document.getElementById("listContainer");

btnOpen.addEventListener("click", () => {
    btnOpen.classList.add('hidden');
    btnClose.classList.remove('hidden');
    nav.style.height = "200px";
    listContainer.classList.remove("hidden");
});

btnClose.addEventListener("click", () => {
    btnOpen.classList.remove('hidden');
    btnClose.classList.add('hidden');
    nav.style.height = "0px";
    listContainer.classList.add('hidden');
});

for (let link of links) {
    link.addEventListener("click", () => {
        nav.style.height = '0';
        listContainer.classList.add('hidden');
        btnOpen.classList.remove('hidden');
        btnClose.classList.add('hidden');
    });
}


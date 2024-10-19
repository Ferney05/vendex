const getElementID = (id) => document.getElementById(id);
const getElementClass = (className) => document.querySelectorAll(className);

const accordionBtns = getElementClass('.accordion-btn');
const accordionContents = getElementClass('.accordion-content');
const downArrows = getElementClass('.down-arrow'); // Cambiado a plural
const upArrows = getElementClass('.up-arrow');     // Cambiado a plural

accordionBtns.forEach((btn, index) => {
    btn.addEventListener('click', () => {
        // Alternar la clase 'open' en el contenido correspondiente
        accordionContents[index].classList.toggle('open');

        // Alternar visibilidad de las flechas correspondientes
        downArrows[index].classList.toggle('none');
        upArrows[index].classList.toggle('show');
    });
});

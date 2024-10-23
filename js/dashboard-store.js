document.addEventListener('DOMContentLoaded', () => {
    const getElementID = (id) => document.getElementById(id);
    const getElementClass = (className) => document.querySelectorAll(className);

    const accordionBtns = getElementClass('.accordion-btn');
    const accordionContents = getElementClass('.accordion-content');
    const downArrows = getElementClass('.down-arrow');
    const upArrows = getElementClass('.up-arrow');    

    accordionBtns.forEach((btn, index) => {
        btn.addEventListener('click', () => {
            accordionContents[index].classList.toggle('open');

            downArrows[index].classList.toggle('none');
            upArrows[index].classList.toggle('show');
        });
    });

    const getElement = (classs) => document.querySelector(classs)

    const username = getElement('.username')
    const modalDash = getElement('.modal-dash')

    username.addEventListener('click', () => {
        modalDash.classList.toggle('open')
    })

    getElementID('hidden-modal').addEventListener('click', () => {
        modalDash.classList.remove('open')
    })
})









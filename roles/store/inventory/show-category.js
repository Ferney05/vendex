document.addEventListener('DOMContentLoaded', () => {
    const getElement = (classs) => document.querySelector(classs)

    const toggleDisplay = (e) => {
        e.style.display = (e.style.display === 'none' || !e.style.display) ? 'block' : 'none';
    };

    const addToggleListener = (triggerElement, targetElement) => {
        triggerElement.addEventListener('click', () => {
            toggleDisplay(targetElement);
        });
    };

    addToggleListener(getElement('.button-create-category'), getElement('.modal-category'))
    addToggleListener(getElement('.close-modal'), getElement('.modal-category'))

})
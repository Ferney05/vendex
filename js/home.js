document.addEventListener('DOMContentLoaded', () => {
    const getElement = (id) => document.getElementById(id);

    const toggleDisplay = (e) => {
        e.style.display = (e.style.display === 'none' || !e.style.display) ? 'block' : 'none';
    };

    const addToggleListener = (triggerElement, targetElement) => {
        triggerElement.addEventListener('click', () => {
            toggleDisplay(targetElement);
        });
    };

    // MENU MODAL LOGIC
    const menuModal = getElement('menu-modal');
    const modalButtons = getElement('modal-buttons');
    const closeX = getElement('close-x');

    addToggleListener(menuModal, modalButtons);
    addToggleListener(closeX, modalButtons);

    // MODAL REGISTER LOGIC
    const showRegister = getElement('show-register');
    const modalRegister = getElement('modal-register');
    const closeRegister = getElement('close-register');
    const showRegisterButtons = getElement('show-register-buttons');

    addToggleListener(showRegister, modalRegister);
    addToggleListener(showRegisterButtons, modalRegister);
    addToggleListener(closeRegister, modalRegister);
});

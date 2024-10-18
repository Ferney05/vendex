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
    const modalRegister = getElement('modal-register');
    const modalLogin = getElement('modal-login')
    const modalChangePassword = getElement('modal-change-password')

    const showRegister = getElement('show-register');
    const closeRegister = getElement('close-register');

    const showLogin = getElement('show-login')
    const closeLogin = getElement('close-login')

    const showChangePassword = getElement('show-change-password')
    const closeChangePassword = getElement('close-change-password')

    const showRegisterButtons = getElement('show-register-buttons');
    const showLoginButtons = getElement('show-login-buttons');
    
    const showWelcomeButton = getElement('show-welcome-button')

    addToggleListener(showRegister, modalRegister);
    addToggleListener(showRegisterButtons, modalRegister);
    addToggleListener(closeRegister, modalRegister);

    addToggleListener(showWelcomeButton, modalRegister)

    addToggleListener(showLogin, modalLogin)
    addToggleListener(showLoginButtons, modalLogin)
    addToggleListener(closeLogin, modalLogin)

    addToggleListener(showChangePassword, modalChangePassword)
    addToggleListener(showChangePassword, modalLogin)
    addToggleListener(closeChangePassword, modalChangePassword)
});

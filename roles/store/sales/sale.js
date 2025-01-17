document.addEventListener('DOMContentLoaded', () => {
    const getElement = (classs) => document.querySelector(classs);

    // MODAL DE CONFIRMACIÓN
    const buttonConfirm = getElement('.button-confirm');
    const hiddenInfoSale = getElement('.hidden-info-sale');

    if (buttonConfirm) {
        buttonConfirm.addEventListener('click', () => {
            hiddenInfoSale.style.display = 'block';
        });
    }

    // MODAL DE GENERAR VENTA
    const btnSaleConfirm = getElement('.btn-sale-confirm');
    const modalGenerateSale = getElement('.modal-generate-sale');
    const closeModalSale = getElement('.close-modal-sale');
    
    if (btnSaleConfirm) {
        btnSaleConfirm.addEventListener('click', () => {
            modalGenerateSale.style.display = 'block';
        });
    }

    // Cerrar modal con el botón de cierre
    if (closeModalSale) {
        closeModalSale.addEventListener('click', () => {
            modalGenerateSale.style.display = 'none';
        });
    }

    // Cerrar modal al hacer clic fuera
    window.addEventListener('click', (e) => {
        if (e.target === modalGenerateSale) {
            modalGenerateSale.style.display = 'none';
        }
    });

    // OPCIONES DE PAGO
    const btnPay = getElement('.btn-pay');
    const btnCredit = getElement('.btn-credit');
    const paymentMethod = getElement('.payment-method');
    const clientInputs = document.querySelectorAll('.client, .client-email, .client-phone');

    // Función para manejar el estado de los botones
    const handlePaymentButtons = (activeBtn, inactiveBtn) => {
        // Activar botón seleccionado
        activeBtn.style.backgroundColor = '#4CAF50';
        // Desactivar el otro botón
        inactiveBtn.style.backgroundColor = 'transparent';
    };

    // Función para manejar la visibilidad del método de pago
    const handlePaymentMethod = (showPaymentMethod) => {
        paymentMethod.style.display = showPaymentMethod ? 'block' : 'none';
        paymentMethod.required = showPaymentMethod;

        // Manejar campos de cliente
        clientInputs.forEach(input => {
            input.style.pointerEvents = 'auto';
            input.required = true;
            input.classList.remove('input-blocked');
        });
    };

    // Event listener para el botón "Pagada"
    btnPay.addEventListener('click', () => {
        handlePaymentButtons(btnPay, btnCredit);
        handlePaymentMethod(true); // Mostrar método de pago
    });

    // Event listener para el botón "A crédito"
    btnCredit.addEventListener('click', () => {
        handlePaymentButtons(btnCredit, btnPay);
        handlePaymentMethod(false); // Ocultar método de pago
    });

    // Inicializar el estado de los campos required
    const initializeRequiredFields = () => {
        const paymentMethodStyle = window.getComputedStyle(paymentMethod);
        const isVisible = paymentMethodStyle.display !== 'none';
        paymentMethod.required = isVisible;

        clientInputs.forEach(input => {
            input.required = true;
        });
    };

    // Inicializar campos
    initializeRequiredFields();

    // Desbloquear botones cuando hay productos en el carrito
    const unlockPaymentButtons = () => {
        const cartHasProducts = document.querySelector('table tr:nth-child(2)') !== null;
        if (cartHasProducts) {
            btnPay.classList.remove('locked-button');
            btnCredit.classList.remove('locked-button');
        }
    };

    unlockPaymentButtons();
});
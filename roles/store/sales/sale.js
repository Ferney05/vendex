document.addEventListener('DOMContentLoaded', () => {
    const getElement = (classs) => document.querySelector(classs)

    const toggleDisplay = (e) => {
        e.style.display = (e.style.display === 'none' || !e.style.display) ? 'block' : 'none';
    };

    const addToggleListener = (triggerElement, targetElement) => {
        triggerElement.addEventListener('click', () => {
            toggleDisplay(targetElement);
            triggerElement.style.display = 'none'
        });
    };

    addToggleListener(getElement('.button-confirm'), getElement('.hidden-info-sale'))

    // OPCIONES DE PAGO

    const buttons = document.querySelectorAll('.btn-options'); 

    buttons.forEach(button => {
        button.addEventListener('click', () => {
            buttons.forEach(btn => btn.style.backgroundColor = 'transparent');
            button.style.backgroundColor = '#4CAF50';
        });
    });

    const toggleVisibility = (e) => {
        e.classList.toggle('hidden');
    };
    
    const addToggleListenerTwo = (triggerElement, targetElement) => {
        triggerElement.addEventListener('click', () => {
            toggleVisibility(targetElement);

            if (triggerElement.classList.contains('btn-credit')) {
                targetElement.removeAttribute('required');
            }
    
            // Si el botón es "btn-pay", agregar "required"
            if (triggerElement.classList.contains('btn-pay')) {
                targetElement.setAttribute('required', 'required');
            }
        });
    };
    
    // Seleccionar los elementos y agregar los listeners
    addToggleListenerTwo(getElement('.btn-pay'), getElement('.payment-method'));
    addToggleListenerTwo(getElement('.btn-credit'), getElement('.payment-method'));

})
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
    
            // Verificar la propiedad `pointer-events` del targetElement
            const styles = window.getComputedStyle(targetElement);
            const isBlocked = styles.pointerEvents === 'none';
    
            if (isBlocked) {
                targetElement.removeAttribute('required'); // Si está bloqueado, quitar required
            } else {
                targetElement.setAttribute('required', 'required'); // Si no está bloqueado, agregar required
            }
        });
    };
    
    // Función para inicializar los atributos required según el estado inicial
    const initializeRequiredFields = (triggerSelector, targetSelector) => {
        const targetElement = getElement(targetSelector);
        const styles = window.getComputedStyle(targetElement);
        const isBlocked = styles.pointerEvents === 'none';
    
        if (isBlocked) {
            targetElement.removeAttribute('required'); // Quitar required si está bloqueado
        } else {
            targetElement.setAttribute('required', 'required'); // Agregar required si no está bloqueado
        }
    };
    
    // Configuración de elementos
    const mappings = [
        { trigger: '.btn-pay', target: '.client' },
        { trigger: '.btn-credit', target: '.client' },
        { trigger: '.btn-pay', target: '.payment-method' },
        { trigger: '.btn-credit', target: '.payment-method' },
        { trigger: '.btn-pay', target: '.client-email' },
        { trigger: '.btn-credit', target: '.client-email' },
        { trigger: '.btn-pay', target: '.client-phone' },
        { trigger: '.btn-credit', target: '.client-phone' },
    ];
    
    // Inicializar campos según el estado de btn-pay (por defecto)
    mappings.forEach(({ trigger, target }) => {
        if (trigger === '.btn-pay') {
            initializeRequiredFields(trigger, target);
        }
    });
    
    // Iterar sobre las configuraciones para agregar los listeners
    mappings.forEach(({ trigger, target }) => {
        addToggleListenerTwo(getElement(trigger), getElement(target));
    });
    
})
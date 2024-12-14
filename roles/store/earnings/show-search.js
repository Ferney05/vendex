document.addEventListener('DOMContentLoaded', () => {
    const getElement = (cls) => document.querySelector(cls);

    const modal = getElement('.modal-search');
    const searchButton = getElement('.search');
    const inputs = [
        getElement('.input-search'),
        getElement('.btn-search')
    ];

    // Mostrar el modal al hacer clic en el botón de búsqueda
    searchButton.addEventListener('click', (event) => {
        event.stopPropagation(); // Evitar que el clic cierre el modal
        modal.style.display = 'block'; // Mostrar el modal
    });

    // Ocultar el modal al hacer clic fuera de los elementos relevantes
    document.addEventListener('click', (event) => {
        const isClickInside =
            modal.contains(event.target) || // Si el clic ocurre dentro del modal
            inputs.some(input => input && input.contains(event.target)) || // Si ocurre en los inputs
            searchButton.contains(event.target); // O si ocurre en el botón de búsqueda

        if (isClickInside) {
            modal.style.display = 'none'; // Ocultar el modal
        }
    });

    // Prevenir que el modal se cierre si el usuario interactúa con los inputs
    inputs.forEach(input => {
        if (input) {
            input.addEventListener('click', (event) => {
                event.stopPropagation(); // Detener la propagación para no cerrar el modal
            });
        }
    });
});

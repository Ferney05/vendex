document.addEventListener('DOMContentLoaded', () => {
    const getElement = (id) => document.getElementById(id)

    const toggleDisplay = (e) => {
        e.style.display = (e.style.display === 'none') ? 'block' : 'none'
    }

    const menu_modal = getElement('menu-modal')
    const modal_buttons = getElement('modal-buttons')
    const close_x = getElement('close-x')

    menu_modal.addEventListener('click', () => {
        toggleDisplay(modal_buttons)
    })

    close_x.addEventListener('click', () => {
        toggleDisplay(modal_buttons)
    })
}) 
document.addEventListener('DOMContentLoaded', () => {
    const getElement = (classs) => document.querySelector(classs)

    const username = getElement('.username')
    const modalDash = getElement('.modal-dash')

    username.addEventListener('click', () => {
        modalDash.classList.toggle('open')
    })
})









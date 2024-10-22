document.addEventListener('DOMContentLoaded', () => {
    const getElement = (classs) => document.querySelector(classs)

    const username = getElement('.username')
    const modalDash = getElement('.modal-dash')

    username.addEventListener('click', () => {
        modalDash.classList.toggle('open')
    })

    const getElementID = (id) => document.getElementById(id);

    getElementID('hidden-modal').addEventListener('click', () => {  
        modalDash.classList.remove('open')
    })
})











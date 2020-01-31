( ()=> {
    const button = document.querySelector('.menu-icon');
    button.addEventListener('click', () => {
        document.querySelector('.header').classList.toggle('is-open');
    })
})();

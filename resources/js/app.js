import './bootstrap';


document.addEventListener('DOMContentLoaded', () => {
    const updateWindowSize = () => {
        const title = document.querySelector('#title');
        if(window.innerWidth < 1280) {
            title.classList.remove('text-center');
        } else {
            title.classList.add('text-center');
        }
    };

    updateWindowSize();
    window.addEventListener('resize', updateWindowSize);
});

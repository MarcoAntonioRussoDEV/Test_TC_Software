import './bootstrap';

const DESKTOP_BREAKPOINT = 1280;
let lockRefresh;
const wire = window.Livewire;

const handleTitleClass = () => {
    const title = document.querySelector('#title');
    if (window.innerWidth < DESKTOP_BREAKPOINT) {
        title.classList.remove('text-center');
    } else {
        title.classList.add('text-center');
    }
};

const handleLivewireDispatch = () => {
    if (window.innerWidth < DESKTOP_BREAKPOINT && lockRefresh !== 'mobile') {
        wire.dispatch("mobile.refreshTasks");
        lockRefresh = 'mobile';
    } else if (window.innerWidth >= DESKTOP_BREAKPOINT && lockRefresh !== 'desktop') {
        wire.dispatch("refreshTasks");
        lockRefresh = 'desktop';
    }
};

const updateWindowSize = () => {
    handleTitleClass();
    handleLivewireDispatch();
};

document.addEventListener('DOMContentLoaded', () => {
    updateWindowSize();
    window.addEventListener('resize', updateWindowSize);
});

wire.on("toast-show", () =>{ 
    setTimeout(() => {
        wire.dispatch("clear-toast");
    }, 3000);
});


document.addEventListener('click', function(event) {
    const modal = document.querySelector('#show-modal');
    const modalBox = document.querySelector('#show-modal-box');

    if (modal && modalBox && !modalBox.contains(event.target) ) {
        wire.call('closeModal');
    }
});
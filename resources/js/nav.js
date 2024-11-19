import Typed from 'typed.js';
import Isotope from 'isotope-layout';

// Typed.js (exemple)
document.addEventListener('DOMContentLoaded', function () {
    var typed = new Typed('.element', {
        strings: ['Bonjour, je suis Zeineb', 'Développeuse Web', 'Bienvenue dans mon portfolio!'],
        typeSpeed: 50,
        backSpeed: 25,
        backDelay: 1000,
        loop: true
    });
});

// Isotope (exemple)
document.addEventListener('DOMContentLoaded', function () {
    var grid = document.querySelector('.portfolio-grid');
    if (grid) {
        var iso = new Isotope(grid, {
            itemSelector: '.portfolio-item',
            layoutMode: 'fitRows'
        });
    }
});

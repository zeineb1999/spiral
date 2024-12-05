import './bootstrap';
// resources/js/app.js

import 'bootstrap/dist/css/bootstrap.min.css'; // Importer le CSS de Bootstrap
import 'bootstrap'; // Importer les JS de Bootstrap (optionnel, si vous avez besoin de fonctionnalités JS de Bootstrap)
import $ from 'jquery';
import Swiper from 'swiper';
import AOS from 'aos';
import Typed from 'typed.js';
import 'waypoints/lib/noframework.waypoints';
import GLightbox from 'glightbox';
import 'glightbox/dist/css/glightbox.css';
import Isotope from 'isotope-layout';


import 'bootstrap-icons/font/bootstrap-icons.css';

import PureCounter from '@srexi/purecounterjs';


// Initialiser PureCounter
new PureCounter();

/**
* Template Name: iPortfolio
* Updated: Nov 17 2023 with Bootstrap v5.3.2
* Template URL: https://bootstrapmade.com/iportfolio-bootstrap-portfolio-websites-template/
* Author: BootstrapMade.com
* License: https://bootstrapmade.com/license/
*/
(function() {
    "use strict";
  
    /**
     * Easy selector helper function
     */
    const select = (el, all = false) => {
      el = el.trim()
      if (all) {
        return [...document.querySelectorAll(el)]
      } else {
        return document.querySelector(el)
      }
    }
  
    /**
     * Easy event listener function
     */
    const on = (type, el, listener, all = false) => {
      let selectEl = select(el, all)
      if (selectEl) {
        if (all) {
          selectEl.forEach(e => e.addEventListener(type, listener))
        } else {
          selectEl.addEventListener(type, listener)
        }
      }
    }
  
    /**
     * Easy on scroll event listener 
     */
    const onscroll = (el, listener) => {
      el.addEventListener('scroll', listener)
    }
  
    /**
     * Navbar links active state on scroll
     */
    let navbarlinks = select('#navbar .scrollto', true)
    const navbarlinksActive = () => {
      let position = window.scrollY + 200
      navbarlinks.forEach(navbarlink => {
        if (!navbarlink.hash) return
        let section = select(navbarlink.hash)
        if (!section) return
        if (position >= section.offsetTop && position <= (section.offsetTop + section.offsetHeight)) {
          navbarlink.classList.add('active')
        } else {
          navbarlink.classList.remove('active')
        }
      })
    }
    window.addEventListener('load', navbarlinksActive)
    onscroll(document, navbarlinksActive)
  
    /**
     * Scrolls to an element with header offset
     */
    const scrollto = (el) => {
      let elementPos = select(el).offsetTop
      window.scrollTo({
        top: elementPos,
        behavior: 'smooth'
      })
    }
  
    /**
     * Back to top button
     */
    let backtotop = select('.back-to-top')
    if (backtotop) {
      const toggleBacktotop = () => {
        if (window.scrollY > 100) {
          backtotop.classList.add('active')
        } else {
          backtotop.classList.remove('active')
        }
      }
      window.addEventListener('load', toggleBacktotop)
      onscroll(document, toggleBacktotop)
    }
  
    /**
     * Mobile nav toggle
     */
    on('click', '.mobile-nav-toggle', function(e) {
      select('body').classList.toggle('mobile-nav-active')
      this.classList.toggle('bi-list')
      this.classList.toggle('bi-x')
    })
  
    /**
     * Scrool with ofset on links with a class name .scrollto
     */
    on('click', '.scrollto', function(e) {
      if (select(this.hash)) {
        e.preventDefault()
  
        let body = select('body')
        if (body.classList.contains('mobile-nav-active')) {
          body.classList.remove('mobile-nav-active')
          let navbarToggle = select('.mobile-nav-toggle')
          navbarToggle.classList.toggle('bi-list')
          navbarToggle.classList.toggle('bi-x')
        }
        scrollto(this.hash)
      }
    }, true)
  
    /**
     * Scroll with ofset on page load with hash links in the url
     */
    window.addEventListener('load', () => {
      if (window.location.hash) {
        if (select(window.location.hash)) {
          scrollto(window.location.hash)
        }
      }
    });
  
    /**
     * Hero type effect
     */
    
    const typed = document.querySelector('.typed');
    if (typed) {
    const typedStrings = typed.getAttribute('data-typed-items').split(',');
    new Typed('.typed', {
        strings: typedStrings,
        loop: true,
        typeSpeed: 100,
        backSpeed: 50,
        backDelay: 2000,
    });
    }

    /**
     * Skills animation
     */
    let skilsContent = select('.skills-content');
    if (skilsContent) {
      new Waypoint({
        element: skilsContent,
        offset: '80%',
        handler: function(direction) {
          let progress = select('.progress .progress-bar', true);
          progress.forEach((el) => {
            el.style.width = el.getAttribute('aria-valuenow') + '%'
          });
        }
      })
    }
  
    /**
     * Porfolio isotope and filter
     */
    window.addEventListener('load', () => {
      let portfolioContainer = select('.portfolio-container');
      if (portfolioContainer) {
        let portfolioIsotope = new Isotope(portfolioContainer, {
          itemSelector: '.portfolio-item'
        });
  
        let portfolioFilters = select('#portfolio-flters li', true);
  
        on('click', '#portfolio-flters li', function(e) {
          e.preventDefault();
          portfolioFilters.forEach(function(el) {
            el.classList.remove('filter-active');
          });
          this.classList.add('filter-active');
  
          portfolioIsotope.arrange({
            filter: this.getAttribute('data-filter')
          });
          portfolioIsotope.on('arrangeComplete', function() {
            AOS.refresh()
          });
        }, true);
      }
  
    });
  
    /**
     * Initiate portfolio lightbox 
     */
    const portfolioLightbox = GLightbox({
      selector: '.portfolio-lightbox'
    });
  
    /**
     * Portfolio details slider
     */
    new Swiper('.portfolio-details-slider', {
      speed: 400,
      loop: true,
      autoplay: {
        delay: 5000,
        disableOnInteraction: false
      },
      pagination: {
        el: '.swiper-pagination',
        type: 'bullets',
        clickable: true
      }
    });
  
    /**
     * Testimonials slider
     */
    new Swiper('.testimonials-slider', {
      speed: 600,
      loop: true,
      autoplay: {
        delay: 5000,
        disableOnInteraction: false
      },
      slidesPerView: 'auto',
      pagination: {
        el: '.swiper-pagination',
        type: 'bullets',
        clickable: true
      },
      breakpoints: {
        320: {
          slidesPerView: 1,
          spaceBetween: 20
        },
  
        1200: {
          slidesPerView: 3,
          spaceBetween: 20
        }
      }
    });
  
    /**
     * Animation on scroll
     */
    window.addEventListener('load', () => {
      AOS.init({
        duration: 1000,
        easing: 'ease-in-out',
        once: true,
        mirror: false
      })
    });
  
    /**
     * Initiate Pure Counter 
     */
    new PureCounter();
  
  })()
  $(document).ready(function(){
    $('#date1').datepicker({
        format: 'dd-mm-yyyy', // Le format que vous souhaitez
        autoclose: true
    });
});


//pour filtrer
$(document).ready(function () {
  $('#filterButton').on('click', function () {
      // Récupérer les valeurs des champs
      let structure = $('#structure').val();
      let branche = $('#branche').val();
      let date1 = $('#date1').val();
      let date2 = $('#date2').val();
      let filterUrl = "/requisitions/filter";
      
      // Envoyer la requête AJAX
      $.ajax({
          url: filterUrl, // URL générée par Ziggy ou une route nommée
          type: 'GET',
          data: {
              structure: structure,
              branche: branche,
              date1: date1,
              date2: date2
          },
          success: function (response) {
              // Mettre à jour uniquement le tableau
             
              $('#myTable').html(response.html);
              $('#pagination-links').html(response.pagination);
          },
          error: function () {
              alert('Une erreur est survenue. Veuillez réessayer.');
          }
      });
  });
 
});




// Filtres pour la table rechercher par mots
$(document).ready(function () {
  $("#myInput").on("keyup", function () {
      var value = $(this).val().toLowerCase();
      $("#myTable tr").filter(function () {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
      });
  });
});


//pagination
$(document).on('click', '.pagination a', function(event) {
  event.preventDefault();

  let page = $(this).attr('href').split('page=')[1];
  fetchRequisitions(page);
});

function fetchRequisitions(page) {
  $.ajax({
      url: `/requisitions?page=${page}`,
      type: 'GET',
      success: function(response) {
          $('#myTable').html(response.html);
          $('#pagination-links').html(response.pagination);
      },
      error: function() {
          alert('Une erreur s\'est produite lors de la récupération des données.');
      }
  });
}

//recherche avancée
$(document).ready(function () {
  // Fonction pour exécuter la recherche avancée
  $('#advancedSearchForm').on('submit', function (event) {
      event.preventDefault(); // Empêche la soumission traditionnelle

      let formData = $(this).serialize(); // Sérialise les données du formulaire

      // Envoi de la requête AJAX
      $.ajax({
          url: '/requisitions/advanced-search', // Route pour la recherche avancée
          type: 'GET',
          data: formData,
          success: function (response) {
            //console.log('Réponse reçue :', response); // Vérifiez le contenu complet de la réponse
            if (response.html.trim()) {
                $('#recherche').hide();
                $('#advancedSearchResults').show();
                $('#requisitionsTableBody').html(response.html); // Insérer les lignes
                $('#paginationLinks').html(response.pagination); // Insérer la pagination
                //console.log('Lignes insérées :', $('#requisitionsTableBody').html());
            } else {
                alert('Aucun résultat trouvé.');
            }
          },
          error: function () {
              alert("Une erreur s'est produite lors de la recherche.");
          }
      });
  });

  // Gestion de la pagination
  $(document).on('click', '#paginationLinks a', function (event) {
    event.preventDefault();
    let url = $(this).attr('href');  // Récupère l'URL complète
    //console.log('URL de pagination:', url);  // Affiche l'URL
    let page = url.split('page=')[1];  // Extrait le numéro de page
    //console.log('Numéro de page:', page);  // Affiche le numéro de page
    fetchRequisitionsAvance(page);  // Relance la recherche avec le numéro de page
  });
  function fetchRequisitionsAvance(page) {
    $.ajax({
        url: `/requisitionsAvance?page=${page}`,
        type: 'GET',
        success: function(response) {
            $('#requisitionsTableBody').html(response.html);
            $('#paginationLinks').html(response.pagination);
        },
        error: function() {
            alert('Une erreur s\'est produite lors de la récupération des données.');
        }
    });
  }
 
});

 $('#toggleRechercheBtn').click(function (e) {
    e.preventDefault();  // Empêcher l'action par défaut du lien
    $('#advancedSearchResults').hide();  // Masquer les résultats
    $('#recherche').fadeIn();  // Afficher la recherche avancée
});
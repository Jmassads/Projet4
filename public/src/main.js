import './jquery-global.js';
import 'bootstrap';

import 'hover.css';
import '@cmyee/pushy/js/pushy.min.js';
import '@cmyee/pushy/css/pushy.css';

import 'bootstrap/dist/css/bootstrap.min.css';

import 'slick-carousel';
import 'slick-carousel/slick/slick.css';
import 'slick-carousel/slick/slick-theme.css';


$('.slider').slick({
  infinite: true,
  slidesToShow: 3,
  slidesToScroll: 3
});

/* portfolio button color */
$('.books__toolbar button').on('click', function () {
  $('.books-btn-active').removeClass('books-btn-active');
  $(this).addClass('books-btn-active');
});

$('.book-list').slick({
  dots: true,
  infinite: false,
  speed: 300,
  slidesToShow: 5,
  slidesToScroll: 5,
  responsive: [{
      breakpoint: 992,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 4,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 769,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3
      }
    },
    {
      breakpoint: 576,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    }
  ]
});



const ImagesLoaded = require('imagesloaded');
const Masonry = require('masonry-layout');
const Isotope = require('isotope-layout/dist/isotope.pkgd.js');
const jQueryBridget = require('jquery-bridget');

jQueryBridget('masonry', Masonry, $);
jQueryBridget('imagesLoaded', ImagesLoaded, $);


const $chapters = $('.chapters_list').imagesLoaded(function () {
  // init Masonry after all images have loaded
  console.log('chapter images loaded');
  $chapters.masonry({
    itemSelector: '.list__item',
    horizontalOrder: true
  });
});

const $grid = $('.grid').imagesLoaded(function () {
  // images have loaded
  console.log('book images loaded');
  $grid.isotope({
    itemSelector: '.grid-item',
    layoutMode: 'fitRows'
  });
})

$('.books__toolbar').on('click', 'button', function () {
  const filterValue = $(this).attr('data-filter');
  $grid.isotope({
    filter: filterValue
  });
});

$(document).on('click', 'a[href^="#"]', function (event) {
  event.preventDefault();
  $('html, body').animate({
    scrollTop: $($.attr(this, 'href')).offset().top
  }, 500);
});

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function () {
  scrollFunction()
};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    document.getElementById("backtotop").style.display = "block";
  } else {
    document.getElementById("backtotop").style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
document.getElementById("backtotop").addEventListener('click', function () {
  $('body,html').animate({
    scrollTop: 0
  }, 800);
  return false;
});

const filtrButtons = document.querySelectorAll('.filtr-button');
// Loop through the buttons and add the active class to the current/clicked button
for (let i = 0; i < filtrButtons.length; i++) {
  filtrButtons[i].addEventListener("click", function () {
    let current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}

$(document).ready(function () {
  $('.flagModal').tooltip({
    title: "Signalez ce commentaire",
    delay: 0
  });
});

$(".add-comment").click(function () {
  $(".add-comment-form").show();
  $(".add-comment").hide();
});
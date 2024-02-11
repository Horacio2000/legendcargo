import './bootstrap';
import AOS from 'aos';
import 'aos/dist/aos.css';
import $ from 'jquery';

import toastr from 'toastr';
import 'toastr/build/toastr.css';


window.$ = $;
window.jQuery = $;


import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

document.addEventListener('DOMContentLoaded', function() {
    AOS.init({
        duration: 1200,
    });
  });


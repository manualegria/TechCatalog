// import './bootstrap';

// import Alpine from 'alpinejs';

// window.Alpine = Alpine;

// Alpine.start();


import tinymce from 'tinymce/tinymce';
import 'tinymce/themes/silver';  // Tema Silver (obligatorio)
import 'tinymce/plugins/link';   // Plugin de enlaces
import 'tinymce/plugins/lists';  // Plugin de listas

// Inicialización
document.addEventListener('DOMContentLoaded', () => {
    tinymce.init({
        selector: '.tinymce-editor',
        plugins: 'link lists',
        toolbar: 'undo redo | bold italic | link bullist numlist',
        skin_url: '/assets/vendor/tinymce/skins/ui/oxide', // Ruta correcta
        content_css: '/assets/vendor/tinymce/skins/content/default/content.css',
    });
});
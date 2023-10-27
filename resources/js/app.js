import './bootstrap';
// Import Quill.js
import Quill from 'quill';

// Create a function to initialize Quill
function initializeQuill() {
    // Initialize Quill with additional options and modules
    var quill = new Quill('#editor', {
        theme: 'snow', // or 'bubble' for a different theme

        // Add modules for toolbar and clipboard
        modules: {
            toolbar: false
            // toolbar: [
            //     [{ 'header': '1' }, { 'header': '2' }],
            //     ['bold', 'italic', 'underline', 'strike'],
            //     [{ 'list': 'ordered'}, { 'list': 'bullet' }],
            //     ['link'],
            //     ['clean']
            // ],
            // clipboard: {
            //     matchVisual: false,
            // }
        }
    });

    // Add event listeners or other custom functionality as needed
    quill.on('text-change', function() {
        // This event is triggered when the content changes
        console.log('Content changed');
    });

    // Access Quill's API functions, e.g., quill.getContents(), quill.insertText(), etc.
}

// Call the initialization function when the DOM is ready
document.addEventListener('DOMContentLoaded', function () {
    initializeQuill();
});


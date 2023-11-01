import './bootstrap';
// Import Quill.js
import Quill from 'quill';

// Initialize Quill editor
var quill = new Quill('#editor', {
    theme: 'snow',
    modules: {
        toolbar: [
            [{ 'header': '1' }, { 'header': '2' }],
            ['bold', 'italic', 'underline'],
            ['link'],
            [{ 'list': 'ordered' }, { 'list': 'bullet' }],
            ['clean']
        ]
    }
});

// Event handler for the "Save" button
document.getElementById('saveButton').addEventListener('click', function () {
    var content = quill.root.innerHTML;

    // Send the content to your Laravel backend for insertion
    fetch('/insert', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ content: content })
    })
        .then(response => response.json())
        .then(data => {
            // Handle the response from your server (e.g., show a success message)
            console.log(data);
        })
        .catch(error => {
            console.error('Error:', error);
        });
});



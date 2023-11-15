import './bootstrap';
// Import Quill.js
import Quill from 'quill';


// Initialize Quill editor
var quill = new Quill('#editor', {
    theme: 'snow',
    modules: {
        toolbar: false,
        // [
        //     ['bold', 'italic', 'underline'],
        // ],

    }
});

// var toolbar = quill.getModule('toolbar');
// document.getElementById('toolbar').appendChild(toolbar.container);

// var customClipboard = new QuillClipboard(quill, {
//     matchers: [
//         [Node.TEXT_NODE, handleTextPaste],
//         [Node.ELEMENT_NODE, handleElementPaste]
//     ]
// });

function handleTextPaste(node, delta) {
    const text = node.data.trim();
    if (/^https?:\/\/\S+\.\S+/.test(text)) {
        // It's a URL, let's convert it into a link
        const ops = [];
        ops.push({ insert: text, attributes: { link: text } });
        quill.updateContents(new Delta(ops));
        return false;
    }
    return true;
}

function handleElementPaste(node, delta) {
    if (node.tagName === 'A' && node.href) {
        // Extract the link and its text from the <a> element
        const link = node.href;
        const text = node.textContent;
        const ops = [];
        ops.push({ insert: text, attributes: { link } });
        quill.updateContents(new Delta(ops));
        return false;
    }
    return true;
}



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





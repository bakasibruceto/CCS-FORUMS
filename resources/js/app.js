import './bootstrap';
import 'alpinejs';

import hljs from 'highlight.js/lib/core';
document.addEventListener('DOMContentLoaded', (event) => {
    hljs.highlightAll();
});

// import hljs from 'highlight.js';

// document.addEventListener('DOMContentLoaded', (event) => {
//     document.querySelectorAll('pre code').forEach((block) => {
//         hljs.highlightBlock(block);
//     });
// });


function copyCode(button) {
    var codeElement = button.nextElementSibling.querySelector('code');
    var textArea = document.createElement('textarea');
    textArea.value = codeElement.innerText;
    document.body.appendChild(textArea);
    textArea.select();
    document.execCommand('copy');
    document.body.removeChild(textArea);
    alert('Code copied to clipboard!');
}












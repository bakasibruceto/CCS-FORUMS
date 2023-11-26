import './bootstrap';
import 'alpinejs';
import hljs from 'highlight.js/lib/common';

//Highlight.js
document.addEventListener('DOMContentLoaded', (event) => {
    document.querySelectorAll('pre code').forEach((block) => {
        block.textContent = block.textContent.trim();
        hljs.highlightElement(block);
    });
});

//Copy to clipboard
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












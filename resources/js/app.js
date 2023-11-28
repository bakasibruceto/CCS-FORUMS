import './bootstrap';
import 'alpinejs';
import hljs from 'highlight.js/lib/core';

//Highlight.js
document.addEventListener('DOMContentLoaded', (event) => {
    highlightCodeBlocks('pre code');
});

document.addEventListener('DOMContentLoaded', (event) => {
    highlightCodeBlocks('div[x-ref="markdown"] pre code');
});

window.livewire.on('contentUpdated', () => {
    setTimeout(() => {
        highlightCodeBlocks('div[x-ref="markdown"] pre code');
    }, 0);
});

function highlightCodeBlocks(selector) {
    document.querySelectorAll(selector).forEach((block) => {
        hljs.highlightElement(block);
    });
}


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












import './bootstrap';
import hljs from 'highlight.js';
import 'highlight.js/styles/default.css';

function renderMarkdown(markdown) {
        return marked(markdown, {
            // Define custom renderer to style code blocks
            renderer: new marked.Renderer(),
            highlight: function (code, lang) {
                // Check if code is wrapped in single quotes
                if (lang === 'markdown' && code.startsWith("'") && code.endsWith("'")) {
                    return '<span style="color: green;">' + code.substring(1, code.length - 1) + '</span>';
                }
                return code;
            }
        });
    }

    // Run the function on page load
    document.addEventListener('DOMContentLoaded', (event) => {
        // Render markdown using the custom function
        document.getElementById('previewContainer').innerHTML = renderMarkdown(document.getElementById('previewContent').textContent);
    });









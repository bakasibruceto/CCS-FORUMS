<div wire:poll.5000ms>
    <div wire:ignore class="prose min-w-full">
        <div x-data x-init="let codeBlocks = $refs.markdown.querySelectorAll('pre code');
        codeBlocks.forEach((codeBlock) => {
            let copyButton = document.createElement('button');
            let copyIcon = document.createElement('ion-icon');
            copyIcon.setAttribute('name', 'copy-outline');
            copyIcon.style.fontSize = '20px';
            copyIcon.classList.add('hover:opacity-50', 'transition', 'duration-200');
            copyButton.appendChild(copyIcon);
            copyButton.classList.add('relative', 'float-right');
            let popup = document.createElement('div');
            popup.textContent = 'Copied to clipboard';
            popup.classList.add('hidden', 'absolute', 'text-white', 'p-1', 'rounded', 'mt-2');
            popup.style.top = '-15px';
            popup.style.left = '-150px';
            popup.style.transform = 'none';
            popup.style.width = '50px'; // Adjust this value to your liking
            copyButton.addEventListener('click', (event) => {
                event.preventDefault();
                event.stopPropagation();
                navigator.clipboard.writeText(codeBlock.textContent);
                popup.classList.remove('hidden');
                setTimeout(() => { popup.classList.add('hidden'); }, 2000);
            });
            copyButton.appendChild(popup);
            codeBlock.parentNode.insertBefore(copyButton, codeBlock);
        });">
            <div x-ref="markdown">{!! $parsedMarkdown !!}</div>
        </div>
    </div>
</div>

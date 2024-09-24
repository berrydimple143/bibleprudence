<div x-data="{ body: null }" x-show="body" x-on:check-record.window="
        body = $event.detail
        setTimeout(() => {
            body = null
        }, 2000)
    " class="absolute z-10 top-1/3 left-1/2 p-3 rounded-lg text-white text-lg bg-red-500 border border-red-600 flex items-center">
    <span>
        <svg xmlns="http://www.w3.org/2000/svg" class="mr-4" width="16" height="16" viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="white" d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z"/></svg>
    </span>
    <span x-text="body"></span>
</div>
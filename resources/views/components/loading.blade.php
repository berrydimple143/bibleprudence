<div x-data="{ loaded: null }" x-show="loaded" x-on:loading.window="
        loaded = $event.detail
        setTimeout(() => {
            loaded = null
        }, 1500)
    " class="absolute top-0 left-0 w-full h-full z-10 bg-gray-700">
    <span class="m-auto px-3 py-4 text-5xl font-extrabold text-white">Downloading, please wait ....</span>
</div>

<div x-data="{ body: null }" x-show="body" x-on:error.window="
        body = $event.detail
        setTimeout(() => {
            body = null
        }, 1000)
    " class="absolute z-10 top-2 left-1/2 p-3 rounded-lg bg-red-500 border border-red-600">
    <span x-text="body"></span>
</div>
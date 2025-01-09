<div x-data="{ body: null }" x-show="body" x-on:email.window="
        body = $event.detail
        setTimeout(() => {
            body = null
        }, 1000)
    " class="absolute z-10 top-2 left-1/2 p-3 text-white rounded-lg bg-green-500 border-3 border-white">
    <span x-text="body"></span>
</div>
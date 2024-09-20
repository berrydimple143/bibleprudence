<div x-data="{ ebody: null }" x-show="ebody" x-on:email.window="
        ebody = $event.detail
        setTimeout(() => {
            ebody = null
        }, 1000)
    " class="absolute z-10 top-2 left-1/2 p-3 text-white rounded-lg bg-green-500 border-3 border-white">
    <span>Email sent successfully!</span>
</div>
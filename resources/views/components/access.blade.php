<div x-data="{ msg: null }" x-cloak x-show="msg" x-on:access.window="
        msg = $event.detail;        
        setTimeout(() => {
            msg = null;
        }, 3000)
    " class="absolute z-50 w-full h-full bg-gray-900 bg-opacity-70 flex items-center justify-center">
    <div class="w-full md:max-w-[40%] bg-white p-5">
        <span class="text-2xl text-black border-2 border-black p-3">You can now write your comment for this post.</span> 
    </div>
</div>
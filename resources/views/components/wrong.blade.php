<div x-data="{ body: null, tp: 0 }" x-cloak x-show="body" x-on:wrong.window="
        body = $event.detail;    
        tp = $event.target.offsetTop - 60;
        setTimeout(() => {
            body = null;
        }, 4000);
    " class="absolute z-10 p-3 ml-3 flex flex-wrap text-lg text-white shadow-xl rounded-lg bg-red-500 border-2 border-gray-800"      
    x-bind:style="'top: ' + tp + 'px'" 
    >
    <span x-text="body"></span>
</div>

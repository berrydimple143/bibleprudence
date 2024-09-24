<div x-data="{ body: null, tp: 0 }" x-show="body" x-on:correct.window="
        body = $event.detail;    
        tp = $event.target.offsetTop;
        setTimeout(() => {
            body = null;
        }, 3000);
    " class="absolute z-10 p-3 ml-80 text-lg text-black shadow-xl rounded-lg bg-green-200 border-2 border-gray-800"      
    x-bind:style="'top: ' + tp + 'px'" 
    >
    <span x-text="body"></span>
</div>
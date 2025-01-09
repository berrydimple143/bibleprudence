<div id="alertDiv" x-data="{ body: null, tp: 0 }" x-show="body" x-on:alert.window="
        body = $event.detail;    
        tp = $event.target.offsetTop;
        setTimeout(() => {
            body = null;
        }, 1000);
    " class="absolute z-10 p-3 ml-80 rounded-lg snap-center"
    :class="body == 'You are correct!' ? 'bg-green-500 border border-green-600' : 'bg-red-500 border border-red-600'"  
    x-bind:style="'top: ' + tp + 'px'" 
    >
    <span x-text="body"></span>
</div>
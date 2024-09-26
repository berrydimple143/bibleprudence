<div x-data="{ body: null, tp: 0 }" x-show="body" x-on:result.window="
    body = $event.detail;    
    tp = $event.target.offsetTop - 200;
" class="absolute z-10 p-3 mx-3 text-lg text-black shadow-xl rounded-lg bg-green-100 border border-gray-800"
 x-bind:style="'top: ' + tp + 'px'">    
        <p class="w-full bg-gray-900 text-white text-center text-lg border border-white py-1">Final Result</p>  
        <p x-text="body" class="my-5"></p>
        <button x-on:click="body = null" class="text-white bg-red-600 border border-green-900 px-4 py-1">Close</button> 
</div>
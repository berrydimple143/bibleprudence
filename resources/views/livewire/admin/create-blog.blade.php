<div class="w-full h-full p-5 bg-white flex flex-col gap-3 border border-green-400">
    <div class="flex flex-col gap-2">    
        <div class="flex flex-wrap items-center gap-2 grow mb-2">
            <div class="flex items-center gap-2 grow">
                <label for="title" class="font-bold text-lg">Title:</label>
                <input type="text" class="border @error('title') border-red-500 @else border-green-400 @enderror p-2 outline-none grow" wire:model="title" id="title"
                    name="title">                
            </div>
            <div class="flex items-center gap-2 grow">
                <label for="topic" class="font-bold text-lg">Topic:</label>
                <input type="text" class="border border-green-400 p-2 outline-none grow" wire:model="topic" id="topic"
                    name="topic">
            </div>
        </div>             
        <textarea id="body" class="hidden block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="body">{{ old('body') }}</textarea>
        <trix-editor class="trix-content @error('body') border-red-500 @else border-green-400 @enderror" placeholder="Type your blog post body here ..." input="body"></trix-editor>         
    </div>
    <div class="flex flex-wrap gap-4">
        <div class="flex items-center gap-2 grow">
            <label for="author" class="font-bold text-lg">Author:</label>
            <input type="text" class="border @error('author') border-red-500 @else border-green-400 @enderror p-2 outline-none grow" wire:model="author" id="author"
                name="author">
        </div>
        <div class="flex items-center gap-2 grow">
            <label for="image" class="font-bold text-lg">Image URL:</label>
            <input type="text" class="border border-green-400 p-2 outline-none grow" wire:model="image" id="image"
                name="image">
        </div>
    </div>
    <div class="flex flex-wrap gap-4">
        <div class="flex items-center gap-2 grow">
            <label for="video" class="font-bold text-lg">Video URL:</label>
            <input type="text" class="border border-green-400 p-2 outline-none grow" wire:model="video" id="video"
                name="video">
        </div>
        <div class="flex items-center gap-2 grow">
            <label for="audio" class="font-bold text-lg">Audio URL:</label>
            <input type="text" class="border border-green-400 p-2 outline-none grow" wire:model="audio" id="audio"
                name="audio">
        </div>
    </div>   

    <div class="flex gap-4">
        <div class="flex items-center gap-2 grow">
            <label for="status" class="font-bold text-lg">Status:</label>
            <select class="border @error('status') border-red-500 @else border-green-400 @enderror p-3 outline-none" name="status" id="status" wire:model='status'>
                <option value="Live">Live</option>    
                <option value="Draft">Draft</option>            
            </select>
        </div>
        <div class="flex items-center gap-2 grow">&nbsp;</div>
    </div>
  
    <div class="flex gap-4">
        <button wire:click="save" class="border border-green-400 px-4 py-2 hover:bg-green-300">Save</button>
        <button wire:click="cancel" class="border border-yellow-600 px-4 py-2 hover:bg-yellow-400">Cancel</button>
    </div>
    
</div>
@script
    <script>
        const trixBody = document.getElementById("body");
        document.addEventListener("trix-blur", (event) => {     
            const bval = event.target.innerHTML;           
            @this.set('body', bval);
        });
    </script>
@endscript
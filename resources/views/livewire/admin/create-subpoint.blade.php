<div class="w-full h-full p-5 bg-white flex flex-col gap-3 border border-green-400">  
    <div class="flex gap-4">
        <div class="flex items-center gap-2 grow">
            <label for="outline_id" class="font-bold text-lg">Theme:</label>
            <select class="border border-green-400 p-3 @error('outline_id') border-3 border-red-500 @enderror outline-none grow" name="outline_id" id="outline_id"
                wire:model='outline_id' wire:change="changePoint">
                <option value="">Select a theme here</option>
                @foreach ($outlines as $outline)
                <option value="{{ $outline->id }}">{{ $outline->theme }}</option>
                @endforeach
            </select>
        </div>
        <div class="flex items-center gap-2 grow">
            <label for="point_id" class="font-bold text-lg">Main Point:</label>
            <select class="border border-green-400 p-3 @error('point_id') border-3 border-red-500 @enderror outline-none grow" name="point_id" id="point_id"
                wire:model='point_id'>
                <option value="">Select a main point here</option>
                @if($points)
                    @foreach ($points as $point)
                    <option value="{{ $point->id }}">{{ $point->main }}</option>
                    @endforeach
                @endif
            </select>
        </div>
    </div>    
    <div class="flex gap-4">
        <div>
            @error('point_id')
                <p class="text-red-500 pl-20">{{ $message }}</p>
            @enderror
        </div>
        <div>
            @error('outline_id')
                <p class="text-red-500 pl-96">{{ $message }}</p>
            @enderror
        </div>
    </div>   
    <div class="flex gap-4">
        <div class="flex items-center gap-2 w-2/3">
            <label for="sub" class="font-bold text-lg">Subpoint:</label>
            <input type="text" class="border border-green-400 @error('sub') border-3 border-red-500 @enderror p-2 outline-none grow" wire:model="sub" id="sub"
                name="sub">
        </div>
        <div class="flex items-center gap-2 w-1/3">
            <label for="verse" class="font-bold text-lg">Verse:</label>
            <input type="text" class="border border-green-400 @error('verse') border-3 border-red-500 @enderror p-2 outline-none grow" wire:model="verse" id="verse" name="verse">
        </div>
    </div>
    <div class="flex gap-4">
        <div>
            @error('sub')
                <p class="text-red-500 pl-20">{{ $message }}</p>
            @enderror
        </div>
        <div>
            @error('verse')
                <p class="text-red-500 pl-96">{{ $message }}</p>
            @enderror
        </div>
    </div>           
    <div class="flex gap-4">
        <div class="flex items-start gap-2 grow">
            <label for="body" class="font-bold text-lg">Body:</label>
            <textarea placeholder="Type your subpoint body here ..."
                class="border border-green-600 grow p-2 @error('body') border-3 border-red-500 @enderror"
                name="body" wire:model="body" id="body" rows="6"></textarea>                
        </div>
    </div>
    <div class="flex gap-4">
        <button wire:click="save" class="border border-green-400 px-4 py-2 hover:bg-green-300">Save</button>
        <button wire:click="cancel" class="border border-yellow-600 px-4 py-2 hover:bg-yellow-400">Cancel</button>
    </div>
</div>
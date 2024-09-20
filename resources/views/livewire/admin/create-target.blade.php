<div class="w-full h-full p-5 bg-white flex flex-col gap-3 border border-green-400">   
    <div class="w-full ml-8">
        @error('option')
        <p class="text-red-500 pl-10">{{ $message }}</p>
        @enderror
        @error('scavenger_id')            
        <p class="text-red-500 pl-10">{{ $message }}</p>
        @enderror
    </div>
    <div class="flex gap-4">
        <div class="flex items-center gap-2 grow">
            <label for="option" class="font-bold text-lg">Choice:</label>
            <input type="text" class="border border-green-400 p-2 outline-none grow" wire:model="option" id="option"
                name="option">
        </div>        
        <div class="flex items-center gap-2 grow">
            <label for="scavenger_id" class="font-bold text-lg">Question:</label>
            <select class="border border-green-400 p-3 outline-none grow" name="scavenger_id" id="scavenger_id"
                wire:model='scavenger_id'>
                <option value="">Select a scavenger question here</option>
                @foreach ($scavengers as $scavenger)
                    <?php
                        $chCount = $scavenger->targets->count();
                    ?>
                    @if($chCount <= 3)
                        <option value="{{ $scavenger->id }}" class="@if($chCount == 4) bg-red-500 @else bg-green-400 @endif">{{ $scavenger->question }} in {{ $scavenger->verse }} ({{ $chCount }}) </option>
                    @endif
                @endforeach
            </select>            
        </div>
    </div>
    <div class="flex gap-4 pl-16">
        <button wire:click="save" class="border border-green-400 px-4 py-2 hover:bg-green-300">Save</button>
        <button wire:click="cancel" class="border border-yellow-600 px-4 py-2 hover:bg-yellow-400">Cancel</button>
    </div>
</div>
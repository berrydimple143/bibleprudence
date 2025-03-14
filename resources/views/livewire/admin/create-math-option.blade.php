<div class="w-full h-full p-5 bg-white flex flex-col gap-3 border border-green-400">   
    <div class="w-full ml-8">
        @error('option')
        <p class="text-red-500 pl-10">{{ $message }}</p>
        @enderror
        @error('bmath_id')            
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
            <label for="bmath_id" class="font-bold text-lg">Math Question:</label>
            <select class="border border-green-400 p-3 outline-none grow" name="bmath_id" id="bmath_id"
                wire:model='bmath_id'>
                <option value="">Select a math question here</option>
                @foreach ($maths as $math)
                    <?php
                        $chCount = $math->options->count();
                    ?>
                    @if($chCount <= 3)
                        <option value="{{ $math->id }}" class="@if($chCount >= 4) bg-red-500 @else bg-green-400 @endif">{{ $math->question }} ({{ $chCount }}) </option>
                    @endif
                @endforeach
            </select>            
        </div>
    </div>
    <div class="flex gap-4">
        <button wire:click="save" class="border border-green-400 px-4 py-2 hover:bg-green-300">Save</button>
        <button wire:click="cancel" class="border border-yellow-600 px-4 py-2 hover:bg-yellow-400">Cancel</button>
    </div>
</div>
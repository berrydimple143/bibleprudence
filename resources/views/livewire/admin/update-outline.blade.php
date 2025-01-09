<div class="w-full h-full p-5 bg-white flex flex-col gap-3 border border-green-400">    
    <div class="flex gap-4">
        <div class="flex items-center gap-2 grow">
            <label for="text" class="font-bold text-lg">Text Passage:</label>
            <input type="text" class="border border-green-400 @error('text') border-3 border-red-500 @enderror p-2 outline-none grow" wire:model="text" id="text"
                name="text">
        </div>
        <div class="flex items-center gap-2 grow">
            <label for="support_text" class="font-bold text-lg">Supporting Text:</label>
            <input type="text" class="border border-green-400 @error('support_text') border-3 border-red-500 @enderror p-2 outline-none grow" wire:model="support_text" id="support_text"
                name="support_text">
        </div>
    </div>
    <div class="flex gap-4">
        <div class="flex items-center gap-2 grow">
            <label for="theme" class="font-bold text-lg">Theme:</label>
            <input type="text" class="border border-green-400 @error('theme') border-3 border-red-500 @enderror p-2 outline-none grow" wire:model="theme" id="theme"
                name="theme">
        </div>
        <div class="flex items-center gap-2 grow">
            <label for="keyword" class="font-bold text-lg">Keyword:</label>
            <input type="text" class="border border-green-400 @error('keyword') border-3 border-red-500 @enderror p-2 outline-none grow" wire:model="keyword" id="keyword"
                name="keyword">
        </div>
    </div>
    <div class="flex gap-4">
        <div class="flex items-center gap-2 grow">
            <label for="proposition" class="font-bold text-lg">Proposition:</label>
            <input type="text" class="border border-green-400 @error('proposition') border-3 border-red-500 @enderror p-2 outline-none grow" wire:model="proposition" id="proposition"
                name="proposition">
        </div>
        <div class="flex items-center gap-2 grow">
            <label for="topic_id" class="font-bold text-lg">Topic:</label>
            <select class="border border-green-400 p-3 @error('topic_id') border-3 border-red-500 @enderror outline-none grow" name="topic_id" id="topic_id"
                wire:model='topic_id'>
                <option value="">Select a topic here</option>
                @foreach ($topics as $topic)
                <option value="{{ $topic->id }}">{{ $topic->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="flex gap-4">
        <div class="flex items-start gap-2 grow">
            <label for="introduction" class="font-bold text-lg">Introduction:</label>
            <textarea placeholder="Type your introduction here ..."
                class="border border-green-600 grow p-2 @error('introduction') border-3 border-red-500 @enderror"
                name="introduction" wire:model="introduction" id="introduction" rows="6"></textarea>                
        </div>
    </div>
    <div class="flex gap-4">
        <div class="flex items-start gap-2 grow">
            <label for="conclusion" class="font-bold text-lg">Conclusion:</label>
            <textarea placeholder="Type your conclusion here ..."
                class="border border-green-600 grow p-2 @error('conclusion') border-3 border-red-500 @enderror"
                name="conclusion" wire:model="conclusion" id="conclusion" rows="6"></textarea>                
        </div>
    </div>
    <div class="flex gap-4">
        <button wire:click="save" class="border border-green-400 px-4 py-2 hover:bg-green-300">Save Changes</button>
        <button wire:click="cancel" class="border border-yellow-600 px-4 py-2 hover:bg-yellow-400">Cancel</button>
    </div>
</div>
<div class="flex flex-col p-2 border-2 border-dashed border-gray-400 mb-2 space-y-2">
    <div class="flex text-black space-x-2">        
        <div class="font-bold">
            {{ $scavenger->question }} in {{ $scavenger->verse }}?
        </div>        
    </div>
    <div class="flex-wrap space-x-6 sm:flex">
        @foreach ($scavenger->targets as $target)
        <livewire:front.target-item :target="$target" :verse="$scavenger->verse" :score="$score" :question="$scavenger->question" :answer="$scavenger->answer"
            wire:key="{{ $target->id }}">
        </livewire:front.target-item>
        @endforeach
    </div>    
</div>

<div class="flex flex-col p-2 mb-2 space-y-2 border border-green-50 hover:border hover:border-gray-600 hover:border-dotted">
    <div class="flex text-black space-x-2">        
        <div class="font-bold">
            {{ $math->question }}? 
            @if(!empty($math->formula))
               <span class="text-sm font-light italic">Formula: {{ $math->formula }}</span>   
            @endif
        </div>
    </div>
    <div class="sm:flex">
        @foreach ($math->options as $choice)
        <livewire:front.math-choice-item :choice="$choice" :items="$items" :verses="$math->verses" :question="$math->question" :answer="$math->answer"
            wire:key="{{ $choice->id }}">
        </livewire:front.math-choice-item>
        @endforeach
    </div>
</div>

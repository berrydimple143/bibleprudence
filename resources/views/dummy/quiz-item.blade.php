<div class="flex flex-col p-2 border-2 border-dashed border-gray-400 mb-2 space-y-2">
    <div class="flex text-black space-x-2">
        <div class="font-bold">
            {{ $counter }}.
        </div> 
        <div class="font-bold">
            {{ $quiz->question }}
        </div>
        {{-- <div>
            ({{ $quiz->verse }})
        </div> --}}
        <div class="cursor-pointer" title="Comment here for this item only" wire:click="$toggle('commenting')">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#000000"
                fill="none">
                <path d="M8 13.5H16M8 8.5H12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                    stroke-linejoin="round" />
                <path
                    d="M6.09881 19C4.7987 18.8721 3.82475 18.4816 3.17157 17.8284C2 16.6569 2 14.7712 2 11V10.5C2 6.72876 2 4.84315 3.17157 3.67157C4.34315 2.5 6.22876 2.5 10 2.5H14C17.7712 2.5 19.6569 2.5 20.8284 3.67157C22 4.84315 22 6.72876 22 10.5V11C22 14.7712 22 16.6569 20.8284 17.8284C19.6569 19 17.7712 19 14 19C13.4395 19.0125 12.9931 19.0551 12.5546 19.155C11.3562 19.4309 10.2465 20.0441 9.14987 20.5789C7.58729 21.3408 6.806 21.7218 6.31569 21.3651C5.37769 20.6665 6.29454 18.5019 6.5 17.5"
                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
            </svg>
        </div>
    </div>
    <div class="flex-wrap space-x-6 sm:flex">
        @foreach ($quiz->selections as $choice)
        <livewire:front.choice-item :choice="$choice" :score="$score" :question="$quiz->question" :answer="$quiz->answer"
            wire:key="{{ $choice->id }}">
        </livewire:front.choice-item>
        @endforeach
    </div>
    @if($commenting)
    <div class="flex text-black space-x-2">
        <livewire:front.comment-quiz :quiz="$quiz" wire:key="{{ $quiz->id }}">
        </livewire:front.comment-quiz>
    </div>
    @endif
</div>
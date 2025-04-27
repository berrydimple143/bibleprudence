<div class="flex flex-col text-gray-900 px-2 py-3">    
    <livewire:front.quiz-menu :score="$score"></livewire:front.quiz-menu>
    @if($quizzes->count())
        @foreach ($quizzes as $quiz)
            <livewire:front.quiz-item :quiz="$quiz" :items="$items" :counter="$counter" wire:key="{{ $quiz->id }}">
            </livewire:front.quiz-item>
            <?php $counter++; ?>
        @endforeach
    @endif    
</div>

<div class="flex flex-col text-gray-900 px-2 py-3">
    <livewire:front.quiz-menu :score="$score"></livewire:front.quiz-menu>
    @if($quizzes->count())
    @foreach ($quizzes as $quiz)
    <livewire:front.quiz-item :quiz="$quiz" :score="$score"
        :counter="($quizzes ->currentpage()-1) * $quizzes ->perpage() + $loop->index + 1" wire:key="{{ $quiz->id }}">
    </livewire:front.quiz-item>
    @endforeach
    @endif
    <div>
        {{ $quizzes->links(data: ['scrollTop' => false]) }}
    </div>
</div>

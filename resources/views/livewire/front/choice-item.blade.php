<div class="flex gap-1 items-center">
    <input type="radio" title="Is this your answer?" @click="$refs.correct.play()"
        wire:change="checkAnswer('{{ $choice->option }}')"
        class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600 cursor-pointer"
        name="{{ $choice->quiz_id }}" answer="{{ $answer }}" value="{{ $choice->option }}">
    <span>{{ $choice->option
        }}</span>
    <audio x-ref="correct">
        <source src="{{ asset('sounds/correct.mp3') }}" type="audio/mpeg" />
    </audio>
</div>

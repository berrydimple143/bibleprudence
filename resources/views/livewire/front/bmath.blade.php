<div class="flex flex-col text-gray-900 px-2 py-3">
    <livewire:front.math-menu :score="$score"></livewire:front.math-menu>
    @if($bmaths->count())
        @foreach ($bmaths as $math)
            <livewire:front.math-item :math="$math" :items="$items" :counter="$counter" wire:key="{{ $math->id }}">
            </livewire:front.math-item>
            <?php $counter++; ?>
        @endforeach
    @endif    
</div>

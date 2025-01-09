<div class="flex flex-col text-gray-900 px-2 py-3">
    <livewire:front.scavenger-menu :score="$score"></livewire:front.scavenger-menu>
    @if($scavengers->count())
        @foreach ($scavengers as $scavenger)
            <livewire:front.scavenger-item :scavenger="$scavenger" :score="$score"
                :counter="$counter" wire:key="{{ $scavenger->id }}">
            </livewire:front.scavenger-item>
            <?php $counter++; ?>
        @endforeach
    @endif    
</div>

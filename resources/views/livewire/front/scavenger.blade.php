<div class="flex flex-col text-gray-900 px-2 py-3">
    <livewire:front.scavenger-menu :score="$score"></livewire:front.scavenger-menu>
    @if($scavengers->count())
    @foreach ($scavengers as $scavenger)
    <livewire:front.scavenger-item :scavenger="$scavenger" :score="$score"
        :counter="($scavengers ->currentpage()-1) * $scavengers ->perpage() + $loop->index + 1" wire:key="{{ $scavenger->id }}">
    </livewire:front.scavenger-item>
    @endforeach
    @endif
    <div>
        {{ $scavengers->links(data: ['scrollTop' => false]) }}
    </div>
</div>

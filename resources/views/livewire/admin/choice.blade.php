<div class="p-5">
    @if($showForm == 'add')
    <livewire:admin.create-choice></livewire:admin.create-choice>
    @elseif($showForm == 'edit')
    <livewire:admin.update-choice :choice="$choice"></livewire:admin.update-choice>
    @else
    <div class="w-full">
        <div class="w-full bg-gray-800 border-b-2 border-dotted border-gray-600 p-4 flex items-center justify-between">
            <div class="flex gap-3">
                <div class="flex gap-2 items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="white" d="M0 96C0 60.7 28.7 32 64 32l384 0c35.3 0 64 28.7 64 64l0 320c0 35.3-28.7 64-64 64L64 480c-35.3 0-64-28.7-64-64L0 96zm64 0l0 64 64 0 0-64L64 96zm384 0L192 96l0 64 256 0 0-64zM64 224l0 64 64 0 0-64-64 0zm384 0l-256 0 0 64 256 0 0-64zM64 352l0 64 64 0 0-64-64 0zm384 0l-256 0 0 64 256 0 0-64z"/></svg>                    
                    <span class="text-xl text-white">Choices Table</span>
                </div>
                <p class="text-xl text-white flex items-center gap-4">
                    <span>
                        <button wire:click="addChoice" wire:loading.class="opacity-50"
                            class="bg-green-500 px-3 py-1 rounded-md border border-white shadow-lg flex items-center gap-1 hover:bg-green-700">
                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 448 512">
                                <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                <path fill="white"
                                    d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 144L48 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l144 0 0 144c0 17.7 14.3 32 32 32s32-14.3 32-32l0-144 144 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-144 0 0-144z" />
                            </svg>
                            Add Choice
                        </button>
                    </span>
                </p>
            </div>
            <input type="text" class="px-4 py-1 rounded-full border border-white shadow-lg"
                wire:model.live.debounce.300ms="search" placeholder="Search choice here ...">
        </div>
        <div class="bg-white overflow-auto">
            <table class="min-w-full bg-white">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="w-5 text-left py-3 px-4 uppercase font-semibold text-sm">#</th>
                        <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Quiz Question</th>
                        <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm"><span class="cursor-pointer" wire:click="sort('option')">Option</span></th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Action</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @foreach($choices as $choice)
                    <?php
                        $index = ($choices ->currentpage()-1) * $choices ->perpage() + $loop->index + 1;
                        $addClass = '';
                        if($index % 2 === 0) {
                            $addClass = 'bg-gray-200';
                        }
                    ?>
                    <tr class="{{ $addClass }}" wire:key="{{ $choice->id }}">
                        <td class="w-5 text-left py-3 px-4 font-semibold text-sm">{{ $index }}</td>
                        <td class="w-1/3 text-left py-3 px-4">{{ $choice->quiz->question }}</td>
                        <td class="w-1/3 text-left py-3 px-4">{{ $choice->option }}</td>
                        <td class="text-left py-3 px-4 flex gap-2 text-white">
                            <button wire:click="editChoice('{{ $choice->id }}')" type="button"
                                class="bg-yellow-500 px-4 py-2 rounded-sm shadow-md flex items-center gap-1 hover:bg-yellow-700">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 448 512">
                                    <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path fill="white"
                                        d="M64 32C28.7 32 0 60.7 0 96L0 416c0 35.3 28.7 64 64 64l320 0c35.3 0 64-28.7 64-64l0-320c0-35.3-28.7-64-64-64L64 32zM325.8 139.7l14.4 14.4c15.6 15.6 15.6 40.9 0 56.6l-21.4 21.4-71-71 21.4-21.4c15.6-15.6 40.9-15.6 56.6 0zM119.9 289L225.1 183.8l71 71L190.9 359.9c-4.1 4.1-9.2 7-14.9 8.4l-60.1 15c-5.5 1.4-11.2-.2-15.2-4.2s-5.6-9.7-4.2-15.2l15-60.1c1.4-5.6 4.3-10.8 8.4-14.9z" />
                                </svg>
                                Edit
                            </button>
                            <button wire:confirm="Are you sure you want to delete this choice?"
                                wire:click="deleteChoice({{ $choice->id }})" type="button"
                                class="bg-red-500 px-4 py-2 rounded-sm shadow-md flex items-center gap-1 hover:bg-red-700">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 448 512">
                                    <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path fill="white"
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0L284.2 0c12.1 0 23.2 6.8 28.6 17.7L320 32l96 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 96C14.3 96 0 81.7 0 64S14.3 32 32 32l96 0 7.2-14.3zM32 128l384 0 0 320c0 35.3-28.7 64-64 64L96 512c-35.3 0-64-28.7-64-64l0-320zm96 64c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16z" />
                                </svg>
                                Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{ $choices->links() }}
    @endif
</div>

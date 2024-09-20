<div class="flex-wrap sm:flex items-center justify-between">
    <div class="flex-wrap sm:flex items-start p-2 border border-gray-400 mb-2 space-x-2">
        <div class="bg-green-300 p-2 border border-green-500">
            <h1 class="font-bold">Bible Quiz</h1>
        </div>
        <div class="bg-green-300 p-2 border border-green-500">
            <label for="">Topic:</label>
            <select class="bg-green-300" wire:model="topic" wire:change="changeTopic">
                <option value="">All</option>
                @foreach ($topics as $topic)
                <option value="{{ $topic->id }}">{{ $topic->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="bg-green-300 p-2 border border-green-500">
            <label for="">Level:</label>
            <select class="bg-green-300" wire:model="level" wire:change="changeLevel">
                <option value="">All</option>
                <option value="Easy">Easy</option>
                <option value="Average">Average</option>
                <option value="Hard">Hard</option>
            </select>
        </div>
        <div wire:click="generatePdf" @click="$refs.download.play()" wire:loading.class="opacity-50" wire:loading.attr="disabled"   
            class="flex items-center space-x-1 text-white bg-green-500 p-2 border border-green-800 border-dashed cursor-pointer hover:bg-teal-800">
            <svg xmlns="http://www.w3.org/2000/svg" class="text-white" viewBox="0 0 24 24" width="24" height="24"
                color="#000000" fill="none">
                <path
                    d="M2.5 12C2.5 7.52166 2.5 5.28249 3.89124 3.89124C5.28249 2.5 7.52166 2.5 12 2.5C16.4783 2.5 18.7175 2.5 20.1088 3.89124C21.5 5.28249 21.5 7.52166 21.5 12C21.5 16.4783 21.5 18.7175 20.1088 20.1088C18.7175 21.5 16.4783 21.5 12 21.5C7.52166 21.5 5.28249 21.5 3.89124 20.1088C2.5 18.7175 2.5 16.4783 2.5 12Z"
                    stroke="currentColor" stroke-width="1.5" />
                <path d="M12 16L12 8M12 16C11.2998 16 9.99153 14.0057 9.5 13.5M12 16C12.7002 16 14.0085 14.0057 14.5 13.5"
                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <span>Download PDF</span>
        </div>
        <a href="{{ route('site') }}" @click="$refs.refreshPage.play()">
            <div
                class="flex items-center space-x-1 text-white bg-green-500 p-2 border border-green-800 border-dashed cursor-pointer hover:bg-teal-800">
                <svg xmlns="http://www.w3.org/2000/svg" class="text-white" viewBox="0 0 24 24" width="24" height="24"
                    color="#000000" fill="none">
                    <path
                        d="M19.5576 4L20.4551 4.97574C20.8561 5.41165 21.0566 5.62961 20.9861 5.81481C20.9155 6 20.632 6 20.0649 6C18.7956 6 17.2771 5.79493 16.1111 6.4733C15.3903 6.89272 14.8883 7.62517 14.0392 9M3 18H4.58082C6.50873 18 7.47269 18 8.2862 17.5267C9.00708 17.1073 9.50904 16.3748 10.3582 15"
                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path
                        d="M19.5576 20L20.4551 19.0243C20.8561 18.5883 21.0566 18.3704 20.9861 18.1852C20.9155 18 20.632 18 20.0649 18C18.7956 18 17.2771 18.2051 16.1111 17.5267C15.2976 17.0534 14.7629 16.1815 13.6935 14.4376L10.7038 9.5624C9.63441 7.81853 9.0997 6.9466 8.2862 6.4733C7.47269 6 6.50873 6 4.58082 6H3"
                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <span>Shuffle</span>
            </div>
        </a>        
        <audio x-ref="download">
            <source src="{{ asset('sounds/download.wav') }}" type="audio/mpeg" />
        </audio>
        <audio x-ref="refreshPage">
            <source src="{{ asset('sounds/soda.mp3') }}" type="audio/mpeg" />
        </audio>             
    </div>
    <form wire:submit="searchItem">
        <input class="w-64 p-2 border border-green-500 outline-none shadow-md" type="text" id="search" name="search" wire:model="search" placeholder="Search here and hit enter ...">   
    </form>    
</div>

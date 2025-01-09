<div class="bg-green-300 p-2 border border-green-500">
            <label for="">Book:</label>
            <select class="bg-green-300" wire:model="book" wire:change="changeBook">
                <option value="">All</option>
                @foreach ($books as $book)
                <option value="{{ $book->id }}">{{ $book->name }}</option>
                @endforeach
            </select>
        </div>
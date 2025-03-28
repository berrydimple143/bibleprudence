<div class="flex flex-col p-5 text-gray-900">
    <h1 class="text-2xl font-bold">{{ $post->title }}</h1>
    <p class="text-sm mb-2">Posted by {{ $post->author }} on {{ formatDate($post->date_posted) }}</p>    
    {!! $newBody !!}    
    <livewire:front.comment :post="$post"></livewire:front.comment>    
</div>

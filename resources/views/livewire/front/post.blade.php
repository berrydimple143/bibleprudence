<div class="flex flex-col p-5 text-gray-900">
    @if (session()->has('msg'))    
      <div x-data="{
            visible: true
      }" 
      x-init="setTimeout(() => { visible = false }, 2000)" x-show="visible" class="absolute top-0 right-0 z-40">
        <div class="flex items-center justify-center gap-2 w-full px-4 py-3 text-white text-2xl bg-green-500 border-2 border-green-700 border-solid">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 448 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="white" d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"/></svg>
          <h2>{{ session('msg') }}</h2>
        </div>
      </div>
    @endif
    <h1 class="text-2xl font-bold">{{ $post->title }}</h1>
    <p class="text-sm mb-2">Posted by {{ $post->author }} on {{ formatDate($post->date_posted) }}</p>    
    {!! $newBody !!}    
    <livewire:front.comment :post="$post"></livewire:front.comment>    
</div>

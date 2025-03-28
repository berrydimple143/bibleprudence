<div class="flex flex-col md:flex-row gap-2 mt-5 p-5 shadow-lg">
    <?php 
        $tl = $blog->title;
        $dp = $blog->date_posted;
        $bd = strip_tags($blog->body);
        $slug = strtolower(getSlug($tl));
    ?>
    <a wire:navigate.hover href="{{ route('post', ['id' => $blog->id, 'slug' => $slug]) }}" title="{{ $tl }}"><img src="{{ $blog->image }}" class="w-56 md:w-64 cursor-pointer object-center" alt="Image for {{ $tl }}"></a>
    <div class="flex flex-col">
        <a wire:navigate.hover href="{{ route('post', ['id' => $blog->id, 'slug' => $slug]) }}" title="{{ $tl }}">
            <h1 class="font-bold text-2xl cursor-pointer text-blue-500">{{ $tl }}</h1>
        </a>
        <p class="font-light italic text-xs">Date Posted: {{ formatDate($dp) }} at {{ formatDateHour($dp) }}</p>
        <p class="flex flex-wrap mt-2">{!! replaceTemporary(limitWords($blog->body, 260, '...')) !!}</p>
    </div>    
</div>

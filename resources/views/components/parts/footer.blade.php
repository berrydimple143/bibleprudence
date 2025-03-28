<div class="bg-black text-white p-3 absolute sticky bottom-0 flex flex-col items-center">
    <div class="flex flex-wrap items-center gap-3 justify-center text-sm px-4 pb-2 border-b border-gray-600 border-dashed">
        <a wire:navigate.hover href="{{ route('site') }}" class="@if($page == 'quiz') text-green-400 @endif">Bible Quiz</a>
        <div>|</div>
        <a wire:navigate.hover href="{{ route('scavenger') }}" class="@if($page == 'scavenger') text-green-400 @endif">Bible Scavenger</a>
        <div>|</div>
        <a wire:navigate.hover href="{{ route('bmath') }}" class="@if($page == 'math') text-green-400 @endif">Bible Math</a>
        <div>|</div>
        <a wire:navigate.hover href="{{ route('blog') }}" class="@if($page == 'blog' || $page == 'post') text-green-400 @endif">Blog</a>
        <div>|</div>
        <a wire:navigate.hover href="{{ route('about') }}" class="@if($page == 'about') text-green-400 @endif">About Us</a>
        <div>|</div>
        <a wire:navigate.hover href="{{ route('contact') }}" class="@if($page == 'contact') text-green-400 @endif">Contact Us</a>
        <div>|</div>
        <a wire:navigate.hover href="{{ route('privacy') }}" class="@if($page == 'privacy') text-green-400 @endif">Privacy Policy</a>
        <div>|</div>
        <a wire:navigate.hover href="{{ route('terms') }}" class="@if($page == 'terms') text-green-400 @endif">Terms and Conditions</a>
        <div>|</div>
        <a wire:navigate.hover href="{{ route('disclaimer') }}" class="@if($page == 'disclaimer') text-green-400 @endif">Disclaimer</a>        
    </div>
    <p class="mt-2 text-xs">&copy; BMBC 2024. All rights reserved.</p>
</div>


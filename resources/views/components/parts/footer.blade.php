<div class="bg-black text-white p-3 sticky bottom-0 flex flex-col items-center">
    <div class="flex items-center gap-3 justify-center text-sm px-4 pb-2 border-b border-gray-600 border-dashed">
        <a wire:navigate href="{{ route('site') }}" class="@if($page == 'quiz') text-green-400 @endif">Bible Quiz</a>
        <div>|</div>
        <a wire:navigate href="{{ route('scavenger') }}" class="@if($page == 'scavenger') text-green-400 @endif">Bible Scavenger</a>
        <div>|</div>
        <a wire:navigate href="{{ route('about') }}" class="@if($page == 'about') text-green-400 @endif">About Us</a>
        <div>|</div>
        <a wire:navigate href="{{ route('contact') }}" class="@if($page == 'contact') text-green-400 @endif">Contact Us</a>
        <div>|</div>
        <a wire:navigate href="{{ route('privacy') }}" class="@if($page == 'privacy') text-green-400 @endif">Privacy Policy</a>
    </div>
    <p class="mt-2 text-xs">&copy; BMBC 2024. All rights reserved.</p>
</div>

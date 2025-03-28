<aside class="relative bg-green-600 h-screen w-64 hidden sm:block shadow-xl">
    <div class="p-6">
        <a href="{{ route('secret') }}" wire:navigate class="text-white text-3xl font-semibold uppercase hover:text-gray-300">Cpanel</a>       
    </div>
    <nav class="text-white text-base font-semibold scroll-smooth">
        <a href="{{ route('secret') }}" wire:navigate class="flex items-center @if($page == 'home') bg-green-900 @endif text-white py-1 pl-6 border-b border-t border-white border-dotted shadow-lg hover:bg-green-900">
            <svg xmlns="http://www.w3.org/2000/svg" class="mr-4" width="15" height="15" viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="white" d="M64 64c0-17.7-14.3-32-32-32S0 46.3 0 64L0 400c0 44.2 35.8 80 80 80l400 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L80 416c-8.8 0-16-7.2-16-16L64 64zm406.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L320 210.7l-57.4-57.4c-12.5-12.5-32.8-12.5-45.3 0l-112 112c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L240 221.3l57.4 57.4c12.5 12.5 32.8 12.5 45.3 0l128-128z"/></svg>
            Dashboard
        </a>
        <a href="{{ route('quizzes') }}" wire:navigate class="flex items-center @if($page == 'quiz') bg-green-900 @endif text-white hover:opacity-100 py-1 pl-6 border-b border-white border-dotted shadow-lg hover:bg-green-900">
            <svg xmlns="http://www.w3.org/2000/svg" class="mr-4" width="15" height="15" viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="white" d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152L0 424c0 48.6 39.4 88 88 88l272 0c48.6 0 88-39.4 88-88l0-112c0-13.3-10.7-24-24-24s-24 10.7-24 24l0 112c0 22.1-17.9 40-40 40L88 464c-22.1 0-40-17.9-40-40l0-272c0-22.1 17.9-40 40-40l112 0c13.3 0 24-10.7 24-24s-10.7-24-24-24L88 64z"/></svg>
            Quizzes
        </a>
        <a href="{{ route('choices') }}" wire:navigate class="flex items-center @if($page == 'choice') bg-green-900 @endif text-white hover:opacity-100 py-1 pl-6 border-b border-white border-dotted shadow-lg hover:bg-green-900">
            <svg xmlns="http://www.w3.org/2000/svg" class="mr-4" width="15" height="15" viewBox="0 0 448 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="white" d="M128 40c0-22.1 17.9-40 40-40s40 17.9 40 40l0 148.2c8.5-7.6 19.7-12.2 32-12.2c20.6 0 38.2 13 45 31.2c8.8-9.3 21.2-15.2 35-15.2c25.3 0 46 19.5 47.9 44.3c8.5-7.7 19.8-12.3 32.1-12.3c26.5 0 48 21.5 48 48l0 48 0 16 0 48c0 70.7-57.3 128-128 128l-16 0-64 0-.1 0-5.2 0c-5 0-9.9-.3-14.7-1c-55.3-5.6-106.2-34-140-79L8 336c-13.3-17.7-9.7-42.7 8-56s42.7-9.7 56 8l56 74.7L128 40zM240 304c0-8.8-7.2-16-16-16s-16 7.2-16 16l0 96c0 8.8 7.2 16 16 16s16-7.2 16-16l0-96zm48-16c-8.8 0-16 7.2-16 16l0 96c0 8.8 7.2 16 16 16s16-7.2 16-16l0-96c0-8.8-7.2-16-16-16zm80 16c0-8.8-7.2-16-16-16s-16 7.2-16 16l0 96c0 8.8 7.2 16 16 16s16-7.2 16-16l0-96z"/></svg>
            Quiz Choices
        </a>                
        <a href="{{ route('comments') }}" wire:navigate class="flex items-center @if($page == 'comment') bg-green-900 @endif text-white hover:opacity-100 py-1 pl-6 border-b border-white border-dotted shadow-lg hover:bg-green-900">
            <svg xmlns="http://www.w3.org/2000/svg" class="mr-4" width="15" height="15" viewBox="0 0 640 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="white" d="M88.2 309.1c9.8-18.3 6.8-40.8-7.5-55.8C59.4 230.9 48 204 48 176c0-63.5 63.8-128 160-128s160 64.5 160 128s-63.8 128-160 128c-13.1 0-25.8-1.3-37.8-3.6c-10.4-2-21.2-.6-30.7 4.2c-4.1 2.1-8.3 4.1-12.6 6c-16 7.2-32.9 13.5-49.9 18c2.8-4.6 5.4-9.1 7.9-13.6c1.1-1.9 2.2-3.9 3.2-5.9zM208 352c114.9 0 208-78.8 208-176S322.9 0 208 0S0 78.8 0 176c0 41.8 17.2 80.1 45.9 110.3c-.9 1.7-1.9 3.5-2.8 5.1c-10.3 18.4-22.3 36.5-36.6 52.1c-6.6 7-8.3 17.2-4.6 25.9C5.8 378.3 14.4 384 24 384c43 0 86.5-13.3 122.7-29.7c4.8-2.2 9.6-4.5 14.2-6.8c15.1 3 30.9 4.5 47.1 4.5zM432 480c16.2 0 31.9-1.6 47.1-4.5c4.6 2.3 9.4 4.6 14.2 6.8C529.5 498.7 573 512 616 512c9.6 0 18.2-5.7 22-14.5c3.8-8.8 2-19-4.6-25.9c-14.2-15.6-26.2-33.7-36.6-52.1c-.9-1.7-1.9-3.4-2.8-5.1C622.8 384.1 640 345.8 640 304c0-94.4-87.9-171.5-198.2-175.8c4.1 15.2 6.2 31.2 6.2 47.8l0 .6c87.2 6.7 144 67.5 144 127.4c0 28-11.4 54.9-32.7 77.2c-14.3 15-17.3 37.6-7.5 55.8c1.1 2 2.2 4 3.2 5.9c2.5 4.5 5.2 9 7.9 13.6c-17-4.5-33.9-10.7-49.9-18c-4.3-1.9-8.5-3.9-12.6-6c-9.5-4.8-20.3-6.2-30.7-4.2c-12.1 2.4-24.8 3.6-37.8 3.6c-61.7 0-110-26.5-136.8-62.3c-16 5.4-32.8 9.4-50 11.8C279 439.8 350 480 432 480z"/></svg>
            Comments
        </a>           
        <a href="{{ route('scavengers') }}" wire:navigate class="flex items-center @if($page == 'scavengers') bg-green-900 @endif text-white hover:opacity-100 py-1 pl-6 border-b border-white border-dotted shadow-lg hover:bg-green-900">
            <svg xmlns="http://www.w3.org/2000/svg" class="mr-4" width="15" height="15" viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="white" d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/></svg>
            Scavengers
        </a>
        <a href="{{ route('targets') }}" wire:navigate class="flex items-center @if($page == 'targets') bg-green-900 @endif text-white hover:opacity-100 py-1 pl-6 border-b border-white border-dotted shadow-lg hover:bg-green-900">
            <svg xmlns="http://www.w3.org/2000/svg" class="mr-4" width="16" height="16" viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="white" d="M448 256A192 192 0 1 0 64 256a192 192 0 1 0 384 0zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zm256 80a80 80 0 1 0 0-160 80 80 0 1 0 0 160zm0-224a144 144 0 1 1 0 288 144 144 0 1 1 0-288zM224 256a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z"/></svg>
            Targets
        </a>        
        <a href="{{ route('outlines') }}" wire:navigate class="flex items-center @if($page == 'outlines') bg-green-900 @endif text-white hover:opacity-100 py-1 pl-6 border-b border-white border-dotted shadow-lg hover:bg-green-900">
            <svg xmlns="http://www.w3.org/2000/svg" class="mr-4" width="16" height="16" viewBox="0 0 448 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="white" d="M96 0C43 0 0 43 0 96L0 416c0 53 43 96 96 96l288 0 32 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l0-64c17.7 0 32-14.3 32-32l0-320c0-17.7-14.3-32-32-32L384 0 96 0zm0 384l256 0 0 64L96 448c-17.7 0-32-14.3-32-32s14.3-32 32-32zm32-240c0-8.8 7.2-16 16-16l192 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-192 0c-8.8 0-16-7.2-16-16zm16 48l192 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-192 0c-8.8 0-16-7.2-16-16s7.2-16 16-16z"/></svg>
            Bible Outlines
        </a>
        <a href="{{ route('outline.points') }}" wire:navigate class="flex items-center @if($page == 'points') bg-green-900 @endif text-white hover:opacity-100 py-1 pl-6 border-b border-white border-dotted shadow-lg hover:bg-green-900">
            <svg xmlns="http://www.w3.org/2000/svg" class="mr-4" width="16" height="16" viewBox="0 0 448 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="white" d="M0 96C0 78.3 14.3 64 32 64l384 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 128C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32l384 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 288c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32L32 448c-17.7 0-32-14.3-32-32s14.3-32 32-32l384 0c17.7 0 32 14.3 32 32z"/></svg>    
            Outline Points
        </a>
        <a href="{{ route('outline.subpoints') }}" wire:navigate class="flex items-center @if($page == 'subpoints') bg-green-900 @endif text-white hover:opacity-100 py-1 pl-6 border-b border-white border-dotted shadow-lg hover:bg-green-900">
            <svg xmlns="http://www.w3.org/2000/svg" class="mr-4" width="16" height="16" viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="white" d="M0 96C0 78.3 14.3 64 32 64l384 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 128C14.3 128 0 113.7 0 96zM64 256c0-17.7 14.3-32 32-32l384 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L96 288c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32L32 448c-17.7 0-32-14.3-32-32s14.3-32 32-32l384 0c17.7 0 32 14.3 32 32z"/></svg>    
            Outline Subpoints
        </a>
        <a href="{{ route('topics') }}" wire:navigate class="flex items-center @if($page == 'topic') bg-green-900 @endif text-white hover:opacity-100 py-1 pl-6 border-b border-white border-dotted shadow-lg hover:bg-green-900">
            <svg xmlns="http://www.w3.org/2000/svg" class="mr-4" width="15" height="15" viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="white" d="M168 80c-13.3 0-24 10.7-24 24l0 304c0 8.4-1.4 16.5-4.1 24L440 432c13.3 0 24-10.7 24-24l0-304c0-13.3-10.7-24-24-24L168 80zM72 480c-39.8 0-72-32.2-72-72L0 112C0 98.7 10.7 88 24 88s24 10.7 24 24l0 296c0 13.3 10.7 24 24 24s24-10.7 24-24l0-304c0-39.8 32.2-72 72-72l272 0c39.8 0 72 32.2 72 72l0 304c0 39.8-32.2 72-72 72L72 480zM176 136c0-13.3 10.7-24 24-24l96 0c13.3 0 24 10.7 24 24l0 80c0 13.3-10.7 24-24 24l-96 0c-13.3 0-24-10.7-24-24l0-80zm200-24l32 0c13.3 0 24 10.7 24 24s-10.7 24-24 24l-32 0c-13.3 0-24-10.7-24-24s10.7-24 24-24zm0 80l32 0c13.3 0 24 10.7 24 24s-10.7 24-24 24l-32 0c-13.3 0-24-10.7-24-24s10.7-24 24-24zM200 272l208 0c13.3 0 24 10.7 24 24s-10.7 24-24 24l-208 0c-13.3 0-24-10.7-24-24s10.7-24 24-24zm0 80l208 0c13.3 0 24 10.7 24 24s-10.7 24-24 24l-208 0c-13.3 0-24-10.7-24-24s10.7-24 24-24z"/></svg>
            Topics
        </a>
        <a href="{{ route('books') }}" wire:navigate class="flex items-center @if($page == 'book') bg-green-900 @endif text-white hover:opacity-100 py-1 pl-6 border-b border-white border-dotted shadow-lg hover:bg-green-900">
            <svg xmlns="http://www.w3.org/2000/svg" class="mr-4" width="15" height="15" viewBox="0 0 384 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="white" d="M0 48V487.7C0 501.1 10.9 512 24.3 512c5 0 9.9-1.5 14-4.4L192 400 345.7 507.6c4.1 2.9 9 4.4 14 4.4c13.4 0 24.3-10.9 24.3-24.3V48c0-26.5-21.5-48-48-48H48C21.5 0 0 21.5 0 48z"/></svg>
            Books
        </a>
        <a href="{{ route('admin.contact') }}" wire:navigate class="flex items-center @if($page == 'contact') bg-green-900 @endif text-white hover:opacity-100 py-1 pl-6 border-b border-white border-dotted shadow-lg hover:bg-green-900">
            <svg xmlns="http://www.w3.org/2000/svg" class="mr-4" width="15" height="15" viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="white" d="M64 112c-8.8 0-16 7.2-16 16l0 22.1L220.5 291.7c20.7 17 50.4 17 71.1 0L464 150.1l0-22.1c0-8.8-7.2-16-16-16L64 112zM48 212.2L48 384c0 8.8 7.2 16 16 16l384 0c8.8 0 16-7.2 16-16l0-171.8L322 328.8c-38.4 31.5-93.7 31.5-132 0L48 212.2zM0 128C0 92.7 28.7 64 64 64l384 0c35.3 0 64 28.7 64 64l0 256c0 35.3-28.7 64-64 64L64 448c-35.3 0-64-28.7-64-64L0 128z"/></svg>
            Contacts
        </a>
        <a href="{{ route('seo') }}" wire:navigate class="flex items-center @if($page == 'seo') bg-green-900 @endif text-white hover:opacity-100 py-1 pl-6 border-b border-white border-dotted shadow-lg hover:bg-green-900">
            <svg xmlns="http://www.w3.org/2000/svg" class="mr-4" width="20" height="20" viewBox="0 0 640 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="white" d="M308.5 135.3c7.1-6.3 9.9-16.2 6.2-25c-2.3-5.3-4.8-10.5-7.6-15.5L304 89.4c-3-5-6.3-9.9-9.8-14.6c-5.7-7.6-15.7-10.1-24.7-7.1l-28.2 9.3c-10.7-8.8-23-16-36.2-20.9L199 27.1c-1.9-9.3-9.1-16.7-18.5-17.8C173.9 8.4 167.2 8 160.4 8l-.7 0c-6.8 0-13.5 .4-20.1 1.2c-9.4 1.1-16.6 8.6-18.5 17.8L115 56.1c-13.3 5-25.5 12.1-36.2 20.9L50.5 67.8c-9-3-19-.5-24.7 7.1c-3.5 4.7-6.8 9.6-9.9 14.6l-3 5.3c-2.8 5-5.3 10.2-7.6 15.6c-3.7 8.7-.9 18.6 6.2 25l22.2 19.8C32.6 161.9 32 168.9 32 176s.6 14.1 1.7 20.9L11.5 216.7c-7.1 6.3-9.9 16.2-6.2 25c2.3 5.3 4.8 10.5 7.6 15.6l3 5.2c3 5.1 6.3 9.9 9.9 14.6c5.7 7.6 15.7 10.1 24.7 7.1l28.2-9.3c10.7 8.8 23 16 36.2 20.9l6.1 29.1c1.9 9.3 9.1 16.7 18.5 17.8c6.7 .8 13.5 1.2 20.4 1.2s13.7-.4 20.4-1.2c9.4-1.1 16.6-8.6 18.5-17.8l6.1-29.1c13.3-5 25.5-12.1 36.2-20.9l28.2 9.3c9 3 19 .5 24.7-7.1c3.5-4.7 6.8-9.5 9.8-14.6l3.1-5.4c2.8-5 5.3-10.2 7.6-15.5c3.7-8.7 .9-18.6-6.2-25l-22.2-19.8c1.1-6.8 1.7-13.8 1.7-20.9s-.6-14.1-1.7-20.9l22.2-19.8zM112 176a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zM504.7 500.5c6.3 7.1 16.2 9.9 25 6.2c5.3-2.3 10.5-4.8 15.5-7.6l5.4-3.1c5-3 9.9-6.3 14.6-9.8c7.6-5.7 10.1-15.7 7.1-24.7l-9.3-28.2c8.8-10.7 16-23 20.9-36.2l29.1-6.1c9.3-1.9 16.7-9.1 17.8-18.5c.8-6.7 1.2-13.5 1.2-20.4s-.4-13.7-1.2-20.4c-1.1-9.4-8.6-16.6-17.8-18.5L583.9 307c-5-13.3-12.1-25.5-20.9-36.2l9.3-28.2c3-9 .5-19-7.1-24.7c-4.7-3.5-9.6-6.8-14.6-9.9l-5.3-3c-5-2.8-10.2-5.3-15.6-7.6c-8.7-3.7-18.6-.9-25 6.2l-19.8 22.2c-6.8-1.1-13.8-1.7-20.9-1.7s-14.1 .6-20.9 1.7l-19.8-22.2c-6.3-7.1-16.2-9.9-25-6.2c-5.3 2.3-10.5 4.8-15.6 7.6l-5.2 3c-5.1 3-9.9 6.3-14.6 9.9c-7.6 5.7-10.1 15.7-7.1 24.7l9.3 28.2c-8.8 10.7-16 23-20.9 36.2L315.1 313c-9.3 1.9-16.7 9.1-17.8 18.5c-.8 6.7-1.2 13.5-1.2 20.4s.4 13.7 1.2 20.4c1.1 9.4 8.6 16.6 17.8 18.5l29.1 6.1c5 13.3 12.1 25.5 20.9 36.2l-9.3 28.2c-3 9-.5 19 7.1 24.7c4.7 3.5 9.5 6.8 14.6 9.8l5.4 3.1c5 2.8 10.2 5.3 15.5 7.6c8.7 3.7 18.6 .9 25-6.2l19.8-22.2c6.8 1.1 13.8 1.7 20.9 1.7s14.1-.6 20.9-1.7l19.8 22.2zM464 304a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"/></svg>
            SEO
        </a>
        <a href="{{ route('download.limit') }}" wire:navigate class="flex items-center @if($page == 'download') bg-green-900 @endif text-white hover:opacity-100 py-1 pl-6 border-b border-white border-dotted shadow-lg hover:bg-green-900">
            <svg xmlns="http://www.w3.org/2000/svg" class="mr-4" width="15" height="15" viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="white" d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 242.7-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7 288 32zM64 352c-35.3 0-64 28.7-64 64l0 32c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-32c0-35.3-28.7-64-64-64l-101.5 0-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352 64 352zm368 56a24 24 0 1 1 0 48 24 24 0 1 1 0-48z"/></svg>
            Download Limits
        </a>    
        <a href="{{ route('maths') }}" wire:navigate class="flex items-center @if($page == 'maths') bg-green-900 @endif text-white hover:opacity-100 py-1 pl-6 border-b border-white border-dotted shadow-lg hover:bg-green-900">
            <svg fill="white" height="15" class="mr-4" width="15" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                         viewBox="0 0 460 460" xml:space="preserve">
                <g id="XMLID_241_">
                    <g>
                        <path d="M369.635,0H90.365C73.595,0,60,13.595,60,30.365v399.27C60,446.405,73.595,460,90.365,460h279.27
                            c16.77,0,30.365-13.595,30.365-30.365V30.365C400,13.595,386.405,0,369.635,0z M108.204,343.61v-43.196
                            c0-3.451,2.797-6.248,6.248-6.248h43.196c3.451,0,6.248,2.797,6.248,6.248v43.196c0,3.451-2.797,6.248-6.248,6.248h-43.196
                            C111.001,349.858,108.204,347.06,108.204,343.61z M108.204,256.61v-43.196c0-3.451,2.797-6.248,6.248-6.248h43.196
                            c3.451,0,6.248,2.797,6.248,6.248v43.196c0,3.451-2.797,6.248-6.248,6.248h-43.196C111.001,262.858,108.204,260.06,108.204,256.61
                            z M308.891,421H151.109c-11.046,0-20-8.954-20-20c0-11.046,8.954-20,20-20h157.782c11.046,0,20,8.954,20,20
                            C328.891,412.046,319.937,421,308.891,421z M208.402,294.165h43.196c3.451,0,6.248,2.797,6.248,6.248v43.196
                            c0,3.451-2.797,6.248-6.248,6.248h-43.196c-3.451,0-6.248-2.797-6.248-6.248v-43.196
                            C202.154,296.963,204.951,294.165,208.402,294.165z M202.154,256.61v-43.196c0-3.451,2.797-6.248,6.248-6.248h43.196
                            c3.451,0,6.248,2.797,6.248,6.248v43.196c0,3.451-2.797,6.248-6.248,6.248h-43.196C204.951,262.858,202.154,260.06,202.154,256.61
                            z M345.548,349.858h-43.196c-3.451,0-6.248-2.797-6.248-6.248v-43.196c0-3.451,2.797-6.248,6.248-6.248h43.196
                            c3.451,0,6.248,2.797,6.248,6.248v43.196h0C351.796,347.061,348.999,349.858,345.548,349.858z M345.548,262.858h-43.196
                            c-3.451,0-6.248-2.797-6.248-6.248v-43.196c0-3.451,2.797-6.248,6.248-6.248h43.196c3.451,0,6.248,2.797,6.248,6.248v43.196h0
                            C351.796,260.061,348.999,262.858,345.548,262.858z M354,149.637c0,11.799-9.565,21.363-21.363,21.363H127.364
                            C115.565,171,106,161.435,106,149.637V62.363C106,50.565,115.565,41,127.364,41h205.273C344.435,41,354,50.565,354,62.363V149.637
                            z"/>
                    </g>
                </g>
                </svg>
            Bible Math
        </a>          
        <a href="{{ route('math.choices') }}" wire:navigate class="flex items-center @if($page == 'math-choices') bg-green-900 @endif text-white hover:opacity-100 py-1 pl-6 border-b border-white border-dotted shadow-lg hover:bg-green-900">

        <svg fill="white" height="16" class="mr-4" width="16" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
             viewBox="0 0 492.049 492.049" xml:space="preserve">
        <g>
            <path d="M314.763,204.944c13.811,0,25.004-11.194,25.004-24.972c0-13.81-11.192-24.989-25.004-24.989
                c-13.793,0-24.972,11.18-24.972,24.989C289.791,193.749,300.97,204.944,314.763,204.944z"/>
            <path d="M406.638,179.972c0-13.81-11.19-24.989-24.983-24.989c-13.814,0-25.011,11.18-25.011,24.989
                c0,13.777,11.196,24.972,25.011,24.972C395.447,204.944,406.638,193.749,406.638,179.972z"/>
            <path d="M253.014,179.94c0-69.764-56.745-126.508-126.509-126.508C56.74,53.432,0,110.176,0,179.94
                C0,249.7,56.74,306.461,126.505,306.461C196.268,306.461,253.014,249.7,253.014,179.94z M126.505,273.381
                c-51.509,0-93.423-41.916-93.423-93.441c0-51.512,41.914-93.43,93.423-93.43c51.513,0,93.425,41.918,93.425,93.43
                C219.93,231.465,178.018,273.381,126.505,273.381z"/>
            <path d="M78.55,162.008c-9.889,0-17.913,8.045-17.913,17.932c0,9.885,8.024,17.911,17.913,17.911
                c9.899,0,17.913-8.026,17.913-17.911C96.463,170.053,88.449,162.008,78.55,162.008z"/>
            <path d="M126.505,162.008c-9.883,0-17.911,8.045-17.911,17.932c0,9.885,8.028,17.911,17.911,17.911
                c9.903,0,17.913-8.026,17.913-17.911C144.418,170.053,136.408,162.008,126.505,162.008z"/>
            <path d="M174.45,162.008c-9.903,0-17.913,8.045-17.913,17.932c0,9.885,8.01,17.911,17.913,17.911
                c9.897,0,17.911-8.026,17.911-17.911C192.361,170.053,184.348,162.008,174.45,162.008z"/>
            <path d="M487.628,376.807l-74.965-58.166c43.501-30.818,72.04-81.426,72.04-138.669c0-93.704-76.236-169.939-169.94-169.939
                c-41.948,0-80.325,15.359-110,40.639c9.758,5.927,18.833,12.857,26.978,20.753c23.066-17.688,51.783-28.315,83.022-28.315
                c75.462,0,136.86,61.399,136.86,136.863c0,49.75-26.782,93.265-66.596,117.216l-72.155-55.984c-3.312-2.552-7.733-3.1-11.562-1.437
                c-3.831,1.665-6.428,5.298-6.802,9.451l-5.752,64.996c-21.126-4.134-40.555-13.085-57.035-25.73
                c-8.156,7.896-17.234,14.812-26.989,20.738c22.711,19.353,50.509,32.823,81.1,38.122l-10.805,122.258
                c-0.402,4.586,1.984,8.965,6.074,11.114c4.068,2.131,9.031,1.613,12.582-1.326L376.064,411l106.054-13.859
                c4.573-0.598,8.318-3.891,9.529-8.335C492.859,384.365,491.276,379.634,487.628,376.807z"/>
        </g>
        </svg>
            Math Choices
        </a>   


        <a href="{{ route('bible.blog') }}" wire:navigate class="flex items-center @if($page == 'blog') bg-green-900 @endif text-white hover:opacity-100 py-1 pl-6 border-b border-white border-dotted shadow-lg hover:bg-green-900">
            <svg enable-background="new 0 0 1024 1024" class="mr-4" height="16" width="16" version="1.1" viewBox="0 0 1024 1024" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="Background"><linearGradient gradientTransform="matrix(0.9397 0.3421 -0.3421 0.9397 412.0643 -288.1289)" gradientUnits="userSpaceOnUse" id="bg_1_" x1="696.9546" x2="38.5381" y1="1109.5352" y2="324.9565"><stop offset="0" style="stop-color:#000000"/><stop offset="0.1921" style="stop-color:#090909"/><stop offset="0.5054" style="stop-color:#212121"/><stop offset="0.8987" style="stop-color:#494948"/><stop offset="1" style="stop-color:#545453"/></linearGradient><circle cx="512.267" cy="511.672" fill="url(#bg_1_)" id="bg" r="512"/></g><g id="Blogger_1_"><linearGradient gradientUnits="userSpaceOnUse" id="Shadow_1_" x1="298.0527" x2="849.2079" y1="347.8442" y2="898.9995"><stop offset="0" style="stop-color:#000000"/><stop offset="0.4833" style="stop-color:#090909;stop-opacity:0.5167"/><stop offset="1" style="stop-color:#181818;stop-opacity:0"/></linearGradient><path d="M560.131,1021.464L283.896,745.209V362l351.236-88.604l371.605,371.591   c0,0-10.545,45.177-30.529,83.535s-40.324,73.656-58.655,96.045s-46.806,56.337-75.849,79.049s-65.985,49.917-97.501,64.626   s-55.648,25.29-76.953,31.546s-35.305,10.869-57.759,14.664S576.944,1020.183,560.131,1021.464z" fill="url(#Shadow_1_)" id="Shadow"/><path d="M739.564,441.714c-37.859,0-46.272-19.631-46.272-46.273c0-26.642-6.31-67.305-53.283-117.083   c-45.515-48.233-99.557-49.778-99.557-49.778s-107.269,0-153.541,0c-49.778,0-87.025,27.563-121.29,68.007   c-42.768,50.479-38.561,102.36-38.561,102.36s0,159.851,0,198.762s4.207,89.391,53.634,144.076   c49.428,54.686,127.25,53.634,127.25,53.634h204.021c60.294,0,93.893-18.206,136.014-56.438   c45.571-41.365,49.077-117.084,49.077-117.084s0-125.497,0-149.334C797.054,448.725,777.423,441.714,739.564,441.714z    M370.084,402.627c0-17.424,14.125-31.549,31.55-31.549h121.465c17.424,0,31.55,14.125,31.55,31.549v7.888   c0,17.424-14.125,31.549-31.55,31.549H401.634c-17.424,0-31.55-14.125-31.55-31.549V402.627z M643.571,618.731   c0,17.424-14.125,31.549-31.549,31.549h-210.33c-17.424,0-31.55-14.125-31.55-31.549v-7.888c0-17.424,14.125-31.549,31.55-31.549   h210.33c17.424,0,31.549,14.125,31.549,31.549V618.731z" fill="#FFFFFF" id="blog"/></g></svg>
            Bible Blog
        </a>   

    </nav>
    <a href="{{ route('secret') }}" wire:navigate class="absolute w-full bottom-0 bg-black text-white flex items-center justify-center">
        &copy; Bible Prudence 2024
    </a>
</aside>
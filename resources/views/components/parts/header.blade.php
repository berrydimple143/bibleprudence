<nav class="bg-teal-800 p-5 sticky top-0">
    <nav class="flex justify-between gap-1 items-center">
        <div>
            <a href="{{ route('site') }}">
                <img src="{{ asset('images/logo.png') }}" width="150" height="30">
            </a>
        </div>
        <div class="flex gap-1 items-center space-x-1">
            <a href="{{ route('site') }}" title="Home">
                <div class="@if($page == 'quiz') bg-green-600 @endif cursor-pointer flex gap-1 items-center border border-white p-2 hover:bg-green-600">
                    <svg class="text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                        height="24" color="#000000" fill="none">
                        <path
                            d="M8.9995 22L8.74887 18.4911C8.61412 16.6046 10.1082 15 11.9995 15C13.8908 15 15.3849 16.6046 15.2501 18.4911L14.9995 22"
                            stroke="currentColor" stroke-width="1.5" />
                        <path
                            d="M2.35157 13.2135C1.99855 10.9162 1.82204 9.76763 2.25635 8.74938C2.69065 7.73112 3.65421 7.03443 5.58132 5.64106L7.02117 4.6C9.41847 2.86667 10.6171 2 12.0002 2C13.3832 2 14.5819 2.86667 16.9792 4.6L18.419 5.64106C20.3462 7.03443 21.3097 7.73112 21.744 8.74938C22.1783 9.76763 22.0018 10.9162 21.6488 13.2135L21.3478 15.1724C20.8473 18.4289 20.5971 20.0572 19.4292 21.0286C18.2613 22 16.5538 22 13.139 22H10.8614C7.44652 22 5.73909 22 4.57118 21.0286C3.40327 20.0572 3.15305 18.4289 2.65261 15.1724L2.35157 13.2135Z"
                            stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                    </svg>
                    <span class="hidden sm:block">Bible Quiz</span>
                </div>
            </a>
            <a href="{{ route('scavenger') }}" title="Scavenger">
                <div class="@if($page == 'scavenger') bg-green-600 @endif cursor-pointer flex gap-1 items-center border border-white p-2 hover:bg-green-600">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="white" d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/></svg>
                    <span class="hidden sm:block">Bible Scavenger</span>
                </div>
            </a>
            <a href="{{ route('about') }}" title="About Us">
                <div class="@if($page == 'about') bg-green-600 @endif cursor-pointer flex gap-1 items-center border border-white p-2 hover:bg-green-600">
                    <svg class="text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                        height="24" color="#000000" fill="none">
                        <path
                            d="M2.5 12C2.5 7.52166 2.5 5.28249 3.89124 3.89124C5.28249 2.5 7.52166 2.5 12 2.5C16.4783 2.5 18.7175 2.5 20.1088 3.89124C21.5 5.28249 21.5 7.52166 21.5 12C21.5 16.4783 21.5 18.7175 20.1088 20.1088C18.7175 21.5 16.4783 21.5 12 21.5C7.52166 21.5 5.28249 21.5 3.89124 20.1088C2.5 18.7175 2.5 16.4783 2.5 12Z"
                            stroke="currentColor" stroke-width="1.5" />
                        <path
                            d="M12.2422 17V12C12.2422 11.5286 12.2422 11.2929 12.0957 11.1464C11.9493 11 11.7136 11 11.2422 11"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M11.992 8H12.001" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                    <span class="hidden sm:block">About Us</span>
                </div>
            </a>
            <a href="{{ route('contact') }}" title="Contact Us">
                <div class="@if($page == 'contact') bg-green-600 @endif cursor-pointer flex gap-1 items-center border border-white p-2 hover:bg-green-600">
                    <svg class="text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                        height="24" color="#000000" fill="none">
                        <path
                            d="M12 22C7.99306 22 5.98959 22 4.7448 20.682C3.5 19.364 3.5 17.2426 3.5 13C3.5 8.75736 3.5 6.63604 4.7448 5.31802C5.98959 4 7.99306 4 12 4C16.0069 4 18.0104 4 19.2552 5.31802C20.5 6.63604 20.5 8.75736 20.5 13C20.5 17.2426 20.5 19.364 19.2552 20.682C18.0104 22 16.0069 22 12 22Z"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M8 4V2" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                        <path d="M16 4V2" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                        <path
                            d="M14.018 9.49261C14.018 10.5972 13.1226 11.4926 12.0181 11.4926C10.9135 11.4926 10.0181 10.5972 10.0181 9.49261C10.0181 8.38808 10.9135 7.49268 12.0181 7.49268C13.1226 7.49268 14.018 8.38808 14.018 9.49261Z"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path
                            d="M8.06298 16.7161C9.12133 15.0868 10.802 14.4762 12.0181 14.4774C13.2341 14.4787 14.8656 15.0868 15.9239 16.7161C15.9923 16.8215 16.0112 16.9512 15.9494 17.0607C15.7019 17.4996 14.9334 18.3705 14.3784 18.4296C13.7406 18.4974 12.0723 18.5069 12.0194 18.5072C11.9664 18.5069 10.2466 18.4974 9.60851 18.4296C9.05345 18.3705 8.28496 17.4996 8.03745 17.0607C7.9757 16.9512 7.99456 16.8215 8.06298 16.7161Z"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <span class="hidden sm:block">Contact Us</span>
                </div>
            </a>
        </div>
    </nav>
</nav>
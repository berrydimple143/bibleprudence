<nav class="bg-teal-800 p-5 sticky top-0">
    <nav class="flex justify-between gap-1 items-center">
        <div class="hidden sm:block">
            <a href="{{ route('site') }}">
                <img src="{{ asset('images/logo.png') }}" width="150" height="30">
            </a>
        </div>
        <div class="flex gap-1 items-center space-x-1">
            <a href="{{ route('site') }}" title="Bible Quiz" wire:navigate.hover>
                <div class="@if($page == 'quiz') bg-green-600 @endif cursor-pointer flex gap-1 items-center border border-white p-2 hover:bg-green-600">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="24"
                        height="24"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="white" d="M152.1 38.2c9.9 8.9 10.7 24 1.8 33.9l-72 80c-4.4 4.9-10.6 7.8-17.2 7.9s-12.9-2.4-17.6-7L7 113C-2.3 103.6-2.3 88.4 7 79s24.6-9.4 33.9 0l22.1 22.1 55.1-61.2c8.9-9.9 24-10.7 33.9-1.8zm0 160c9.9 8.9 10.7 24 1.8 33.9l-72 80c-4.4 4.9-10.6 7.8-17.2 7.9s-12.9-2.4-17.6-7L7 273c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l22.1 22.1 55.1-61.2c8.9-9.9 24-10.7 33.9-1.8zM224 96c0-17.7 14.3-32 32-32l224 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-224 0c-17.7 0-32-14.3-32-32zm0 160c0-17.7 14.3-32 32-32l224 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-224 0c-17.7 0-32-14.3-32-32zM160 416c0-17.7 14.3-32 32-32l288 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-288 0c-17.7 0-32-14.3-32-32zM48 368a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"/>
                    </svg>
                    <span class="hidden sm:block">Bible Quiz</span>
                </div>
            </a>
            <a href="{{ route('scavenger') }}" title="Bible Scavenger" wire:navigate.hover>
                <div class="@if($page == 'scavenger') bg-green-600 @endif cursor-pointer flex gap-1 items-center border border-white p-2 hover:bg-green-600">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="white" d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/></svg>
                    <span class="hidden sm:block">Bible Scavenger</span>
                </div>
            </a>
            <a href="{{ route('bmath') }}" title="Bible Math" wire:navigate.hover>
                <div class="@if($page == 'math') bg-green-600 @endif cursor-pointer flex gap-1 items-center border border-white p-2 hover:bg-green-600">
                    <svg fill="#ffffff" height="24" width="24" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
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

                    <span class="hidden sm:block">Bible Math</span>
                </div>
            </a>

            <a href="{{ route('blog') }}" title="Bible Blog" wire:navigate.hover>
                <div class="@if($page == 'blog' || $page == 'post') bg-green-600 @endif cursor-pointer flex gap-1 items-center border border-white p-2 hover:bg-green-600">
                    
                <svg enable-background="new 0 0 1024 1024" height="25" width="25" version="1.1" viewBox="0 0 1024 1024" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="Background"><linearGradient gradientTransform="matrix(0.9397 0.3421 -0.3421 0.9397 412.0643 -288.1289)" gradientUnits="userSpaceOnUse" id="bg_1_" x1="696.9546" x2="38.5381" y1="1109.5352" y2="324.9565"><stop offset="0" style="stop-color:#000000"/><stop offset="0.1921" style="stop-color:#090909"/><stop offset="0.5054" style="stop-color:#212121"/><stop offset="0.8987" style="stop-color:#494948"/><stop offset="1" style="stop-color:#545453"/></linearGradient><circle cx="512.267" cy="511.672" fill="url(#bg_1_)" id="bg" r="512"/></g><g id="Blogger_1_"><linearGradient gradientUnits="userSpaceOnUse" id="Shadow_1_" x1="298.0527" x2="849.2079" y1="347.8442" y2="898.9995"><stop offset="0" style="stop-color:#000000"/><stop offset="0.4833" style="stop-color:#090909;stop-opacity:0.5167"/><stop offset="1" style="stop-color:#181818;stop-opacity:0"/></linearGradient><path d="M560.131,1021.464L283.896,745.209V362l351.236-88.604l371.605,371.591   c0,0-10.545,45.177-30.529,83.535s-40.324,73.656-58.655,96.045s-46.806,56.337-75.849,79.049s-65.985,49.917-97.501,64.626   s-55.648,25.29-76.953,31.546s-35.305,10.869-57.759,14.664S576.944,1020.183,560.131,1021.464z" fill="url(#Shadow_1_)" id="Shadow"/><path d="M739.564,441.714c-37.859,0-46.272-19.631-46.272-46.273c0-26.642-6.31-67.305-53.283-117.083   c-45.515-48.233-99.557-49.778-99.557-49.778s-107.269,0-153.541,0c-49.778,0-87.025,27.563-121.29,68.007   c-42.768,50.479-38.561,102.36-38.561,102.36s0,159.851,0,198.762s4.207,89.391,53.634,144.076   c49.428,54.686,127.25,53.634,127.25,53.634h204.021c60.294,0,93.893-18.206,136.014-56.438   c45.571-41.365,49.077-117.084,49.077-117.084s0-125.497,0-149.334C797.054,448.725,777.423,441.714,739.564,441.714z    M370.084,402.627c0-17.424,14.125-31.549,31.55-31.549h121.465c17.424,0,31.55,14.125,31.55,31.549v7.888   c0,17.424-14.125,31.549-31.55,31.549H401.634c-17.424,0-31.55-14.125-31.55-31.549V402.627z M643.571,618.731   c0,17.424-14.125,31.549-31.549,31.549h-210.33c-17.424,0-31.55-14.125-31.55-31.549v-7.888c0-17.424,14.125-31.549,31.55-31.549   h210.33c17.424,0,31.549,14.125,31.549,31.549V618.731z" fill="#FFFFFF" id="Blogger"/></g></svg>
                    <span class="hidden sm:block">Blog</span>
                </div>
            </a>

            <a href="{{ route('about') }}" title="About Us" wire:navigate.hover>
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
            <a href="{{ route('contact') }}" title="Contact Us" wire:navigate.hover>
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

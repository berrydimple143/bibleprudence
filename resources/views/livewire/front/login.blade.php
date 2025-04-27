<div class="absolute z-40 w-full h-full bg-gray-900 bg-opacity-70 flex items-center justify-center">    
    @if (session()->has('msg'))    
      <div x-data="{
            visible: true
      }" 
      x-init="setTimeout(() => { visible = false }, 2000)" x-show="visible" class="absolute top-0 right-0 z-50">
        <div class="flex items-center justify-center gap-2 w-full px-4 py-3 text-white text-2xl bg-green-500 border-2 border-green-700 border-solid">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 448 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="white" d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"/></svg>
          <h2>{{ session('msg') }}</h2>
        </div>
      </div>
    @endif
    <div class="w-full md:max-w-[35%] bg-white p-5">        
        <div class="w-full bg-white rounded-sm shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
          <div class="p-5 space-y-3 md:space-y-5 sm:p-8">     
              <a wire:navigate.hover title="Go back to the post" href="{{ route('post', ['id' => $post->id, 'slug' => getSlug($post->title)]) }}" class="font-medium text-primary-600 hover:underline dark:text-primary-500">
                <svg fill="#000000" height="30" width="30" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                   viewBox="0 0 512 512" xml:space="preserve">
              <g>
                  <g>
                      <path d="M317.959,115.859H210.158V58.365h-44.864L0,223.66l165.294,165.294h44.864V331.46h136.548
                          c67.367,0,122.174,54.807,122.174,122.174H512V309.9C512,202.905,424.953,115.859,317.959,115.859z M468.88,342.412
                          c-30.253-33.206-73.82-54.071-122.174-54.071H167.038v41.378L60.981,223.661l106.057-106.057v41.375h150.921
                          c83.219,0,150.921,67.703,150.921,150.921V342.412z"/>
                  </g>
              </g>
              </svg>
              </a>             
              <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                  You must login first
              </h1>
              <form wire:submit.prevent="save" class="space-y-3 md:space-y-5">
                  @if($hasError)
                    <h2
                       x-data="{
                          visible: true
                       }" 
                        x-init="setTimeout(() => { visible = false }, 1500)" x-show="visible" 
                       class="text-red-500">Invalid email/password.</h2>
                  @endif
                  <div class="flex flex-col">
                      <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email Address</label>
                      <input type="email" wire:model="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-sm focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@company.com" required="">
                      @error('email')
                        <span class="text-red-500">{{ $message }}</span>
                      @enderror
                  </div>
                  <div class="flex flex-col">
                      <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                      <input type="password" wire:model="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-sm focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                      @error('password')
                        <span class="text-red-500">{{ $message }}</span>
                      @enderror
                  </div>
                  <button type="submit" class="w-full text-white bg-green-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-sm text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Sign in</button>
                  <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                      No account yet? <a wire:click.prevent="register" class="cursor-pointer font-medium text-primary-600 hover:underline dark:text-primary-500">Please register here</a>
                  </p>
              </form>
          </div>
      </div>

    </div>
</div>
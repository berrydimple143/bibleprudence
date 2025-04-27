<div class="absolute z-50 w-full h-full bg-gray-900 bg-opacity-70 flex items-center justify-center">
    @if (session()->has('msg'))    
      <div x-data="{
            visible: true
      }" 
      x-init="setTimeout(() => { visible = false }, 3000)" x-show="visible" class="absolute top-0 right-0 z-50">
        <div class="flex items-center justify-center gap-2 w-full px-4 py-3 text-white text-2xl bg-green-500 border-2 border-green-700 border-solid">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 448 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="white" d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"/></svg>
          <h2>{{ session('msg') }}</h2>
        </div>
      </div>
    @endif
    <div class="w-full md:max-w-[30%] bg-white p-5">        
        <div class="w-full bg-white rounded-sm shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
          <div class="p-5 space-y-3 md:space-y-5 sm:p-8">              
              <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                  Role Registration
              </h1>
              <form wire:submit.prevent="save" class="space-y-3 md:space-y-5">
                  <div>
                      <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role Name</label>
                      <input type="text" wire:model="name" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-sm focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Type role name here" required="">
                  </div>       
                  <div>
                      <label for="guard_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Guard Name</label>
                      <input type="text" wire:model="guard_name" name="guard_name" id="guard_name" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-sm focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Type guard name here" required="">
                  </div>
                  <button type="submit" class="w-full text-white bg-green-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-sm text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Add Role</button>
                  <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                      <a wire:navigate.hover href="{{ route('site') }}" class="font-medium text-primary-600 hover:underline dark:text-primary-500"><< Please go back to the home page.</a>
                  </p>
              </form>
          </div>
      </div>

    </div>
</div>
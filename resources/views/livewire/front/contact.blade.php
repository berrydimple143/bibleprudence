<div class="w-full h-screen text-gray-900 px-2 py-3">
    <div class="border-2 border-spacing-7 border-dashed border-gray-400 p-5 mx-auto my-7 w-1/2">
        <h1 class="text-center font-bold mb-4 border border-gray-700 px-3 py-2 w-40" alt="Contact Us">Contact Us Here
        </h1>
        <form wire:submit="send">
            <div class="flex flex-col gap-y-4">
                <div class="flex-wrap md:flex md:space-x-2">
                    <input placeholder="Name"
                        class="grow p-2 border border-green-600 @error('name') border-3 border-red-500 @enderror"
                        type="text" wire:model="name">
                    <input placeholder="Email"
                        class="grow p-2 border border-green-600 @error('email') border-3 border-red-500 @enderror"
                        type="text" wire:model="email">
                </div>
                <textarea placeholder="Message"
                    class="border border-green-600 grow p-2 @error('message') border-3 border-red-500 @enderror"
                    name="message" wire:model="message" id="message" rows="10"></textarea>

                <button type="submit"
                    class="w-28 bg-green-400 cursor-pointer flex gap-1 items-center justify-center border border-green-900 p-2 hover:bg-green-600 hover:text-white"">
                    <svg class=" text-green-900 hover:text-white" xmlns=" http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24" width="24" height="24" color="#000000" fill="none">
                    <path
                        d="M21.0477 3.05293C18.8697 0.707363 2.48648 6.4532 2.50001 8.551C2.51535 10.9299 8.89809 11.6617 10.6672 12.1581C11.7311 12.4565 12.016 12.7625 12.2613 13.8781C13.3723 18.9305 13.9301 21.4435 15.2014 21.4996C17.2278 21.5892 23.1733 5.342 21.0477 3.05293Z"
                        stroke="currentColor" stroke-width="1.5" />
                    <path d="M11.5 12.5L15 9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" />
                    </svg>
                    <span class="text-green-900 hover:text-white">Send</span>
            </div>
    </div>
    </form>
</div>
</div>

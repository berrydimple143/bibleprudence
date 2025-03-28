<form wire:submit="searchBlog">
    <div class="flex mx-5 fixed">        
        <input class="w-full sm:w-[640px] md:w-[765px] lg:w-[1100px] p-2 border border-green-500 outline-none shadow-md" type="text" id="search" name="search" wire:model="search" placeholder="Search blog posts here and hit enter or click the search button ...">   
        <button class="text-white font-bold bg-green-500 p-2 border border-green-500 outline-none shadow-md">Search</button>         
    </div>
</form>   
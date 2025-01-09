<!-- component -->
<div class="min-h-full p-6 bg-gray-100 flex items-center justify-center">
  <div class="container max-w-screen-lg mx-auto">
    <div>     

      <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
        <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
          
          <div class="text-gray-600">
            <p class="font-medium text-lg">Income Details</p>
            <p>Please fill out all the fields.</p>
          </div>

          <div class="lg:col-span-2"> 
            <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">             

              <div class="md:col-span-5">
                <label for="name">Name</label>
                <input wire:model="name" type="text" name="name" id="name" class="h-10 border border-gray-400 mt-1 rounded px-4 w-full bg-gray-50 @error('name') border-red-500 @enderror" placeholder="Type name here ..." />
                @error('name')
                  <p class="text-red-500">{{ $message }}</p>
                @enderror
              </div>

              <div class="md:col-span-2">
                <label for="amount">Amount</label>
                <input wire:model="amount" type="text" name="amount" id="amount" class="h-10 border border-gray-400 mt-1 rounded px-4 w-full bg-gray-50 @error('amount') border-red-500 @enderror" placeholder="Type amount here ..." />
                @error('amount')
                  <p class="text-red-500">{{ $message }}</p>
                @enderror
              </div> 

              <div class="md:col-span-1">
                <label for="currency">Currency</label>
                <input wire:model="currency" type="text" name="currency" id="currency" class="h-10 border border-gray-400 mt-1 rounded px-4 w-full bg-gray-50 @error('currency') border-red-500 @enderror" placeholder="Ex.: Php" />
                @error('currency')
                  <p class="text-red-500">{{ $message }}</p>
                @enderror
              </div> 

              <div class="md:col-span-2">
                <label for="date_issued">Date Recorded</label>
                <input wire:model="date_issued" type="date" name="date_issued" id="date_issued" class="h-10 border border-gray-400 mt-1 rounded px-4 w-full bg-gray-50 @error('date_issued') border-red-500 @enderror" placeholder="Choose a date here ..." />
                @error('date_issued')
                  <p class="text-red-500">{{ $message }}</p>
                @enderror
              </div> 

              <div class="md:col-span-5">
                <label for="description">Description (Optional)</label>
                <input wire:model="description" type="text" name="description" id="description" class="h-10 border border-gray-400 mt-1 rounded px-4 w-full bg-gray-50 @error('description') border-red-500 @enderror" placeholder="Type description here ..." />
                @error('description')
                  <p class="text-red-500">{{ $message }}</p>
                @enderror
              </div>              

              <div class="md:col-span-5 pt-2">
                <div class="inline-flex items-start gap-2">
                  <button wire:click="save" class="bg-green-500 shadow-lg hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    Save
                  </button>
                  <button wire:click="cancel" class="bg-yellow-500 shadow-lg hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                    Cancel
                  </button>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
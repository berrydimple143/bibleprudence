<!-- component -->
<div class="min-h-full p-6 bg-gray-100 flex items-center justify-center">
  <div class="container max-w-screen-lg mx-auto">
    <div>     

      <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
        <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
          
          <div class="text-gray-600">
            <p class="font-medium text-lg">Attendance Details</p>
            <p>Please fill out all the fields.</p>
          </div>

          <div class="lg:col-span-2"> 
            <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">             

              <div class="md:col-span-2">
                <label for="men">Number of Men</label>
                <input wire:model="men" type="text" name="men" id="men" class="h-10 border border-gray-400 mt-1 rounded px-4 w-full bg-gray-50 @error('men') border-red-500 @enderror" placeholder="Type number of men here ..." />
                @error('men')
                  <p class="text-red-500">{{ $message }}</p>
                @enderror
              </div>

              <div class="md:col-span-2">
                <label for="ladies">Number of Ladies</label>
                <input wire:model="ladies" type="text" name="ladies" id="ladies" class="h-10 border border-gray-400 mt-1 rounded px-4 w-full bg-gray-50 @error('ladies') border-red-500 @enderror" placeholder="Type number of ladies here ..." />
                @error('ladies')
                  <p class="text-red-500">{{ $message }}</p>
                @enderror
              </div> 

              <div class="md:col-span-2">
                <label for="young_people">Number of Young People</label>
                <input wire:model="young_people" type="text" name="young_people" id="young_people" class="h-10 border border-gray-400 mt-1 rounded px-4 w-full bg-gray-50 @error('young_people') border-red-500 @enderror" placeholder="Type number of young people here ..." />
                @error('young_people')
                  <p class="text-red-500">{{ $message }}</p>
                @enderror
              </div> 

              <div class="md:col-span-2">
                <label for="children">Number of Children</label>
                <input wire:model="children" type="text" name="children" id="children" class="h-10 border border-gray-400 mt-1 rounded px-4 w-full bg-gray-50 @error('children') border-red-500 @enderror" placeholder="Type number of children here ..." />
                @error('children')
                  <p class="text-red-500">{{ $message }}</p>
                @enderror
              </div> 

              <div class="md:col-span-2">
                <label for="date_attended">Date Attended</label>
                <input wire:model="date_attended" type="date" name="date_attended" id="date_attended" class="h-10 border border-gray-400 mt-1 rounded px-4 w-full bg-gray-50 @error('date_attended') border-red-500 @enderror" placeholder="Choose a date here ..." />
                @error('date_attended')
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
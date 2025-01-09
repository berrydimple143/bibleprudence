<div wire:ignore class="w-full h-100 mr-5 p-2">  
    <div class="mt-3 flex">
      <div class="flex gap-2 w-custom bg-green-500 border border-green-800 p-2 text-white">
        
          <button wire:click="goto('yearly')" class="bg-green-700 border border-white px-4 p-1 hover:bg-green-600">
            Yearly
          </button>
          <button wire:click="goto('monthly')" class="border border-white px-4 p-1 hover:bg-green-600">
            Monthly
          </button>

        <div class="flex gap-2 border border-white px-4 p-1">
          <label for="year">Year: </label>
          <select wire:change="getData" wire:model="year" class="text-black" name="year" id="year">
            @for($i = $maxYear; $i > ($maxYear - 30); $i--)              
              <option value="{{ $i }}">{{ $i }}</option>              
            @endfor
          </select>
        </div>
      </div>
    </div>
    <div class="w-full flex items-center justify-center mt-2 py-1 text-white text-lg font-bold bg-green-700 border border-green-900">
      <h2 class="flex flex-wrap">Annual Income and Expense Report as of {{ $year }}</h2>
    </div>
    <div class="h-98 border border-green-800 py-3">   
      <livewire:livewire-column-chart
        key="{{ $dataPerMonth->reactiveKey() }}"
        :column-chart-model="$dataPerMonth"       
      />
    </div>
</div>


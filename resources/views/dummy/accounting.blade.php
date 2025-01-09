<div wire:ignore>
  <div class="mt-3 flex ml-5">
    <div class="flex gap-2 w-52 bg-gray-500 border border-gray-400 p-2 text-white">
      <label for="frequency">Frequency: </label>
      <select wire:change="selectFrequency" wire:model="frequency" class="text-black" name="frequency" id="frequency">        
        <option value="Monthly">Monthly</option>
        <option value="Weekly">Weekly</option>
      </select>
    </div>
    <div class="flex gap-2 w-32 bg-gray-500 border border-gray-400 p-2 text-white">
      <label for="year">Year: </label>
      <select wire:model="year" class="text-black" name="year" id="year">
        <option value="2024">2024</option>
        <option value="2023">2023</option>
      </select>
    </div>
  </div>
  <canvas id="reportChart" class="mt-1 ml-5 p-3 border border-dotted border-gray-700 shadow-lg"></canvas>
</div>

@script
  <script>
    const ctx = document.getElementById('reportChart');
    const reports = $wire.reports;
    const labels = reports.map(item => item.Label);
    const incomes = reports.map(item => item.Income);
    const expenses = reports.map(item => item.Expense);
    const attendance = reports.map(item => item.Attendance);
    const freq = '{{ $frequency }}';
    const ctitle =  `${freq} Income and Expense Report`;

    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: labels,
        datasets: [{
          label: 'Income',
          data: incomes,
          borderWidth: 1,
          borderColor: '#000',
          backgroundColor: '#09b430'
        },
        {
          label: 'Expense',
          data: expenses,
          borderWidth: 1,
          borderColor: '#000',
          backgroundColor: '#e73e1b'
        },
        {
          label: 'Attendance',
          data: attendance,
          borderWidth: 1,
          borderColor: '#000',
          backgroundColor: '#06d1d1'
        }]
      },
      options: {
        plugins: {
            title: {
                display: true,
                text: ctitle
            },
            subtitle: {
                display: true,
                text: 'Bankas Missionary Baptist Church'
            }
        },
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  </script>
@endscript

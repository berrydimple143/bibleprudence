<?php

namespace App\Livewire\Accounting;

use Livewire\Component;
use App\Models\Attendance;
use Livewire\Attributes\Validate;

class UpdateAttendance extends Component
{
    public Attendance $attendance;

    #[Validate('min:0, max:100000')]
    public int $men = 0;

    #[Validate('min:0, max:100000')]
    public int $ladies = 0;

    #[Validate('min:0, max:100000')]
    public int $young_people = 0;

    #[Validate('min:0, max:100000')]
    public int $children = 0;

    #[Validate('required')]
    public string $date_attended = '';

    public function save()
    {
        $data = $this->validate();
        $data['men'] = $this->men;
        $data['ladies'] = $this->ladies;
        $data['young_people'] = $this->young_people;
        $data['children'] = $this->children;
        $rec = $this->attendance->update($data);

        return redirect()->route('attendance');
    }

    public function cancel()
    {
        return redirect()->route('attendance');
    }

    public function mount($attendance)
    {
        $this->men = $attendance->men;
        $this->ladies = $attendance->ladies;
        $this->young_people = $attendance->young_people;
        $this->children = $attendance->children;
        $this->date_attended = formatCustomDate($attendance->date_attended, 'Y-m-d');        
    }

    public function render()
    {
        return view('livewire.accounting.update-attendance');
    }
}

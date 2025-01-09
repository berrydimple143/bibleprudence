<?php

namespace App\Livewire\Accounting;

use Livewire\Component;
use App\Models\Attendance;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

class CreateAttendance extends Component
{
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
        $data['user_id'] = Auth::id();
        $rec = Attendance::create($data);

        return redirect()->route('attendance');
    }

    public function cancel()
    {
        return redirect()->route('attendance');
    }

    public function render()
    {
        return view('livewire.accounting.create-attendance');
    }
}

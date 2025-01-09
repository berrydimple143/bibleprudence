<?php

namespace App\Livewire\Accounting;

use Asantibanez\LivewireCharts\Facades\LivewireCharts;
use Livewire\Component;
use App\Models\Transaction;
use App\Models\Attendance;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Component
{
    public $year = '';
    public $month = '';
    public $maxYear = '';
    
    protected $listeners = [
        //'onPointClick' => 'handleOnPointClick',
        //'onSliceClick' => 'handleOnSliceClick',
        'onColumnClick' => 'handleOnColumnClick',
        //'onBlockClick' => 'handleOnBlockClick',
    ];

    private function getQuery($m, $y, $type, $id)
    {     
        return "MONTH(date_issued) = ".$m." AND type = '".$type."' AND YEAR(date_issued) = ".$y." AND user_id = ".$id;
    }

    private function getAttendance($m, $y, $id)
    {     
        $query = "MONTH(date_attended) = ".$m." AND YEAR(date_attended) = ".$y." AND user_id = ".$id;
        $totalMen = Attendance::whereRaw($query)->sum('men');
        $totalLadies = Attendance::whereRaw($query)->sum('ladies');
        $totalYp = Attendance::whereRaw($query)->sum('young_people');
        $totalChildren = Attendance::whereRaw($query)->sum('children');

        return $totalMen + $totalLadies + $totalYp + $totalChildren;
    }

    private function getAllData()
    {
        $id = Auth::id();
        $trans = Transaction::where('user_id', $id)->first();
        $curr = $trans->currency ?? 'Php';

        // Income Details
        $janIncome = Transaction::whereRaw($this->getQuery(1, $this->year, 'income', $id))->sum('amount');
        $febIncome = Transaction::whereRaw($this->getQuery(2, $this->year, 'income', $id))->sum('amount');
        $marIncome = Transaction::whereRaw($this->getQuery(3, $this->year, 'income', $id))->sum('amount');
        $aprIncome = Transaction::whereRaw($this->getQuery(4, $this->year, 'income', $id))->sum('amount');
        $mayIncome = Transaction::whereRaw($this->getQuery(5, $this->year, 'income', $id))->sum('amount');
        $junIncome = Transaction::whereRaw($this->getQuery(6, $this->year, 'income', $id))->sum('amount');
        $julIncome = Transaction::whereRaw($this->getQuery(7, $this->year, 'income', $id))->sum('amount');
        $augIncome = Transaction::whereRaw($this->getQuery(8, $this->year, 'income', $id))->sum('amount');
        $sepIncome = Transaction::whereRaw($this->getQuery(9, $this->year, 'income', $id))->sum('amount');
        $octIncome = Transaction::whereRaw($this->getQuery(10, $this->year, 'income', $id))->sum('amount');
        $novIncome = Transaction::whereRaw($this->getQuery(11, $this->year, 'income', $id))->sum('amount');
        $decIncome = Transaction::whereRaw($this->getQuery(12, $this->year, 'income', $id))->sum('amount');

        // Expense Details
        $janExpense = Transaction::whereRaw($this->getQuery(1, $this->year, 'expense', $id))->sum('amount');
        $febExpense = Transaction::whereRaw($this->getQuery(2, $this->year, 'expense', $id))->sum('amount');
        $marExpense = Transaction::whereRaw($this->getQuery(3, $this->year, 'expense', $id))->sum('amount');
        $aprExpense = Transaction::whereRaw($this->getQuery(4, $this->year, 'expense', $id))->sum('amount');
        $mayExpense = Transaction::whereRaw($this->getQuery(5, $this->year, 'expense', $id))->sum('amount');
        $junExpense = Transaction::whereRaw($this->getQuery(6, $this->year, 'expense', $id))->sum('amount');
        $julExpense = Transaction::whereRaw($this->getQuery(7, $this->year, 'expense', $id))->sum('amount');
        $augExpense = Transaction::whereRaw($this->getQuery(8, $this->year, 'expense', $id))->sum('amount');
        $sepExpense = Transaction::whereRaw($this->getQuery(9, $this->year, 'expense', $id))->sum('amount');
        $octExpense = Transaction::whereRaw($this->getQuery(10, $this->year, 'expense', $id))->sum('amount');
        $novExpense = Transaction::whereRaw($this->getQuery(11, $this->year, 'expense', $id))->sum('amount');
        $decExpense = Transaction::whereRaw($this->getQuery(12, $this->year, 'expense', $id))->sum('amount');

        // Attendance Details
        $janAttendance = $this->getAttendance(1, $this->year, $id);
        $febAttendance = $this->getAttendance(2, $this->year, $id);
        $marAttendance = $this->getAttendance(3, $this->year, $id);
        $aprAttendance = $this->getAttendance(4, $this->year, $id);
        $mayAttendance = $this->getAttendance(5, $this->year, $id);
        $junAttendance = $this->getAttendance(6, $this->year, $id);
        $julAttendance = $this->getAttendance(7, $this->year, $id);
        $augAttendance = $this->getAttendance(8, $this->year, $id);
        $sepAttendance = $this->getAttendance(9, $this->year, $id);
        $octAttendance = $this->getAttendance(10, $this->year, $id);
        $novAttendance = $this->getAttendance(11, $this->year, $id);
        $decAttendance = $this->getAttendance(12, $this->year, $id);

        return LivewireCharts::multiColumnChartModel()
                    ->setAnimated(true)
                    ->setDataLabelsEnabled(true)
                    ->legendPositionTop()
                    ->withOnColumnClickEventName('onColumnClick')                  
                    ->withGrid()
                    ->setColors(['#10d207', '#ee0e07', '#0c86d5'])
                    ->addSeriesColumn('Income (in '.$curr.')', 'January', $janIncome)
                    ->addSeriesColumn('Expense (in '.$curr.')', 'January', $janExpense)
                    ->addSeriesColumn('Attendance', 'January', $janAttendance)
                    ->addSeriesColumn('Income (in '.$curr.')', 'February', $febIncome)
                    ->addSeriesColumn('Expense (in '.$curr.')', 'February', $febExpense)
                    ->addSeriesColumn('Attendance', 'February', $febAttendance)
                    ->addSeriesColumn('Income (in '.$curr.')', 'March', $marIncome)
                    ->addSeriesColumn('Expense (in '.$curr.')', 'March', $marExpense)      
                    ->addSeriesColumn('Attendance', 'March', $marAttendance)              
                    ->addSeriesColumn('Income (in '.$curr.')', 'April', $aprIncome)
                    ->addSeriesColumn('Expense (in '.$curr.')', 'April', $aprExpense)
                    ->addSeriesColumn('Attendance', 'April', $aprAttendance)       
                    ->addSeriesColumn('Income (in '.$curr.')', 'May', $mayIncome)
                    ->addSeriesColumn('Expense (in '.$curr.')', 'May', $mayExpense)
                    ->addSeriesColumn('Attendance', 'May', $mayAttendance)
                    ->addSeriesColumn('Income (in '.$curr.')', 'June', $junIncome)
                    ->addSeriesColumn('Expense (in '.$curr.')', 'June', $junExpense)
                    ->addSeriesColumn('Attendance', 'June', $junAttendance)
                    ->addSeriesColumn('Income (in '.$curr.')', 'July', $julIncome)
                    ->addSeriesColumn('Expense (in '.$curr.')', 'July', $julExpense)
                    ->addSeriesColumn('Attendance', 'July', $julAttendance)
                    ->addSeriesColumn('Income (in '.$curr.')', 'August', $augIncome)
                    ->addSeriesColumn('Expense (in '.$curr.')', 'August', $augExpense)
                    ->addSeriesColumn('Attendance', 'August', $augAttendance)
                    ->addSeriesColumn('Income (in '.$curr.')', 'September', $sepIncome)
                    ->addSeriesColumn('Expense (in '.$curr.')', 'September', $sepExpense)
                    ->addSeriesColumn('Attendance', 'September', $sepAttendance)
                    ->addSeriesColumn('Income (in '.$curr.')', 'October', $octIncome)
                    ->addSeriesColumn('Expense (in '.$curr.')', 'October', $octExpense)
                    ->addSeriesColumn('Attendance', 'October', $octAttendance)
                    ->addSeriesColumn('Income (in '.$curr.')', 'November', $novIncome)
                    ->addSeriesColumn('Expense (in '.$curr.')', 'November', $novExpense)
                    ->addSeriesColumn('Attendance', 'November', $novAttendance)
                    ->addSeriesColumn('Income (in '.$curr.')', 'December', $decIncome)
                    ->addSeriesColumn('Expense (in '.$curr.')', 'December', $decExpense)
                    ->addSeriesColumn('Attendance', 'December', $decAttendance);    
    }

    public function handleOnColumnClick($column)
    {
        $this->dataPerMonth = $this->getAllData();
    }

    // public function handleOnPointClick($point)
    // {
    //     dd($point);
    // }

    // public function handleOnSliceClick($slice)
    // {
    //     dd($slice);
    // }    

    // public function handleOnBlockClick($block)
    // {
    //     dd($block);
    // }    

    public function getData()
    {
        $this->redirectRoute('accounting', ['year' => $this->year]);
    }

    public function goto($rt)
    {
        if($rt == "yearly"){
            $this->redirectRoute('accounting', ['year' => $this->year]);
        } else {
            $this->redirectRoute('accounting.weekly', ['year' => $this->year, 'month' => $this->month]);
        }  
    }

    public function mount(Request $req)
    {
        $now = Carbon::now();
        $this->maxYear = (int)$now->format('Y');
        if($req->has('year')) {
            $this->year = $req->year;            
        } else {
            $this->year = (int)$now->format('Y');
        }
        if($req->has('month')) {
            $this->month = $req->month;
        } else {
            $this->month = Carbon::parse($now)->isoFormat('M');
        }

        $this->dataPerMonth = $this->getAllData();
    }

    public function render()
    {           
        return view('livewire.accounting.dashboard', [
            'dataPerMonth' => $this->dataPerMonth
        ])->layout('components.layouts.accounting', [
            'page' => 'Dashboard',
        ]);
    }
}

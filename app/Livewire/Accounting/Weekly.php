<?php

namespace App\Livewire\Accounting;

use Livewire\Component;
use Asantibanez\LivewireCharts\Facades\LivewireCharts;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;
use App\Models\Attendance;

class Weekly extends Component
{

    protected $listeners = ['onColumnClick' => 'handleOnColumnClick'];

    public $year = '';
    public $month = '';
    public $maxYear = '';
    public $monthText = [];

    private function getQuery($w, $m, $y, $type, $id)
    {     
        return "WEEK(date_issued) = ".$w." AND MONTH(date_issued) = ".$m." AND type = '".$type."' AND YEAR(date_issued) = ".$y." AND user_id = ".$id;
    }

    private function getAttendance($w, $m, $y, $id)
    {     
        $query = "WEEK(date_attended) = ".$w." AND MONTH(date_attended) = ".$m." AND YEAR(date_attended) = ".$y." AND user_id = ".$id;
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
        $firstWeekIncome = Transaction::whereRaw($this->getQuery(1, $this->month, $this->year, 'income', $id))->sum('amount');
        $secondWeekIncome = Transaction::whereRaw($this->getQuery(2, $this->month, $this->year, 'income', $id))->sum('amount');
        $thirdWeekIncome = Transaction::whereRaw($this->getQuery(3, $this->month, $this->year, 'income', $id))->sum('amount');
        $fourthWeekIncome = Transaction::whereRaw($this->getQuery(4, $this->month, $this->year, 'income', $id))->sum('amount');
        $fifthWeekIncome = Transaction::whereRaw($this->getQuery(5, $this->month, $this->year, 'income', $id))->sum('amount');

        // Expenses Details
        $firstWeekExpense = Transaction::whereRaw($this->getQuery(1, $this->month, $this->year, 'expense', $id))->sum('amount');
        $secondWeekExpense = Transaction::whereRaw($this->getQuery(2, $this->month, $this->year, 'expense', $id))->sum('amount');
        $thirdWeekExpense = Transaction::whereRaw($this->getQuery(3, $this->month, $this->year, 'expense', $id))->sum('amount');
        $fourthWeekExpense = Transaction::whereRaw($this->getQuery(4, $this->month, $this->year, 'expense', $id))->sum('amount');
        $fifthWeekExpense = Transaction::whereRaw($this->getQuery(5, $this->month, $this->year, 'expense', $id))->sum('amount');

        // Attendance Details
        $firstWeekAttendance = $this->getAttendance(1, $this->month, $this->year, $id);
        $secondWeekAttendance = $this->getAttendance(2, $this->month, $this->year, $id);
        $thirdWeekAttendance = $this->getAttendance(3, $this->month, $this->year, $id);
        $fourthWeekAttendance = $this->getAttendance(4, $this->month, $this->year, $id);
        $fifthWeekAttendance = $this->getAttendance(5, $this->month, $this->year, $id);

        // Date Details
        $firstDate = Transaction::whereRaw($this->getQuery(1, $this->month, $this->year, 'income', $id))->first();
        $txt1Date = $firstDate->date_issued ?? ''; 
        if($txt1Date != '') { $txt1Date = formatDate($txt1Date); }

        $secondDate = Transaction::whereRaw($this->getQuery(2, $this->month, $this->year, 'income', $id))->first();
        $txt2Date = $secondDate->date_issued ?? '';
        if($txt2Date != '') { $txt2Date = formatDate($txt2Date); }

        $thirdDate = Transaction::whereRaw($this->getQuery(3, $this->month, $this->year, 'income', $id))->first();
        $txt3Date = $thirdDate->date_issued ?? '';
        if($txt3Date != '') { $txt3Date = formatDate($txt3Date); }

        $fourthDate = Transaction::whereRaw($this->getQuery(4, $this->month, $this->year, 'income', $id))->first();
        $txt4Date = $fourthDate->date_issued ?? '';
        if($txt4Date != '') { $txt4Date = formatDate($txt4Date); }

        $fifthDate = Transaction::whereRaw($this->getQuery(5, $this->month, $this->year, 'income', $id))->first();
        $txt5Date = $fifthDate->date_issued ?? '';
        if($txt5Date != '') { $txt5Date = formatDate($txt5Date); }

        return LivewireCharts::multiColumnChartModel()
                    ->setAnimated(true)
                    ->setDataLabelsEnabled(true)
                    ->legendPositionTop()
                    ->withOnColumnClickEventName('onColumnClick')                  
                    ->withGrid()
                    ->setColors(['#10d207', '#ee0e07', '#0c86d5'])
                    ->addSeriesColumn('Income', '1st Week ('.$txt1Date.')', $firstWeekIncome)
                    ->addSeriesColumn('Expense', '1st Week', $firstWeekExpense)
                    ->addSeriesColumn('Attendance', '1st Week', $firstWeekAttendance)
                    ->addSeriesColumn('Income', '2nd Week ('.$txt2Date.')', $secondWeekIncome)
                    ->addSeriesColumn('Expense', '2nd Week', $secondWeekExpense)
                    ->addSeriesColumn('Attendance', '2nd Week', $secondWeekAttendance)
                    ->addSeriesColumn('Income', '3rd Week ('.$txt3Date.')', $thirdWeekIncome)
                    ->addSeriesColumn('Expense', '3rd Week', $thirdWeekExpense)      
                    ->addSeriesColumn('Attendance', '3rd Week', $thirdWeekAttendance)              
                    ->addSeriesColumn('Income', '4th Week ('.$txt4Date.')', $fourthWeekIncome)
                    ->addSeriesColumn('Expense', '4th Week', $fourthWeekExpense)
                    ->addSeriesColumn('Attendance', '4th Week', $fourthWeekAttendance)       
                    ->addSeriesColumn('Income', '5th Week ('.$txt5Date.')', $fifthWeekIncome)
                    ->addSeriesColumn('Expense', '5th Week', $fifthWeekExpense)
                    ->addSeriesColumn('Attendance', '5th Week', $fifthWeekAttendance);
    }

    public function handleOnColumnClick($column)
    {
        $this->dataPerWeek = $this->getAllData();
    }   

    public function getData()
    {
        $this->redirectRoute('accounting.weekly', ['year' => $this->year, 'month' => $this->month]);
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
        if($req->has('year')){
            $this->year = $req->year;
        } else {
            $this->year = (int)$now->format('Y');
        }
        if($req->has('month')){
            $this->month = $req->month;
        } else {
            $this->month = Carbon::parse($now)->isoFormat('M');
        }        
        $this->monthText = ['1' => 'January', '2' => 'February', '3' => 'March', '4' => 'April', '5' => 'May', '6' => 'June', '7' => 'July', '8' => 'August', '9' => 'September', '10' => 'October', '11' => 'November', '12' => 'December'];
        $this->dataPerWeek = $this->getAllData();
    }

    public function render()
    {            
        return view('livewire.accounting.weekly', [
            'dataPerWeek' => $this->dataPerWeek
        ])->layout('components.layouts.accounting', [
            'page' => 'Dashboard',
        ]);
    }
}

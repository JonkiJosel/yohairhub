<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use App\Models\Salon;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;
use Carbon\Carbon;

class SalonsCreatedPerMonth extends Component
{
    public $startDate;
    public $endDate;

    public function mount()
    {
        $this->startDate = Carbon::now()->startOfYear()->format('Y-m-d');
        $this->endDate = Carbon::now()->endOfYear()->format('Y-m-d');
    }

    public function render()
    {
        $start = Carbon::parse($this->startDate);
        $end = Carbon::parse($this->endDate);
        $months = [];

        // Create an array of all months in the range with zero counts
        while ($start->lessThanOrEqualTo($end)) {
            $months[$start->format('Y-m')] = 0;
            $start->addMonth();
        }

        // Get salon counts per month
        $salons = Salon::selectRaw('DATE_FORMAT(created_at, "%Y-%m") as month, COUNT(*) as count')
            ->whereBetween('created_at', [$this->startDate, $this->endDate])
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Merge the query results with the months array
        foreach ($salons as $salon) {
            $months[$salon->month] = $salon->count;
        }

        // Create the chart model
        $chart = (new ColumnChartModel())
            ->setTitle('Salons Created Per Month')
            ->withoutLegend()
            ->setDataLabelsEnabled(true);

        // Add data to the chart model
        foreach ($months as $month => $count) {
            $chart->addColumn(Carbon::parse($month)->format('F Y'), $count, '#f6ad55');
        }

        return view('livewire.dashboard.salons-created-per-month', [
            'chart' => $chart,
        ]);
    }
}

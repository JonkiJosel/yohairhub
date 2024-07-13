<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use App\Models\Salon;

class SalonsByGenderCard extends Component
{
    public $salonsByGender;

    public function mount()
    {
        $this->salonsByGender = Salon::selectRaw('gender_accepted, COUNT(*) as count')
            ->groupBy('gender_accepted')
            ->get()
            ->pluck('count', 'gender_accepted');
    }

    public function render()
    {
        return view('livewire.dashboard.salons-by-gender-card');
    }
}

// namespace App\Livewire\Dashboard;

// use App\Models\Salon;
// use Livewire\Component;
// use Asantibanez\LivewireCharts\Models\PieChartModel;

// class SalonsByGenderCard extends Component
// {
//     public $salonsByGender;

//     public function mount()
//     {
//         $this->salonsByGender = Salon::selectRaw('gender_accepted, COUNT(*) as count')
//             ->groupBy('gender_accepted')
//             ->get()
//             ->pluck('count', 'gender_accepted');
//     }

//     public function render()
//     {
//         $pieChartModel = (new PieChartModel())
//             ->setTitle('Salons by Gender')
//             ->withDataLabels()
//             ->setType('donut');

//         foreach ($this->salonsByGender as $gender => $count) {
//             $pieChartModel->addSlice(ucfirst($gender), $count, $this->getRandomColor());
//         }

//         return view('livewire.dashboard.salons-by-gender-card', [
//             'pieChartModel' => $pieChartModel,
//         ]);
//     }

//     private function getRandomColor()
//     {
//         return sprintf('#%06X', mt_rand(0, 0xFFFFFF));
//     }
// }
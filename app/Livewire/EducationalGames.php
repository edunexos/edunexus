<?php

namespace App\Livewire;

use App\Models\EducationalGame;
use Livewire\Component;

class EducationalGames extends Component
{
    public $games;

    public function mount()
    {
        $this->games = EducationalGame::all();
    }

    public function render()
    {
        return view('livewire.educational-games');
    }
}

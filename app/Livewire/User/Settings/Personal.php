<?php

namespace App\Livewire\User\Settings;

use App\Models\Country;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Component;

class Personal extends Component
{

    public Collection $locations;

    public int $selectedCountryId;
    public int $selectedCityId;

    public function mount(): void
    {
        $this->selectedCountryId    = Auth::user()->country->id;
        $this->selectedCityId       = Auth::user()->city->id;

        $this->locations = Country::with('cities')->get();
    }

    public function render(): View
    {
        return view('livewire.user.settings.personal');
    }
}

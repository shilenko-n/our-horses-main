<?php

namespace App\Livewire\User\Settings;

use App\Models\Country;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Livewire\Component;

class Personal extends Component
{

    public Collection $locations;

    public array $user;
    public string $password = '';
    public string $password_confirmation = '';
    public string $error = '';
    public bool $emailChanged   = false;
    public bool $userChanged    = false;

    public int $selectedCountryId;
    public int $selectedCityId;

    public function initUserData(): void
    {
        $this->user = Auth::user()->toArray();
    }

    public function mount(): void
    {
        $this->selectedCountryId    = Auth::user()->country->id;
        $this->selectedCityId       = Auth::user()->city->id;

        $this->locations = Country::with('cities')->get();

        $this->initUserData();
    }

    public function changeEmail(): void
    {
        $this->emailChanged = false;

        if($this->password != $this->password_confirmation) {
            $this->error = 'Пароли не совпадают';
            return;
        }

        if(!Hash::check($this->password, Auth::user()->getAuthPassword())) {
            $this->error = 'Неверный пароль';
            return;
        }

        Auth::user()->update([
            'email' => $this->user['email'],
        ]);

        $this->error = '';
        $this->emailChanged = true;
    }

    public function submit(): void
    {
        $this->userChanged = false;
        Auth::user()->update($this->user);
        $this->userChanged = true;
    }

    public function render(): View
    {
        return view('livewire.user.settings.personal');
    }
}

<?php

namespace App\Livewire\User\Settings;

use App\Models\Country;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithFileUploads;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

class Personal extends Component
{
    use WithFileUploads;

    public Collection $locations;

    public array $user;
    public string $password = '';
    public string $password_confirmation = '';
    public string $error = '';
    public bool $emailChanged   = false;
    public bool $userChanged    = false;

    public ?int $selectedCountryId;
    public ?int $selectedCityId;

    public $avatar;

    public function initUserData(): void
    {
        $this->user = Auth::user()->toArray();
    }

    public function mount(): void
    {
        $this->selectedCountryId    = Auth::user()->country?->id;
        $this->selectedCityId       = Auth::user()->city?->id;

        $this->locations = Country::with('cities')->get();

        $this->initUserData();
    }

    /**
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    public function updatedAvatar(): void
    {
//        dd($this->avatar);
//        dd([
//            'original_name' => $this->avatar->getClientOriginalName(),
//            'mime' => $this->avatar->getMimeType(),
//            'extension' => $this->avatar->getClientOriginalExtension(),
//        ]);

        $this->validate([
            'avatar' => 'image|max:4096',
        ]);

        Auth::user()->setAvatar($this->avatar);
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

<?php

namespace App\Livewire\User\Horses;

use App\Models\City;
use App\Models\Country;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\WithFileUploads;

class Add extends Component
{
    use WithFileUploads;

    public string $chipNumber = '';
    public string $purchaseDate = '';
    public ?string $error = null;

    public array $files;
    public ?TemporaryUploadedFile $file = null;

    public $horse = [
        'name'              => '',
        'size'              => '',
        'gender'            => 'жребец',
        'breed'             => '',
        'color'             => '',
        'specialization'    => '',
        'birthday'          => '',
        'father'            => '',
        'mother'            => '',
        'birthPlace'        => '',
        'about'             => '',
        'previousHorse'     => false,
        'deathDay'          => '',
        'purchaseDate'      => '',
        'country'           => '',
        'city'              => ''
    ];

    public Collection $countries;
    public $cities = [];

    public $step = 1;

    public function mount(): void
    {
        $this->countries = Country::with('cities')->get();
    }

    public function updatedHorseCountry()
    {
        $this->cities = $this->countries->find($this->horse['country'])->cities;
    }


    public function updatedFile(): void
    {
        $this->validate([
            'file' => 'image|max:4096',
        ]);

        if(sizeof($this->files) >= 1) {
            $this->addError('fileCount', 'Не больше 10 файлов');
            $this->file = null;
            return;
        }

        $this->files[] = $this->file;
        $this->file = null;
    }

    public function test()
    {
        dd($this->files, $this->horse);
    }

    public function nextStep(): void
    {
        if($this->step === 1) {
            if($this->chipNumber === '' || $this->purchaseDate === '') {
                $this->error = "Лошадь с таким чипом уже есть в базе «Наши кони». Если это ваша лошадь, используйте кнопку «Это моя лошадь» <b>на странице лошади Изольда</b>, чтобы стать ее владельцем.";
                return;
            }

            $this->error = null;
        }

        $this->step++;
    }

    public function previousStep(): void
    {
        $this->step--;
    }

    public function render(): View
    {
        return view('livewire.user.horses.add');
    }
}

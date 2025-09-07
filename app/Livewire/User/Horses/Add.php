<?php

namespace App\Livewire\User\Horses;

use App\Models\City;
use App\Models\Country;
use App\Models\Horse;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\WithFileUploads;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

class Add extends Component
{
    use WithFileUploads;

    public string $chipNumber = '';
    public string $purchaseDate = '';
    public ?string $error = null;

    public array $docs;
    public ?TemporaryUploadedFile $doc = null;

    public array $images;
    public ?TemporaryUploadedFile $image = null;

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


    public function updatedDoc(): void
    {
        $this->validate([
            'doc' => 'image|max:4096',
        ]);

        if(sizeof($this->docs) >= 10) {
            $this->addError('docCount', 'Не больше 10 файлов');
            $this->doc = null;
            return;
        }

        $this->docs[] = $this->doc;
        $this->doc = null;
    }

    public function updatedImage(): void
    {
        $this->validate([
            'image' => 'image|max:4096',
        ]);

        if(sizeof($this->images) >= 20) {
            $this->addError('imageCount', 'Не больше 20 файлов');
            $this->image = null;
            return;
        }

        $this->images[] = $this->image;
        $this->image = null;
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

    public function saveAndModerate(): void
    {

    }

    /**
     * @throws FileIsTooBig
     * @throws FileDoesNotExist
     */
    public function saveAsDraft(): void
    {
        $purchaseDate = $this->horse['previousHorse'] ? $this->horse['purchaseDate'] : null;
        $deathDay = $this->horse['previousHorse'] ? $this->horse['deathDay'] : null;

        $horse = Horse::query()->create([
            'name'          => $this->horse['name'],
            'description'   => $this->horse['about'],
            'city_id'       => $this->horse['city'],
            'chip_number'   => $this->chipNumber,
            'birthday'      => $this->horse['birthday'],
            'deathday'      => $deathDay,
            'birth_place'   => $this->horse['birthPlace'],
            'father_id'     => $this->horse['father'],
            'mother_id'     => $this->horse['mother'],
            'purchase_date' => $purchaseDate,
            'height_withers' => $this->horse['size'],
            'gender' => $this->horse['gender'],
            'horse_breed_id' => $this->horse['breed'],
            'horse_color_id' => $this->horse['color'],
            'horse_specialization_id' => $this->horse['specialization'],
            'moderating' => true,
            'draft' => true,
        ]);

        $horse->owners()->attach(auth()->user());

        foreach ($this->docs as $doc) {
            $horse
                ->addMedia($doc)
                ->toMediaCollection('docs');
        }

        foreach ($this->images as $image) {
            $horse
                ->addMedia($image)
                ->toMediaCollection('images');
        }

    }

    public function deleteHorse(): void
    {

    }


    public function render(): View
    {
        return view('livewire.user.horses.add');
    }
}

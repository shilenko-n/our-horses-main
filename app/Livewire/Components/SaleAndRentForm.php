<?php

namespace App\Livewire\Components;

use Livewire\Component;

class SaleAndRentForm extends Component
{
	public function submit()
	{
		$this->reset(['name', 'email', 'subject', 'message', 'file']);
	}

    public function render()
    {
        return view('livewire.components.sale-and-rent-form');
    }
}

<?php

namespace App\View\Components\Menus;

use App\Models\Menu;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class Main extends Component
{
    /**
     * Create a new component instance.
     */

    public array|Collection $mainItems;
    public function __construct()
    {
        $this->mainItems = Menu::query()->where('name', 'main')->first()->menuItems;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.menus.main', [
            'mainItems' => $this->mainItems,
        ]);
    }
}

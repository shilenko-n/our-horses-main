<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        foreach (config('menu') as $key => $role_access) {
            $menu = Menu::query()->create([
                'name' => $key,
            ]);

            foreach ($role_access as $role => $items) {

                foreach ($items as $item) {
                    $menu->menuItems()->create([
                        'name'  => $item['name'],
                        'icon'  => $item['icon'],
                        'route' => $item['route'],
                        'role_access' => $role,
                    ]);
                }

            }


        }
    }
}

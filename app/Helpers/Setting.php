<?php declare(strict_types=1);

namespace App\Helpers;

use App\Models\Setting;

if(!function_exists('setting')) {

    function setting(string $key, $default = null)
    {
        $value = Setting::query()->where('key', $key)->first();

        return $value ? $value->value : $default;
    }

}

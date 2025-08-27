<?php

use App\Models\Notice;
use Illuminate\Support\Str;
use Illuminate\View\View;

if (!function_exists('notice')) {
    function notice($content, $type = NULL)
    {
        if ($content instanceof View) {
            $content = $content->render();
        }

        $notice = Notice::create([
            'type' => $type,
            'content' => $content,
            'is_read' => false,
        ]);

        return $notice;
    }
}

if (!function_exists('get_max_filesize')) {
    function get_max_filesize()
    {
        $post_max_size = ini_get('post_max_size');
        $upload_max_filesize = ini_get('upload_max_filesize');
        $memory_limit = ini_get('memory_limit');

        $max_size = get_size($post_max_size);
        $upload_max_filesize = get_size($upload_max_filesize);
        $memory_limit = get_size($memory_limit);

        if ($upload_max_filesize < $max_size) {
            $max_size = $upload_max_filesize;
        }

        if ($memory_limit < $max_size) {
            $max_size = $memory_limit;
        }

        return $max_size;
    }
}


if (!function_exists('get_size')) {
    function get_size($val)
    {
        $val = trim($val);
        $last = strtolower($val[strlen($val) - 1]);
        $val = (int)$val;
        switch ($last) {
            case 'g':
                $val *= 1024;
            case 'm':
                $val *= 1024;
            case 'k':
                $val *= 1024;
        }

        return $val;
    }
}


if (!function_exists('bytes_convert')) {
    /**
     * Хелпер для преобразования байт в КБ, МБ, ГБ, ТБ
     *
     * При отсутствии второго параметра результат возвращается в максимально возможном большем 1
     *
     * @param string $bytes
     * @param string $format указывает на конкретные единицы измерения ('B', 'KB', 'MB', 'GB', 'TB')
     *
     * @return string
     */
    function bytes_convert(string $bytes, string $format = NULL): string
    {
        $base = 1024;
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];

        if (is_null($format)) {
            for ($i = count($units) - 1; $i >= 0; $i--) {
                $size = pow($base, $i);
                $format = $units[$i];
                if ($bytes > $size) {
                    break;
                }
            }
        } else {
            $format = mb_strtoupper($format, 'UTF-8');
            $exp = array_search($format, $units);
            $size = pow($base, $exp);
        }

        return sprintf('%d %s', round($bytes / $size), $format);
    }
}


if (!function_exists('get_trans_name_file')) {
    /**
     * @param string|\Illuminate\Http\UploadedFile $file
     *
     * @return string
     */
    function get_trans_name_file($file)
    {
        if (is_string($file)) {
            $extension = pathinfo($file, PATHINFO_EXTENSION);
            $filename = pathinfo($file, PATHINFO_FILENAME);
        } else {
            $extension = mb_strtolower($file->getClientOriginalExtension());
            $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        }

        return Str::slug($filename) . '.' . $extension;
    }
}


if (!function_exists('get_clean_phone')) {
    function get_clean_phone($phone)
    {
        if (mb_strpos($phone, '+') === 0) {
            return '+' . preg_replace('/[\D]/', '', $phone);
        }

        return preg_replace('/[\D]/', '', $phone);
    }
}


if (!function_exists('host')) {
    /**
     * Возвращает хост сайта на основании конфигурации
     *
     * @return string
     */
    function host()
    {
        $url_data = parse_url(config('app.url'));

        if (key_exists('host', $url_data)) {
            return $url_data['host'];
        }

        return $url_data['path'];
    }
}

if (!function_exists('format_price')) {
    function format_price($price, bool $withCurrency = true)
    {
        return number_format($price, 0, ',', ' ') . ($withCurrency ? ' ₽' : null);
    }
}

if (!function_exists('get_file_icon')) {
    function get_file_icon(string $extension, string $type = 'solid')
    {
        return match (mb_strtolower($extension)) {
                // 'zip', 'rar', '7z' => 'archive',
                'jpg', 'jpeg', 'png', 'gif', 'webp' => 'file-image',
                // 'mp3', 'wav', 'ogg' => 'audio',
                // 'ogv', 'mp4', 'webm' => 'video',
                // 'txt', 'rtf' => 'text',
                'pdf' => 'file-pdf',
                'doc', 'docx', 'odt' => 'file-word',
                'xls', 'xlsx', 'ods' => 'file-excel',
                // 'ppt', 'pptx', 'pps' => 'presentation',
                // 'exe', 'msi', 'dmg' => 'app',
                default => 'file',
            } . '-' . $type;
    }
}

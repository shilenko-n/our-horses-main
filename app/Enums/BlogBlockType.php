<?php namespace App\Enums;

enum BlogBlockType: string
{
    case Text = 'text';
    case Image = 'image';
    case Video = 'video';
    case Gallery = 'gallery';
}

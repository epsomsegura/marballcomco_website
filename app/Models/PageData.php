<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageData extends Model
{
    use HasFactory;

    protected $table = 'PageData';

    protected $fillable = [
        'slogan',
        'aboutUs',
        'mision',
        'vision',
        'productsTechDesc',
        'productsOfficeDesc',
        'productsBuildDesc',
        'productsCleanDesc',
        'testimonial',
        'address',
        'emailData',
    ];
}

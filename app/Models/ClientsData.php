<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientsData extends Model
{
    use HasFactory;

    protected $table = 'clientsData';

    protected $fillable = [
        'clientName',
        'clientLogo'
    ];
}

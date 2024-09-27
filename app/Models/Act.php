<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class Act extends Model
{
    use HasFactory;
    use AsSource;

    protected $fillable = [
        'sent',
        'date',
        'comments',
        'received',
        'file_path'
    ];
}

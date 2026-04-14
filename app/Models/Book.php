<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author',
        'description',
        'genre',
        'published_year',
        'isbn',
        'pages',
        'language',
        'publisher',
        'price',
        'cover_image',
        'is_available',
    ];

    protected $casts = [
        'is_available' => 'boolean',
        'price' => 'decimal:2',
        'published_year' => 'integer',
        'pages' => 'integer',
    ];

    public function borrowings()
    {
        return $this->hasMany(Borrowing::class);
    }

    public function acquisitions()
    {
        return $this->hasMany(Acquisition::class);
    }
}

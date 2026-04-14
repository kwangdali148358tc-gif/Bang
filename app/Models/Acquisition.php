<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acquisition extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_id',
        'acquisition_date',
        'supplier',
        'cost',
        'quantity_added',
        'notes',
    ];

    protected $casts = [
        'acquisition_date' => 'date',
        'cost' => 'decimal:2',
        'quantity_added' => 'integer',
    ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}


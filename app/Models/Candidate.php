<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Candidate extends Model
{
    use HasFactory;
    protected $table = 'candidates';
    public $timestamps = false;

    protected $fillable = ['name', 'party_id', 'vision', 'mission', 'photo', 'category_id'];

    public function party(): BelongsTo
    {
        return $this->belongsTo(Party::class);
    }

    public function prestations(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Prestation::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}

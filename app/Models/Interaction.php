<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Interaction extends Model
{
    /** @use HasFactory<\Database\Factories\InteractionFactory> */
    use HasFactory;

    protected $fillable = ['contact_id', 'interaction_type', 'notes', 'subject'];

    public function contact(): BelongsTo
    {
        return $this->belongsTo(Contact::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Contact extends Model
{
    /** @use HasFactory<\Database\Factories\ContactFactory> */
    use HasFactory;
    
    protected $fillable = ['company_id', 'first_name', 'last_name', 'email', 'phone', 'position'];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function interactions(): HasMany
    {
        return $this->hasMany(Interaction::class);
    }
}

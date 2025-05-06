<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;


class Invoice extends Model
{
    /** @use HasFactory<\Database\Factories\InvoicesFactory> */
    use HasFactory;

    protected $fillable = ['company_id', 'invoice_number','total_amount', 'description','status', 'issue_date', 'due_date', 'pdf_path'];

    protected static function booted()
{
    static::created(function ($invoice) {
        $invoice->invoice_number = 'INV-' . str_pad($invoice->id, 5, '0', STR_PAD_LEFT);
        $invoice->save();
    });
}

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}

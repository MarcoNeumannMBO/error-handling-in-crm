<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Invoices extends Model
{
    /** @use HasFactory<\Database\Factories\InvoicesFactory> */
    use HasFactory;

    protected $fillable = ['company_id', 'invoice_number', 'issue_date', 'due_date', 'total_amount', 'status', 'pdf_path'];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}

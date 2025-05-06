<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function invoicesCardData()
    {
        $currentYear = now()->year;

        // Query for total invoices and total amount this year
        $totalInvoices = Invoice::whereYear('created_at', $currentYear)->count();
        $totalAmount = Invoice::whereYear('created_at', $currentYear)->sum('amount');

        // Data for chart: monthly invoices and amounts
        $chartData = Invoice::selectRaw('MONTH(created_at) as month, COUNT(*) as total_invoices, SUM(total_amount) as total_amount')
            ->whereYear('created_at', $currentYear)
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        return view('dashboard', compact('totalInvoices', 'totalAmount', 'chartData'));
    }
}
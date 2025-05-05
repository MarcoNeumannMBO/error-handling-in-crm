<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Contact;
use App\Models\Interaction;
use App\Models\Invoice;
use Illuminate\Http\Request;

class ContactController extends Controller {
    public function index() {}
    public function show(Contact $contact) {}
}

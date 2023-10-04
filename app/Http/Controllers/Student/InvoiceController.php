<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Enrole;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function allInvoice()
    {
        $title = "All Invoice";
        $invoices  = Enrole::with(['payment','course'])->where("user_id",auth()->id())->get();
        return view('frontend.v2.pages.student.invoice.invocie',compact('title','invoices'));
    }

    public function invoiceDetails($id)
    {
        $title = "Invoice Details";
        $invoice  = Enrole::with(['payment','course','course.courseDetails'])->findOrFail($id);
        return view('frontend.v2.pages.student.invoice.invocie_details',compact('title','invoice'));
    }
}

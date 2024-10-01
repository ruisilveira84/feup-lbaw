<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class FAQController extends Controller
{
    public function index(): View {
        $faq = DB::table('faq')->get();

        return view('pages.faq', ['faqList' => $faq, 'title' => "DibsOnBids - FAQ"]);
    }
}

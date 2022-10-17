<?php

namespace App\Http\Controllers\Others\Faq;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TwoController extends Controller
{
    /**
     * ご利用ガイド
     */
    public function __invoke()
    {
        return view('others.faq.2', [
            'faq_1' => false,
            'faq_2' => true,
            'faq_3' => false,
            'faq_4' => false,
            'faq_5' => false,
            'faq_6' => false,
            'faq_7' => false,
            'faq_8' => false,
        ]);
    }
}

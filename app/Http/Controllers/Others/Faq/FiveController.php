<?php

namespace App\Http\Controllers\Others\Faq;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FiveController extends Controller
{
    /**
     * ご利用ガイド
     */
    public function __invoke()
    {
        return view('others.faq.5', [
            'faq_1' => false,
            'faq_2' => false,
            'faq_3' => false,
            'faq_4' => false,
            'faq_5' => true,
            'faq_6' => false,
            'faq_7' => false,
            'faq_8' => false,
        ]);
    }
}

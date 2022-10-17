<?php

namespace App\Http\Controllers\Others\Faq;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OneController extends Controller
{
    /**
     * ご利用ガイド
     */
    public function __invoke()
    {
        return view('others.faq.1', [
            'faq_1' => true,
            'faq_2' => false,
            'faq_3' => false,
            'faq_4' => false,
            'faq_5' => false,
            'faq_6' => false,
            'faq_7' => false,
            'faq_8' => false,
        ]);
    }
}

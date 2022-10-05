<?php

namespace App\Http\Controllers\Others;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use App\Mail\others\ReportMail;

class ReportController extends Controller
{
    /**
     * 通報
     */
    public function __invoke(Request $request)
    {
        $email = 'info@starbooks.one';

        $reports = [
            'user' => $request->user()->name,
            'body' => $request->body,
            'reportedUser' => $request->reportedUser,
            'comment' => $request->comment,
        ];

        Mail::to($email)->send(new ReportMail($reports));
        return back();
    }
}

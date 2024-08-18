<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderShipped;

class MailController extends Controller
{

    public function viewForm() {
        return view('contactus');
    }

    public function sendEmail(Request $request) {
        $data = $request->except('_token');
        Mail::to('elen@gmail.com')->send(new OrderShipped($data));

        return "Message Sent successfuly";
    }

 }


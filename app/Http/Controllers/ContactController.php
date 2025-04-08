<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{

        public function index(Request $request)
        {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email:rfc,dns|max:255',
                'phone' => 'nullable|string|max:20',
                'message' => 'required|string',
            ]);

            return back()->with('success', 'Message sent successfully!');
        }
    }



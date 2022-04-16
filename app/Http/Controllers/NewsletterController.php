<?php

namespace App\Http\Controllers;

use App\Services\Newsletters\Contracts\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function  __invoke(Request $request, Newsletter $newsletter) {
        $request->validate([
            'email' => 'required|email'
        ]);
    
        try {
            $newsletter->subscribe(request('email'));
        } catch (\Exception $e) {
            throw \Illuminate\Validation\ValidationException::withMessages([
                'email' => 'This email couldn\'t be added to our newsletter list.'
            ]);
        }
    
        return redirect()
            ->route('posts.index')
            ->with('success', 'You are now signed up for our newsletter.');
    }
}

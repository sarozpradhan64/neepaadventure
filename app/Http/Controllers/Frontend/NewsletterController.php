<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Blaze\AdminCore\Models\NewsletterSubscription;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => [
                'required',
                'email',
                'unique:newsletter_subscriptions,email',

                function ($attribute, $value, $fail) {
                    $email = strtolower(trim($value));

                    // Get domain from email
                    $parts = explode('@', $email);

                    if (count($parts) !== 2) {
                        return;
                    }

                    $domain = $parts[1];

                    /*
                    |--------------------------------------------------------------------------
                    | Common email domains
                    |--------------------------------------------------------------------------
                    */
                    $commonDomains = [
                        'gmail.com',
                        'yahoo.com',
                        'hotmail.com',
                        'outlook.com',
                        'icloud.com',
                        'live.com',
                        'msn.com',
                        'ymail.com',
                        'googlemail.com',
                        'protonmail.com',
                        'proton.me',
                        'hey.com',
                        'me.com',
                        'mac.com',
                    ];

                    /*
                    |--------------------------------------------------------------------------
                    | Exact match = valid
                    |--------------------------------------------------------------------------
                    */
                    if (in_array($domain, $commonDomains, true)) {
                        return;
                    }

                    /*
                    |--------------------------------------------------------------------------
                    | Check for possible typo
                    |--------------------------------------------------------------------------
                    */
                    foreach ($commonDomains as $commonDomain) {
                        $distance = levenshtein($domain, $commonDomain);

                        // 1 or 2 character difference
                        if ($distance >= 1 && $distance <= 2) {
                            $fail("Did you mean {$commonDomain}?");
                            return;
                        }
                    }
                },
            ],
        ], [
            'email.unique' => 'This email is already subscribed.',
        ]);

        NewsletterSubscription::create([
            'email' => strtolower(trim($request->email)),
            'is_active' => true,
        ]);

        if ($request->wantsJson()) {
            return response()->json([
                'message' => 'Thank you for subscribing to our newsletter!'
            ]);
        }

        return back()->with(
            'success',
            'Thank you for subscribing to our newsletter!'
        );
    }
}
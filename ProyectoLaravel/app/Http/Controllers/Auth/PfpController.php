<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PfpController extends Controller
{
    /**
     * Update the user's password.
     */
    public function update(Request $request): RedirectResponse
    {
        $request->validate([
            'pfp' => ['image','required'],
        ]);

        $nombrefoto = time() . "-" . $request->file('pfp')->getClientOriginalName();
        $request->file('pfp')->storeAs('public/users_pfp', $nombrefoto);

        $request->user()->update([
            'pfp' => $nombrefoto,
        ]);

        return back()->with('status', 'pfp-updated');
    }
}

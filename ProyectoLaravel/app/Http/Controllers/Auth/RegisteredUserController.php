<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {

        $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'apellidos' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'fechaNacimiento' => ['required', 'date', 'max:255'],
            'direccion' => ['required', 'string', 'max:255'],
            'pfp' => ['image'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        if($request->file('pfp')){
            $nombrefoto = time() . "-" . $request->file('pfp')->getClientOriginalName();
            $request->file('pfp')->storeAs('public/users_pfp', $nombrefoto);
        }
        else{
            $nombrefoto='default.jpg';
        }

        $user = User::create([
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'pfp' => $nombrefoto,
            'email' => $request->email,
            'fechaNacimiento' => $request->fechaNacimiento,
            'direccion' => $request->direccion,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}

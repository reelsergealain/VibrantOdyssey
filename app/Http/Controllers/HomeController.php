<?php

namespace App\Http\Controllers;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home');
    }

    public function updatePassword(Request $request)
    {
        $user = Auth::user();
        $validated = $request->validate([
            'current_password' => ['required', 'string', 'min:8', function (string $attribute, mixed $value, Closure $fail) use ($user) {
                if (!Hash::check($value, $user->password)) {
                    $fail (":attribute n'est pas l'ancien mot de passe.}");
                }
            }],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $user->update(['password' => Hash::make($validated['password'])]);
       return redirect()->route('home')->with('success', "Le mot de passe a ete modifier");
    }
}

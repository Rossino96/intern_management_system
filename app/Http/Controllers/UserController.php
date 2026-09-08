<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
    {
        public function index()
        {
            $users = User::orderBy('name')->get();

            return view('users.index', compact('users'));
        }

        public function create()
        {
            return view('users.create');
        }

        public function store(Request $request)
        {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:8',
                'role' => 'required|in:admin,rh,encadrant',
            ]);

            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'role' => $request->role,
            ]);

            return redirect()
                ->route('users.index')
                ->with('success', 'Utilisateur créé avec succès.');
        }

        public function edit(User $user)
        {
            return view('users.edit', compact('user'));
        }

        public function update(Request $request, User $user)
        {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email,' . $user->id,
                'role' => 'required|in:admin,rh,encadrant',
            ]);

            $user->name = $request->name;
            $user->email = $request->email;
            $user->role = $request->role;

            // On ne modifie le mot de passe que s'il a été renseigné
            if ($request->filled('password')) {
                $request->validate([
                    'password' => 'string|min:8',
                ]);

                $user->password = $request->password;
            }

            $user->save();

            return redirect()
                ->route('users.index')
                ->with('success', 'Utilisateur modifié avec succès.');
        }

        public function destroy(User $user)
        {
            if ($user->role === 'encadrant' && $user->stages()->exists()) {
                return redirect()
                    ->route('users.index')
                    ->with('error', 'Impossible de supprimer cet encadrant car il possède encore des stages.');
            }

            $user->delete();

            return redirect()
                ->route('users.index')
                ->with('success', 'Utilisateur supprimé avec succès.');
        }
    }
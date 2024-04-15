<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if(Gate::allows('users.index')) {
            //dd('tenho autorizacao');

            //$users = User::all();
            $users = User::paginate(10);

            //$user = User::find(1);
            //dd($user->roles->count());
            return view('users.index', compact('users'));

        } else {
            return redirect()->back();
            abort(403);
            // sdd('não tem autorização');
        }
        //$this->authorize('users.index');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        if(Gate::allows('users.create')) {
            //dd('tenho autorizacao');
        } else {
            abort(403);
            //return redirect()->back();
            //dd('não tem autorização');
        }

        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        User::create($request->validated());
        return redirect()->route('users.index')->with('success', 'Usuário cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->route('users.index')->with('error', 'Usuário não encontrado.');
        }

        return view('users.show', compact('id', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $users = User::where('id', $id)->first();

        if (!empty($users)) {
            return view('users.edit', ['users' => $users]);
        } else {
            return redirect()->route('users.index');
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, string $id)
    {

        $users = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];

        User::where('id', $id)->update($users);
        return Redirect::route('users.index')->with('success', 'Usuário atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::where('id', $id)->delete();
        return redirect()->route('users.index')->with('success', 'Usuário Deletado com sucesso!');
    }
}

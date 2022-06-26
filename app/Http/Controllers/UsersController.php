<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Address;
use App\Models\City;
use App\Models\State;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        $users = User::paginate(15);

        return Inertia::render('Dashboard', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Inertia\Response
     */
    public function create()
    {
        $states = State::all();

        return Inertia::render('Users/Create', ['states' => $states]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreUserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreUserRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'cpf' => $request->cpf,
            'payment' => $request->payment
        ]);

        $city = City::create([
            'state_id' => $request->state,
            'name' => $request->city
        ]);

        Address::create([
            'user_id' => $user->id,
            'city_id' => $city->id,
            'street' => $request->street,
            'number' => $request->number,
            'district' => $request->district,
            'cep' => $request->cep
        ]);

        return Redirect::route('users.index')->with('message', 'Usuário Criado com Sucesso!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Inertia\Response
     */
    public function edit($id)
    {
        $user = DB::table('users')
                    ->leftJoin('addresses', 'users.id', '=', 'addresses.user_id')
                    ->leftJoin('cities', 'addresses.city_id', '=', 'cities.id')
                    ->leftJoin('states', 'cities.state_id', '=', 'states.id')
                    ->where('users.id', $id)
                    ->select('users.id', 'users.name', 'users.email', 'users.cpf', 'users.payment', 'addresses.street',
                                'addresses.number', 'addresses.district', 'addresses.cep', 'cities.name as city',
                                'states.id as state', 'states.country')
                    ->first();

        $states = State::all();

        return Inertia::render('Users/Edit', ['user' => $user, 'states' => $states]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateUserRequest $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::find($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'cpf' => $request->cpf,
            'payment' => $request->payment
        ]);

        $address = Address::where('user_id', $user->id)->first();
        $city = City::where('id', $address->city_id)->first();

        $address->update([
            'street' => $request->street,
            'number' => $request->number,
            'district' => $request->district,
            'cep' => $request->cep
        ]);

        $city->update([
            'state_id' => $request->state,
            'name' => $request->city
        ]);

        return Redirect::route('users.index')->with('message', 'Usuário Atualizado com Sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

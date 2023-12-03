<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users =User::all();
        return view('admin.users.index' , compact('users'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');

    }


    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'firstName' => ['required', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'gender' => ['required'],
            'birth_date' => ['required', 'date']
        ]);
        User::create([
            'first_name' => $request->firstName,
            'last_name' => $request->lastName,
            'email' => $request->email,
            'is_admin'=> $request->is_admin,
            'birth_date' => $request->birth_date,
            'password' => Hash::make($request->password),
            'gender' => $request->gender
        ]);
        toastr()->success('inserted successfully');

        return redirect()->route('users');
    }

    public function updateStatus(Request $request , $id)
{

    $user = User::find($id);
    $user->update([
        'is_admin' => $request->status
    ]);
    toastr()->success('status updated successfully');
    return redirect()->route('users');



}
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit', compact('user'));
    }


    public function update(Request $request, $id)
    {
        $user = User::find($id);


        if ($request->has('image')) {
            $path = $request->image->store('public/images/users');
        } else {
            $path = $user->image;
        }






        $user->update([
            'first_name' => $request->firstName,
            'last_name' => $request->lastName,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'image' => $path,
            'gender' => $request->gender,
            'birth_date' => $request->birth_date
        ]);

        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        toastr()->success('deleted successfully');

        return redirect()->route('users');



    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\User;
use Yajra\DataTables\Html\Builder;
use Auth;
use Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $builder)
    {
        if($request->ajax()) {
            $users = User::all(); // select * from users;
            return DataTables::of($users)
            ->editColumn('action', function($users){
                return view('layouts.partials._action', [
                'model' => $users,
                'form_url' => route('users.destroy', $users->id),
                'edit_url' => route('users.edit', $users->id),
                'confirm_message' => 'Anda Yakin Ingin Menghapus ?' ]);
            })
            ->rawColumns(['action'])
            ->make('true');
        }

        $html = $builder->columns([
            ['data' => 'name', 'name' => 'name', 'title' => 'Nama Lengkap'],
            ['data' => 'email', 'name' => 'email', 'title' => 'Email'],
            ['data' => 'action', 'name' => 'action', 'title' => 'Aksi', 'orderable' => false, 'searchable' => 'false']
        ]);

        return view('modules.user.index', compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modules.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'      => 'required|string|max:255',
            'email'     => 'required|string|email|max:255|unique:users',
            'password'  => 'required|string|min:6',
        ]);

        $user = User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => bcrypt($request->password),
        ]);

        Session::flash("flash_message", [
            "warna"     => "alert-success",
            "message"   => "Data Pengguna Berhasil Ditambahkan"
        ]);
        return redirect()->route('users.index');
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('modules.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'name'      => 'required|string|max:255',
            'email'     => 'required|string|email|max:255|unique:users',
            'password'  => 'required|string|min:6',
        ]);

        $user->update([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => bcrypt($request->password),
        ]);

        Session::flash("flash_message", [
            "warna"     => "alert-success",
            "message"   => "Data Pengguna Berhasil Di Update"
        ]);
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if(!$user->destroy($user->id)) return redirect()->back();
        Session::flash("flash_message", [
            "warna"     => "alert-danger",
            "message"   => "Data Pengguna Berhasil Di Hapus"
        ]);
        return redirect()->route('users.index');
    }
}

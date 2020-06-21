<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use App\User;
use DataTables;
use PDF;
use Yajra\DataTables\Html\Builder;
use Session;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $builder)
    {
        if($request->ajax()) {
            $members = Member::with('user')->get();
            return DataTables::of($members)
            ->editColumn('action', function($members){
                return view('layouts.partials._action', [
                'model' => $members,
                'form_url' => route('members.destroy', $members->id),
                'edit_url' => route('members.edit', $members->id),
                'confirm_message' => 'Anda Yakin Ingin Menghapus ?' ]);
            })
            ->editColumn('tgl_lahir', function($members){
                return date("d-m-Y", strtotime($members->tgl_lahir));
            })
            ->rawColumns(['action'])
            ->make('true');
        }

        $html = $builder->columns([
            ['data' => 'nama', 'name' => 'nama', 'title' => 'Nama Lengkap'],
            ['data' => 'npm', 'name' => 'npm', 'title' => 'NPM'],
            ['data' => 'user.email', 'name' => 'user.email', 'title' => 'Email'],
            ['data' => 'tempat_lahir', 'name' => 'tempat_lahir', 'title' => 'Tempat Lahir'],
            ['data' => 'tgl_lahir', 'name' => 'tgl_lahir', 'title' => 'Tanggal Lahir'],
            ['data' => 'action', 'name' => 'action', 'title' => 'Aksi', 'orderable' => false, 'searchable' => 'false']
        ]);

        return view('modules.member.index', compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('modules.member.create', compact('users'));
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
            'nama'          => 'required|string|max:255',
            'npm'           => 'required|string|max:8',
            'tempat_lahir'  => 'required|string|max:255',
            'tgl_lahir'     => 'required|date',
            'jk'            => 'required',
            'user_id'       => 'required',
            'prodi'         => 'required',
        ]);

        $user = Member::create($request->all());

        Session::flash("flash_message", [
            "warna"     => "alert-success",
            "message"   => "Data Member Berhasil Ditambahkan"
        ]);
        return redirect()->route('members.index');
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
    public function edit(Member $member)
    {
        $users = User::all();
        return view('modules.member.edit', compact('member', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        $this->validate($request, [
            'nama'          => 'required|string|max:255',
            'npm'           => 'required|string|max:8',
            'tempat_lahir'  => 'required|string|max:255',
            'tgl_lahir'     => 'required|date',
            'jk'            => 'required',
            'user_id'       => 'required',
            'prodi'         => 'required',
        ]);

        $member->update($request->all());

        Session::flash("flash_message", [
            "warna"     => "alert-success",
            "message"   => "Data Member Berhasil Di Update"
        ]);
        return redirect()->route('members.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        if(!$member->destroy($member->id)) return redirect()->back();
        Session::flash("flash_message", [
            "warna"     => "alert-danger",
            "message"   => "Data Member Berhasil Di Hapus"
        ]);
        return redirect()->route('members.index');
    }

    public function cetakMember()
    {
        $data = Member::with('user')->get();

        if(is_null($data)){
            Session::flash("flash_message", [
                "warna"     => "alert-danger",
                "message"   => "Data Kosong Tidak Bisa Dicetak"
            ]);
            return redirect()->back();
        }else{
            $judul = "DATA MEMBER -".date('Y-m-d').".pdf";
            $pdf = PDF::Loadview('modules.member.cetak', compact('data'));
            $pdf->setPaper('A4', 'landscape');
            return $pdf->stream($judul, array("Attachment" => false));
        }
    }
}

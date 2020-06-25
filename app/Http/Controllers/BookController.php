<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use Yajra\DataTables\Html\Builder;
use Session;
use DataTables;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $builder)
    {
        if($request->ajax()) {
            $books = Book::all();
            return DataTables::of($books)
            ->editColumn('action', function($books){
                return view('layouts.partials._action', [
                'model' => $books,
                'form_url' => route('books.destroy', $books->id),
                'edit_url' => route('books.edit', $books->id),
                'confirm_message' => 'Anda Yakin Ingin Menghapus ?' ]);
            })
            ->rawColumns(['action'])
            ->make('true');
        }

        $html = $builder->columns([
            ['data' => 'judul', 'name' => 'judul', 'title' => 'Judul Buku'],
            ['data' => 'isbn', 'name' => 'isbn', 'title' => 'ISBN'],
            ['data' => 'penerbit', 'name' => 'penerbit', 'title' => 'Penerbit'],
            ['data' => 'tahun_terbit', 'name' => 'tahun_terbit', 'title' => 'Tahun Terbit'],
            ['data' => 'jumlah', 'name' => 'jumlah', 'title' => 'Jumlah'],
            ['data' => 'action', 'name' => 'action', 'title' => 'Aksi', 'orderable' => false, 'searchable' => 'false']
        ]);

        return view('modules.book.index', compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modules.book.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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

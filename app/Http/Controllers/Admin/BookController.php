<?php

namespace App\Http\Controllers\Admin;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\BookStoreUpdate;

class BookController extends Controller
{
    protected $book;

    public function __construct(Book $book) 
    {
        $this->book = $book;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = $this->book->where('user_id', Auth::id())->get();

        return view('book.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('book.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\BookStoreUpdate  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookStoreUpdate $request)
    {
        $this->book->create([
            'name' => $request->name,
            'author' => $request->author,
            'date' => $request->date,
            'user_id' => Auth::id()
        ]);

        return redirect()->route('book.index')->with('success', "$request->name cadastrado com sucesso!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = $this->book->find($id);

        if ($book->user_id != Auth::id()) {
            return view('access-denied.index');
        }

        return view('book.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = $this->book->find($id);

        if ($book->user_id != Auth::id()) {
            return view('access-denied.index');
        }

        return view('book.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\BookStoreUpdate  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BookStoreUpdate $request, $id)
    {
        $book = $this->book->find($id);

        if ($book->user_id != Auth::id()) {
            return view('access-denied.index');
        }

        $book->update([
            'name' => $request->name,
            'author' => $request->author,
            'date' => $request->date,
        ]);

        return redirect()->route('book.index')->with('success', "$book->name atualizado com sucesso!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = $this->book->find($id);

        if ($book->user_id != Auth::id()) {
            return view('access-denied.index');
        }

        $book->delete();

        return redirect()->route('book.index')->with('success', "$book->name deletado com sucesso!");
    }
}

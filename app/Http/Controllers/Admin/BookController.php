<?php

namespace App\Http\Controllers\Admin;

use App\Models\Book;
use App\Mail\BookStoreMail;
use App\Mail\BookUpdateMail;
use App\Exports\BookExport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Mail;
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
        $books = $this->book->where('user_id', Auth::id())->latest()->paginate(5);

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
        $book = $this->book->create([
            'name' => $request->name,
            'author' => $request->author,
            'date' => $request->date,
            'user_id' => Auth::id()
        ]);

        Mail::to(Auth::user()->email)->send(new BookStoreMail($book));

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

        Mail::to(Auth::user()->email)->send(new BookUpdateMail($book));

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

    public function exportExcel()
    {
        return Excel::download(new BookExport, 'lista_de_livros.xlsx');
    }

    public function exportPDF()
    {
        $books = $this->book->where('user_id', Auth::id())->get();

        $pdf = \Barryvdh\DomPDF\Facade::loadView('book.pdf', compact('books'));
        //$pdf->setPaper('a4', 'landscape');
        return $pdf->stream('lista_de_livros.pdf');
    }

    public function search(Request $request)
    {
        $filters = $request->except('_token');

        $books = Auth::user()->books()->where(function($query) use ($request) {
            if ($request->filter) {
                $query->where('name', 'LIKE', "%{$request->filter}%")
                    ->orWhere('author', 'LIKE', "%{$request->filter}%");
            }
        })->latest()->paginate();

        return view('book.index', compact('books','filters'));
    }
}

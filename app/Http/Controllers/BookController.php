<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $search=$request->session()->get('book_search',null);

        $books = Book::orderBy('title')->get();
        if ($search==null){
            $books = Book::orderBy('title')->get();
        }else{
            $books = Book::where('title','like',"%$search%")->get();

        }

        //$books = Book::all()->orderBy('title');
        

        return view('books.index', [
            'books' => $books,
            'search'=>$search
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = Author::all();
        return view('books.create', [
            'authors' => $authors
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'title'=>['required']
        ]);

        $book = new Book();
        $book->title = $request->title;
        $book->pages = $request->pages;
        $book->isbn = $request->isbn;
        $book->short_description = $request->short_description;
        $book->author_id = $request->author_id;
        $book->save();
        return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $authors = Author::all();

        return view('books.edit', [
            'authors' => $authors,
            'book' => $book
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $book->title = $request->title;
        $book->pages = $request->pages;
        $book->isbn = $request->isbn;
        $book->short_description = $request->short_description;
        $book->author_id = $request->author_id;
        $book->save();
        return redirect()->route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index');
    }

    public function search(Request $request)
    {

        $request->session()->put('book_search',$request->search);
        return redirect()->route('books.index');
        
    }

    public function reset(Request $request){
        $request->session()->put('book_search', null);
        return redirect()->route('books.index');
    }
}

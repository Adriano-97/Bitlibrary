<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Book;
class LibraryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('library.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('library.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validate the file.
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'pdf_file' => 'required|mimes:pdf|max:10000'
        ]);

        //Format the file.
        $file = $request->file('pdf_file');
        $name = time() . $file->getClientOriginalName();
        $filePath = 'books/' . $name;
        //Add the book to the DB
        $book = new Book;
        $book->title = $request->input('title');
        $book->description = $request->input('body');
        $book->posterId = auth()->user()->id;
        $book->storedName = $name;
        $book->save();
        //Upload the file.
        Storage::disk('s3')->put($filePath, file_get_contents($file));



        return redirect('/library')->with('success', 'Book Uploaded');;
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

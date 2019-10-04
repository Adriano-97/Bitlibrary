<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Book;

class LibraryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index','show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $book = Book::all();
        return view('library.index')->with('books', $book);
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
        $book = Book::find($id);
        return view('library.show')->with('books', $book);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::find($id);
        return view('library.edit')->with('books', $book);
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
        //Validate the file.
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'pdf_file' => 'mimes:pdf|max:10000'
        ]);

        //Format the file.
        $file = $request->file('pdf_file');

        //Add the book to the DB
        $book = Book::find($id);
        $book->title = $request->input('title');
        $book->description = $request->input('body');
        if($file != NULL){
            $name = time() . $file->getClientOriginalName();
            $filePath = 'books/' . $name;
            $book->storedName = $name;
            Storage::disk('s3')->put($filePath, file_get_contents($file));
        }
        $book->save();
        return redirect('/library')->with('success', 'Book Updated');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $book = Book::find($id);
            if(auth()->user()->id != $book->posterId)
            {
            return redirect('/library')->with('error', 'Unathorized');
            } else {

                    Storage::disk('s3')->delete('books/'.$book->fileName);
                    $book->delete();

                    return redirect('/library')->with('success', 'File Deleted');

            }
        } catch(Exception $e) {
            return $this->respondInternalError( $e->getMessage(), 'object', 404);
        }
    }

    public function download($id){
        try{
            $book = Book::find($id);
            $file_url = $book->storedName;
            $file_name  = $book->title.'.pdf';
            $mime = Storage::disk('s3')->getDriver()->getMimetype('books/'.$file_url);
            $size = Storage::disk('s3')->getDriver()->getSize('books/'.$file_url);

            $response =  [
                'Content-Type' => $mime,
                'Content-Length' => $size,
                'Content-Description' => 'File Transfer',
                'Content-Disposition' => "attachment; filename={$file_name}",
                'Content-Transfer-Encoding' => 'binary',
            ];
            // ob_end_clean();

            return \Response::make(Storage::disk('s3')->get('books/'.$file_url), 200, $response);
            return redirect('/library')->with('success', 'File Downloaded');
        }catch(Exception  $e){
            return $this->respondInternalError( $e->getMessage(), 'object', 500);
        }
    }

}

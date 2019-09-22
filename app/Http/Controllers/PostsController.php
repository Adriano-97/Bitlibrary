<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Storage;
class PostsController extends Controller
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
        $post = Post::orderBy('created_at', 'desc')->paginate(10);
        return view('posts.index')->with('posts', $post);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
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
            'title' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        //Handle File Upload
        if($request->hasFile('cover_image')){
            //Get filename with extencion.
            $fileNameWithExt = $request ->file('cover_image')-> getClientOriginalName();
            //Get just fileName
            $fileName = pathInfo($fileNameWithExt, PATHINFO_FILENAME);
            //Get just Ext
            $fileExt = $request->file('cover_image')->getClientOriginalExtension();
            //Filename to Store
            $fileNameToStore = $fileName.'_'.time().'.'.$fileExt;
            //Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noImage.jpg';
        }
        //Create Post
        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->cover_image = $fileNameToStore;
        $post->save();
        return redirect('/posts')->with('success', 'Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts = Post::find($id);
        return view('posts.show')->with('post',$posts);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posts = Post::find($id);
        //Chek for correct user
        if(auth()->user()->id != $posts->user_id) {
            return redirect('/posts')->with('error', 'Unathorized');
        }

        return view('posts.edit')->with('post', $posts);
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
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);
        //Handle File Upload
        if($request->hasFile('cover_image')){
            //Get filename with extencion.
            $fileNameWithExt = $request ->file('cover_image')-> getClientOriginalName();
            //Get just fileName
            $fileName = pathInfo($fileNameWithExt, PATHINFO_FILENAME);
            //Get just Ext
            $fileExt = $request->file('cover_image')->getClientOriginalExtension();
            //Filename to Store
            $fileNameToStore = $fileName.'_'.time().'.'.$fileExt;
            //Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        }
        //Update Post
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        if($request->hasFile('cover_image')){
            $post->cover_image = $fileNameToStore;
        }
        $post->save();
        return redirect('/posts')->with('success', 'Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        //Chek for correct user
        if(auth()->user()->id != $post->user_id)
        {
           return redirect('/posts')->with('error', 'Unathorized');
        }
        //If image is not the default, deleats it
        if($post->cover_image != 'noImage.jpg'){
            Storage::delete('public/cover_images/'.$post->cover_image);
        }
        $post->delete();
        return redirect('/posts')->with('success', 'Post Deleted');
    }
}

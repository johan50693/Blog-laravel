<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Tag;
use App\Article;
use App\Image;
use Laracasts\Flash\Flash;


class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('admin.articles.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories=Category::orderBy('name','ASC')->pluck('name','id');
        $tags=Tag::orderBy('name','ASC')->pluck('name','id');

        return view('admin.articles.create')->with('categories',$categories)
                                            ->with('tags',$tags);
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
    

        if ($request->file('image')) {
            $file=$request->file('image');
    
            $name= 'miblog_'. time().'.'.$request->image->extension();
            $path=public_path()."/images/articles";
            $file->move($path,$name);
        }

        $article= new Article();
        $article->title=$request->title;
        $article->contenido=$request->contenido;
        $article->category_id=$request->category_id;
        $article->user_id=\Auth::user()->id;

        $article->save();

        $article->tags()->sync($request->tags);

        $image= new Image();
        $image->name=$name;
        $image->article()->associate($article);

        $image->save();

        flash('Se ha creado el articulo '. $article->title. ' de forma exitosa', 'success');

        return redirect()->route('articles.index');
        
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

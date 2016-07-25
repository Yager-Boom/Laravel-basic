<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;
use app\Http\Controllers\Controller;
use app\Http\Requests;
use app\Article;

class ArticleController extends Controller
{

    public function index()
    {
        $query=Article::all();
        return view('article.index',compact('query'));
    }
    public function create()
    {
        return view('article.create');
    }
    public function store(Request $request)
    {
        Article::create($request->all());
        return redirect('article');
    }
    public function show(Request $request)
    {
        $search = $request->input("search");
        $query=Article::where('id',$search)->get();
        return view('article.index',compact('query'));
    }
    public function edit($id)
    {
        $query=Article::find($id);
        return view('article.edit',compact('query'));
    }
    public function update(Request $request,$id)
    {
    Article::where('id',$id)->update([
        'title'=>$request->get('title'),
        'content'=>$request->get('content')
    ]);
        return redirect('article');
    }
    public function destroy($id)
    {
        Article::where('id', $id)->delete();
        return redirect('article');
    }
}

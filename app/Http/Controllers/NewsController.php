<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $data = News::all();
        return view('news.index', ['data' => $data]);
    }

    public function create()
    {
        return view('news.create');
    }

    public function store()
    {
        $data = \request()->validate([
            'header'=>'string',
            'anons'=>'string',
            'body'=>'string',
            'teg'=>'string',
            'pub_date'=>'date'
        ]);
        News::create($data);
        return redirect('news.index');
    }

    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('news.index');
    }

    public function show(News $news)
    {
        return view('news.show', compact('news'));
    }

    public function edit(News $news)
    {
        return view('news.edit', compact('news'));
    }


    public function update(News $news)
    {
        $data = \request()->validate([
            'header'=>'string',
            'anons'=>'string',
            'body'=>'string',
            'teg'=>'string',
            'pub_date'=>'date'
        ]);
        $news->update($data);
        return redirect()->route('news.show', $news->id);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Like;
use App\Models\Comment;

class PostController extends Controller
{
    public function index() {
        //$posts = Post::with(['user', 'comments', 'likes'])->get();
        $posts = Post::with(['comments.user', 'user', 'likes'])->get();

        return view('posts.index', compact('posts'));
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->user_id = auth()->id();
        $post->save();

        return redirect()->route('posts.index');
    }

    public function like($id) {
        $post = Post::findOrFail($id);

        if(!$post->likes()->where('user_id', auth()->id())->exists()) {
            $post->likes()->create([
                'user_id' => auth()->id(),
            ]);
        }

        return back();
    }

    public function comment(Request $request, $id) {
        $request->validate([
            'content' => 'required|string',
        ]);

      //dd($request->content); 
        $post = Post::findOrFail($id);

        if ($post->comments()->where('user_id', auth()->id())->exists()) {
            $post->comments()->create([
            'user_id' => auth()->id(),
            'content' => $request->content,
       ]);
        }

        return back();
       //try {
        //$post->comments()->create([
            //'user_id' => auth()->id(),
            //'content' => $request->content,
       // ]);
       // dd(auth()->id(), $request->content);

    //} catch (\Exception $e) {
       // return response()->json(['error' => 'Comment could not be added: ' . $e->getMessage()], 500);
    



    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Like;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth; // Import Auth facade



class PostController extends Controller
{
    public function index() {
        $posts = Post::with(['user', 'comments.user', 'likes'])->get();
        //$posts = Post::with(['comments.user', 'user', 'likes'])->get();

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

    /*public function like($id) {
        $post = Post::findOrFail($id);

        if(!$post->likes()->where('user_id', auth()->id())->exists()) {
            $post->likes()->create([
                'user_id' => auth()->id(),
            ]);
        }

        return back();
    }*/
    public function like($id) {
        $post = Post::findOrFail($id);

        // Check if the user has already liked the post
        if (!$post->likes()->where('user_id', auth()->id())->exists()) {
            $post->likes()->create([
                'user_id' => auth()->id(),
            ]);
        } else {
            // Optionally handle the case where the user has already liked the post
            return back()->with('message', 'You have already liked this post.');
        }

        return back()->with('message', 'You liked the post.');
    }

   /* public function comment(Request $request, $id) {
        $request->validate([
            'content' => 'required|string',
        ]);

      //dd($request->content); 
        $post = Post::findOrFail($id);


        //$post->comments()->create([
            //'user_id' => auth()->id(),
           // 'user_id' => Auth::id(), // or Auth::id();
           // 'post_id' => $post->id, // Add post_id explicitly if needed
          //  'content' => $request->content,
       // ]);
    


        if ($post->comments()->where('user_id', auth()->id())->exists()) {
            $post->comments()->create([
            'user_id' => auth()->id(),
     'content' => $request->content,
       ]);
        }

        return back()->with('message', 'Your comment has been posted.');
      

    }*/
    public function comment(Request $request, $id) {
        $request->validate([
            'content' => 'required|string',
        ]);
    
        $post = Post::findOrFail($id);
    
        try {
            // Create a new comment
            $post->comments()->create([
                'user_id' => auth()->id(),
                'content' => $request->content,
            ]);
    
            return back()->with('message', 'Your comment has been posted.');
        } catch (\Exception $e) {
            return back()->withErrors('Error posting comment: ' . $e->getMessage());
        }
    }
    
}

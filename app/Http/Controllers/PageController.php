<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function dashboard(Request $request)
    {
        // dd($request->all());    "for-my" => "1"
        // dd($request->get('for-my'));   "1"
        // dd($request->user());     App\Models\User 
        // dd($request->user()->id);    21

        //dd($request->user()->friends()->wherePivot('accepted', true)->get());
        /*dd(
            $request->user()->friendsFrom()->get(),
            $request->user()->friendsTo()->get()
        );*/
        
        if ($request->get('for-my')) {
            //dump($request->user()->id);
            // $posts = Post::where('user_id', $request->user()->id)->latest()->get();
            //dump($posts);

            // del usuario logeado trae sus publicaciones
            //$posts = $request->user()->posts()->latest()->get();

            $user = $request->user();

            $friends_from_ids = $user->friendsFrom()->pluck('users.id');
            $friends_to_ids = $user->friendsTo()->pluck('users.id');
            $user_ids = $friends_from_ids->merge($friends_to_ids)->push($user->id);

            $posts = Post::whereIn('user_id', $user_ids)->latest()->get();
        
        } else {
            $posts = Post::latest()->get();
        }

        return view('dashboard', compact('posts'));
    }

    public function profile(User $user)
    {
        $posts = $user->posts()->latest()->get();

        return view('profile', compact('user', 'posts'));
    }

    public function status(Request $request)
    {
        $requests = $request->user()->pendingTo;
        $sent = $request->user()->pendingFrom;
        $friends = $request->user()->friends();

        return view('status', compact('requests', 'sent', 'friends'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PostController extends Controller
{
    public function index()
    {
        return Post::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'location' => 'required',
            'kwh_today' => 'required|numeric',
            'voltA' => 'required|numeric',
            'voltB' => 'required|numeric',
            'voltC' => 'required|numeric',
            'currA' => 'required|numeric',
            'currB' => 'required|numeric',
            'currC' => 'required|numeric',
            'freq' => 'required|numeric',
            'kvarh' => 'nullable|numeric',
        ]);

        // Retrieve the last recorded data of the previous day
        $yesterday = Carbon::yesterday()->toDateString();
        $lastRecord = Post::whereDate('created_at', $yesterday)->orderBy('created_at', 'desc')->first();

        // Calculate kWh last
        $kwh_last = $lastRecord ? $lastRecord->kwh_today : $request->input('kwh_today');

        // Calculate T-l
        $tl = $request->input('kwh_today') - $kwh_last;

        // Create the new post with calculated fields
        $post = Post::create([
            'location' => $request->input('location'),
            'kwh_today' => $request->input('kwh_today'),
            'kwh_last' => $kwh_last,
            'tl' => $tl,
            'kvarh' => $request->input('kvarh'),
            'voltA' => $request->input('voltA'),
            'voltB' => $request->input('voltB'),
            'voltC' => $request->input('voltC'),
            'currA' => $request->input('currA'),
            'currB' => $request->input('currB'),
            'currC' => $request->input('currC'),
            'freq' => $request->input('freq'),
        ]);

        return response()->json($post, 201);
    }

    public function show(Post $post)
    {
        return $post;
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'location' => 'required',
            'kwh_today' => 'required|numeric',
            'voltA' => 'required|numeric',
            'voltB' => 'required|numeric',
            'voltC' => 'required|numeric',
            'currA' => 'required|numeric',
            'currB' => 'required|numeric',
            'currC' => 'required|numeric',
            'freq' => 'required|numeric',
            'kvarh' => 'nullable|numeric',
        ]);

        // Retrieve the last recorded data of the previous day
        $yesterday = Carbon::yesterday()->toDateString();
        $lastRecord = Post::whereDate('created_at', $yesterday)->orderBy('created_at', 'desc')->first();

        // Calculate kWh last
        $kwh_last = $lastRecord ? $lastRecord->kwh_today : $request->input('kwh_today');

        // Calculate T-l
        $tl = $request->input('kwh_today') - $kwh_last;

        // Update the post with calculated fields
        $post->update([
            'location' => $request->input('location'),
            'kwh_today' => $request->input('kwh_today'),
            'kwh_last' => $kwh_last,
            'tl' => $tl,
            'kvarh' => $request->input('kvarh'),
            'voltA' => $request->input('voltA'),
            'voltB' => $request->input('voltB'),
            'voltC' => $request->input('voltC'),
            'currA' => $request->input('currA'),
            'currB' => $request->input('currB'),
            'currC' => $request->input('currC'),
            'freq' => $request->input('freq'),
        ]);

        return response()->json($post, 200);
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return response()->noContent();
    }
    public function getLast()
    {
        $lastPost = Post::orderBy('created_at', 'desc')->first();

        if (!$lastPost) {
            return response()->json(['message' => 'No posts found'], 404);
        }

        return $lastPost;
    }

}

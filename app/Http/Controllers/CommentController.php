<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Redirect;



class CommentController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'university_id' => 'required|exists:universities,id',
            'content' => 'required|string|max:255',
        ]);

        Comment::create([
            'user_id' => auth()->id(),
            'university_id' => $validatedData['university_id'],
            'content' => $validatedData['content'],
        ]);

        return Redirect::back()->with('success', 'Commentaire ajouté avec succès');
    }
    public function index()
    {
        $comments = Comment::all();
        return view('pages.comment.index', compact('comments'));
    }



}

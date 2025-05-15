<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function index()
    {
        // Récupère tous les commentaires avec leurs relations
        return response()->json(Comment::with(['user', 'blog'])->get());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'content' => 'required|string',
            'blog_id' => 'required|exists:blog_posts,id',
            'user_id' => 'required|exists:users,id',
        ]);

        $comments = Comments::create($validated);

        return response()->json($comments->load(['user', 'blog']), 201);
    }

    public function show(Comments $comment)
    {
        return response()->json($comment->load(['user', 'blog']));
    }

    public function update(Request $request, Comments $comment)
    {
        $validated = $request->validate([
            'content' => 'sometimes|required|string',
        ]);

        $comment->update($validated);

        return response()->json($comment->load(['user', 'blog']), 200);
    }

    public function destroy(Comments $comment)
    {
        $comment->delete();
        return response()->json(null, 204);
    }
}

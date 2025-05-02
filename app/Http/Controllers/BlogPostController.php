<?php
namespace App\Http\Controllers;
use App\Models\BlogPost;
use Illuminate\Http\Request;
class BlogPostController extends Controller
{
    public function index()
    {
        return response()->json(BlogPost::with('authors')->get());
    }
    public function store(Request $request)
    {
        $blogPost = BlogPost::create($request->all());
        if ($request->has('author_ids')) {
            $blogPost->authors()->sync($request->input('author_ids'));
        }
        return response()->json($blogPost->load('authors'), 201);
    }
    public function show(BlogPost $blogPost)
    {
        return response()->json($blogPost->load('authors'));
    }
    public function update(Request $request, BlogPost $blogPost)
    {
        $blogPost->update($request->all());
        if ($request->has('author_ids')) {
            $blogPost->authors()->sync($request->input('author_ids'));
        }
        return response()->json($blogPost->load('authors'), 200);
    }
    public function destroy(BlogPost $blogPost)
    {
        $blogPost->delete();
        return response()->json(null, 204);
    }
}
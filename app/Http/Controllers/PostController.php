<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Post;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class PostController extends Controller
{
    public function  index(): View
    {
        // Retourner tous les éléments de la base de données
        $posts = Post::paginate(25);
        return view('blog.index');
    }

    public function show(string $slug, string $id): RedirectResponse | Post
    {
        $post = Post::findOrFail($id);

        if ($post->slug !== $slug) {
            return to_route('blog.show', ['slug' => $post->slug, 'id' => $post->id]);
        }
        return $post;
    }

    public function store()
    {
        // Créer un article lorsque l'on va sur l' URL /blog
        /*
        $post = new \App\Models\Post();
        $post->title = 'The second Post';
        $post->slug = 'the-second-post';
        $post->content = 'The Content';

        $post->save();

        return $post;
        */
    }
}

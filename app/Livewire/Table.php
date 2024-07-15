<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;

class Table extends Component
{
    public $posts = [];
    public $editPostId = null;
    public $title;
    public $content;
    public $orderByAsc = true; // Variable para controlar el orden ascendente o descendente

    public function mount()
    {
        $this->posts = $this->getPosts(); // Obtener los posts al montar el componente
    }

    public function getPosts()
    {
        return $this->orderByAsc ? Post::orderBy('id', 'asc')->get() : Post::orderBy('id', 'desc')->get();
    }

    public function toggleOrder()
    {
        $this->orderByAsc = ! $this->orderByAsc;
        $this->posts = $this->getPosts(); // Recargar los posts con el nuevo orden
    }

    public function edit($postId)
    {
        $this->editPostId = $postId;
        $post = Post::find($postId);

        if ($post) {
            $this->title = $post->title;
            $this->content = $post->content;
        }
    }

    public function save()
    {
        $post = Post::find($this->editPostId);

        if ($post) {
            $post->title = $this->title;
            $post->content = $this->content;
            $post->save();

            // Recargar la lista de posts
            $this->posts = Post::all();
            $this->resetEdit();
        }
    }

    public function resetEdit()
    {
        $this->editPostId = null;
        $this->title = '';
        $this->content = '';
    }

    public function delete($postId)
    {
        $post = Post::find($postId);

        if ($post) {
            $post->delete();
            // Recargar la lista de posts
            $this->posts = Post::all();
        }
    }

    protected $listeners = ['postAdded' => 'postAdded'];    
    public function postAdded()
    {
        $this->posts = Post::all();
    }

    public function render()
    {
        return view('livewire.table', ['posts' => $this->posts]);
    }
}

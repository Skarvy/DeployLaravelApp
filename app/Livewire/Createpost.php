<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class Createpost extends Component
{
    public $title;
    public $content;

    public function createpost()
    {
        $this->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        Post::create([
            'title' => $this->title,
            'content' => $this->content,
        ]);
        $this->dispatch('postAdded');
        session()->flash('message', 'Post Created Successfully.');

        // Resetea los campos del formulario después de crear el post
        $this->reset(['title', 'content']);
    }

    public function render()
    {
        return view('livewire.createpost');
    }
}

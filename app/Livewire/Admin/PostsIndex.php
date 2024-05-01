<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Post;
use Livewire\WithPagination;

class PostsIndex extends Component
{

    use WithPagination;  

    protected $paginationTheme="bootstrap"; //the bootstrap style is applied to the pgination links

    public $search; //the search var should be the same in the wire model

    public function updatingSearch(){ //search engine searches all pages and not just the current page
        $this->resetPage();
    }

    public function render()  //render method recovers posts info, paginates them and returns the posts index from the admin folder in livewire
    {
        $posts = Post::where('user_id', auth()->user()->id)
             ->where('name', 'LIKE', '%' . $this->search . '%') //search by name
             ->latest('id')
             ->paginate();


        return view('livewire.admin.posts-index', compact('posts'));
    }
}

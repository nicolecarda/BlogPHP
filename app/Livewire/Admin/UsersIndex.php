<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Log;

class UsersIndex extends Component
{
    use WithPagination;

    public $search;

    public function updatingSearch(){   //search engine searches all pages and not just the current page
        $this->resetPage();
    }

    protected $paginationTheme = "bootstrap"; //the bootstrap style is applied to the pgination links

    public function render() //render method recovers users info, paginates them and returns the users index from the admin folder in livewire
    {

        $users = User::where('name', 'LIKE', '%' . $this->search . '%') //search by name
                    -> orwhere('email', 'LIKE', '%' . $this->search . '%')->paginate(); //search by email
       
        return view('livewire.admin.users-index', compact('users'));
    }

 
}

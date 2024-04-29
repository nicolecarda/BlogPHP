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

    public function updatingSearch(){   //para que el buscador busque en todas las paginas y no solo en la pagina actual
        $this->resetPage();
    }

    protected $paginationTheme = "bootstrap"; 

    public function render()
    {

        $users = User::where('name', 'LIKE', '%' . $this->search . '%')
                    -> orwhere('email', 'LIKE', '%' . $this->search . '%')->paginate();
       
        return view('livewire.admin.users-index', compact('users'));
    }

 
}

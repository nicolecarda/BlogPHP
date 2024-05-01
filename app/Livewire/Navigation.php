<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;

class Navigation extends Component
{
    public function render() //render method recovers the category info and returns the livewire navigation view
    {
        $categories = Category::all();

        return view('livewire.navigation', compact('categories') );
    }
}

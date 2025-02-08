<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Page;

class Pages extends Component
{
    public $pages;

    public function render()
    {
        $this->pages = Page::all();
        return view('livewire.pages');
    }
}

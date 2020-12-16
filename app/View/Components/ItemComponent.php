<?php

namespace App\View\Components;
use App\Category;
use Illuminate\View\Component;

class ItemComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
     public $categories;

    public function __construct()
    {
        $this->categories = Category::has('items')->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.item-component');
    }
}

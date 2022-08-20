<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AppLayout extends Component
{
    public string $pageHeading;
    public string $title;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $pageHeading, string $title)
    {
        $this->pageHeading = $pageHeading;
        $this->title = $title ?? config('app.name');
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('layouts.main');
    }
}

<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DeleteAlert extends Component
{

    /**
     * Delete Button Id.
     *
     * @var string
     */
    public $buttonId;

    /**
     * Delete Route.
     *
     * @var string
     */
    public $deleteRoute;

    /**
     * Success Redirect Route.
     *
     * @var string
     */
    public $redirectRoute;

    /**
     * Create a new component instance.
     */
    public function __construct($buttonId = "delete-alert", $deleteRoute, $redirectRoute = "")
    {
        $this->buttonId = $buttonId;
        $this->deleteRoute = $deleteRoute;
        $this->redirectRoute = $redirectRoute;
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.delete-alert');
    }
}

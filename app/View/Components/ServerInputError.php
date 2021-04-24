<?php

namespace App\View\Components;

use Illuminate\View\Component;

//component containing server-form-input-error tamplate. Just to save some typing.
class serverInputError extends Component
{
    public $inputName;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($inputName)
    {
        $this->inputName = $inputName;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.server-input-error');
    }
}

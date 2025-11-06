<?php

namespace App\View\Components\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Select extends Component
{
        public string $nombre;
        public string $label;
        public string $valor;
        public string $required;
        public $opciones; //categoria_id - nombre
    /**
     * Create a new component instance.
     */
    public function __construct(
        $nombre,
        $label,
        $valor,
        $required,
        $opciones = []
    )
    {
        $this->nombre = $nombre;
        $this->label = $label;
        $this->valor = $valor;
        $this->required = $required;
        $this->opciones = $opciones;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.select');
    }
}

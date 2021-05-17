<?php

namespace App\Exports\Campanias;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class OportunidadExport implements FromView
{
    public function view(): View
    {
        return view('campanias.oportunidades.ejemplo_importacion');
    }
}

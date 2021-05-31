<?php

namespace App\Exports\Campanias;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class InteraccionExport implements FromView
{
    public function view(): View
    {
        return view('campanias.interacciones.ejemplo_importacion');
    }
}

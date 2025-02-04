<?php

namespace App\Http\Controllers;

use App\Models\Organizational;
use Illuminate\Http\Request;

class OrganizationalController extends Controller
{
    public function show(Organizational $organizational)
    {
        return view(
            'abouts.show',
            [
                'organizational' => $organizational
            ]
        );
    }
}

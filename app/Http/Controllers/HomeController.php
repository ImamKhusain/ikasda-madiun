<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Organizational;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $beritaTerkini = Post::published()->latest()->take(3)->get();
        $ikasdaBangga = Post::withCategory('ikasda-bangga')->published()->latest()->take(3)->get();
        $terasKopi = Post::withCategory('teras-kopi')->published()->latest()->take(3)->get();
        $agenda = Agenda::published()->orderBy('datetime')->get();

        $profil = Organizational::where('slug', 'profile')->first();
        $misi = Organizational::where('slug', 'mission')->first();
        $kabinet = Organizational::where('slug', 'cabinet')->first();
        $kegiatan = Organizational::where('slug', 'general')->first();

        return view('home', [
            'beritaTerkini' => $beritaTerkini,
            'ikasdaBangga' => $ikasdaBangga,
            'terasKopi' => $terasKopi,
            'agenda' => $agenda,
            'profil' => $profil,
            'misi' => $misi,
            'kabinet' => $kabinet,
            'kegiatan' => $kegiatan
        ]);
    }
}

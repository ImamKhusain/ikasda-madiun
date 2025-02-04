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
        $artikel = Post::withCategory('artikel')->published()->latest()->take(3)->get();
        $berita = Post::withCategory('berita')->published()->latest()->take(3)->get();
        $miniBlog = Post::withCategory('mini-blog')->published()->latest()->take(3)->get();
        $agenda = Agenda::published()->orderBy('datetime')->get();

        $profil = Organizational::where('slug', 'profile')->first();
        $misi = Organizational::where('slug', 'mission')->first();
        $kabinet = Organizational::where('slug', 'cabinet')->first();
        $kegiatan = Organizational::where('slug', 'general')->first();

        return view('home', [
            'berita' => $berita,
            'artikel' => $artikel,
            'miniBlog' => $miniBlog,
            'agenda' => $agenda,
            'profil' => $profil,
            'misi' => $misi,
            'kabinet' => $kabinet,
            'kegiatan' => $kegiatan
        ]);
    }
}

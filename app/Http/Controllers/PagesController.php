<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class PagesController extends Controller
{
    //
    public function pocetnastr(){
        $postovi = Post::orderBy('id','desc')->limit(8)->get();
        foreach ($postovi as $post) {
            if ($post->popust != null) {
                $c_temp = $post->cena * (1 - $post->popust/100);
                $post->nova_cena =  number_format($c_temp, 2, ',', ' ');
            }
            $post->cena = number_format($post->cena, 2, ',', ' ');
        }
        return view('pages.pocetna')->with('postovi', $postovi);
    }

    public function about(){
        return view('pages.onama');
    }

    public function service(){

        $podaci = array(
            'naslov' => 'Nasi servisi',
            'nizservisa'=>['Web Dizajn', 'IT', 'Multimediji']
            );
            return view('pages.servisi')->with($podaci);
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $postovi = DB::table('posts')
        ->leftJoin('kategorijas', 'kategorijas.id', '=', 'posts.id_kategorije')
        ->select('posts.*', 'posts.id as id_objave','kategorijas.naziv')
        ->where('posts.title','like','%'.$search.'%')
        ->orWhere('kategorijas.naziv','like','%'.$search.'%')
        ->get();
        foreach ($postovi as $post) {
            if ($post->popust != null) {
                $post->nova_cena = $post->cena * (1 - $post->popust/100);
            }
        }

        return view('pages.pocetna')->with('postovi', $postovi);


    }
}

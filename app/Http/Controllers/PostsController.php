<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Post;
Use App\Kategorija;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $postovi = Post::orderBy('id','desc')->paginate(5);
         return view('allposts.objava')->with('postovi', $postovi);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategorije = Kategorija::get();
        return view('allposts.novaObjava')->with('kategorije',$kategorije);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'naslovobjave' => 'required',
            'telo' => 'required',
            'image' => 'required|file|image|max:5000',
            'cena' => 'required|regex:/^\d+(\.\d{1,2})?$/'
            ]);
            $post = new Post;
            $post->title = $request->input('naslovobjave');
            $post->body = $request->input('telo');
            $post->image = $this->storeImage($post);
            $post->id_kategorije = $request->input('id_kategorije');
            $post->cena = $request->input('cena');
            $post->popust = $request->input('popust');
            $izdvojeno = $request['izdvojeno'];

            if($izdvojeno === 'yes')
                $post->izdvojeno = 1;
            else
                $post->izdvojeno = 0;

            $post->save();

            return redirect('/posts')->with('uspesno', 'Objava je kreirana');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jednaobjava = DB::table('posts')
        ->leftJoin('kategorijas', 'kategorijas.id', '=', 'posts.id_kategorije')
        ->select('posts.*', 'posts.image as slika', 'posts.id as id_objave','kategorijas.*')
        ->where('posts.id',$id)
        ->get();

        $jednaobjava = $jednaobjava[0];

        if ($jednaobjava->popust != null) {
            $c_temp = $jednaobjava->cena * (1 - $jednaobjava->popust/100);
            $jednaobjava->nova_cena =  number_format($c_temp, 2, ',', ' ');
        }
        $jednaobjava->cena = number_format($jednaobjava->cena, 2, ',', ' ');

        return view('allposts.prikaz')->with('jednaobjava', $jednaobjava);
    }
    // $nombre_format_francais = number_format($number, 2, ',', ' ');


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jednaobjava = Post::find($id);
        $kategorije = Kategorija::get();
        return view('allposts.izmena')->with(['jednaobjava' => $jednaobjava, 'kategorije' => $kategorije]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request,[
            'naslovobjave' => 'required',
            'telo' => 'required',
            'cena' => 'required|regex:/^\d+(\.\d{1,2})?$/'
            ]);
            $post = Post::find($id);
            $post->title = $request->input('naslovobjave');
            $post->body = $request->input('telo');
            $post->id_kategorije = $request->input('id_kategorije');
            $post->image = $this->storeImage($post);
            $post->cena = $request->input('cena');
            $post->popust = $request->input('popust');
            $izdvojeno = $request['izdvojeno'];

            if($izdvojeno === 'yes')
                $post->izdvojeno = 1;
            else
                $post->izdvojeno = 0;

            $post->save();

            return redirect('/posts')->with('uspesno', 'Objava je uspešno izmenjena');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $jednaobjava = Post::find($id);
        if(Storage::disk('public')->exists($jednaobjava->image))
        {
            Storage::disk('public')->delete($jednaobjava->image);
        }
        else
        {
            echo "File does not exist";
        }
        $jednaobjava->delete();
        return redirect('/posts')->with('uspesno', 'Objava je izbrisana!');
    }


    // private function validateRequest()
    // {
    //     return tap(request()->validate([
    //         'naslovobjave' => 'required',
    //         'telo' => 'required',
    //     ]), function ()
    //     {
    //         if(request()->hasFile('image')) {
    //             request()->validate([
    //                 'image' => 'required|file|image|max:5000'
    //             ]);
    //         }
    //     });
    // }

    // private function storeImage($post)
    // {
    //     if(request()->has('image')) {
    //         $image = request()->image->store('uploads','public');
    //         $post->update([
    //             'image' => $image
    //         ]);
    //     }
    // }

    private function storeImage($post) {
        $slika = "";
        $slika = $post->image;
        if(request()->has('image')) {
            if(Storage::disk('public')->exists($slika))
            {
                Storage::disk('public')->delete($slika);
            }
            $image = request()->image->store('uploads','public');
            $slika = $image;
            return $slika;
        }
        return $slika;

    }
}

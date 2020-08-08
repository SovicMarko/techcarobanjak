<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategorija;

class KategorijeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategorije = Kategorija::orderBy('id','desc')->paginate(5);
        return view('kategorije.pregledKategorija')->with('kategorije', $kategorije);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'naziv' => 'required',
            'opis' => 'required',
            // 'image' => 'required|file|image|max:5000'
            ]);
            $post = new Kategorija();
            $post->naziv = $request->input('naziv');
            $post->opis = $request->input('opis');
            $post->image = "aaaa";

            $post->save();

            return redirect('/kategorije')->with('uspesno', 'Objava je kreirana');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $kategorija = Kategorija::find($id);

        $kategorija->delete();
        return redirect('/kategorije')->with('uspesno', 'Objava je izbrisana!');
    }
}

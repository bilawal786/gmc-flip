<?php

namespace App\Http\Controllers;

use App\Flip;
use App\Mail\Gmc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Session;

class FlipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Flipbooks';
        $flips = Flip::all();
        return view('flip.index', compact('flips'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Créer un Flipbook';
        return view('flip.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
        'pdf' => 'required|mimes:pdf'
        ]);

      $flip = new Flip;
      $fileName = time().'_'.$request->pdf->getClientOriginalName();
      $filePath = $request->file('pdf')->storeAs('uploads', $fileName, 'public');

      $imageName = time().'_'.$request->image->getClientOriginalName();
      $imagePath = $request->file('image')->storeAs('image', $imageName, 'public');

      $flip->name = $request->name;
      $flip->link = $request->link;
      $flip->color = $request->color;
      $flip->slug = Str::slug($request->name);
      $flip->pdf = '/storage/' . $filePath;
      $flip->image = '/storage/' . $imagePath;
      $flip->save();
      flash('Flipbook créé avec succès !')->success();
      return redirect()->route('flips.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Flip  $flip
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $flips = Flip::where('slug', $id)->first();
      return view('flip.show',compact('flips'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Flip  $flip
     * @return \Illuminate\Http\Response
     */
    public function edit(Flip $flip)
    {
      $title = $flip->name;
      return view('flip.edit', compact('title', 'flip'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Flip  $flip
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Flip $flip)
    {
      $flip->name = $request->name;
      if($request->pdf) {
        $fileName = time().'_'.$request->pdf;
        $filePath = $request->file('pdf')->storeAs('uploads', $fileName, 'public');
        $flip->pdf = '/storage/' . $filePath;
      }
      $flip->slug = Str::slug($request->name);
      $flip->save();
      flash('FlipBook mis à jour avec succès !')->success();
      return redirect()->route('flips.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Flip  $flip
     * @return \Illuminate\Http\Response
     */
    public function destroy(Flip $flip)
    {
      $flip->delete();
      flash('Flipbook supprimé avec succès !')->info();
      return back();
    }

    public function form(Request $request){
        $data = $request->all();
        Mail::to('ablandin@ab-webconsulting.fr')->send(new Gmc($data));
        Session::flash('message', 'Le formulaire est soumis avec succès');
        return redirect()->back();
    }
}

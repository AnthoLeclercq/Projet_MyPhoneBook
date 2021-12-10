<?php

namespace App\Http\Controllers;

use App\Models\collaborateur;
use App\Models\entreprise;
use Illuminate\Http\Request;

class CollabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', collaborateur::class);
        return view('create.createCollab');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', collaborateur::class);
        $validated = $request->validate([
            'nom' => 'required|max:255',
            'prenom' => 'required|max:255',
            'rue' => 'required',
            'code_postal' => 'required|size:5|digits:5',
            'ville' => 'required|alpha',
            'telephone_portable' => 'sometimes|regex:/(06)[0-9]{8}/|unique:collaborateurs,telephone_portable',
            'email' => 'required|email:rfc|unique:collaborateurs,email'
        ]);

        $collaborateur = new collaborateur([
            'civilite' => $request->get('civilite'),
            'nom' => $request->get('nom'),
            'prenom' => $request->get('prenom'),
            'rue' => $request->get('rue'),
            'code_postal' => $request->get('code_postal'),
            'ville' => $request->get('ville'),
            'telephone_portable' => $request->get('telephone_portable'),
            'email' => $request->get('email'),
            'entreprise_id' => $request->get('entreprise_id')
        ]);
        $collaborateur->save();

        return view('create.successCollab');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $this->authorize('view', collaborateur::class);
        $data = collaborateur::all();
        return view('list.list_collaborateur', ['collaborateurs' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('update', collaborateur::class);
        $collaborateur = collaborateur::find($id);
        return view('modify.modify_collaborateur', ['collaborateur' => $collaborateur]);
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
        $this->authorize('update', collaborateur::class);
        $collaborateur = collaborateur::find($id);
        $validated = $request->validate([
            'nom' => 'required|max:255',
            'prenom' => 'required|max:255',
            'rue' => 'required',
            'code_postal' => 'required|size:5|digits:5',
            'ville' => 'required|alpha',
            'telephone_portable' => 'sometimes|regex:/(06)[0-9]{8}/',
            'email' => 'required|email:rfc'
        ]);

        $collaborateur->civilite = $request->get('civilite');
        $collaborateur->nom = $validated['nom'];
        $collaborateur->prenom = $validated['prenom'];
        $collaborateur->rue = $validated['rue'];
        $collaborateur->code_postal = $validated['code_postal'];
        $collaborateur->ville = $validated['ville'];
        $collaborateur->telephone_portable = $validated['telephone_portable'];
        $collaborateur->entreprise_id = $request->get('entreprise_id');
        $collaborateur->email = $validated['email'];

        $collaborateur->save();

        return \Redirect::Route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete', collaborateur::class);
        $collaborateur = collaborateur::find($id);
        $collaborateur->delete();
        return \Redirect::Route('home');

    }
}
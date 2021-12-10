<?php

namespace App\Http\Controllers;

use App\Models\entreprise;
use App\Models\collaborateur;
use Illuminate\Http\Request;

class CompController extends Controller
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
        $this->authorize('create', entreprise::class);
        return view('create.createComp');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', entreprise::class);
        $validated = $request->validate([
            'name' => 'required|max:255|unique:entreprises,name',
            'rue' => 'required',
            'code_postal' => 'required|size:5|digits:5',
            'ville' => 'required|alpha',
            'telephone_portable' => 'sometimes|regex:/(06)[0-9]{8}/|unique:entreprises,telephone_portable',
            'email' => 'required|email:rfc|unique:entreprises,email'
        ]);
        $entreprise = new entreprise([
            'name' => $request->get('name'),
            'rue' => $request->get('rue'),
            'code_postal' => $request->get('code_postal'),
            'ville' => $request->get('ville'),
            'telephone_portable' => $request->get('telephone_portable'),
            'email' => $request->get('email')
        ]);
        $entreprise->save();


        return view('create.successComp');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $this->authorize('view', entreprise::class);
        $data = entreprise::all();
        return view('list.list_entreprise', ['entreprises' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('update', entreprise::class);
        $entreprise = entreprise::find($id);
        return view('modify.modify_entreprise', ['entreprise' => $entreprise]);
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
        $this->authorize('update', entreprise::class);
        $entreprise = entreprise::find($id);
        $validated = $request->validate([
            'name' => 'required|max:255',
            'rue' => 'required',
            'code_postal' => 'required|size:5|digits:5',
            'ville' => 'required|alpha',
            'telephone_portable' => 'sometimes|regex:/(06)[0-9]{8}/',
            'email' => 'required|email:rfc'
        ]);

        $entreprise->name = $validated['name'];
        $entreprise->rue = $validated['rue'];
        $entreprise->code_postal = $validated['code_postal'];
        $entreprise->ville = $validated['ville'];
        $entreprise->telephone_portable = $validated['telephone_portable'];
        $entreprise->email = $validated['email'];

        $entreprise->save();

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
        $this->authorize('delete', entreprise::class);
        $entreprise = entreprise::find($id);
        $entreprise->delete();
        return \Redirect::Route('home');
    }
}

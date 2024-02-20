<?php

namespace App\Http\Controllers;

use App\Models\Observation;
use App\Models\TypeActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TypeActivityController extends Controller
{
    private $rules = [
        'description' => 'required|string|max:50|min:3',
    ];
    private $traductionAttributes = [
        'description' => 'descripcion',
    ];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $type_activities = TypeActivity::all();    //select * from causal
        //dd($causals);
        return view('type_activity.index', compact('type_activities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('type_activity.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), $this->rules);
        $validator->setAttributeNames($this->traductionAttributes);
        if($validator->fails())
        {
            $errors = $validator->errors();
            return redirect()->route('type_activity.create')->withInput()->withErrors($errors);
        }
        $type_activity = TypeActivity::create($request->all());
        session()->flash('message', 'Registro creado exitosamente');
        return redirect()->route('type_activity.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $type_activity = TypeActivity::find($id);
        if($type_activity)
        {
            return view('type_activity.edit', compact('type_activity'));
        }
        else
        {
            return redirect()->route('type_activity.index');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), $this->rules);
        $validator->setAttributeNames($this->traductionAttributes);
        if($validator->fails())
        {
            $errors = $validator->errors();
            return redirect()->route('type_activity.edit' , $id)->withInput()->withErrors($errors);
        }
        $type_activity = TypeActivity::find($id);
        if($type_activity)
        {
            $type_activity->update($request->all()); //Delete from causal where id = x
            session()->flash('message', 'Registro eliminado exitosamente');
        }
        else
        {
            return redirect()->route('type_activity.index');
            session()->flash('warning', 'No se encuentra el registro solicitado');

        }

        return redirect()->route('type_activity.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $type_activity = TypeActivity::find($id);
        if($type_activity)
        {
            $type_activity->delete(); //Delete from causal where id = x
            session()->flash('message', 'Registro eliminado exitosamente');
        }
        else
        {
            return redirect()->route('type_activity.index');
            session()->flash('warning', 'No se encuentra el registro solicitado');

        }

        return redirect()->route('type_activity.index');
    }
}

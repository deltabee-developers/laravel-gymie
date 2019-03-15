<?php

namespace App\Http\Controllers;

use Auth;
use App\MedicalCondition;
use Illuminate\Http\Request;

class MedicalConditionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $conditions = MedicalCondition::search('"'.$request->input('search').'"')->paginate(10);
        $count = $conditions->count();

        return view('medical_conditions.index', compact('conditions', 'count'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show()
    {
        $condition = MedicalCondition::findOrFail($id);

        return view('medical_conditions.show', compact('condition'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('medical_conditions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        //Model Validation
        $this->validate($request, ['name' => 'unique:mst_medical_conditions,name']);

        $condition = new MedicalCondition($request->all());

        
        $condition->save();

        flash()->success('Medical Condition was successfully created');

        return redirect('app_setting/medical_conditions/');
    }

    public function edit($id)
    {
        $condition = MedicalCondition::findOrFail($id);

        return view('medical_conditions.edit', compact('condition'));
    }

    public function update($id, Request $request)
    {
        $condition = MedicalCondition::findOrFail($id);

        $condition->update($request->all());
        $condition->save();
        flash()->success('Medical Condition details were successfully updated');

        return redirect('app_setting/medical_conditions/');
    }

    public function delete($id)
    {
        MedicalCondition::destroy($id);

        return redirect('app_setting/medical_conditions/');
    }
}

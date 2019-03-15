<?php

namespace App\Http\Controllers;

use Auth;
use App\QuestionType;
use Illuminate\Http\Request;

class QuestionTypeController extends Controller
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
        $questiontypes = QuestionType::search('"'.$request->input('search').'"')->paginate(10);
        $count = $questiontypes->count();

        return view('questiontypes.index', compact('questiontypes', 'count'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show()
    {
        $questiontype = QuestionType::findOrFail($id);

        return view('questiontypes.show', compact('questiontype'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('questiontypes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        //Model Validation
        $this->validate($request, ['name' => 'unique:mst_questiontypes,name']);

        $questiontype = new QuestionType($request->all());

        
        $questiontype->save();

        flash()->success('Questiontype was successfully created');

        return redirect('app_setting/questiontypes/');
    }

    public function edit($id)
    {
        $questiontype = QuestionType::findOrFail($id);

        return view('questiontypes.edit', compact('questiontype'));
    }

    public function update($id, Request $request)
    {
        $questiontype = QuestionType::findOrFail($id);

        $questiontype->update($request->all());
        //$questiontype->updatedBy()->associate(Auth::user());
        $questiontype->save();
        flash()->success('Questiontype details were successfully updated');

        return redirect('app_setting/questiontypes/');
    }

    public function delete($id)
    {
        QuestionType::destroy($id);

        return redirect('app_setting/questiontypes/');
    }
}

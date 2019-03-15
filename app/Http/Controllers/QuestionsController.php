<?php

namespace App\Http\Controllers;

use Auth;
use App\Questions;
use Illuminate\Http\Request;

class QuestionsController extends Controller
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
        $questions = Questions::search('"'.$request->input('search').'"')->paginate(10);
        $count = $questions->count();

        return view('questions.index', compact('questions', 'count'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show()
    {
        $goal = Questions::findOrFail($id);

        return view('questions.show', compact('question'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('questions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        //Model Validation
        $this->validate($request, ['name' => 'unique:mst_questions,name']);

        $question = new Questions($request->all());

        
        $question->save();

        flash()->success('Question was successfully created');

        return redirect('app_setting/questions/');
    }

    public function edit($id)
    {
        $question = Questions::findOrFail($id);

        return view('questions.edit', compact('question'));
    }

    public function update($id, Request $request)
    {
        $question = Questions::findOrFail($id);

        $question->update($request->all());
        $question->save();
        flash()->success('Question details were successfully updated');

        return redirect('app_setting/questions/');
    }

    public function delete($id)
    {
        Questions::destroy($id);

        return redirect('app_setting/questions/');
    }
}

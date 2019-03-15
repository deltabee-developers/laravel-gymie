<?php

namespace App\Http\Controllers;

use Auth;
use App\Goals;
use Illuminate\Http\Request;

class GoalsController extends Controller
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
        $goals = Goals::search('"'.$request->input('search').'"')->paginate(10);
        $count = $goals->count();

        return view('goals.index', compact('goals', 'count'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show()
    {
        $goal = Goals::findOrFail($id);

        return view('goals.show', compact('goal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('goals.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        //Model Validation
        $this->validate($request, ['name' => 'unique:mst_goals,name']);

        $goal = new Goals($request->all());

        
        $goal->save();

        flash()->success('Goal was successfully created');

        return redirect('app_setting/goals/');
    }

    public function edit($id)
    {
        $goal = Goals::findOrFail($id);

        return view('goals.edit', compact('goal'));
    }

    public function update($id, Request $request)
    {
        $goal = Goals::findOrFail($id);

        $goal->update($request->all());
        $goal->save();
        flash()->success('Goal details were successfully updated');

        return redirect('app_setting/goals/');
    }

    public function delete($id)
    {
        Goals::destroy($id);

        return redirect('app_setting/goals/');
    }
}

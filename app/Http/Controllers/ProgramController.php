<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * CRUD functions for Programs.
     */
    public function programIndex(Request $request)
    {
        $programs = Program::search('"'.$request->input('search').'"')->paginate(10);
        $count = $programs->count();
        return view('programs.index', compact('programs','count'));
    }

    public function createProgram()
    {
        return view('programs.create');
    }

    public function storeProgram(Request $request)
    {
        Program::create(['name' => $request->name,
                            'description' => $request->description,
                            ]);

        flash()->success('Program was successfully created');

        return redirect('programs');
    }

    public function editProgram($id)
    {
        $program = Program::findOrFail($id);

        return view('programs.edit', compact('program'));
    }

    public function updateProgram($id, Request $request)
    {
        $program = Program::findOrFail($id);

        $program->update(['name' => $request->name,
                            'description' => $request->description,
                            ]);

        flash()->success('Program was successfully updated');

        return redirect('programs');
    }

    public function deleteProgram($id)
    {
        Program::findOrFail($id)->delete();

        flash()->success('Program was successfully deleted');

        return redirect('programs');
    }
}

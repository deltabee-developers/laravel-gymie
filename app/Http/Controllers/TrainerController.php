<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\Trainer;
use App\Program;
use Illuminate\Http\Request;


class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
     {
         $this->middleware('auth');
     }


    public function TrainerIndex(Request $request)
    {
      // $trainers = Trainer::search('"'.$request->input('search').'"')->paginate(10);
      // $count = $trainers->count();
      // return view('trainer.index', compact('trainer','count'));

          $trainers = Trainer::search('"'.$request->input('search').'"')->paginate(10);
          $count = $trainers->count();
          return view('trainer.index', compact('trainers','count'));
    }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    public function create()
    {
          return view('trainer.create');
    }

    public function active()
    {
          //return view('programs.create');
    }

    public function inactive()
    {
          //return view('programs.create');
    }


    public function storeTrainer(Request $request)
    {
    //  print_r($request->education);
      $trainer= [           'name' => $request->name,
                            'proof_photo'=> $request->photo,
                            'address' => $request->address,
                            'DOB' => $request->DOB,
                            'gender' => $request->gender,
                            'languages' => $request->languages,
                            'certification' => $request->certification,
                            'timings' => $request->timings,
                            'education' => $request->timings1,
    ];
    // Adding media i.e. Profile & proof photo
    if ($request->hasFile('photo')) {
        $member->addMedia($request->file('photo'))->usingFileName('profile_'.$trainer->id.'.'.$request->photo->getClientOriginalExtension())->toCollection('profile');
    }
    // print_r($trainer);
    //  die;
                            $trainer = new Trainer($trainer);
                            $trainer->save();
                            if ($trainer->id) {
                                $trainer->proof_photo= \constFilePrefix::ProgramPhoto.$trainer->id.'.jpg';
                                $trainer->save();
                                try{
                                    \Utilities::uploadFile($request, \constFilePrefix::ProgramPhoto, $trainer->id, 'trainer_icon', \constPaths::Programs);
                                }catch(\Exception $e){
                                    print_r($e);die;
                                }

                                flash()->success('Trainer was successfully inserted');

                                return redirect('trainer');
                            } else {
                                flash()->error('Error while insertion');

                                return redirect('trainer');
                            }

    }
    //
    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }
    //
    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show($id)
    // {
    //     //
    // }
    //
    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    public function editProgram($id)
    {
      $trainer = Trainer::findOrFail($id);

      return view('trainer.edit', compact('trainer'));
    }
    //
    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    public function updateProgram(Request $request, $id)
    {
        //
        $trainer = Trainer::findOrFail($id);

        $trainer->update(['name' => $request->name,
                              'proof_photo'=> $request->photo,
                              'address' => $request->address,
                              'DOB' => $request->DOB,
                              'gender' => $request->gender,
                              'languages' => $request->languages,
                              'certification' => $request->certification,
                              'timings' => $request->timings,
                              'education' => $request->timings1,
                            ]);

        flash()->success('Trainer details successfully updated');

        return redirect('trainer');
    }
    //
    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    public function deleteTrainer($id)
    {
        Trainer::findOrFail($id)->delete();

        flash()->success('Trainer was successfully deleted');

        return redirect('trainer');
    }
}

<?php

namespace App\Http\Controllers;
use DB;
use Auth;
use App\Events;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
class WebsiteController extends BaseController
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
        $events = Events::search('"'.$request->input('search').'"')->paginate(10);
         $count = $events->count();
        return view('website.index',compact('events', 'count'));
    }

    public function addEvent(Request $request)
    {        
        return view('website.addevents');
    }

  

    public function editEvents($id)
    {

        $event = Events::where('id','=',$id)->findorfail($id);
        return view('website.editevents', compact('event'));
    }
    public function storeEvents(Request $request)
    {
        DB::beginTransaction();
        try {
            $role = Events::create(['name' => $request->name,
                                  'description' => $request->description,
                                 ]);

            if ($request->has('permissions')) {
                $role->attachPermissions($request->permissions);
            }

            DB::commit();
            flash()->success('Event was successfully created');

            return redirect('website');
        } catch (Exception $e) {
            DB::rollback();
            flash()->error('Event was not created');

            return redirect('website');
        }
    }
    public function update($id, Request $request)
    {
        $event = Events::findOrFail($id);

        $event->update($request->all());
        $event->updatedBy()->associate(Auth::user());
        $event->save();
        flash()->success('Event details were successfully updated');

        return redirect('website');
    }

    public function delete($id)
    {
        Events::destroy($id);

        return redirect('website');
    }
}

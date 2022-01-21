<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use DataTables;
use File;
use DB;
class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Attendance::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-warning btn-sm editMember">Edit</a>';
   
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteMember">Delete</a>';
    
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
      
        return view('attendance.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10048',
        ]);
        $photo = time().'.'.$request->file('photo')->extension();  
        
        $request->photo->move(public_path('images'), $photo);

        //$path = $request->file('photo')->storeAs('images',$photo,'public');
        Attendance::updateOrCreate(
            [
                'id' => $request->member_id
            ],
            [
            'name' => $request->name, 
            'instansi' => $request->instansi,
            'photo' => 'images/'.$photo,
        ]);        

        return response()->json(['success'=>'Member saved successfully.']);
    }
    
    public function dataInstansi(Request $request)
    {
    	$data = [];

        if($request->has('q')){
            $search = $request->q;
            $data =collect(DB::select("
            SELECT DISTINCT
            instansi AS id,
            instansi AS text 
        FROM
            attendances where instansi like '%'$search'%'"));
        }else{
            $data =collect(DB::select("
            SELECT DISTINCT
            instansi AS id,
            instansi AS text 
        FROM
            attendances"));
        }
        return response()->json($data);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $attendance = Attendance::find($id);
        return response()->json($attendance);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Attendance::find($id);
        $path = public_path($data->photo);
        if (File::exists($path)) {
            unlink($path);
            // Storage::delete($path);
        }   
        $data->delete(); 
        return response()->json(['success'=>'Member deleted successfully.']);
    }
}

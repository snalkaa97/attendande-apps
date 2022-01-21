<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;

class AbsenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->param) {
            $param = $request->param;
        } else {
            $param = 'instansi';
        }
        if ($request->abjad) {
            $abjad = $request->abjad;
        } else {
            $abjad = 'A';
        }
        if (empty($request->all())) {
            $data = Attendance::where('name', 'like', $request->abjad . '%')->orderBy('name', 'asc')->get();
        } else {
            $data = Attendance::where($param, 'like', $request->abjad . '%')->orderBy($param, 'asc')->get();
        }
        return view('absence', compact('data', 'param', 'abjad'));
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
        //
        $attendance = Attendance::find($request->member_id);

        $attendance->update(
            [
                'tanggal' => date('Y-m-d'),
                'is_checkin' => 1,
            ]
        );

        return response()->json(['success' => 'Successfully checkin']);
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
        //
    }
}

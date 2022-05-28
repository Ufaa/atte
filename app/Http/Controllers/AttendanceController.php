<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreattendanceRequest;
use App\Http\Requests\UpdateattendanceRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Attendance;
use Attribute;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function atte_start()
    {
        $last_atte_end = Attendance::where('date', Carbon::today())->where('end_time')->latest()->first();
        $last_atte_date =Attendance::where('date', Carbon::today())->latest()->first();
        //  dd($last_atte_date);

        if (!is_null($last_atte_date)){
            return redirect('/');
        }
        else if ($last_atte_end == null) {
            Attendance::create([
                'user_id' => Auth::id(),
                'start_time' => Carbon::now(),
                'date' => Carbon::today()
            ]);
            return redirect('/');
        }
        else{
            return redirect('/');
        }
    }

    public function atte_end()
    {
        $last_atte_end = Attendance::where('date', Carbon::today())->where('end_time')->latest()->first();

        if ($last_atte_end == null) {
            return redirect('/');
        } else {
            Attendance::where('date', Carbon::today())->where('end_time')->latest()->first()->update([
                'end_time' => Carbon::now()
            ]);
            return redirect('/');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreattendanceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreattendanceRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function show(attendance $attendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function edit(attendance $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateattendanceRequest  $request
     * @param  \App\Models\attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateattendanceRequest $request, attendance $attendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(attendance $attendance)
    {
        //
    }
}

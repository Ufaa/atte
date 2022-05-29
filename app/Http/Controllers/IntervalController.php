<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreintervalRequest;
use App\Http\Requests\UpdateintervalRequest;
use App\Models\Interval;
use App\Models\Attendance;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Ramsey\Uuid\Type\Integer;

class IntervalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    //次：勤務開始してないと休憩開始できない、atte　endが!nullならダメ。
    public function interval_start()
    {
        //勤務開始してないと休憩を開始できない、勤務開始してたら次へ
        $last_atte_id =
        Interval::where('date', Carbon::today())->latest()->first('attendance_id');
        $last_atte_start =
        Attendance::where('date', Carbon::today())->latest()->first('start_time');
        $last_atte_end = Attendance::where('date', Carbon::today())->latest()->first('end_time');
        $last_interval_start = Interval::where('date', Carbon::today())->latest()->first('start_time');
        $last_interval_end = Interval::where('date', Carbon::today())->latest()->first('end_time');
        $attendance = Attendance::where('date', Carbon::today())->latest()->first();
        // dd($last_interval_start);

        if (empty($last_atte_start)) {
            return redirect('/');
        } elseif (empty($last_interval_start) and empty($last_interval_end)) {
            Interval::where('date', Carbon::today())->latest()->first()->update([
                'start_time' => Carbon::now(),
            ]);
            return redirect('/');
        } elseif (!empty($last_atte_start) && !empty($last_interval_end)) {
            Interval::create([
                'user_id' => Auth::id(),
                'attendance_id' => $attendance->id,
                'date' => Carbon::today(),
                'start_time' => Carbon::now()
            ]);
            return redirect('/');
        }else{
            return redirect('/');
        }

        // if(empty($last_atte_start)){
        //     return redirect('/');
        // }
        // elseif(empty($last_interval_end)){
        //     return redirect('/');
        // } 
        // elseif(empty($last_interval_start)) {
        //     return redirect('/');
        // }
        // elseif(!empty($last_interval_start) and empty($last_interval_end)){
        //     // dd($last_interval_start);
        //     Interval::where('date', Carbon::today())->latest()->first()->update([
        //         'start_time' => Carbon::now(),
        //     ]);
        //     return redirect('/');
        // } 
        // elseif (!empty($last_atte_start) and !empty($last_interval_end)){
        //     Interval::create([
        //         'user_id' => Auth::id(),
        //         'attendance_id' => $attendance->id,
        //         'date' => Carbon::today(),
        //         'start_time' => Carbon::now()
        //     ]);
        //     return redirect('/');
        // }
        // else {
        //     return redirect('/');   
        // }
    

        // if ($last_atte_start == null) {
        //     return redirect('/');
        // } else {
        //     Interval::where('date', Carbon::today())->latest()->first()->update([
        //         'start_time' => Carbon::now(),
        //     ]);
        // }
        //             return redirect('/');
        // {
        //     $last_interval_start = Interval::where('date', Carbon::today())->latest()->first('start_time');
        //     $last_interval_end = Interval::where('date', Carbon::today())->latest()->first('end_time');
        //     if ($last_interval_start != null and $last_interval_end != null) {
        //     $attendance = Attendance::where('date', Carbon::today())->latest()->first();
        //     Interval::create([
        //         'user_id' => Auth::id(),
        //         'attendance_id' => $attendance->id,
        //         'date' => Carbon::today(),
        //         'start_time' => Carbon::now()
        //     ]);
        //     }
        // }
        // return redirect('/');
}


        //勤務終了していたら休憩を開始できない、勤務開始して勤務終了していなけば次へ
        //まず勤務を開始していて、休憩が初めてなら、休憩を新規開始する
        //休憩1回目をとっていて、休憩を終了していなければ休憩を開始できない
        //休憩1回目を取っていて、その休憩を終了していたら、休憩2回目を新規追加する
        //休憩2回目が終わってなければ勤務終了できない。


    public function interval_end()
    {
        $last_interval_end = Interval::where('date', Carbon::today())->where('end_time')->latest()->first();

        if ($last_interval_end == null) {
            return redirect('/');
        } else {
            Interval::where('date', Carbon::today())->where('end_time')->latest()->first()->update([
                    'end_time' => Carbon::now()
                ]);
            return redirect('/');
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreintervalRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreintervalRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\interval  $interval
     * @return \Illuminate\Http\Response
     */
    public function show(interval $interval)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\interval  $interval
     * @return \Illuminate\Http\Response
     */
    public function edit(interval $interval)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateintervalRequest  $request
     * @param  \App\Models\interval  $interval
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateintervalRequest $request, interval $interval)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\interval  $interval
     * @return \Illuminate\Http\Response
     */
    public function destroy(interval $interval)
    {
        //
    }
}

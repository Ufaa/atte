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

    //次：勤務終了を押したら同日の休憩時間を足したものを勤務開始-勤務終了から引いて勤務総時間を格納する。
    //9時間加算される謎・・・なぜかグリニッジ標準時基準（+9時間）になるから。
    //現状で終了時間が入る前の時間からの経過時間がstoreされる。（00:00:00からCarbon::nowの経過時間）よって経過時間が入力された後にstoreされるようにしたい。→functionの中で{}のあとに{}を作って繋げればOK。
    public function atte_end()
    {
        $last_atte_end = Attendance::where('date', Carbon::today())->where('end_time')->latest()->first();

        if ($last_atte_end == null) {
            return redirect('/');
        } else {
            Attendance::where('date', Carbon::today())->latest()->first()->update([
                'end_time' => Carbon::now(),
            ]);
        }
        {
            $time_from_before = Attendance::where('date', Carbon::today())->latest()->first('start_time');
            $time_to_before = Attendance::where('date', Carbon::today())->latest()->first('end_time');
            $diff = (strtotime($time_to_before->end_time) - strtotime($time_from_before->start_time)) - 32400;
            $diffTime = date("H:i:s", $diff);
            //  dd($diffTime);

            Attendance::where('date', Carbon::today())->latest()->first()->update([
                'total_time' => $diffTime,
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

    //次　勤務開始、勤務終了、休憩時間（合計）、勤務時間（休憩を引いた時間）を表示する。（view?それともコントローラ？）
    public function attendance()
    {
        return view('/attendance');
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

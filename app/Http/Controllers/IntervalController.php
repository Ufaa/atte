<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreintervalRequest;
use App\Http\Requests\UpdateintervalRequest;
use App\Models\Interval;
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
    public function interval_start()
    {
        $last_interval_end = Interval::where('date', Carbon::today())->where('end_time')->latest()->first();

        if($last_interval_end == null){
            Interval::create([
                'user_id' => Auth::id(),
                'start_time' => Carbon::now(),
                'date' => Carbon::today()
            ]);
            return redirect('/');
        } else {
            return redirect('/');
        }
    }

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

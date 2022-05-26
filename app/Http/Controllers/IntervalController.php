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
        Interval::create([
            'user_id' => Auth::id(),
            'start_time' => Carbon::now()
        ]);

        return redirect('/');
    }

    public function interval_end()
    {
        // Interval::create([
        //     'user_id' => Auth::id(),
        //     'end_time' => Carbon::now()
        // ]);

        // $start_at = $request->start_date . ' ' . $request->start_time;
        // $num_of_users = $request->num_of_users;
        
        // $interval_start_date = Interval::where('created_at')->format('Y-m-d');

        $today = Carbon::today();
        $interval = Interval::whereDate('created_at', $today)->get();
        $interval_start = Interval::where('start_time')->get();
        // dd($interval);
        if (
            is_null($interval_start)
        ) {
            Interval::where('user_id', Auth::id())
                // ->where($interval, Carbon::today())
                ->update([
                    'end_time' => null
                ]);
            return redirect('/');
        }
        else
        {
            Interval::where('user_id', Auth::id())
                // ->where($interval, Carbon::today())
                ->update([
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

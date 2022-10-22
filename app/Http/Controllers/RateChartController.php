<?php

namespace App\Http\Controllers;

use App\Models\RateChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;


class RateChartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $oranges = RateChart::where('seller_id',auth()->user()->id)->paginate(config::get('constants.pagination.pagination_per_page'));
        return view('seller.rateChart.index',compact('oranges'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('seller.rateChart.create');
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
        $request->validate([
            'type'=> 'required|alpha',
            'rate'=> 'required|regex:/^\d*(\.\d{2})?$/'
        ]);
        RateChart::create([
            'seller_id' => auth()->user()->id,
             'type'     => $request->type,
             'rate'     => $request->rate


        ]);
        return redirect()->route('seller.rateChart.index')->with('success','Rate Added Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RateChart  $rateChart
     * @return \Illuminate\Http\Response
     */
    public function show(RateChart $rateChart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RateChart  $rateChart
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $orange = RateChart::find($id);
        return view('seller.rateChart.edit',compact('orange'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RateChart  $rateChart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        $request->validate([
            'type'=> 'required',
            'rate'=> 'required'
        ]);
        $orange = RateChart::find($id);
        $orange->update([
            'type'     => $request->type,
             'rate'     => $request->rate
        ]);
        return redirect()->route('seller.rateChart.index')->with('success','Rate Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RateChart  $rateChart
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $orange = RateChart::find($id);
        $orange->delete();
        return redirect()->route('seller.rateChart.index')->with('success','Rate deleted Successfully');
    }
}

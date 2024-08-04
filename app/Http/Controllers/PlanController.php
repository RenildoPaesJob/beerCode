<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
	{
		$plans = Plan::all();
        return view('plan.plan', compact('plans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
	{
		return Plan::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Plan $plan): Plan
	{
        return $plan;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Plan $plan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Plan $plan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Plan $plan)
    {
        //
    }
}

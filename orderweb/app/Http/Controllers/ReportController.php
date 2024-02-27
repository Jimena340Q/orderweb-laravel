<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Order;
use App\Models\Technician;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $technicians = Technician::all();
        return view('reports.index' , compact('technicians'));
    }

    /* 
     * Exporta todos los técnicos existentes en PDF
     */
    public function export_technicians()
    {
        $technicians = Technician::all();
        $data = array(
            'technicians' => $technicians
        );
        $pdf = Pdf::loadView('reports.export_technicians' , $data)->setPaper('letter' , 'portrait');
        return $pdf->download('Technicians.pdf');
    }

    public function export_users()
    {
        $users = User::all();
        $data = array(
            'users' => $users
        );
        $pdf = Pdf::loadView('reports.export_users' , $data)->setPaper('letter' , 'portrait');
        return $pdf->download('Users.pdf');
    }

    public function export_activities_by_technician(Request $request)
    {
        $technician = Technician::where('document' , '=' , $request['technician_id'])->first();

        $activities = Activity::where('technician_id' , '=' , $request['technician_id'])->get();
        
        $data = array(
            'technician' => $technician,
            'activities' => $activities
        );

        $pdf = Pdf::loadView('reports.export_activities_by_technician' , $data)->setPaper('letter' , 'portrait');
        return $pdf->download('ActivitiesByTechnician.pdf');
    }

    public function export_orders(Request $request)
    {
        $orders = Order::whereBetween('legalization_date' , [$request['initial_date'] , $request['final_date']])->get();
        $data = array(
            'initial_date' => $request['initial_date'],
            'final_date' => $request['final_date'],
            'orders' => $orders
        );
        $pdf = Pdf::loadView('reports.export_orders' , $data)->setPaper('letter' , 'portrait');
        return $pdf->download('Orders.pdf');
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

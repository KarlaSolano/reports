<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExpenseReport;
use App\Mail\SummaryReport;
use Illuminate\Support\Facades\Mail;  

class ExpenseReportController extends Controller
{
    /** 
    *Agrego constructor para agregar middleware y proteger rutas
    *
    */
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expenseReports = ExpenseReport::all();

        return view('expenseReport.index', compact('expenseReports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('expenseReport.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validaData = $request->validate([
            'title' => 'required | min:3'
        ]);
        
        $report = new ExpenseReport();
        $report->title = $validaData['title'];
        $report->save();

        return redirect('/expenses');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $report = ExpenseReport::findOrFail($id);
        return view('expenseReport.show', compact('report'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $report = ExpenseReport::findOrFail($id);
        return view('expenseReport.edit', compact('report'));
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
        
        $validaData = $request->validate([
            'title' => 'required | min:3'
        ]);

        $report = ExpenseReport::find($id);
        $report->title = $validaData['title'];
        $report->save();

        return redirect('/expenses');
    }

    /**
     * Confirmar el eliminar registro
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function confirmDelete($id)
    {
        $report = ExpenseReport::findOrFail($id);
        return view('expenseReport.confirmDelete',compact('report'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $report = ExpenseReport::find($id);
        $report->delete();

        return redirect('/expenses');
    }

    /**
     * Vista para SendEmail.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function confirmSendEmail($id)
    {
        $report = ExpenseReport::find($id);
        return view('expenseReport.confirmSendEmail', compact('report'));
    }

    /**
     * SendEmail.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function sendEmail(Request $request, $id)
    {
        $report = ExpenseReport::find($id);
        Mail::to($request->get('email'))->send(new SummaryReport($report));
        
        return redirect('/expenses/' . $id);
    }
}

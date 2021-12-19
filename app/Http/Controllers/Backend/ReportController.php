<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DateTime;
use App\Models\Order;

class ReportController extends Controller
{
    public function index(){

        return view('backend.report.index');
    }

    public function ReportByDate(Request $request){

   	    $date = new DateTime($request->date);
   	    $formatDate = $date->format('d F Y');
   	    $orders = Order::where('order_date', $formatDate)->latest()->get();

   	    return view('backend.report.detail',compact('orders'));
    } 

    public function ReportByMonth(Request $request){

   	    $orders = Order::where('order_month', $request->month)->where('order_year',$request->year_name)->latest()->get();
   	    return view('backend.report.detail', compact('orders'));
    } 

    public function ReportByYear(Request $request){

   	    $orders = Order::where('order_year', $request->year)->latest()->get();
   	    return view('backend.report.detail', compact('orders'));
    }
}

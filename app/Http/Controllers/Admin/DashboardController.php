<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\User;
use Auth;
use DB;
use DateTime;
use Cache;

class DashboardController extends Controller
{
    public function refresh(){
		\Artisan::call('route:clear');
		\Artisan::call('config:clear');
		\Artisan::call('view:clear');
		\Artisan::call('cache:clear');
		return redirect()->back()->with('success','Software Refresh');
	  }

    public function index(){
		$date = new DateTime("now");
	$sale=DB::table('orders')
           ->where('type',3)
	  ->whereDate('orders.created_at', '=', $date)
           ->select(DB::raw('SUM(total) as total'))
           ->first();
     $suppurchase=DB::table('orders')
           ->where('type',2)
		   ->whereDate('orders.created_at', '=', $date)
           ->select(DB::raw('SUM(total) as total'))
           ->first();
    $shippurchase=DB::table('orders')
           ->where('type',1)
		   ->whereDate('orders.created_at', '=', $date)
           ->select(DB::raw('SUM(total) as total'))
           ->first();
   $expense=DB::table('expenses')
          ->whereDate('expenses.created_at', '=', $date)
           ->select(DB::raw('SUM(total) as total'))
           ->first();
    $partnerpayment=DB::table('partnerpayments')  
	    ->whereDate('partnerpayments.created_at', '=', $date)
            ->select(DB::raw('SUM(payment) as total'))
            ->first();
    $customersale=DB::table('corders')   
          	->whereDate('corders.created_at', '=', $date)
            ->select(DB::raw('SUM(total) as total'))
            ->first();
    $customerpayment=DB::table('cpayments') 
	         ->whereDate('cpayments.created_at', '=', $date)
            ->select(DB::raw('SUM(payment) as total'))
            ->first();
    $supplierpurchase=DB::table('sorders') 
	        ->whereDate('sorders.created_at', '=', $date)
            ->select(DB::raw('SUM(total) as total'))
            ->first();
    $supllierpayment=DB::table('spayments') 
	        ->whereDate('spayments.created_at', '=', $date)
            ->select(DB::raw('SUM(payment) as total'))
            ->first();
    $companyexpense=DB::table('companyexpenses')
         	->whereDate('companyexpenses.created_at', '=', $date)       
            ->select(DB::raw('SUM(total) as total'))
            ->first();           
            
    $profit=DB::table('pprofits')
            ->whereDate('pprofits.created_at', '=', $date)       
            ->select(DB::raw('SUM(profit) as profit'),DB::raw('SUM(company) as company'))
            ->first();
    $totalprofit=DB::table('pprofits')    
            ->select(DB::raw('SUM(profit) as profit'),DB::raw('SUM(company) as company'))
            ->first();
	 $user=DB::table('users')->where('id','>',1)->get();        
         
       $sale1=DB::table('orders')
                ->where('type',3)
                ->select(DB::raw('SUM(total) as total'))
                ->first();
        $suppurchase1=DB::table('orders')
                ->where('type',2)
                ->select(DB::raw('SUM(total) as total'))
                ->first();
        $shippurchase1=DB::table('orders')
                ->where('type',1)
                ->select(DB::raw('SUM(total) as total'))
                ->first();
        $expense1=DB::table('expenses')
                ->select(DB::raw('SUM(total) as total'))
                ->first();
        $partnerpayment1=DB::table('partnerpayments')       
                ->select(DB::raw('SUM(payment) as total'))
                ->first();
        $customersale1=DB::table('corders')       
                ->select(DB::raw('SUM(total) as total'))
                ->first();
        $customerpayment1=DB::table('cpayments')       
                ->select(DB::raw('SUM(payment) as total'))
                ->first();
        $supplierpurchase1=DB::table('sorders')       
                ->select(DB::raw('SUM(total) as total'))
                ->first();
        $supllierpayment1=DB::table('spayments')       
                ->select(DB::raw('SUM(payment) as total'))
                ->first();
        $companyexpense1=DB::table('companyexpenses')       
                ->select(DB::raw('SUM(total) as total'))
                ->first();
        $userlist=User::where('id','>',1)->get();
        $totaproduct=DB::table('products')->count();
        $totalpartner=DB::table('parties')->count();
        $customers=DB::table('customers')->count();
        $suppliers=DB::table('suppliers')->count();
        $recentpro=DB::table('products')->orderBy('id','DESC')->limit(10)->get();

        if(Auth::user()->role==1){     
        $bill=DB::table('billings')
                ->join('parties','parties.id','=','billings.partner')
                ->select('billings.*','parties.name','parties.mobile')
                ->orderBy('id','DESC')
                ->limit(10)
                ->get();
        }else{
                $bill=DB::table('billings')
                ->join('parties','parties.id','=','billings.partner')
                ->select('billings.*','parties.name','parties.mobile')
                ->orderBy('id','DESC')
                ->where('billings.user',Auth::user()->id)
                ->limit(10)
                ->get();    
        }
        return view('admin.dashboard',compact('totalprofit','profit','user','companyexpense','supllierpayment','supplierpurchase','customerpayment','customersale','partnerpayment','expense','shippurchase','suppurchase','sale','companyexpense1','supllierpayment1','supplierpurchase1','customerpayment1','customersale1','partnerpayment1','expense1','shippurchase1','suppurchase1','sale1','totaproduct','totalpartner','customers','suppliers','recentpro','userlist','bill')); 
     }
}

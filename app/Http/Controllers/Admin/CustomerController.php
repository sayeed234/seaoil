<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Customer;
use App\Models\Admin\Product;
use App\Models\Admin\Category;
use App\Models\Admin\Corder;
use App\Models\Admin\Cdetails;
use App\Models\Admin\Cpayment;
use App\Models\User;
use DateTime;
use Auth;
use Cart;
use DB;
class CustomerController extends Controller
{
    public function customer(){
       $customer=Customer::orderBy('id','DESC')->get();
        return view('admin.customer.customer',compact('customer'));
    }
    public function customer_store(Request $request){
        $data=new Customer();
        $data->name=$request->name;
        $data->mobile=$request->mobile;
        $data->address=$request->address;
        $data->user=Auth::user()->id;
        $data->save();
     return redirect()->back()->with('success','Added New Customer');
    }
    public function customer_edit($id){
        $data=Customer::find($id);
        return $data;
    }
    public function customer_delete($id){
        $data=Customer::find($id);
        $data->delete();
     return redirect()->back()->with('danger',' Customer deleted');

    }
    public function customer_update(Request $request){
        $data=Customer::find($request->id);
        $data->name=$request->name;
        $data->mobile=$request->mobile;
        $data->address=$request->address;
        $data->user=Auth::user()->id;
        $data->save();
     return redirect()->back()->with('info','Customer Updated');
    }
    //------------------------------------Sale----------------------------------------------\
    public function customer_sale($id){
        if($id==0){
            $product=Product::inRandomOrder()->limit(50)->get();
        }else{
            $product=Product::where('category',$id)->get();
        }    
          $date = new DateTime("now");
            $customer=Customer::orderBy('id','DESC')->get();
            $category=Category::all();
            $cartProduct=Cart::content();
            if(Auth::user()->role==1){
           $order=DB::table('corders')
                 ->join('customers','customers.id','=','corders.customer')
                 ->select('corders.*','customers.name','customers.mobile')
                 ->whereDate('corders.created_at', '=', $date)
                 ->orderBy('id','DESC')
                 ->get();
            }else{
                $order=DB::table('corders')
                    ->join('customers','customers.id','=','corders.customer')
                    ->select('corders.*','customers.name','customers.mobile')
                    ->whereDate('corders.created_at', '=', $date)
                    ->where('corders.user',Auth::user()->id)
                    ->orderBy('id','DESC')
                    ->get();
            }

        return view('admin.customer.sale',compact('product','category','cartProduct','customer','order'));
    }
    public function corder(Request $request){
        if(Cart::count()){
             $m=rand(000000,999999);
             $cartProducts= Cart::content();
               $order=new Corder();
               $order->invoice=$m;
               $order->customer=$request->customer;
               $order->total=$request->subtotal;
               $order->payment=$request->payment;
               $order->qty=Cart::count();
               $order->user=Auth::user()->id;
               $order->save();
           if($request->payment>0){
                $payment=new Cpayment();
                $payment->corder=$order->id;
                $payment->customer=$request->customer;
                $payment->payment=$request->payment;               
                $payment->user=Auth::user()->id; 
                $payment->save();          
              }
                 foreach($cartProducts as $cartProduct){
                   $details=new Cdetails();
                   $details->corder=$order->id;
                   $details->name=$cartProduct->name;
                   $details->qty=$cartProduct->qty;
                   $details->rate=$cartProduct->price;
                   $details->total=$cartProduct->price*$cartProduct->qty;
                   $details->unit=$cartProduct->options->unit;
                   $details->save();
               }
            
            Cart::destroy();
          return redirect()->back()->with('info','Successfully Sale Product');
        }else{
            return redirect()->back()->with('warning','No Product in Your Cart !! At first Add Products'); 
        }
    } 
    public function corder_delete($id){
         $data=Corder::find($id);
         $data->delete();
         return redirect()->back()->with('danger','Successfully Order Deleted');

    }
    public function corder_view($id){
        $order=DB::table('corders')
                 ->join('customers','customers.id','=','corders.customer')
                 ->select('corders.*','customers.name','customers.mobile','customers.address')
                 ->where('corders.id', $id)
                 ->first();
         $details=Cdetails::where('corder',$id)->get();        
         $payment=DB::table('cpayments')->where('corder',$id)->first();
       
        return view('admin.customer.view',compact('order','details','payment'));
    }
    public function allsale(){

          if(Auth::user()->role==1){
            $order=DB::table('corders')
                ->join('customers','customers.id','=','corders.customer')
                ->select('corders.*','customers.name','customers.mobile')
                ->orderBy('id','DESC')
                ->get();
          }else{
            $order=DB::table('corders')
                ->join('customers','customers.id','=','corders.customer')
                ->select('corders.*','customers.name','customers.mobile')
                ->where('corders.user',Auth::user()->id)
                ->orderBy('id','DESC')
                ->get();
          }
       

        return view('admin.customer.allsale',compact('order'));
    }


    public function cpayment(){
        $date = new DateTime("now");
        $customer=Customer::orderBy('id','DESC')->get();
        $customer2=Customer::orderBy('id','DESC')->get();
        if(Auth::user()->role==1){
        $payment=DB::table('cpayments')
                 ->join('customers','customers.id','=','cpayments.customer')
                 ->select('cpayments.*','customers.name','customers.mobile')
                 ->orderBy('id','DESC')
                 ->get();
     }else{
        $payment=DB::table('cpayments')
                ->join('customers','customers.id','=','cpayments.customer')
                ->select('cpayments.*','customers.name','customers.mobile')
                ->where('cpayments.user',Auth::user()->id)
                ->whereDate('cpayments.created_at', '=', $date)
                ->orderBy('id','DESC')
                ->get();
          }
        return view('admin.customer.payment',compact('customer2','customer','payment'));
    }

    public function cpayment_store(Request $request){
        $data=new Cpayment();
        $data->customer=$request->customer;
        $data->payment=$request->payment;
        $data->free2=$request->note;
        $data->user=Auth::user()->id;
        $data->save();
        return redirect()->back()->with('success','Payment Recieved ');
    }
    public function cpayment_edit($id){
        $data=Cpayment::find($id);
        return $data;
    }
    public function cpayment_delete($id){
        $data=Cpayment::find($id);
        $data->delete();
        return redirect()->back()->with('danger','Recieved  Payment Deleted ');
    }
    public function cpayment_update(Request $request){
        $data=Cpayment::find($request->id);
        $data->customer=$request->customer;
        $data->payment=$request->payment;
        $data->free2=$request->note;
        $data->user=Auth::user()->id;
        $data->save();
        return redirect()->back()->with('success','Payment Recieved Updated ');

    }
    public function datewise(Request $request){
        $fromDate=0;    
        if($request->fromDate){
            $order=DB::table('corders')
                    ->whereDate('created_at', '>=', $request->fromDate)
                    ->whereDate('created_at', '<=', $request->toDate)
                    ->select('created_at',DB::raw('SUM(total) as total'))
                    ->groupBy('created_at')
                    ->orderBy('created_at','DESC')
                    ->get();
                    $fromDate=$request->fromDate;
        }else{
            $order=DB::table('corders')               
                ->select('created_at',DB::raw('SUM(total) as total'))
                ->groupBy('created_at')
                ->orderBy('created_at','DESC')
                ->take(100)
                ->get();                
        }
        return view('admin.customer.datewise',compact('fromDate','order'));
    }
 public function userwise(Request $request){
    $fromDate=0; 
    $order=0;
    $users=0;
    $payments=0;
    $user=User::where('id','>',1)->get();
    if($request->user){
        $order=DB::table('corders') 
                ->join('customers','customers.id','=','corders.customer')
                ->select('corders.*','customers.name','customers.mobile')            
                ->whereDate('corders.created_at', '>=', $request->fromDate)
                ->whereDate('corders.created_at', '<=', $request->toDate)                
                ->where('corders.user',$request->user)
                ->orderBy('corders.created_at','DESC')
                ->get();
        $payments=DB::table('cpayments')
               ->join('customers','customers.id','=','cpayments.customer')
                ->select('cpayments.*','customers.name','customers.mobile') 
                ->whereDate('cpayments.created_at', '>=', $request->fromDate)
                ->whereDate('cpayments.created_at', '<=', $request->toDate)
                ->where('cpayments.user',$request->user)
                ->orderBy('cpayments.created_at','DESC')
                ->get(); 

                $fromDate=$request->fromDate;
            $users=User::find($request->user);   
            }

     return view('admin.customer.userwise',compact('user','fromDate','order','users','payments'));
 }
 public function customerwise(Request $request){
    $fromDate=0; 
    $order=0;
    $users=0;
    $payments=0;
    $user=Customer::all();
    if($request->user){
        $order=DB::table('corders')            
                ->whereDate('corders.created_at', '>=', $request->fromDate)
                ->whereDate('corders.created_at', '<=', $request->toDate)                
                ->where('corders.customer',$request->user)
                ->orderBy('corders.created_at','DESC')
                ->get();
        $payments=DB::table('cpayments')
                ->whereDate('cpayments.created_at', '>=', $request->fromDate)
                ->whereDate('cpayments.created_at', '<=', $request->toDate)
                ->where('cpayments.customer',$request->user)
                ->orderBy('cpayments.created_at','DESC')
                ->get(); 

                $fromDate=$request->fromDate;
            $users=Customer::find($request->user);   
            }

     return view('admin.customer.customerwise',compact('user','fromDate','order','users','payments'));
 }


    public function paymentreport(Request $request){
        $fromDate=0;    
        if($request->fromDate){
            $payment=DB::table('cpayments')
                    ->whereDate('created_at', '>=', $request->fromDate)
                    ->whereDate('created_at', '<=', $request->toDate)
                    ->select('created_at',DB::raw('SUM(payment) as total'))
                    ->groupBy('created_at')
                    ->orderBy('created_at','DESC')
                    ->get();
                    $fromDate=$request->fromDate;
        }else{
            $payment=DB::table('cpayments')               
                ->select('created_at',DB::raw('SUM(payment) as total'))
                ->groupBy('created_at')
                ->orderBy('created_at','DESC')
                ->take(100)
                ->get();                
        }
        return view('admin.customer.paymentreport',compact('fromDate','payment'));
    }

    public function balance(){

        $balance=DB::table('corders')
                ->join('customers','customers.id','=','corders.customer')
                ->select('customers.name','customers.mobile','customers.id',DB::raw('SUM(total) as total'))
                ->groupBy('customers.name','customers.mobile','customers.id')
                ->orderBy('id','DESC')
                ->get();


        return view('admin.customer.balance',compact('balance'));
    }
    
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Customer;
use App\Models\Admin\Supplier;
use App\Models\Admin\Product;
use App\Models\Admin\Category;
use App\Models\Admin\Sorder;
use App\Models\Admin\Sdetails;
use App\Models\Admin\Spayment;
use App\Models\User;
use DateTime;
use Auth;
use Cart;
use DB;
class SupplierController extends Controller
{
    public function supplier(){
        $supplier=Supplier::orderBy('id','DESC')->get();
         return view('admin.supplier.supplier',compact('supplier'));
     }
     public function supplier_store(Request $request){
         $data=new Supplier();
         $data->name=$request->name;
         $data->company=$request->company;
         $data->mobile=$request->mobile;
         $data->address=$request->address;
         $data->user=Auth::user()->id;
         $data->save();
      return redirect()->back()->with('success','Added New Supplier');
     }
     public function supplier_edit($id){
         $data=Supplier::find($id);
         return $data;
     }
     public function supplier_delete($id){
         $data=Supplier::find($id);
         $data->delete();
      return redirect()->back()->with('danger',' Supplier deleted');
 
     }
     public function supplier_update(Request $request){
         $data=Supplier::find($request->id);
         $data->name=$request->name;
         $data->mobile=$request->mobile;
         $data->company=$request->company;
         $data->address=$request->address;
         $data->user=Auth::user()->id;
         $data->save();
      return redirect()->back()->with('info','Supplier Updated');
     } 
     //Purchase----------------------------------------------------------------
     public function purchase($id){
        if($id==0){
            $product=Product::inRandomOrder()->limit(50)->get();
        }else{
            $product=Product::where('category',$id)->get();
        }    
          $date = new DateTime("now");
            $supplier=Supplier::orderBy('id','DESC')->get();
            $category=Category::all();
            $cartProduct=Cart::content();
            if(Auth::user()->role==1){
           $order=DB::table('sorders')
                 ->join('suppliers','suppliers.id','=','sorders.supplier')
                 ->select('sorders.*','suppliers.name','suppliers.mobile')
                 ->whereDate('sorders.created_at', '=', $date)
                 ->orderBy('id','DESC')
                 ->get();
            }else{
                $order=DB::table('sorders')
                    ->join('suppliers','suppliers.id','=','sorders.supplier')
                    ->select('sorders.*','suppliers.name','suppliers.mobile')
                    ->whereDate('sorders.created_at', '=', $date)
                    ->where('sorders.user',Auth::user()->id)
                    ->orderBy('id','DESC')
                    ->get();
            }

        return view('admin.supplier.purchase',compact('product','category','cartProduct','supplier','order'));
    }
    public function sorder(Request $request){
        if(Cart::count()){
        $m=rand(000000,999999);
        $cartProducts= Cart::content();
          $order=new Sorder();
          $order->invoice=$m;
          $order->supplier=$request->supplier;
          $order->total=$request->subtotal;
          $order->payment=$request->payment;
          $order->qty=Cart::count();
          $order->user=Auth::user()->id;
          $order->save();
      if($request->payment>0){
           $payment=new Spayment();
           $payment->sorder=$order->id;
           $payment->supplier=$request->supplier;
           $payment->payment=$request->payment;               
           $payment->user=Auth::user()->id; 
           $payment->save();          
         }
            foreach($cartProducts as $cartProduct){
              $details=new Sdetails();
              $details->sorder=$order->id;
              $details->name=$cartProduct->name;
              $details->qty=$cartProduct->qty;
              $details->rate=$cartProduct->price;
              $details->total=$cartProduct->price*$cartProduct->qty;
              $details->unit=$cartProduct->options->unit;
              $details->save();
          }       
        Cart::destroy();
     return redirect()->back()->with('info','Successfully Purchase Product');
        }else{
            return redirect()->back()->with('warning','No Product in Your Cart !! At first Add Products'); 
        }
} 
        public function sorder_delete($id){
            $data=Sorder::find($id);
            $data->delete();
            return redirect()->back()->with('danger','Successfully Order Deleted');

        }
        public function sorder_view($id){
        $order=DB::table('sorders')
                    ->join('suppliers','suppliers.id','=','sorders.supplier')
                    ->select('sorders.*','suppliers.name','suppliers.mobile','suppliers.address','suppliers.company')
                    ->where('sorders.id', $id)
                    ->first();
            $details=Sdetails::where('sorder',$id)->get();        
            $payment=DB::table('spayments')->where('sorder',$id)->first();
        return view('admin.supplier.view',compact('order','details','payment'));
        }
        public function allpurchase(){

            if(Auth::user()->role==1){
              $order=DB::table('sorders')
                  ->join('suppliers','suppliers.id','=','sorders.supplier')
                  ->select('sorders.*','suppliers.name','suppliers.mobile')
                  ->orderBy('id','DESC')
                  ->get();
            }else{
              $order=DB::table('sorders')
                 ->join('suppliers','suppliers.id','=','sorders.supplier')
                 ->select('sorders.*','suppliers.name','suppliers.mobile')
                  ->where('sorders.user',Auth::user()->id)
                  ->orderBy('id','DESC')
                  ->get();
            }        
  
          return view('admin.supplier.allpurchase',compact('order'));
      }
      public function spayment(){
        $date = new DateTime("now");
        $customer=Supplier::orderBy('id','DESC')->get();
        $customer2=Supplier::orderBy('id','DESC')->get();
        if(Auth::user()->role==1){
        $payment=DB::table('spayments')
                 ->join('suppliers','suppliers.id','=','spayments.supplier')
                 ->select('spayments.*','suppliers.name','suppliers.mobile')
                 ->orderBy('id','DESC')
                 ->get();
     }else{
        $payment=DB::table('spayments')
                ->join('suppliers','suppliers.id','=','spayments.supplier')
                ->select('spayments.*','suppliers.name','suppliers.mobile')
                ->where('spayments.user',Auth::user()->id)
                ->whereDate('spayments.created_at', '=', $date)
                ->orderBy('id','DESC')
                ->get();
          }
        return view('admin.supplier.payment',compact('customer2','customer','payment'));
    }
    public function spayment_store(Request $request){
        $data=new Spayment();
        $data->supplier=$request->supplier;
        $data->payment=$request->payment;
        $data->free2=$request->note;
        $data->user=Auth::user()->id;
        $data->save();
        return redirect()->back()->with('success','Payment Successfull ');
    }
    public function spayment_edit($id){
        $data=Spayment::find($id);
        return $data;
    }
    public function spayment_delete($id){
        $data=Spayment::find($id);
        $data->delete();
        return redirect()->back()->with('danger','  Payment Deleted ');
    }
    public function spayment_update(Request $request){
        $data=Spayment::find($request->id);
        $data->supplier=$request->supplier;
        $data->payment=$request->payment;
        $data->free2=$request->note;
        $data->user=Auth::user()->id;
        $data->save();
        return redirect()->back()->with('success','Payment  Updated ');

    }

    public function datewisep(Request $request){
        $fromDate=0;    
        if($request->fromDate){
            $order=DB::table('sorders')
                    ->whereDate('created_at', '>=', $request->fromDate)
                    ->whereDate('created_at', '<=', $request->toDate)
                    ->select('created_at',DB::raw('SUM(total) as total'))
                    ->groupBy('created_at')
                    ->orderBy('created_at','DESC')
                    ->get();
                    $fromDate=$request->fromDate;
        }else{
            $order=DB::table('sorders')               
                ->select('created_at',DB::raw('SUM(total) as total'))
                ->groupBy('created_at')
                ->orderBy('created_at','DESC')
                ->take(100)
                ->get();                
        }
        return view('admin.supplier.datewisep',compact('fromDate','order'));
    }
    public function userwisep(Request $request){
        $fromDate=0; 
        $order=0;
        $users=0;
        $payments=0;
        $user=User::where('id','>',1)->get();
        if($request->user){
            $order=DB::table('sorders') 
                    ->join('suppliers','suppliers.id','=','sorders.supplier')
                    ->select('sorders.*','suppliers.name','suppliers.mobile')            
                    ->whereDate('sorders.created_at', '>=', $request->fromDate)
                    ->whereDate('sorders.created_at', '<=', $request->toDate)                
                    ->where('sorders.user',$request->user)
                    ->orderBy('sorders.created_at','DESC')
                    ->get();
            $payments=DB::table('spayments')
                   ->join('suppliers','suppliers.id','=','spayments.supplier')
                    ->select('spayments.*','suppliers.name','suppliers.mobile') 
                    ->whereDate('spayments.created_at', '>=', $request->fromDate)
                    ->whereDate('spayments.created_at', '<=', $request->toDate)
                    ->where('spayments.user',$request->user)
                    ->orderBy('spayments.created_at','DESC')
                    ->get(); 
    
                    $fromDate=$request->fromDate;
                $users=User::find($request->user);   
                }
    
         return view('admin.supplier.userwisep',compact('user','fromDate','order','users','payments'));
     }
     public function supplierwise(Request $request){
        $fromDate=0; 
        $order=0;
        $users=0;
        $payments=0;
        $user=Supplier::all();
        if($request->user){
            $order=DB::table('sorders')            
                    ->whereDate('sorders.created_at', '>=', $request->fromDate)
                    ->whereDate('sorders.created_at', '<=', $request->toDate)                
                    ->where('sorders.supplier',$request->user)
                    ->orderBy('sorders.created_at','DESC')
                    ->get();
            $payments=DB::table('spayments')
                    ->whereDate('spayments.created_at', '>=', $request->fromDate)
                    ->whereDate('spayments.created_at', '<=', $request->toDate)
                    ->where('spayments.supplier',$request->user)
                    ->orderBy('spayments.created_at','DESC')
                    ->get(); 
    
                    $fromDate=$request->fromDate;
                $users=Supplier::find($request->user);   
                }
    
         return view('admin.supplier.supplierwise',compact('user','fromDate','order','users','payments'));
     }
     public function ppaymentreport(Request $request){
        $fromDate=0;    
        if($request->fromDate){
            $payment=DB::table('spayments')
                    ->whereDate('created_at', '>=', $request->fromDate)
                    ->whereDate('created_at', '<=', $request->toDate)
                    ->select('created_at',DB::raw('SUM(payment) as total'))
                    ->groupBy('created_at')
                    ->orderBy('created_at','DESC')
                    ->get();
                    $fromDate=$request->fromDate;
        }else{
            $payment=DB::table('spayments')               
                ->select('created_at',DB::raw('SUM(payment) as total'))
                ->groupBy('created_at')
                ->orderBy('created_at','DESC')
                ->take(100)
                ->get();                
        }
        return view('admin.supplier.ppayment',compact('fromDate','payment'));
    }
    public function sbalance(){
        $balance=DB::table('sorders')
                ->join('suppliers','suppliers.id','=','sorders.supplier')
                ->select('suppliers.name','suppliers.mobile','suppliers.id',DB::raw('SUM(total) as total'))
                ->groupBy('suppliers.name','suppliers.mobile','suppliers.id')
                ->orderBy('id','DESC')
                ->get();


        return view('admin.supplier.balance',compact('balance'));
    }
}

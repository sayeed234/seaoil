<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Product;
use App\Models\Admin\Expense;
use App\Models\Admin\Party;
use App\Models\Admin\Billing;
use App\Models\Admin\Category;
use App\Models\Admin\ExpenseCategory;
use App\Models\Admin\Order;
use App\Models\Admin\Payment;
use App\Models\Admin\Pprofit;
use App\Models\Admin\Partnerpayment;
use DateTime;
use Cart;
use Auth;
use DB;

class BillingController extends Controller
{
    public function billing(){
        $partner=Party::orderBy('id','DESC')->get();
        $partner2=Party::orderBy('id','DESC')->get();
        if(Auth::user()->role==1){
            $bill=DB::table('billings')
                    ->join('parties','parties.id','=','billings.partner')
                    ->select('billings.*','parties.name','parties.mobile')
                    ->orderBy('id','DESC')
                    ->where('billings.status',0)
                    ->get();
        }else{
        $bill=DB::table('billings')
             ->join('parties','parties.id','=','billings.partner')
             ->select('billings.*','parties.name','parties.mobile')
             ->orderBy('id','DESC')
             ->where('billings.status',0)
             ->where('billings.user',Auth::user()->id)
             ->get();
        }   
        return view('admin.billing.billing',compact('partner','partner2','bill'));
    }
    public function complete(){
        $partner=Party::orderBy('id','DESC')->get();
        $partner2=Party::orderBy('id','DESC')->get();
        $bill=DB::table('billings')
             ->join('parties','parties.id','=','billings.partner')
             ->select('billings.*','parties.name','parties.mobile')
             ->orderBy('id','DESC')
             ->where('billings.status',1)
            //  ->where('billings.user',Auth::user()->id)
             ->get();
        return view('admin.billing.complete',compact('partner','partner2','bill'));
    }

    public function billing_store(Request $request){
              $store=new Billing();
              $store->billing=$request->billing;
              $store->partner=$request->partner;
              $store->vessel=$request->vessel;
              $store->imo=$request->imo;
              $store->date=$request->date;
              $store->agent=$request->agent;
              $store->com=$request->com;
              $store->user=Auth::user()->id;
              $store->status=0;
              $store->save();
		 return redirect()->back()->with('success','Started A New Billing');

    }
    public function billing_delete($id){
         $data=Billing::find($id)->delete();
         $order=Order::where('billing',$id)->delete();
         $expense=Expense::where('billing',$id)->delete();
		return redirect()->back()->with('danger','Deleted Extra Billing');

    }
    public function billing_edit($id){
        $data=Billing::find($id);
        return $data;	 

    }
    public function returnbill($id){
        $profit=Pprofit::where('billing',$id)->delete();
        $bill=Billing::find($id);
        $bill->status=0;
        $bill->save();
		return redirect()->back()->with('warning',' Return Edit This  Billing');
    }
    public function billing_update(Request $request){
        $store=Billing::find($request->id);
        $store->partner=$request->partner;
        $store->vessel=$request->vessel;
        $store->imo=$request->imo;
        $store->date=$request->date;
        $store->agent=$request->agent;
        $store->user=Auth::user()->id;
        $store->com=$request->com;
        $store->status=0;
        $store->save();
   return redirect()->back()->with('info','Success Updated Billing');

}
public function billing_expense($id){
    $bill=DB::table('billings')
            ->join('parties','parties.id','=','billings.partner')
            ->select('billings.*','parties.name','parties.mobile')
            ->where('billings.id',$id)
            ->first();
    $expensebill=DB::table('expenses')
                ->join('expense_categories','expense_categories.id','=','expenses.operation')
                ->select('expenses.*','expense_categories.expense_category')
                ->where('expenses.billing',$id)
                ->get();

    $expense=ExpenseCategory::all();
    $expense2=ExpenseCategory::all();
    return view('admin.billing.expense',compact('expense','bill','expensebill','expense2'));
  }
  public function billing_expense_store(Request $request){

       $store=new Expense();
       $store->billing=$request->billing;
       $store->billno=$request->billno;
       $store->operation=$request->operation;
       $store->qty=$request->qty;
       $store->rate=$request->rate;
       $store->partner=$request->partner;
       $store->total=$request->qty*$request->rate;
       $store->user=Auth::user()->id;
       $store->save();
   return redirect()->back()->with('success','Expense Successfully Added');

  }
  public function billing_expense_edit($id){
      $data=Expense::find($id);
       return $data;
  }
  public function billing_expense_delete($id){
    $data=Expense::find($id);
    $data->delete();
   return redirect()->back()->with('danger','Expense Successfully Deleted');

}
  public function billing_expense_update(Request $request){
    $store=Expense::find($request->id);
    $store->operation=$request->operation;
    $store->qty=$request->qty;
    $store->rate=$request->rate;
    $store->total=$request->qty*$request->rate;
    $store->user=Auth::user()->id;
    $store->save();
return redirect()->back()->with('info','Expense Successfully Updated');

}

//=========================Sale And Purchase========================================================

public function sale($id,$hello){
    $bill=DB::table('billings')
            ->join('parties','parties.id','=','billings.partner')
            ->select('billings.*','parties.name','parties.mobile')
            ->where('billings.id',$id)
            ->first();
            if($hello==0){
                $product=Product::inRandomOrder()->limit(50)->get();
            }else{
                $product=Product::where('category',$hello)->get();
            }    
                $category=Category::all();
                $cartProduct=Cart::content();
      $shippurchase=Order::where('billing',$id)->where('type',1)->get();
      $supplierpurchase=Order::where('billing',$id)->where('type',2)->get();
      $shipsale=Order::where('billing',$id)->where('type',3)->get();
       return view('admin.billing.sale',compact('shipsale','bill','product','category','cartProduct','shippurchase','supplierpurchase'));
                }        
            public function cart(Request $request){
                $products=Product::find($request->id);
                Cart::add([
                    'id'=>$request->id,
                    'qty'=>$request->qty,
                    'name'=>$products->name,
                    'price'=>$products->price,
                    'weight'=>1,
                    'options' => ['unit' => $products->unit]
                    
                ]);
                return redirect()->back();  
            }
            public function cartshow_delete($id){
                $cart = Cart::content()->where('rowId',$id);
                if($cart->isNotEmpty()){
                    Cart::remove($id);
                }
            return redirect()->back();
            }

                public function cartshow_update(Request $request){
                    Cart::update($request->rowId, [
                        'qty' => $request->qty,
                        'price'=> $request->price,
                        'options' => ['unit' => $request->unit]
                    ]);
                    return redirect()->back()->with('info','Cart Updated Successfully');
                }
                public function destroy(){
                    Cart::destroy();
                    return redirect()->back();
                }
                public function order(Request $request){
              
                    if(Cart::count()){
                    $cartProducts= Cart::content();
                    foreach($cartProducts as $cartProduct){
                        $order=new Order();
                        $order->billing=$request->billing;
                        $order->billno=$request->billno;
                        $order->pid=Auth::user()->id;
                        $order->pname=$cartProduct->name;
                        $order->qty=$cartProduct->qty;
                        $order->rate=$cartProduct->price;
                        $order->total=$cartProduct->qty*$cartProduct->price;
                        $order->type=$request->type;
                        $order->comments=$request->note;
                        $order->partner=$request->partner;
                        $order->unit=$cartProduct->options->unit;
                        $order->save();                                                                           
                        }
                         Cart::destroy();
                        return redirect()->back()->with('info','Successfully');
                    }else{
                        return redirect()->back()->with('warning','No Product in Your Cart !! At first Add Products'); 
                    }
                }
                public function order_edit($id){
                    $data=Order::find($id);
                    return $data;
                }
                public function order_delete($id){
                    $data=Order::find($id);
                    $data->delete();
                    return redirect()->back()->with('danger','Successfully Deleted');

                }
                public function order_update(Request $request){
                    $data=Order::find($request->id);
                    $data->pname=$request->pname;
                    $data->qty=$request->qty;
                    $data->rate=$request->rate;
                    $data->total=$request->qty*$request->rate;
                    $data->save();
                    return redirect()->back()->with('info','Successfully Updated');

                }

                public function view($id){
                    $bill=DB::table('billings')
                        ->join('parties','parties.id','=','billings.partner')
                        ->select('billings.*','parties.name','parties.mobile')
                        ->where('billings.id',$id)
                        ->first();
                $shippurchase=Order::where('billing',$id)->where('type',1)->get();
                $supplierpurchase=Order::where('billing',$id)->where('type',2)->get();
                $shipsale=Order::where('billing',$id)->where('type',3)->get();
                $expensebill=DB::table('expenses')
                        ->join('expense_categories','expense_categories.id','=','expenses.operation')
                        ->select('expenses.*','expense_categories.expense_category')
                        ->where('expenses.billing',$id)
                        ->get();
                    return view('admin.billing.view',compact('bill','shippurchase','supplierpurchase','shipsale','expensebill'));
                }

                //----------------------------------Payment-------------------------------------------------

                public function billing_payment($id){
                    $bill=DB::table('billings')
                        ->join('parties','parties.id','=','billings.partner')
                        ->select('billings.*','parties.name','parties.mobile')
                        ->where('billings.id',$id)
                        ->first();
                    $payment=Payment::where('billing',$id)->get();     
                    return view('admin.billing.payment',compact('bill','payment'));
                }
                public function billing_payment_store(Request $request){
                    $payment=new Payment();
                    $payment->billing=$request->billing;
                    $payment->billno=$request->billno;
                    $payment->payment=$request->payment;
                    $payment->type=$request->type;
                    $payment->user=Auth::user()->id;
                    $payment->free1=$request->note;
                    $payment->save(); 
                    return redirect()->back()->with('success','Successfully Payment Added');
                }
                public function partnerpayment(){
                    $partner=Party::all();
                    $partner2=Party::all();
                    $date = new DateTime("now");

                    if(Auth::user()->role==1){
                         $payment=DB::table('partnerpayments')
                                 ->join('parties','parties.id','=','partnerpayments.partner')
                                 ->select('partnerpayments.*','parties.name','parties.mobile')
                                 ->orderBy('id','DESC')
                                 ->get();
                    }else{
                        $payment=DB::table('partnerpayments')
                            ->join('parties','parties.id','=','partnerpayments.partner')
                            ->select('partnerpayments.*','parties.name','parties.mobile')
                            ->where('user',Auth::user()->id)
                            ->whereDate('partnerpayments.created_at', '=', $date)
                            ->orderBy('id','DESC')
                            ->get();
                    }
                    return view('admin.billing.partnerpayment',compact('partner','partner2','payment'));
                }
                public function partnerpayment_store(Request $request){
                      $data=new Partnerpayment();
                      $data->partner=$request->partner;
                      $data->payment=$request->payment;
                      $data->free1=$request->note;
                      $data->user=Auth::user()->id;
                      $data->save();

                     $partner=Party::find($request->partner);                 
                      $partner->balance=$partner->balance-$request->payment;
                    $partner->save();
                    return redirect()->back()->with('success','Successfully Payment Added');

                }
                public function partnerpayment_edit($id){
                    $data=Partnerpayment::find($id);
                    return $data;
                }
                public function partnerpayment_delete($id){
                    $data=Partnerpayment::find($id);
                    $data->delete();
                    return redirect()->back()->with('danger','Successfully Payment Deleted');

                }
                public function partnerpayment_update(Request $request){
                    $data=Partnerpayment::find($request->id);
                    $data->partner=$request->partner;
                    $data->payment=$request->payment;
                    $data->free1=$request->note;
                    $data->save();
                    

                  return redirect()->back()->with('info','Successfully Payment Updated');

              }
              //========================Billing Report============================================
              public function datewisebill(Request $request){
                $fromDate=0;
                $toDate=0;
                $bill=''; 
                 if($request->fromDate){
                     $bill=DB::table('billings')
                          ->whereDate('billings.date', '>=', $request->fromDate)
                          ->whereDate('billings.date', '<=', $request->toDate)
                          ->join('parties','parties.id','=','billings.partner')
                          ->select('billings.*','parties.name','parties.mobile')                       
                         ->get();
                         $fromDate=$request->fromDate;
                 }
                  return view('admin.billing.datewisebill',compact('fromDate','bill'));
              }
              public function partnerwisebill(Request $request){
                $partner=Party::all();
                $fromDate=0;
                $toDate=0;
                $parts=0;
                $bill=''; 
                 if($request->fromDate){
                     $bill=DB::table('billings')
                          ->whereDate('billings.date', '>=', $request->fromDate)
                          ->whereDate('billings.date', '<=', $request->toDate)
                          ->where('partner',$request->partner)                      
                          ->get();
                         $fromDate=$request->fromDate;
                         $parts=Party::find($request->partner);
                       
                        }
                  return view('admin.billing.partnerwisebill',compact('fromDate','bill','partner','parts'));
              }
              public function partnerstatement(Request $request){
                $partner=Party::all();
                $fromDate=0;
                $toDate=0;
                $partss=0;
                $payment=0;
                $bill=''; 
                 if($request->fromDate){
                     $bill=DB::table('pprofits')
                          ->whereDate('pprofits.created_at', '>=', $request->fromDate)
                          ->whereDate('pprofits.created_at', '<=', $request->toDate)
                          ->where('partner',$request->partner)                      
                          ->get();
                         $fromDate=$request->fromDate;
                    $partss=Party::find($request->partner);
                      $payment=DB::table('partnerpayments') 
                             ->whereDate('created_at', '>=', $request->fromDate)
                             ->whereDate('created_at', '<=', $request->toDate)
                             ->where('partner',$request->partner)                      
                            ->get();  
                 }
                  return view('admin.billing.statement',compact('fromDate','bill','partner','partss','payment'));
              }
              public function partnerbalance(){
                $partner=Party::orderBy('id','DESC')->get();
                return view('admin.billing.balance',compact('partner'));
              }
            
              public function confirm_bill(Request $request){
                  $bill=Billing::find($request->bill);           

                  $partner=Party::find($bill->partner);                 
                  $partner->balance=$partner->balance+$request->partnerprofit;
                  $partner->save();

                  $profit=new Pprofit();
                  $profit->billing=$bill->id;
                  $profit->partner=$bill->partner;
                  $profit->vessel=$bill->vessel;
                  $profit->imo=$bill->imo;
                  $profit->profit=$request->partnerprofit;
                  $profit->company=$request->companyprofit;
                  $profit->user=Auth::user()->id;
                  $profit->save();

                  $bill->status=1;
                  $bill->save();
                  return redirect()->back()->with('info','Complete This Billing Process');

                 // dd($partner);
              }
        }

      
 
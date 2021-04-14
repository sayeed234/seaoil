<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin\Company;
use App\Models\Admin\ExpenseCategory;
use App\Models\Admin\Companyexpense;
use DateTime;
use Auth;
use DB;
class OutletController extends Controller
{
    public function outlet(){
        $result=User::orderBy('id','DESC')->where('id','>',1)->get();
        return view('admin.user.user',compact('result'));
    }

    public function user_store(Request $request) {
        $check=User::where('email',$request->email)->first();
         if($check){
            return redirect()->back()->with('danger','User Email Already Existing ');
         }
            $image=$request->file('image');
			$name=$image->getClientOriginalName();
			$uploadPath='public/image/user/';
			$image->move($uploadPath,$name);
			$imageUrl=$uploadPath.$name;

		 $this->imageExist($request,$imageUrl);
		 return redirect()->back()->with('success','User Created Succesfully ');
	  } 
	  private function imageExist($request,$imageUrl) {
                $store=new User();
                $store->name=$request->name;
                $store->mobile=$request->mobile;
                $store->status=$request->status;
                $store->email=$request->email;
                $store->type=1;
                $store->role=2;
                $store->address=$request->address;
                $store->profile_photo_path=$imageUrl;
                $store->password=bcrypt($request->password);
                $store->save(); 
		
	  }
      public function user_edit($id){
                $data=User::find($id);
                return $data;
      }
      public function user_delete($id){
        $data=User::find($id);
        $data->delete();
        return redirect()->back()->with('danger','User Deleted Succesfully ');
}
        public function user_update(Request $request) {
          //  dd($request->all());
            $data=User::find($request->id);
            $image=$request->file('image');
        if($image){
            $name=$image->getClientOriginalName();
            $uploadPath='public/image/user/';
            $image->move($uploadPath,$name);
            $imageUrl=$uploadPath.$name;
        }else{
            $imageUrl=$data->profile_photo_path;
        }
            
        $this->imageExists($request,$imageUrl);
        return redirect()->back()->with('info','User Updated Succesfully ');
        } 
    private function imageExists($request,$imageUrl) {
            $store=User::find($request->id);
            $store->name=$request->name;
            $store->mobile=$request->mobile;
            $store->status=$request->status;
            $store->email=$request->email;
            $store->role=$request->role;
            $store->address=$request->address;
            $store->profile_photo_path=$imageUrl;
            if($request->password){
            $store->password=bcrypt($request->password);
            }            
            $store->save(); 

    }

    // Expense CAtegory================================================================
    public function expense_category(){
        $data=ExpenseCategory::orderBy('id','DESC')->get();
        return view ('admin.page.expense_category',compact('data'));
    }  
    public function expense_category_store(Request $request){
        $data=new ExpenseCategory();
        $data->expense_category=$request->expense_category;
        $data->save();
        return redirect()->back()->with('success',' Added Category');
    }
    public function expense_category_edit($id){
        $data=ExpenseCategory::find($id);
         return $data;
          }
    public function expense_category_delete($id){
            $data=ExpenseCategory::find($id);
             $data->delete();
        return redirect()->back()->with('danger','Deleted Category');

     }
     public function expense_category_update(Request $request){
        $data=ExpenseCategory::find($request->id);
        $data->expense_category=$request->expense_category;
        $data->save();
        return redirect()->back()->with('info','Updated Category');
    }
    //Company Expense=======================================================================
    public function companyexpense(){
        $date = new DateTime("now");
        $expense=ExpenseCategory::all();
        $expense2=ExpenseCategory::all();
        if(Auth::user()->role==1){
        $result=DB::table('companyexpenses')
                ->join('expense_categories','expense_categories.id','=','companyexpenses.type')
                ->select('companyexpenses.*','expense_categories.expense_category')
                ->orderBy('id','DESC')
                ->get();
        }else{
            $result=DB::table('companyexpenses')
                ->join('expense_categories','expense_categories.id','=','companyexpenses.type')
                ->select('companyexpenses.*','expense_categories.expense_category')
                ->where('user',Auth::user()->id)
                ->whereDate('companyexpenses.created_at', '=', $date)
                ->orderBy('id','DESC')
                ->get();
        }
        return view('admin.page.companyexpense',compact('expense','expense2','result'));
    }
    public function companyexpense_store(Request $request){
        $data=new Companyexpense();
        $data->user=Auth::user()->id;
        $data->type=$request->type;
        $data->qty=$request->qty;
        $data->rate=$request->rate;
        $data->free1=$request->note;
        $data->total=$request->rate*$request->qty;
        $data->save();
        return redirect()->back()->with('success','Successfully Added Expense');
    }
    public function companyexpense_update(Request $request){
        $data=Companyexpense::find($request->id);
        $data->user=Auth::user()->id;
        $data->type=$request->type;
        $data->qty=$request->qty;
        $data->rate=$request->rate;
        $data->free1=$request->note;
        $data->total=$request->rate*$request->qty;
        $data->save();
        return redirect()->back()->with('info','Successfully Updated Expense');

    }
    public function companyexpense_edit($id){
        $data=Companyexpense::find($id);
        return $data;
    }
    public function companyexpense_delete($id){
        $data=Companyexpense::find($id);
         $data->delete();
        return redirect()->back()->with('danger','Successfully Deleted Expense');

    }
    public function dateexpense(Request $request){
        $expense=0;
        $fromDate=0;
        $parts='0';
        $user=User::where('id','>',1)->get();
        
        if($request->fromDate){
          if($request->user==0){             
            $expense=DB::table('companyexpenses')
                ->whereDate('created_at', '>=', $request->fromDate)
                ->whereDate('created_at', '<=', $request->toDate) 
                ->select('created_at',DB::raw('SUM(total) as total'))
                ->groupBy('created_at')
                ->orderBy('created_at','DESC')                     
                ->get();
            $parts='All Expense';
           $fromDate=$request->fromDate;
          }else{
            $expense=DB::table('companyexpenses')
                    ->whereDate('created_at', '>=', $request->fromDate)
                    ->whereDate('created_at', '<=', $request->toDate) 
                    ->select('created_at',DB::raw('SUM(total) as total'))
                    ->where('user',$request->user)
                    ->groupBy('created_at')
                    ->orderBy('created_at','DESC')                     
                    ->get();
            $part=USer::find($request->user);
            $parts=$part->name;
            $fromDate=$request->fromDate;

          }
        }
        return view('admin.page.dateexpense',compact('user','fromDate','expense','parts'));
    }
    //---------------------Summary====================================================================
    public function summary(Request $request){     
        $fromDate=0;
        if($request->fromDate){
            $sale=DB::table('orders')
            ->whereDate('created_at', '>=', $request->fromDate)
            ->whereDate('created_at', '<=', $request->toDate) 
            ->where('type',3)
            ->select(DB::raw('SUM(total) as total'))
            ->first();
      $suppurchase=DB::table('orders')
            ->whereDate('created_at', '>=', $request->fromDate)
            ->whereDate('created_at', '<=', $request->toDate) 
            ->where('type',2)
            ->select(DB::raw('SUM(total) as total'))
            ->first();
     $shippurchase=DB::table('orders')
            ->whereDate('created_at', '>=', $request->fromDate)
            ->whereDate('created_at', '<=', $request->toDate) 
            ->where('type',1)
            ->select(DB::raw('SUM(total) as total'))
            ->first();
    $expense=DB::table('expenses')
            ->whereDate('created_at', '>=', $request->fromDate)
            ->whereDate('created_at', '<=', $request->toDate) 
            ->select(DB::raw('SUM(total) as total'))
            ->first();
     $partnerpayment=DB::table('partnerpayments') 
             ->whereDate('created_at', '>=', $request->fromDate)
             ->whereDate('created_at', '<=', $request->toDate)       
             ->select(DB::raw('SUM(payment) as total'))
             ->first();
     $customersale=DB::table('corders')  
             ->whereDate('created_at', '>=', $request->fromDate)
             ->whereDate('created_at', '<=', $request->toDate)      
             ->select(DB::raw('SUM(total) as total'))
             ->first();
     $customerpayment=DB::table('cpayments')
             ->whereDate('created_at', '>=', $request->fromDate)
             ->whereDate('created_at', '<=', $request->toDate)        
             ->select(DB::raw('SUM(payment) as total'))
             ->first();
     $supplierpurchase=DB::table('sorders') 
             ->whereDate('created_at', '>=', $request->fromDate)
             ->whereDate('created_at', '<=', $request->toDate)       
             ->select(DB::raw('SUM(total) as total'))
             ->first();
     $supllierpayment=DB::table('spayments') 
             ->whereDate('created_at', '>=', $request->fromDate)
             ->whereDate('created_at', '<=', $request->toDate)       
             ->select(DB::raw('SUM(payment) as total'))
             ->first();
     $companyexpense=DB::table('companyexpenses') 
            ->whereDate('created_at', '>=', $request->fromDate)
             ->whereDate('created_at', '<=', $request->toDate)        
            ->select(DB::raw('SUM(total) as total'))
            ->first();
        $fromDate=$request->fromDate;

        }else{     
    $sale=DB::table('orders')
           ->where('type',3)
           ->select(DB::raw('SUM(total) as total'))
           ->first();
     $suppurchase=DB::table('orders')
           ->where('type',2)
           ->select(DB::raw('SUM(total) as total'))
           ->first();
    $shippurchase=DB::table('orders')
           ->where('type',1)
           ->select(DB::raw('SUM(total) as total'))
           ->first();
    $expense=DB::table('expenses')
           ->select(DB::raw('SUM(total) as total'))
           ->first();
    $partnerpayment=DB::table('partnerpayments')       
            ->select(DB::raw('SUM(payment) as total'))
            ->first();
    $customersale=DB::table('corders')       
            ->select(DB::raw('SUM(total) as total'))
            ->first();
    $customerpayment=DB::table('cpayments')       
            ->select(DB::raw('SUM(payment) as total'))
            ->first();
    $supplierpurchase=DB::table('sorders')       
            ->select(DB::raw('SUM(total) as total'))
            ->first();
    $supllierpayment=DB::table('spayments')       
            ->select(DB::raw('SUM(payment) as total'))
            ->first();
   $companyexpense=DB::table('companyexpenses')       
            ->select(DB::raw('SUM(total) as total'))
            ->first();

        }
        return view('admin.page.summary',compact('companyexpense','sale','suppurchase','shippurchase','expense','partnerpayment','customersale','customerpayment','supplierpurchase','supllierpayment','fromDate'));
    }
}

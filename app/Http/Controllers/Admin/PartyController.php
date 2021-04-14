<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Party;

class PartyController extends Controller
{
    public function party(){
        $party=Party::orderBy('id','DESC')->get();
        return view('admin.party.party',compact('party'));
    }

    public function party_store(Request $request) {
       
            $image=$request->file('image');
			$name=$image->getClientOriginalName();
			$uploadPath='public/image/party/';
			$image->move($uploadPath,$name);
			$imageUrl=$uploadPath.$name;

		 $this->imageExist($request,$imageUrl);
		 return redirect()->back()->with('success','Partner Created Succesfully ');
	  } 
	  private function imageExist($request,$imageUrl) {
          
                $store=new Party();
                $store->pid=rand(0000,9999);
                $store->name=$request->name;
                $store->mobile=$request->mobile;
                $store->nid=$request->nid;
                $store->email=$request->email;
                $store->address=$request->address;
                $store->bank=$request->bank;
                $store->acc=$request->acc;
                $store->gender=$request->gender;
                $store->status=1;
                $store->image=$imageUrl;
                $store->save(); 
		
	  }
      public function party_edit($id){
          $data=Party::find($id);
          return $data;
      }
      public function party_delete($id){
        $data=Party::find($id);
        $data->delete();
     return redirect()->back()->with('danger','Partner Deleted Succesfully ');

    }
      public function party_update(Request $request) {
        $companyById = Party::find( $request->id);
		$image=$request->file('image');
	  
		if ($image) {
        $image=$request->file('image');
        $name=$image->getClientOriginalName();
        $uploadPath='public/image/party/';
        $image->move($uploadPath,$name);
        $imageUrl=$uploadPath.$name;
    } else {
        $imageUrl = $companyById->image;
    }
     $this->imageExifst($request,$imageUrl);
     return redirect()->back()->with('info','Partner Updated Succesfully ');
  } 
  private function imageExifst($request,$imageUrl) {      
            $store=Party::find($request->id);
            $store->name=$request->name;
            $store->mobile=$request->mobile;
            $store->nid=$request->nid;
            $store->email=$request->email;
            $store->address=$request->address;
            $store->bank=$request->bank;
            $store->acc=$request->acc;
            $store->gender=$request->gender;
            $store->status=$request->status;
            $store->image=$imageUrl;
            $store->save(); 
    
  }
  public function party_view($id){
      $result=Party::find($id);
      return view('admin.party.view',compact('result'));
  }
}

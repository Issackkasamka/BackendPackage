<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Packages;

class PackageController extends Controller
{
    public function GetPackages(){

        $Packages = Packages::all();

        return response(['Senders'=>$Receivers],201);
   }

   public function GetPackage($id){

       $Package = Packages::find($id);

       return response(['Packages'=>$Package],201);
  }

   public function GetPackageBySenderId($id){
    $Sender = Sender::find($id);
    $Package = Packages::where('id',$Sender->id);
    return response(['Packages'=>$Package],201);

}


   public function Create(Request $request){
          $request->validate([
              "senderId"=>"required",
              "name"=>"required|string",
              "phone"=>"required|string"
          ]);


          $Package = Packages::create($request->all());

          $reponse = [
               "Package"=>$Package,
               "Status" => true
          ];

          return $reponse;
   }

   public function Update(Request $request,$id){
        $Package = Packages::find($id);

        $Package -> update($request->all());

        $reponse = [
           "Package"=>$Package,
           "Status" => "Update Successfull"
      ];

      return $reponse;

   }

   public function Delete($id){
       $Package = Packages::find($id);
       $Package->delete();

       $reponse = [
           "Status" => "Delete Successfull"
      ];

      return $reponse;
   }

   public function search($name){
       $Package = Packages::where('name','like','%'.$name.'%')->get();

       return  $Package;
   }
}

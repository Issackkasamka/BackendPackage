<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Receiver;

class ReceiverController extends Controller
{
    public function GetReceivers(){

        $Receivers = Receiver::all();

        return response(['Senders'=>$Receivers],201);
   }

   public function GetReceiver($id){

       $Receiver = Receiver::find($id);

       return response(['Receivers'=>$Receiver],201);
  }

   public function GetReceiverBySenderId($id){
    $Sender = Sender::find($id);
    $Receiver = Receiver::where('id',$Sender->id);
    return response(['Receivers'=>$Receiver],201);

}


   public function Create(Request $request){
          $request->validate([
              "senderId"=>"required",
              "name"=>"required|string",
              "phone"=>"required|string"
          ]);


          $Receiver = Receiver::create($request->all());

          $reponse = [
               "Receiver"=>$Receiver,
               "Status" => true
          ];

          return $reponse;
   }

   public function Update(Request $request,$id){
        $Receiver = Receiver::find($id);

        $Receiver -> update($request->all());

        $reponse = [
           "Receiver"=>$Receiver,
           "Status" => "Update Successfull"
      ];

      return $reponse;

   }

   public function Delete($id){
       $Receiver = Receiver::find($id);
       $Receiver->delete();

       $reponse = [
           "Status" => "Delete Successfull"
      ];

      return $reponse;
   }

   public function search($name){
       $Receiver = Receiver::where('name','like','%'.$name.'%')->get();

       return  $Receiver;
   }
}

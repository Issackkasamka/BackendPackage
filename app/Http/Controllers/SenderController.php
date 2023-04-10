<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sender;
use Illuminate\Http\Response;

class SenderController extends Controller
{
    public function GetSenders(){

         $Senders = Sender::all();

         return response(['Senders'=>$Sender],201);
    }

    public function GetSender($id){

        $Senders = Sender::find($id);

        return response(['Senders'=>$Sender],201);
   }


    public function Create(Request $request){
           $request->validate([
               "name"=>"required|string",
               "phone"=>"required|string"
           ]);

           $Sender = Sender::create($request->all());

           $reponse = [
                "Sender"=>$Sender,
                "Status" => true
           ];

           return $reponse;
    }

    public function Update(Request $request,$id){
         $Sender = Sender::find($id);

         $Sender -> update($request->all());

         $reponse = [
            "Sender"=>$Sender,
            "Status" => "Update Successfull"
       ];

       return $reponse;

    }

    public function Delete($id){
        $Sender = Sender::find($id);
        $Sender->delete();

        $reponse = [
            "Status" => "Delete Successfull"
       ];

       return $reponse;
    }

    public function search($name){
        $Sender = Sender::where('name','like','%'.$name.'%')->get();

        return  $Sender;
    }
}

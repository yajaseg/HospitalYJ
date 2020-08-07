<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MongoDB;

class DrugsController extends Controller
{
    public function Index(){
        $collection = (new MongoDB\Client)->HospitalYJ->Drugs;
        $drugs = $collection->find();
        return view('Admin.Drugs.index', [ "drugs" => $drugs]);
    }

    public function Create() { 
        $collection = (new MongoDB\Client)->HospitalYJ->Drugs;
        $hospital = $collection->find();
        return view('Admin.Drugs.Create', ["hospital" => $hospital ]);  
    }
    
    public function Drug() {
        $drugs = [
            "TradeName" => request("Trade Name"),
            "Price" => request("Price"),
          
           
        ];
        $collection = (new MongoDB\Client)->fiveCStore->Drugs;
        $insertOneResult = $collection->insertOne($drugs);
        if ($insertOneResult->getInsertedCount() == 1) 
            return redirect('/admin/drugs')->with('mssg', request('Trade Name')." was added succesfuly.")->with('alerttype', "success");
            
    }

    public function Edit($id) { 
        $collection = (new MongoDB\Client)->HospitalYJ->Drugs;
        $drugs = $collection->findOne(["_id" => new \MongoDB\BSON\ObjectId($id) ]);
        return view('Admin.Drugs.edit', ["drugs" => $drugs]);
    }
    
    public function Update(){
        $collection = (new MongoDB\Client)->HospitalYJ->Drugs;
        $drugs = [
            
            "Name" => request("Name"),
            "Address" => request("Address"),
            "Phone_Number" => request("Phone_Number"),
            "DoctorName" =>request("DoctorName")
        ];
        $updateOneResult = $collection->updateOne([
            "_id" => new MongoDB\BSON\ObjectId(request("hospitalid"))
        ],[
            '$set' => $drugs
        ]);
        if($updateOneResult->getModifiedCount()==1)
        return redirect("/admin/drugs/".request("drugid"))->with('mssg', "Updated succesfuly")->with("alerttype", "success");
        }
    public function ProductDetails($id) {
        $collection = (new MongoDB\Client)->HospitalYJ->Drugs;
        $drugs = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectId($id) ]);
        return view('Drugs.Details', ["drugs" => $drugs]);
    }

    public function Show($id) { //Details
        $collection = (new MongoDB\Client)->HospitalYJ->Drugs;
        $drugs = $collection->findOne([ "_id" => new \MongoDB\BSON\ObjectId($id) ]);
        return view('Admin.Drugs.details', [ "drugs" => $drugs]);
    }

    public function Delete($id) {
        $collection = (new MongoDB\Client)->HospitalYJ->Drugs;
        $drugs = $collection->findOne([ "_id" => new \MongoDB\BSON\ObjectId($id) ]);
        return view('Admin.Drugs.delete', [ "drugs" => $drugs]);
    }

    public function Remove() {
        $collection = (new MongoDB\Client)->HospitalYJ->Drugs;
        $TradeName = request('Trade Name');
        $deleteOneResult = $collection->deleteOne([
            "_id" => new \MongoDB\BSON\ObjectId(request("drugid"))
        ]);

            return redirect('/admin/drugs/');
            // ->with("mssg", $Name." was deleted succesfuly.")->with("alerttype", "success");
    }

}

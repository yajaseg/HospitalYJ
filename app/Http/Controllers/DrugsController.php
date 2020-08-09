<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MongoDB;

class DrugsController extends Controller
{
    
    public function IndexDrugs() {
        $collection = (new MongoDB\Client)->HospitalYJ->Drugs;
        $drugCount = $collection->count();
        $page = request("pg") == 0 ? 1 : request("pg");
        $drugs = $collection->find([], [ "limit" => 12, "skip" => ($page - 1) * 12 ]);
        return view('Drugs.Index', [ "drugs" => $drugs, "drugCount" => $drugCount ]);
    }


    public function HospitalDetails($id) {
        $collection = (new MongoDB\Client)->HospitalYJ->Drugs;
        $drugs = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectId($id) ]);
        return view("Drugs.Details", ["drugs" => $drugs]);
    }
    
    
    public function Index(){
        $collection = (new MongoDB\Client)->HospitalYJ->Drugs;
        $drugs = $collection->find();
        return view('Admin.Drugs.index', [ "drugs" => $drugs]);
    }

    public function Create() { 
        $collection = (new MongoDB\Client)->HospitalYJ->Drugs;
        $drugs = $collection->find();
        return view('Admin.Drugs.Create', ["drugs" => $drugs ]);  
    }
    
    public function Drug() {
        $drugs = [
            "TradeName" => request("TradeName"),
            "Price" => request("Price"),
          
           
        ];
        $collection = (new MongoDB\Client)->HospitalYJ->Drugs;
        $insertOneResult = $collection->insertOne($drugs);
        if ($insertOneResult->getInsertedCount() == 1) 
            return redirect('/admin/drugs')->with('mssg', request('Trade Name')." was added succesfuly.")->with('alerttype', "success");
            
    }

    public function Edit($id) { 
        $collection = (new MongoDB\Client)->HospitalYJ->Drugs;
        $drugs = $collection->findOne(["_id" => new MongoDB\BSON\ObjectId($id) ]);
        return view('Admin.Drugs.edit', ["drugs" => $drugs]);
    }
    
    public function Update(){
        $collection = (new MongoDB\Client)->HospitalYJ->Drugs;
        $drugs = [
            
            "TradeName" => request("TradeName"),
            "Price" => request("Price"),
          
        ];
        $updateOneResult = $collection->updateOne([
            "_id" => new MongoDB\BSON\ObjectId(request("drugid"))
        ],[
            '$set' => $drugs
        ]);
      
        return redirect('/admin/drugs/');
        }

    public function ProductDetails($id) {
        $collection = (new MongoDB\Client)->HospitalYJ->Drugs;
        $drugs = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectId($id) ]);
        return view('Drugs.Details', ["drugs" => $drugs]);
    }

    public function Show($id) { //Details
        $collection = (new MongoDB\Client)->HospitalYJ->Drugs;
        $drugs = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectId($id) ]);
        return view('Admin.Drugs.details', [ "drugs" => $drugs]);
    }

    public function Delete($id) {
        $collection = (new MongoDB\Client)->HospitalYJ->Drugs;
        $drugs = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectId($id) ]);
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

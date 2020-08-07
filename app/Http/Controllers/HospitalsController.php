<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MongoDB;

class HospitalsController extends Controller
{
    public function Index(){
        $collection = (new MongoDB\Client)->HospitalYJ->Hospitals;
        $hospitals = $collection->find();
        return view('Admin.Hospitals.index', [ "hospitals" => $hospitals ]);
    }

    public function Create() { 
        $collection = (new MongoDB\Client)->HospitalYJ->Doctors;
        $doctors = $collection->find();
        return view('Admin.Hospitals.create', ["doctors" => $doctors ]);  
    }
    
    public function Edit($id) { 
        $collection = (new MongoDB\Client)->HospitalYJ->Hospitals;
       
        $hospitals =  $collection->find();
        $product = $collection->findOne(["_id" => new \MongoDB\BSON\ObjectId($id) ]);
        return view('Admin.Hospitals.edit', ["hospitals" => $hospitals]);
    }
    
    public function Update(){
        $collection = (new MongoDB\Client)->HospitalYJ->Hospitals;
        $product = [
            
            "Name" => request("Name"),
            "Address" => request("Address"),
            "Phone_Number" => request("Phone_Number"),
            
        ];
        $updateOneResult = $collection->updateOne([
            "_id" => new MongoDB\BSON\ObjectId(request("hospitalid"))
        ],[
            '$set' => $hospital
        ]);
        if($updateOneResult->getModifiedCount()==1)
        return redirect("/admin/hospitals/".request("hospitalid"))->with('mssg', "Updated succesfuly")->with("alerttype", "success");
    }

    public function ProductDetails($id) {
        $collection = (new MongoDB\Client)->HospitalYJ->Hospitals;
        $product = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectId($id) ]);
        return view("Hospitals.Details", ["product" => $product]);
    }

    public function Show($id) { //Details
        $collection = (new MongoDB\Client)->HospitalYJ->Hospitals;
        $hospital = $collection->findOne([ "_id" => new \MongoDB\BSON\ObjectId($id) ]);
        return view('Admin.Hospitals.details', [ "hospital" => $hospital ]);
    }

    public function Delete($id) {
        $collection = (new MongoDB\Client)->HospitalYJ->Hospitals;
        $collectionC = (new MongoDB\Client)->FiveCStore->Categories;
        $categories = $collectionC->find();
        $product = $collection->findOne([ "_id" => new \MongoDB\BSON\ObjectId($id) ]);
        return view('Admin.Hospitals.delete', [ "product" => $product, "categories" => $categories ]);
    }

    public function Remove() {
        $collection = (new MongoDB\Client)->HospitalYJ->Hospitals;
        $productname = request('product_name');
        $deletOneResult = $collection->deleteOne([
            "_id" => new \MongoDB\BSON\ObjectId(request("productid"))
        ]);

        if($deletOneResult->getDeletedCount() == 1)
            return redirect("/admin/hospitals")->with("mssg", $productname." was deleted succesfuly.")->with("alerttype", "success");
    }
}

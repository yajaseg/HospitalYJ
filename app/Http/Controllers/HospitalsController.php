<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MongoDB;

class HospitalsController extends Controller
{
    public function IndexHospital() {
        $collection = (new MongoDB\Client)->HospitalYJ->Hospitals;
        $hospitalCount = $collection->count();
        $page = request("pg") == 0 ? 1 : request("pg");
        $hospitals = $collection->find([], [ "limit" => 12, "skip" => ($page - 1) * 12 ]);
        return view('Hospital.Index', [ "hospitals" => $hospitals, "hospitalCount" => $hospitalCount ]);
    }


    public function HospitalDetails($id) {
        $collection = (new MongoDB\Client)->HospitalYJ->Hospitals;
        $hospitals = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectId($id) ]);
        return view("Hospital.Details", ["hospitals" => $hospitals]);
    }
    // public function AddComment() {
    //     $collection = (new MongoDB\Client)->HospitalYJ->Hospitals;
    //     $comment = [
    //         "comment" => request('comment'),
    //         "date" => date("Y-m-d H:i:s")            ];
    //     $hospitals = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectId(request('hospitalsid')) ]);
    //     $Comments = $movies->Comments;
    //     if (count($Comments) == 0 || $Comments == null || empty($Comments)) {
    //         $Comments = [$comment];
    //     } else {
    //         $Comments = [$comment, ...$Comments];
    //     }
    //     $updateOneResult = $collection->updateOne([
    //         "_id" => new MongoDB\BSON\ObjectId(request('hospitalsid'))
    //     ],[
    //         '$set' => [ 'Comments' => $Comments ]
    //     ]);

    //     return redirect("/movies/".request('moviesid'));
    // }


    public function Index(){
        $collection = (new MongoDB\Client)->HospitalYJ->Hospitals;
        $hospitals = $collection->find();
        return view('Admin.Hospitals.index', [ "hospitals" => $hospitals]);
    }

    public function Create() { 
        $collection = (new MongoDB\Client)->HospitalYJ->Hospitals;
        $hospital = $collection->find();
        return view('Admin.Hospitals.Create', ["hospital" => $hospital ]);  
    }
    
    public function Hospital() {
        $hospital = [
            "Name" => request("Name"),
            "Address" => request("Address"),
            "PhoneNumber" => request("PhoneNumber"),
            "DoctorName" =>request("DoctorName")
           
        ];
        $collection = (new MongoDB\Client)->HospitalYJ->Hospitals;
        $insertOneResult = $collection->insertOne($hospital);
        if ($insertOneResult->getInsertedCount() == 1) 
            return redirect('/admin/hospitals')->with('mssg', request('Name')." was added succesfuly.")->with('alerttype', "success");
            
    }

    public function Edit($id) { 
        $collection = (new MongoDB\Client)->HospitalYJ->Hospitals;
        $hospital = $collection->findOne(["_id" => new MongoDB\BSON\ObjectId($id) ]);
        return view('Admin.Hospitals.edit', ["hospital" => $hospital]);
    }
    
    public function Update(){
        $collection = (new MongoDB\Client)->HospitalYJ->Hospitals;
        $hospital = [
            
            "Name" => request("Name"),
            "Address" => request("Address"),
            "PhoneNumber" => request("PhoneNumber"),
            "DoctorName" =>request("DoctorName")
        ];
        $updateOneResult = $collection->updateOne([
            "_id" => new MongoDB\BSON\ObjectId(request("hospitalid"))
        ],[
            '$set' => $hospital
        ]);
       
        return redirect('/admin/hospitals/');
    }

    public function ProductDetails($id) {
        $collection = (new MongoDB\Client)->HospitalYJ->Hospitals;
        $hospital = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectId($id) ]);
        return view('Hospitals.Details', ["hospital" => $hospital]);
    }

    public function Show($id) { //Details
        $collection = (new MongoDB\Client)->HospitalYJ->Hospitals;
        $hospital = $collection->findOne([ "_id" => new \MongoDB\BSON\ObjectId($id) ]);
        return view('Admin.Hospitals.details', [ "hospital" => $hospital]);
    }

    public function Delete($id) {
        $collection = (new MongoDB\Client)->HospitalYJ->Hospitals;
        $hospital = $collection->findOne([ "_id" => new \MongoDB\BSON\ObjectId($id) ]);
        return view('Admin.Hospitals.delete', [ "hospital" => $hospital]);
    }

    public function Remove() {
        $collection = (new MongoDB\Client)->HospitalYJ->Hospitals;
        $Name = request('Name');
        $deleteOneResult = $collection->deleteOne([
            "_id" => new \MongoDB\BSON\ObjectId(request("hospitalid"))
        ]);

            return redirect('/admin/hospitals/');
            // ->with("mssg", $Name." was deleted succesfuly.")->with("alerttype", "success");
    }


    
}

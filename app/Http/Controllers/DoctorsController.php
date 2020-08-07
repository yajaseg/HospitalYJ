<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MongoDB;

class DoctorsController extends Controller
{
    public function Index(){
        $collection = (new MongoDB\Client)->HospitalYJ->Doctors;
        $doctors = $collection->find();
        return view('Admin.Doctors.index', [ "doctors" => $doctors]);
    }

    public function Create() { 
        $collection = (new MongoDB\Client)->HospitalYJ->Doctors;
        $doctors = $collection->find();
        return view('Admin.Doctors.Create', ["doctors" => $doctors ]);  
    }
    
    public function Doctor() {
        $doctors = [
            "DoctorName" => request("DoctorName"),
            "Speciality" => request("Speciality"),
            "MobileNumber" => request("MobileNumber"),
           
           
        ];
        $collection = (new MongoDB\Client)->HospitalYJ->Doctors;
        $insertOneResult = $collection->insertOne($doctors);
        if ($insertOneResult->getInsertedCount() == 1) 
            return redirect('/admin/doctors')->with('mssg', request('DoctorName')." was added succesfuly.")->with('alerttype', "success");
            
    }

    public function Edit($id) { 
        $collection = (new MongoDB\Client)->HospitalYJ->Hospitals;
        $doctors = $collection->findOne(["_id" => new \MongoDB\BSON\ObjectId($id) ]);
        return view('Admin.Doctors.edit', ["doctors" => $doctors]);
    }
    
    public function Update(){
        $collection = (new MongoDB\Client)->HospitalYJ->Doctors;
        $doctors = [
            "DoctorName" => request("DoctorName"),
            "Speciality" => request("Speciality"),
            "MobileNumber" => request("MobileNumber")
        ];
        $updateOneResult = $collection->updateOne([
            "_id" => new MongoDB\BSON\ObjectId(request("doctorid"))
        ],[
            '$set' => $doctors
        ]);
        if($updateOneResult->getModifiedCount()==1)
        return redirect("/admin/doctors/".request("doctorid"))->with('mssg', "Updated succesfuly")->with("alerttype", "success");
    }

    public function ProductDetails($id) {
        $collection = (new MongoDB\Client)->HospitalYJ->Doctors;
        $doctors = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectId($id) ]);
        return view('Doctors.Details', ["doctors" => $doctors]);
    }

    public function Show($id) { //Details
        $collection = (new MongoDB\Client)->HospitalYJ->Doctors;
        $doctors = $collection->findOne([ "_id" => new \MongoDB\BSON\ObjectId($id) ]);
        return view('Admin.Doctors.details', [ "doctors" => $doctors]);
    }

    public function Delete($id) {
        $collection = (new MongoDB\Client)->HospitalYJ->Doctors;
        $doctors = $collection->findOne([ "_id" => new \MongoDB\BSON\ObjectId($id) ]);
        return view('Admin.Doctors.delete', [ "doctors" => $doctors]);
    }

    public function Remove() {
        $collection = (new MongoDB\Client)->HospitalYJ->Doctors;
        $DoctorName = request('DoctorName');
        $deleteOneResult = $collection->deleteOne([
            "_id" => new \MongoDB\BSON\ObjectId(request("doctorid"))
        ]);

            return redirect('/admin/doctors/');
            // ->with("mssg", $Name." was deleted succesfuly.")->with("alerttype", "success");
    }
}

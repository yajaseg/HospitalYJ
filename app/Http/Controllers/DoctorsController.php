<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MongoDB;

class DoctorsController extends Controller
{
    public function IndexDoctor() {
        $collection = (new MongoDB\Client)->HospitalYJ->Doctors;
        $doctorCount = $collection->count();
        $page = request("pg") == 0 ? 1 : request("pg");
        $doctors = $collection->find([], [ "limit" => 12, "skip" => ($page - 1) * 12 ]);
        return view('Doctors.Index', [ "doctors" => $doctors, "doctorCount" => $doctorCount ]);
    }


    public function DoctorDetails($id) {
        $collection = (new MongoDB\Client)->HospitalYJ->Doctors;
        $doctors = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectId($id) ]);
        return view("Doctors.Details", ["doctors" => $doctors]);
    }

    public function Index(){
        $collection = (new MongoDB\Client)->HospitalYJ->Doctors;
        $doctors = $collection->find();
        return view('Admin.Doctors.index', [ "doctors" => $doctors]);
    }

    public function Create() { 
        $collection = (new MongoDB\Client)->HospitalYJ->Doctors;
        $doctor = $collection->find();
        return view('Admin.Doctors.Create', ["doctor" => $doctor ]);  
    }
    
    public function Doctor() {
        $doctor = [
            "DoctorName" => request("DoctorName"),
            "Speciality" => request("Speciality"),
            "MobileNumber" => request("MobileNumber"),
           
           
        ];
        $collection = (new MongoDB\Client)->HospitalYJ->Doctors;
        $insertOneResult = $collection->insertOne($doctor);
        if ($insertOneResult->getInsertedCount() == 1) 
            return redirect('/admin/doctors')->with('mssg', request('DoctorName')." was added succesfuly.")->with('alerttype', "success");
            
    }

    public function Edit($id) { 
        $collection = (new MongoDB\Client)->HospitalYJ->Doctors;
        $doctor = $collection->findOne(["_id" => new MongoDB\BSON\ObjectId($id) ]);
        return view('Admin.Doctors.edit', ["doctor" => $doctor]);
    }
    
    public function Update(){
        $collection = (new MongoDB\Client)->HospitalYJ->Doctors;
        $doctor = [
            "DoctorName" => request("DoctorName"),
            "Speciality" => request("Speciality"),
            "MobileNumber" => request("MobileNumber")
        ];
        $updateOneResult = $collection->updateOne([
            "_id" => new MongoDB\BSON\ObjectId(request("doctorid"))
        ],[
            '$set' => $doctor
        ]);
        
        return redirect('/admin/doctors/');
    }

    public function ProductDetails($id) {
        $collection = (new MongoDB\Client)->HospitalYJ->Doctors;
        $doctor = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectId($id) ]);
        return view('Doctors.Details', ["doctor" => $doctor]);
    }

    public function Show($id) { //Details
        $collection = (new MongoDB\Client)->HospitalYJ->Doctors;
        $doctor = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectId($id) ]);
        return view('Admin.Doctors.details', [ "doctor" => $doctor]);
    }

    public function Delete($id) {
        $collection = (new MongoDB\Client)->HospitalYJ->Doctors;
        $doctor = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectId($id) ]);
        return view('Admin.Doctors.delete', [ "doctor" => $doctor]);
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

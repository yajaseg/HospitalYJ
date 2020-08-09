<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MongoDB;

class PatientsController extends Controller
{

    public function IndexPatient() {
        $collection = (new MongoDB\Client)->HospitalYJ->Patients;
        $patientCount = $collection->count();
        $page = request("pg") == 0 ? 1 : request("pg");
        $patients = $collection->find([], [ "limit" => 12, "skip" => ($page - 1) * 12 ]);
        return view('Patients.Index', [ "patients" => $patients, "patientCount" => $patientCount ]);
    }


    public function PatientDetails($id) {
        $collection = (new MongoDB\Client)->HospitalYJ->Hospitals;
        $patients = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectId($id) ]);
        return view("Patients.Details", ["patients" => $patients]);
    }

    public function Index(){
        $collection = (new MongoDB\Client)->HospitalYJ->Patients;
        $patients = $collection->find();
        return view('Admin.Patients.index', [ "patients" => $patients]);
    }

    public function Create() { 
        $collection = (new MongoDB\Client)->HospitalYJ->Patients;
        $patient = $collection->find();
        return view('Admin.Patients.Create', ["patient" => $patient ]);  
    }
    
    public function Patient() {
        $patient = [
            "Name" => request("Name"),
            "Age" => request("Age"),
            "Address" => request("Address")
          
           
        ];
        $collection = (new MongoDB\Client)->HospitalYJ->Patients;
        $insertOneResult = $collection->insertOne($patient);
        if ($insertOneResult->getInsertedCount() == 1) 
            return redirect('/admin/patients')->with('mssg', request('Name')." was added succesfuly.")->with('alerttype', "success");
            
    }

    public function Edit($id) { 
        $collection = (new MongoDB\Client)->HospitalYJ->Patients;
        $patient = $collection->findOne(["_id" => new \MongoDB\BSON\ObjectId($id) ]);
        return view('Admin.Patients.edit', ["patient" => $patient]);
    }
    
    public function Update(){
        $collection = (new MongoDB\Client)->HospitalYJ->Patients;
        $patient = [
            
            "Name" => request("Name"),
            "Age" => request("Age"),
            "Address" => request("Address")
          
        ];
        $updateOneResult = $collection->updateOne([
            "_id" => new MongoDB\BSON\ObjectId(request("patientid"))
        ],[
            '$set' => $patient
        ]);
       
        return redirect('/admin/patients/');
    }

    public function ProductDetails($id) {
        $collection = (new MongoDB\Client)->HospitalYJ->Patients;
        $patient = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectId($id) ]);
        return view('Patients.Details', ["patient" => $patient]);
    }

    public function Show($id) { //Details
        $collection = (new MongoDB\Client)->HospitalYJ->Patients;
        $patient = $collection->findOne([ "_id" => new \MongoDB\BSON\ObjectId($id) ]);
        return view('Admin.Patients.details', [ "patient" => $patient]);
    }

    public function Delete($id) {
        $collection = (new MongoDB\Client)->HospitalYJ->Patients;
        $patient = $collection->findOne([ "_id" => new \MongoDB\BSON\ObjectId($id) ]);
        return view('Admin.Patients.delete', [ "patient" => $patient]);
    }

    public function Remove() {
        $collection = (new MongoDB\Client)->HospitalYJ->Patients;
        $deleteOneResult = $collection->deleteOne([
            "_id" => new \MongoDB\BSON\ObjectId(request("patientid"))
        ]);

            return redirect('/admin/patients/');
            // ->with("mssg", $Name." was deleted succesfuly.")->with("alerttype", "success");
    }

}

<?php


//  $collection = (new MongoDB\Client)->Hospital->Doctors;

//  $document = $collection->find();

//  var_dump($document);




//Create Functions
//  $collection = (new MongoDB\Client)->HospitalYJ->Hospitals;
//  $insertResult = $collection->insertOne([
    
//      "Name" => "Holis",
//      "Address" => "Address",
//      "PhoneNumber" => "PhoneNumber",
//      "DoctorName" =>"DoctorName" ]);

//       printf("inserted %d document(s)<br />", $insertResult->getInsertedCount());
//     var_dump($insertResult->getInsertedID());

//Read Function
// $table = $collection->find();

// foreach ($table as $record){
//     echo "<br />";
//     echo "ID:".$record["_id"]."<br />";
//     echo "Category:".$record->category."<br />";
//     echo "ID:".$record["description"]."<br />";
// }

//Update function

// $updateOneResult = $collection->updateOne([
//     "category" => "cellphones"
// ],[
//     '$set' => ["description" => "Mobile Phones"]
// ]);

// printf("Matched %d Document(s)<br />", $updateOneResult->getMatchedCount());
// printf("Updated %d Document(s)<br />", $updateOneResult->getModifiedCount());

//Delete Function
// $delteResult = $collection->deleteOne([
//     "category" => "cellphones"
// ]);

// printf("Deleted %d Document(s)<br />", $delteResult->getDeletedCount());

// $collection = (new MongoDB\Client)->fiveCStore->Products;
// $product = $collection->findOne(["_id" => $id]);

// $collection = (new MongoDB\Client)->fiveCStore->Categories;
// $productCount = $collection->count();

// print_r($productCount);


// $collection = (new MongoDB\Client)->fiveCStore->Products;
// $comment = [
//     "user_id" => "5ee2390420f4eb244c4e3b81",
//     "comment" => "works good enough",
//     "date" => date("Y-m-d H:i:s")
// ];
// $product = $collection->findOne(["_id" => new MongoDB\BSON\ObjectId("5ee241e820f4eb244c4e3b83")  ]);
// $comments = $product->comments;
// if (count($comments)==0 || $comments ==  null || empty($comments)){
//     $comments = [$comment];
// }else {
//     $comments = [$comment, ...$comments];
// }
// $updateOneResult = $collection->updateOne([
//     "_id" => new MongoDB\BSON\ObjectId("5ee241e820f4eb244c4e3b83")
// ],[
//     '$set' => [ "comments" => $comments]
// ]);
// $product = $collection->findOne(["_id" => new MongoDB\BSON\ObjectId("5ee241e820f4eb244c4e3b83")]);
// print_r($product->comments);

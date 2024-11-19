<?php
//we need to start the sessions 
session_start();

//include main.php
include_once('main.php');

//include auto number module 
include_once('auto_id.php');

//add Image upload model
include_once('img_upload.php');

class Reorder extends Main{


public function proList(){

  $today = date("Y-m-d");

  $sqlSelect = "SELECT * FROM product_tbl JOIN reorder_tbl 
  ON product_tbl.product_Id = reorder_tbl.product_Id  WHERE product_tbl.d_status = 0 AND 
  DATEDIFF(CURRENT_DATE ,reorder_tbl.expier_date)<10 AND reorder_tbl.expier_date !=00-00-0000 ORDER BY product_tbl.product_Id ASC;";
   //lets check the errors 
    if($this->dbResult->error){
    echo($this->dbResult->error);
    exit;
   }
 //sql execute 
 $sqlResult = $this->dbResult->query($sqlSelect);

  //check the number of rows
  $nor = $sqlResult->num_rows;

  if($nor > 0){
    while($rec = $sqlResult->fetch_assoc()){
        echo('
        <tr>
          <th >'.$rec['product_Id'].'</th>
          <th ><img src="../'.$rec['procut_Image'].'" style="width:150px; height:100px;" alt="image1" class="img-fluid card-img-top">
          </th>
          <td>'.$rec['product_Name'].'</td>
          <td>'.$rec['product_Price'].'</td>
          <td>'.$rec['product_Category'].'</td>
          <td>'.$rec['expier_date'].'</td>
       </tr>
              ');
    }
  }
  else {echo('
    <div class="alert alert-danger" role="alert">
    No product Are Found!
  </div>');
  }
}



public function proList1(){

  $today = date("Y-m-d");

  $sqlSelect = "SELECT * FROM product_tbl JOIN reorder_tbl 
  ON product_tbl.product_Id = reorder_tbl.product_Id  
  JOIN store_tbl ON product_tbl.product_Id = store_tbl.product_Id 
  JOIN supplier_tbl ON reorder_tbl.sup_Id = supplier_tbl.sup_Id
  WHERE product_tbl.d_status = 0 AND 
  (store_tbl.product_Quantity <= reorder_tbl.reorder_level) AND reorder_tbl.reorder_level !=0 ORDER BY product_tbl.product_Id ASC;";
   //lets check the errors 
    if($this->dbResult->error){
    echo($this->dbResult->error);
    exit;
   }
 //sql execute 
 $sqlResult = $this->dbResult->query($sqlSelect);

  //check the number of rows
  $nor = $sqlResult->num_rows;

  if($nor > 0){
    while($rec = $sqlResult->fetch_assoc()){
        echo('
        <tr>
          <th >'.$rec['product_Id'].'</th>
          <th ><img src="../'.$rec['procut_Image'].'" style="width:150px; height:100px;" alt="image1" class="img-fluid card-img-top">
          </th>
          <td>'.$rec['product_Name'].'</td>
          <td>'.$rec['product_Price'].'</td>
          <td>'.$rec['product_Quantity'].'</td>
          <td><button type="button" onclick="reorder(\''.$rec['sup_Id'].'\',\''.$rec['product_Id'].'\',\''.$rec['product_Name'].'\',\''.$rec['sup_Name'].'\');" class="btn btn-info">Reorder</button></td>
       </tr>
              ');
    }
  }
  else {echo('
    <div class="alert alert-danger" role="alert">
    No product Are Found!
  </div>');
  }
}


public function addrequest($sid,$pid,$qty){

  //generate new id for a employer 
  $autoNumber = new AutoNumber;
  $Id = $autoNumber -> NumberGeneration("req_Id","reorderreq_tbl","REQ");

  
  //insert data to emplyer table
  $sqlInsert = "INSERT INTO reorderreq_tbl VALUES('$Id','$sid','$pid','$qty',0);";

  //lets check the errors 
  if($this->dbResult->error){
      echo($this->dbResult->error);
      exit;
  }

  //we need to execute our sql by query 
  $sqlResult = $this->dbResult->query($sqlInsert);

  //lest check the result is 0 or not 
  if($sqlResult > 0){
    return("ok");
  }
  else{
      return("Please Try again later!");
  }
}


public function proList2(){

  $sqlSelect = "SELECT * FROM product_tbl JOIN reorder_tbl 
  ON product_tbl.product_Id = reorder_tbl.product_Id  
  JOIN store_tbl ON product_tbl.product_Id = store_tbl.product_Id 
  JOIN supplier_tbl ON reorder_tbl.sup_Id = supplier_tbl.sup_Id 
  WHERE product_tbl.d_status = 0 ORDER BY product_tbl.product_Id ASC;";
   //lets check the errors 
    if($this->dbResult->error){
    echo($this->dbResult->error);
    exit;
   }
 //sql execute 
 $sqlResult = $this->dbResult->query($sqlSelect);

  //check the number of rows
  $nor = $sqlResult->num_rows;

  if($nor > 0){
    while($rec = $sqlResult->fetch_assoc()){
        echo('
        <tr>
          <th >'.$rec['product_Id'].'</th>
          <th ><img src="../'.$rec['procut_Image'].'" style="width:150px; height:100px;" alt="image1" class="img-fluid card-img-top">
          </th>
          <td>'.$rec['product_Name'].'</td>
          <td>'.$rec['product_Price'].'</td>
          <td>'.$rec['product_Quantity'].'</td>
          <td><button type="button" onclick="reorder(\''.$rec['sup_Id'].'\',\''.$rec['product_Id'].'\',\''.$rec['product_Name'].'\',\''.$rec['sup_Name'].'\');" class="btn btn-info">Reorder</button></td>
       </tr>
              ');
    }
  }
  else {echo('
    <div class="alert alert-danger" role="alert">
    No product Are Found!
  </div>');
  }
}

//lets create search employer methord
public function proSearch($searchData){

//sqlSearchData
$sqlSearch = "SELECT * FROM product_tbl JOIN reorder_tbl 
ON product_tbl.product_Id = reorder_tbl.product_Id  
JOIN store_tbl ON product_tbl.product_Id = store_tbl.product_Id 
JOIN supplier_tbl ON reorder_tbl.sup_Id = supplier_tbl.sup_Id
WHERE (product_tbl.product_Id LIKE '$searchData%' OR product_tbl.product_Name  LIKE '$searchData%') AND product_tbl.d_status=0";

//lets check the errors 
if($this->dbResult->error){
    echo($this->dbResult->error);
    exit;
}

$sqlSearchData = $this->dbResult -> query($sqlSearch);

$nor = $sqlSearchData -> num_rows;

if($nor > 0){
while($rec = $sqlSearchData -> fetch_assoc()){
  echo('
  <tr>
    <th >'.$rec['product_Id'].'</th>
    <th ><img src="../'.$rec['procut_Image'].'" style="width:150px; height:100px;" alt="image1" class="img-fluid card-img-top">
    </th>
    <td>'.$rec['product_Name'].'</td>
    <td>'.$rec['product_Price'].'</td>
    <td>'.$rec['product_Quantity'].'</td>
    <td><button type="button" onclick="reorder(\''.$rec['sup_Id'].'\',\''.$rec['product_Id'].'\',\''.$rec['product_Name'].'\',\''.$rec['sup_Name'].'\');" class="btn btn-info">Reorder</button></td>
 </tr>
        ');
}
}
else{echo('
<div class="alert alert-danger" role="alert">
No products are Found!
</div>');
}
}


public function proList3(){

  $sqlSelect = "SELECT * FROM product_tbl JOIN reorder_tbl 
  ON product_tbl.product_Id = reorder_tbl.product_Id  
  JOIN store_tbl ON product_tbl.product_Id = store_tbl.product_Id 
  JOIN supplier_tbl ON reorder_tbl.sup_Id = supplier_tbl.sup_Id 
  WHERE product_tbl.d_status = 0 ORDER BY product_tbl.product_Id ASC;";
   //lets check the errors 
    if($this->dbResult->error){
    echo($this->dbResult->error);
    exit;
   }
 //sql execute 
 $sqlResult = $this->dbResult->query($sqlSelect);

  //check the number of rows
  $nor = $sqlResult->num_rows;

  if($nor > 0){
    while($rec = $sqlResult->fetch_assoc()){
        echo('
        <tr>
          <th >'.$rec['product_Id'].'</th>
          <th ><img src="../'.$rec['procut_Image'].'" style="width:150px; height:100px;" alt="image1" class="img-fluid card-img-top">
          </th>
          <td>'.$rec['product_Name'].'</td>
          <td>'.$rec['product_Price'].'</td>
          <td>'.$rec['product_Quantity'].'</td>
          <td><button type="button" onclick="reorder(\''.$rec['sup_Id'].'\',\''.$rec['product_Id'].'\',\''.$rec['product_Name'].'\',\''.$rec['sup_Name'].'\');" class="btn btn-info">Add New Stock</button></td>
       </tr>
              ');
    }
  }
  else {echo('
    <div class="alert alert-danger" role="alert">
    No product Are Found!
  </div>');
  }
}

//lets create search employer methord
public function proSearch1($searchData){

//sqlSearchData
$sqlSearch = "SELECT * FROM product_tbl JOIN reorder_tbl 
ON product_tbl.product_Id = reorder_tbl.product_Id  
JOIN store_tbl ON product_tbl.product_Id = store_tbl.product_Id 
JOIN supplier_tbl ON reorder_tbl.sup_Id = supplier_tbl.sup_Id
WHERE (product_tbl.product_Id LIKE '$searchData%' OR product_tbl.product_Name  LIKE '$searchData%') AND product_tbl.d_status=0";

//lets check the errors 
if($this->dbResult->error){
    echo($this->dbResult->error);
    exit;
}

$sqlSearchData = $this->dbResult -> query($sqlSearch);

$nor = $sqlSearchData -> num_rows;

if($nor > 0){
while($rec = $sqlSearchData -> fetch_assoc()){
  echo('
  <tr>
    <th >'.$rec['product_Id'].'</th>
    <th ><img src="../'.$rec['procut_Image'].'" style="width:150px; height:100px;" alt="image1" class="img-fluid card-img-top">
    </th>
    <td>'.$rec['product_Name'].'</td>
    <td>'.$rec['product_Price'].'</td>
    <td>'.$rec['product_Quantity'].'</td>
    <td><button type="button" onclick="reorder(\''.$rec['sup_Id'].'\',\''.$rec['product_Id'].'\',\''.$rec['product_Name'].'\',\''.$rec['sup_Name'].'\');" class="btn btn-info">Add New Stock</button></td>
 </tr>
        ');
}
}
else{echo('
<div class="alert alert-danger" role="alert">
No products are Found!
</div>');
}
}


public function addrequest1($sid,$pid,$qty,$rel,$date){

  //generate new id for a employer 

  
  //insert data to emplyer table
  $sqlInsert = "UPDATE product_tbl JOIN reorder_tbl 
  ON product_tbl.product_Id = reorder_tbl.product_Id  
  JOIN store_tbl ON product_tbl.product_Id = store_tbl.product_Id SET reorder_tbl.reorder_level='$rel', reorder_tbl.expier_date='$date', store_tbl.product_Quantity=(store_tbl.product_Quantity + $qty)  WHERE product_tbl.product_Id ='$pid';";

  //lets check the errors 
  if($this->dbResult->error){
      echo($this->dbResult->error);
      exit;
  }

  //we need to execute our sql by query 
  $sqlResult = $this->dbResult->query($sqlInsert);

  //lest check the result is 0 or not 
  if($sqlResult > 0){
    return("ok");
  }
  else{
      return("Please Try again later!");
  }
}




public function addrequest2($sid,$pid,$qty){

 //generate new id for a employer 
 $autoNumber = new AutoNumber;
 $Id = $autoNumber -> NumberGeneration("repair_id","repair_tbl","REP");

 
 //insert data to emplyer table
 $sqlInsert = "INSERT INTO repair_tbl VALUES('$Id','$sid','$pid','$qty','',0);";
  //lets check the errors 
  if($this->dbResult->error){
      echo($this->dbResult->error);
      exit;
  }

  //we need to execute our sql by query 
  $sqlResult = $this->dbResult->query($sqlInsert);

  //lest check the result is 0 or not 
  if($sqlResult > 0){
    return("ok");
  }
  else{
      return("Please Try again later!");
  }
}


public function addrequest3($sid,$pid){


  //insert data to emplyer table
  $sqlInsert = "UPDATE repair_tbl SET respons ='$pid' WHERE repair_id='$sid';";
   //lets check the errors 
   if($this->dbResult->error){
       echo($this->dbResult->error);
       exit;
   }
 
   //we need to execute our sql by query 
   $sqlResult = $this->dbResult->query($sqlInsert);
 
   //lest check the result is 0 or not 
   if($sqlResult > 0){
     return("ok");
   }
   else{
       return("Please Try again later!");
   }
 }

}

?>
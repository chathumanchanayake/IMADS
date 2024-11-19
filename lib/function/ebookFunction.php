<?php
// Start the session
session_start();

// Include main.php
include_once('main.php');

// Include auto number module
include_once('auto_id.php');

// Add Image upload model
include_once('img_upload.php');

class Ebook extends Main {

  function proList3() {
    $sqlSelect = "SELECT * FROM product_tbl WHERE product_Category LIKE '%Reading books%' AND product_Id NOT IN(SELECT id FROM ebook_tbl) ORDER BY product_Id DESC;";
    
    // Check for errors
    if($this->dbResult->error){
      echo($this->dbResult->error);
      exit;
    }
    
    // Execute SQL
    $sqlResult = $this->dbResult->query($sqlSelect);
  
    // Check the number of rows
    $nor = $sqlResult->num_rows;
  
    if($nor > 0){
      echo('<option value="0">Select Book</option>');
      while($rec = $sqlResult->fetch_assoc()){
        echo('<option value="'.$rec['product_Id'].'">'.$rec['product_Name'].'</option>');
      }
    } else {
      echo('<option value="0">Select Book</option>');
    }
  }
  
  public function proList4() {
    $sqlSelect = "SELECT * FROM ebook_tbl ORDER BY id ASC;";
    
    // Check for errors
    if($this->dbResult->error){
      echo($this->dbResult->error);
      exit;
    }
    
    // Execute SQL
    $sqlResult = $this->dbResult->query($sqlSelect);

    // Check the number of rows
    $nor = $sqlResult->num_rows;

    if($nor > 0){
      while($rec = $sqlResult->fetch_assoc()){
        echo('
        <tr>
          <th >'.$rec['id'].'</th>
          <th >'.$rec['name'].'</th>
          <td><a href="../../lib/'.$rec['doc'].'" download> Download</a></td>
          <td><button type="button" onclick="deleteE(\''.$rec['id'].'\');" class="btn btn-info">delete</button></td>
       </tr>
        ');
      }
    } else {
      echo('
        <div class="alert alert-danger" role="alert">
        No product Are Found!
      </div>
      ');
    }
  }

  // Add Ebook method
  public function addebook($name, $id, $imageName, $imageSize, $imageType, $imageTemp) {
    // Check if the product ID already exists
    $sqlCheck = "SELECT * FROM ebook_tbl WHERE id = '$id'";
    $resultCheck = $this->dbResult->query($sqlCheck);

    if ($resultCheck->num_rows > 0) {
      // return "Error: Product ID already exists!";
    } else {
      // Image upload function
      $objImage = new ImageUpload();
      $imageUrl = $objImage->imgUpload($imageName, $imageType, "E-BOOK", $imageTemp, $id);

      // Insert product to database
      $sqlInsert = "INSERT INTO ebook_tbl VALUES('$id', '$name', '$imageUrl')";

      // Check for errors
      if($this->dbResult->error){
        echo($this->dbResult->error);
        exit;
      }

      // Execute SQL
      $sqlResult = $this->dbResult->query($sqlInsert);

      // Check the result
      if($sqlResult){
        return "Add Success!";
      } else {
        return "Please Check the inputs and try again!";
      }
    }
  }

  public function delete($uid){

    

    $update1 = "DELETE FROM ebook_tbl WHERE id = '$uid';";
    //lets check the errors 
     if($this->dbResult->error){
     echo($this->dbResult->error);
     exit;
    }
  //sql execute 
  $sqlResult = $this->dbResult->query($update1);

      
  return("ok"); 
   
   }
  }

?>

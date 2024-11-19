<?php
//we need to start the sessions 
session_start();

//include main.php
include_once('main.php');

//include auto number module 
include_once('auto_id.php');

//add Image upload model
include_once('img_upload.php');

class Product extends Main{

      //view all Products
      function ViewAllproduct(){

          $sqlSelect = "SELECT * FROM product_tbl WHERE d_status = 0 AND product_Category != 'Reading books-Novels' AND product_Category != 'Reading books-Translations' AND product_Category != 'Reading books-Educational books' AND product_Category != 'Reading books-Religious books' AND product_Category != 'Reading books-Children books' ORDER BY product_Name DESC; ";
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
          $id=$rec['product_Id'];
              $sqlSelect1 = "SELECT * FROM feedback_tbl WHERE d_status = 0 AND product_id = '$id';";
              //lets check the errors 
               if($this->dbResult->error){
               echo($this->dbResult->error);
               exit;
              }
            //sql execute 
            $sqlResult1 = $this->dbResult->query($sqlSelect1);
   
             //check the number of rows
             $nor1 = $sqlResult1->num_rows;
              $feed="";
              $count=0;
              $total=0;
              $avarage=0;
             if($nor1 > 0)
             {
              while($rec1 = $sqlResult1->fetch_assoc())
              {
                $total += $rec1['count'];
                $count = $count + 1;
              };
              $avarage=round($total/$count);
                  if($avarage == 1)
                  { $feed='<i class="fas fa-star" style="color:yellow;"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>';}
                    else if ($avarage == 2)
                    { $feed='<i class="fas fa-star" style="color:yellow;"></i>
                      <i class="fas fa-star" style="color:yellow;"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>';}
                      else if($avarage == 3)
                      { $feed='<i class="fas fa-star" style="color:yellow;"></i>
                        <i class="fas fa-star" style="color:yellow;"></i>
                        <i class="fas fa-star" style="color:yellow;"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>';}
                        else if($avarage == 4)
                      {$feed='<i class="fas fa-star" style="color:yellow;"></i>
                        <i class="fas fa-star" style="color:yellow;"></i>
                        <i class="fas fa-star" style="color:yellow;"></i>
                        <i class="fas fa-star" style="color:yellow;"></i>
                        <i class="fas fa-star"></i>';}
                        else
                        { $feed='<i class="fas fa-star" style="color:yellow;"></i>
                          <i class="fas fa-star" style="color:yellow;"></i>
                          <i class="fas fa-star" style="color:yellow;"></i>
                          <i class="fas fa-star" style="color:yellow;"></i>
                          <i class="fas fa-star" style="color:yellow;"></i>';}
             
             }
             else
             { $feed='<i class="fas fa-star" "></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="far fa-star"></i>
              <i class="far fa-star"></i>';}
                echo('
                     <div class="col-md-3 col-sm-6 my-4 ">
                      <div class="card shadow card border-info" id="sellItems">
                      <div>
                          <img src="lib/'.$rec['procut_Image'].'" style="width:300; height:250;border-top-left-radius: 5px;border-top-right-radius: 5px" alt="image1" class="img-fluid card-img-top">
                      </div>
                      <div class="card-body">
                        <h5 class="card-title">'.$rec['product_Name'].'</h5>
                        <h6>
                            '. $feed.'
                        </h6>
                        <p class="card-text">
                          '.$rec['product_Details'].'
                        </p>
                        <h5>
                             <small><s class="text-secondary">LKR6999</s></small>
                            <span class="price">LKR'.$rec['product_Price'].'</span>
                        </h5>
                        <button type="submit" onclick="addtocart(
                          \''.$rec['product_Id'].'\',\''.$rec['product_Name'].'\',\''.$rec['procut_Image'].'\',\''.$rec['product_Price'].'\',\''.$rec['product_Details'].'\'
                          )" class="btn btn-warning my-3" >Add to Cart <i class="fas fa-shopping-cart"></i></button>
                        </div>
                      </div>
                     </div>');
            }
          }

          else {echo('
            <div class="alert alert-danger" role="alert">
            No products are found!
          </div>');
          }
      }
    
       //view all Products
       function ViewAllBproduct(){


        $sqlSelect = "SELECT * FROM product_tbl WHERE d_status = 0 AND (product_Category = 'Reading books-Novels' OR product_Category = 'Reading books-Translations' OR product_Category = 'Reading books-Educational books' OR product_Category = 'Reading books-Religious books' OR product_Category = 'Reading books-Children books') ORDER BY product_Name DESC; ";
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
            $id=$rec['product_Id'];

            $sqlSelect2 = "SELECT * FROM ebook_tbl WHERE id = '$id';";
            //lets check the errors 
             if($this->dbResult->error){
             echo($this->dbResult->error);
             exit;
            }
          //sql execute 
          $sqlResult2 = $this->dbResult->query($sqlSelect2);
 $pdf="";
           //check the number of rows
           $nor2 = $sqlResult2->num_rows;
           if($nor2 > 0)
           {
            $pdf='<h5 style="color:red;">PDF<i class="fas fa-file-pdf" style="color:red;"></i></h5>';}
                $sqlSelect1 = "SELECT * FROM feedback_tbl WHERE d_status = 0 AND product_id = '$id';";
                //lets check the errors 
                 if($this->dbResult->error){
                 echo($this->dbResult->error);
                 exit;
                }
              //sql execute 
              $sqlResult1 = $this->dbResult->query($sqlSelect1);
     
               //check the number of rows
               $nor1 = $sqlResult1->num_rows;
                $feed="";
                $count=0;
                $total=0;
                $avarage=0;
               if($nor1 > 0)
               {
                while($rec1 = $sqlResult1->fetch_assoc())
                {
                  $total += $rec1['count'];
                  $count = $count + 1;
                };
                $avarage=round($total/$count);
                    if($avarage == 1)
                    { $feed='<i class="fas fa-star" style="color:yellow;"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>';}
                      else if ($avarage == 2)
                      { $feed='<i class="fas fa-star" style="color:yellow;"></i>
                        <i class="fas fa-star" style="color:yellow;"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>';}
                        else if($avarage == 3)
                        { $feed='<i class="fas fa-star" style="color:yellow;"></i>
                          <i class="fas fa-star" style="color:yellow;"></i>
                          <i class="fas fa-star" style="color:yellow;"></i>
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>';}
                          else if($avarage == 4)
                        {$feed='<i class="fas fa-star" style="color:yellow;"></i>
                          <i class="fas fa-star" style="color:yellow;"></i>
                          <i class="fas fa-star" style="color:yellow;"></i>
                          <i class="fas fa-star" style="color:yellow;"></i>
                          <i class="fas fa-star"></i>';}
                          else
                          { $feed='<i class="fas fa-star" style="color:yellow;"></i>
                            <i class="fas fa-star" style="color:yellow;"></i>
                            <i class="fas fa-star" style="color:yellow;"></i>
                            <i class="fas fa-star" style="color:yellow;"></i>
                            <i class="fas fa-star" style="color:yellow;"></i>';}
               
               }
               else
               { $feed='<i class="fas fa-star" "></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>';}
                  echo('
                       <div class="col-md-3 col-sm-6 my-4 ">
                        <div class="card shadow card border-info" id="sellItems">
                        <div>
                            <img src="lib/'.$rec['procut_Image'].'" style="width:300; height:250;border-top-left-radius: 5px;border-top-right-radius: 5px" alt="image1" class="img-fluid card-img-top">
                        </div>
                        <div class="card-body">
                          <h5 class="card-title">'.$rec['product_Name'].''.$pdf.'</h5>
                          <h6>
                              '. $feed.'
                          </h6>
                          <p class="card-text">
                            '.$rec['product_Details'].'
                          </p>
                          <h5>
                              <small><s class="text-secondary">LKR6999</s></small>
                              <span class="price">LKR'.$rec['product_Price'].'</span>
                          </h5>
                          <button type="submit" onclick="addtocart(
                            \''.$rec['product_Id'].'\',\''.$rec['product_Name'].'\',\''.$rec['procut_Image'].'\',\''.$rec['product_Price'].'\',\''.$rec['product_Details'].'\'
                            )" class="btn btn-warning my-3" >Add to Cart <i class="fas fa-shopping-cart"></i></button>
                          </div>
                        </div>
                       </div>');
              }
        }
        else {echo('
          <div class="alert alert-danger" role="alert">
          No products are found!
        </div>');
        }
    }

      //creating search product methord
      public function productSearch($searchData){

        //sqlSearchData
        $sqlSearch = "SELECT * FROM product_tbl WHERE (product_Name LIKE '%$searchData%' OR product_Details LIKE '$searchData%') AND product_Category != 'Reading books-Novels' AND product_Category != 'Reading books-Translations' AND product_Category != 'Reading books-Educational books' AND product_Category != 'Reading books-Religious books' AND product_Category != 'Reading books-Children books' AND d_status = 0";
        
          //checking errors 
          if($this->dbResult->error){
              echo($this->dbResult->error);
              exit;
          }

        $sqlSearchData = $this->dbResult -> query($sqlSearch);

        $nor = $sqlSearchData -> num_rows;

        if($nor > 0){
          while($rec = $sqlSearchData -> fetch_assoc()){
            $id=$rec['product_Id'];
                $sqlSelect1 = "SELECT * FROM feedback_tbl WHERE d_status = 0 AND product_id = '$id';";
                //lets check the errors 
                 if($this->dbResult->error){
                 echo($this->dbResult->error);
                 exit;
                }
              //sql execute 
              $sqlResult1 = $this->dbResult->query($sqlSelect1);
     
               //check the number of rows
               $nor1 = $sqlResult1->num_rows;
                $feed="";
                $count=0;
                $total=0;
                $avarage=0;
               if($nor1 > 0)
               {
                while($rec1 = $sqlResult1->fetch_assoc())
                {
                  $total += $rec1['count'];
                  $count = $count + 1;
                };
                $avarage=round($total/$count);
                    if($avarage == 1)
                    { $feed='<i class="fas fa-star" style="color:yellow;"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>';}
                      else if ($avarage == 2)
                      { $feed='<i class="fas fa-star" style="color:yellow;"></i>
                        <i class="fas fa-star" style="color:yellow;"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>';}
                        else if($avarage == 3)
                        { $feed='<i class="fas fa-star" style="color:yellow;"></i>
                          <i class="fas fa-star" style="color:yellow;"></i>
                          <i class="fas fa-star" style="color:yellow;"></i>
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>';}
                          else if($avarage == 4)
                        {$feed='<i class="fas fa-star" style="color:yellow;"></i>
                          <i class="fas fa-star" style="color:yellow;"></i>
                          <i class="fas fa-star" style="color:yellow;"></i>
                          <i class="fas fa-star" style="color:yellow;"></i>
                          <i class="fas fa-star"></i>';}
                          else
                          { $feed='<i class="fas fa-star" style="color:yellow;"></i>
                            <i class="fas fa-star" style="color:yellow;"></i>
                            <i class="fas fa-star" style="color:yellow;"></i>
                            <i class="fas fa-star" style="color:yellow;"></i>
                            <i class="fas fa-star" style="color:yellow;"></i>';}
               
               }
               else
               { $feed='<i class="fas fa-star" "></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>';}
                  echo('
                       <div class="col-md-3 col-sm-6 my-4 ">
                        <div class="card shadow card border-info" id="sellItems">
                        <div>
                            <img src="lib/'.$rec['procut_Image'].'" style="width:300; height:250;border-top-left-radius: 5px;border-top-right-radius: 5px" alt="image1" class="img-fluid card-img-top">
                        </div>
                        <div class="card-body">
                          <h5 class="card-title">'.$rec['product_Name'].'</h5>
                          <h6>
                              '. $feed.'
                          </h6>
                          <p class="card-text">
                            '.$rec['product_Details'].'
                          </p>
                          <h5>
                              <small><s class="text-secondary">LKR6999</s></small>
                              <span class="price">LKR'.$rec['product_Price'].'</span>
                          </h5>
                          <button type="submit" onclick="addtocart(
                            \''.$rec['product_Id'].'\',\''.$rec['product_Name'].'\',\''.$rec['procut_Image'].'\',\''.$rec['product_Price'].'\',\''.$rec['product_Details'].'\'
                            )" class="btn btn-warning my-3" >Add to Cart <i class="fas fa-shopping-cart"></i></button>
                          </div>
                        </div>
                       </div>');
              }
        }
        else{echo('
          <div class="alert alert-danger" role="alert">
          No products are found!
        </div>');
        }
      }


      public function productSearchb($searchData){

        //sqlSearchData
        $sqlSearch = "SELECT * FROM product_tbl WHERE (product_Name LIKE '%$searchData%' OR product_Details LIKE '$searchData%') 
        AND (product_Category = 'Reading books-Novels' OR product_Category = 'Reading books-Translations' OR product_Category = 'Reading books-Educational books' OR product_Category = 'Reading books-Religious books' OR product_Category = 'Reading books-Children books') AND d_status = 0";
      
         //lets check the errors 
          if($this->dbResult->error){
          echo($this->dbResult->error);
          exit;
         }
       //sql execute 
       $sqlResult = $this->dbResult->query($sqlSearch);

        //check the number of rows
        $nor = $sqlResult->num_rows;

        if($nor > 0){
          while($rec = $sqlResult->fetch_assoc()){
            $id=$rec['product_Id'];

            $sqlSelect2 = "SELECT * FROM ebook_tbl WHERE id = '$id';";
            //lets check the errors 
             if($this->dbResult->error){
             echo($this->dbResult->error);
             exit;
            }
          //sql execute 
          $sqlResult2 = $this->dbResult->query($sqlSelect2);
 $pdf="";
           //check the number of rows
           $nor2 = $sqlResult2->num_rows;
           if($nor2 > 0)
           {
            $pdf='<h5 style="color:red;">PDF<i class="fas fa-file-pdf" style="color:red;"></i></h5>';}
                $sqlSelect1 = "SELECT * FROM feedback_tbl WHERE d_status = 0 AND product_id = '$id';";
                //lets check the errors 
                 if($this->dbResult->error){
                 echo($this->dbResult->error);
                 exit;
                }
              //sql execute 
              $sqlResult1 = $this->dbResult->query($sqlSelect1);
     
               //check the number of rows
               $nor1 = $sqlResult1->num_rows;
                $feed="";
                $count=0;
                $total=0;
                $avarage=0;
               if($nor1 > 0)
               {
                while($rec1 = $sqlResult1->fetch_assoc())
                {
                  $total += $rec1['count'];
                  $count = $count + 1;
                };
                $avarage=round($total/$count);
                    if($avarage == 1)
                    { $feed='<i class="fas fa-star" style="color:yellow;"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>';}
                      else if ($avarage == 2)
                      { $feed='<i class="fas fa-star" style="color:yellow;"></i>
                        <i class="fas fa-star" style="color:yellow;"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>';}
                        else if($avarage == 3)
                        { $feed='<i class="fas fa-star" style="color:yellow;"></i>
                          <i class="fas fa-star" style="color:yellow;"></i>
                          <i class="fas fa-star" style="color:yellow;"></i>
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>';}
                          else if($avarage == 4)
                        {$feed='<i class="fas fa-star" style="color:yellow;"></i>
                          <i class="fas fa-star" style="color:yellow;"></i>
                          <i class="fas fa-star" style="color:yellow;"></i>
                          <i class="fas fa-star" style="color:yellow;"></i>
                          <i class="fas fa-star"></i>';}
                          else
                          { $feed='<i class="fas fa-star" style="color:yellow;"></i>
                            <i class="fas fa-star" style="color:yellow;"></i>
                            <i class="fas fa-star" style="color:yellow;"></i>
                            <i class="fas fa-star" style="color:yellow;"></i>
                            <i class="fas fa-star" style="color:yellow;"></i>';}
               
               }
               else
               { $feed='<i class="fas fa-star" "></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>';}
                  echo('
                       <div class="col-md-3 col-sm-6 my-4 ">
                        <div class="card shadow card border-info" id="sellItems">
                        <div>
                            <img src="lib/'.$rec['procut_Image'].'" style="width:300; height:250;border-top-left-radius: 5px;border-top-right-radius: 5px" alt="image1" class="img-fluid card-img-top">
                        </div>
                        <div class="card-body">
                          <h5 class="card-title">'.$rec['product_Name'].''.$pdf.'</h5>
                          <h6>
                              '. $feed.'
                          </h6>
                          <p class="card-text">
                            '.$rec['product_Details'].'
                          </p>
                          <h5>
                              <small><s class="text-secondary">LKR6999</s></small>
                              <span class="price">LKR'.$rec['product_Price'].'</span>
                          </h5>
                          <button type="submit" onclick="addtocart(
                            \''.$rec['product_Id'].'\',\''.$rec['product_Name'].'\',\''.$rec['procut_Image'].'\',\''.$rec['product_Price'].'\',\''.$rec['product_Details'].'\'
                            )" class="btn btn-warning my-3" >Add to Cart <i class="fas fa-shopping-cart"></i></button>
                          </div>
                        </div>
                       </div>');
              }
        }
        else {echo('
          <div class="alert alert-danger" role="alert">
          No Products Are Found!
        </div>');
        }
      }

       //lets create search product methord
       public function productSearchcat($searchData){

        //sqlSearchData
        $sqlSearch = "SELECT * FROM product_tbl WHERE product_Category LIKE '%$searchData%'  AND d_status = 0";
        
        //lets check the errors 
        if($this->dbResult->error){
          echo($this->dbResult->error);
          exit;
         }
       //sql execute 
       $sqlResult = $this->dbResult->query($sqlSearch);

        //check the number of rows
        $nor = $sqlResult->num_rows;

        if($nor > 0){
          while($rec = $sqlResult->fetch_assoc()){
            $id=$rec['product_Id'];

            $sqlSelect2 = "SELECT * FROM ebook_tbl WHERE id = '$id';";
            //lets check the errors 
             if($this->dbResult->error){
             echo($this->dbResult->error);
             exit;
            }
          //sql execute 
          $sqlResult2 = $this->dbResult->query($sqlSelect2);
 $pdf="";
           //check the number of rows
           $nor2 = $sqlResult2->num_rows;
           if($nor2 > 0)
           {
            $pdf='<h5 style="color:red;">PDF<i class="fas fa-file-pdf" style="color:red;"></i></h5>';}
                $sqlSelect1 = "SELECT * FROM feedback_tbl WHERE d_status = 0 AND product_id = '$id';";
                //lets check the errors 
                 if($this->dbResult->error){
                 echo($this->dbResult->error);
                 exit;
                }
              //sql execute 
              $sqlResult1 = $this->dbResult->query($sqlSelect1);
     
               //check the number of rows
               $nor1 = $sqlResult1->num_rows;
                $feed="";
                $count=0;
                $total=0;
                $avarage=0;
               if($nor1 > 0)
               {
                while($rec1 = $sqlResult1->fetch_assoc())
                {
                  $total += $rec1['count'];
                  $count = $count + 1;
                };
                $avarage=round($total/$count);
                    if($avarage == 1)
                    { $feed='<i class="fas fa-star" style="color:yellow;"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>';}
                      else if ($avarage == 2)
                      { $feed='<i class="fas fa-star" style="color:yellow;"></i>
                        <i class="fas fa-star" style="color:yellow;"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>';}
                        else if($avarage == 3)
                        { $feed='<i class="fas fa-star" style="color:yellow;"></i>
                          <i class="fas fa-star" style="color:yellow;"></i>
                          <i class="fas fa-star" style="color:yellow;"></i>
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>';}
                          else if($avarage == 4)
                        {$feed='<i class="fas fa-star" style="color:yellow;"></i>
                          <i class="fas fa-star" style="color:yellow;"></i>
                          <i class="fas fa-star" style="color:yellow;"></i>
                          <i class="fas fa-star" style="color:yellow;"></i>
                          <i class="fas fa-star"></i>';}
                          else
                          { $feed='<i class="fas fa-star" style="color:yellow;"></i>
                            <i class="fas fa-star" style="color:yellow;"></i>
                            <i class="fas fa-star" style="color:yellow;"></i>
                            <i class="fas fa-star" style="color:yellow;"></i>
                            <i class="fas fa-star" style="color:yellow;"></i>';}
               
               }
               else
               { $feed='<i class="fas fa-star" "></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>';}
                  echo('
                       <div class="col-md-3 col-sm-6 my-4 ">
                        <div class="card shadow card border-info" id="sellItems">
                        <div>
                            <img src="lib/'.$rec['procut_Image'].'" style="width:300; height:250;border-top-left-radius: 5px;border-top-right-radius: 5px" alt="image1" class="img-fluid card-img-top">
                        </div>
                        <div class="card-body">
                          <h5 class="card-title">'.$rec['product_Name'].''.$pdf.'</h5>
                          <h6>
                              '. $feed.'
                          </h6>
                          <p class="card-text">
                            '.$rec['product_Details'].'
                          </p>
                          <h5>
                              <small><s class="text-secondary">LKR6999</s></small>
                              <span class="price">LKR'.$rec['product_Price'].'</span>
                          </h5>
                          <button type="submit" onclick="addtocart(
                            \''.$rec['product_Id'].'\',\''.$rec['product_Name'].'\',\''.$rec['procut_Image'].'\',\''.$rec['product_Price'].'\',\''.$rec['product_Details'].'\'
                            )" class="btn btn-warning my-3" >Add to Cart <i class="fas fa-shopping-cart"></i></button>
                          </div>
                        </div>
                       </div>');
              }
        }
        else {echo('
          <div class="alert alert-danger" role="alert">
          No products are found!
        </div>');
        }
      }
      

      //lets create search product methord
      public function productSearchcatb($searchData){

        //sqlSearchData
        $sqlSearch = "SELECT * FROM product_tbl WHERE product_Category LIKE '%$searchData%'  AND d_status = 0";
        
        //lets check the errors 
        if($this->dbResult->error){
          echo($this->dbResult->error);
          exit;
         }
       //sql execute 
       $sqlResult = $this->dbResult->query($sqlSearch);

        //check the number of rows
        $nor = $sqlResult->num_rows;

        if($nor > 0){
          while($rec = $sqlResult->fetch_assoc()){
            $id=$rec['product_Id'];

            $sqlSelect2 = "SELECT * FROM ebook_tbl WHERE id = '$id';";
            //lets check the errors 
             if($this->dbResult->error){
             echo($this->dbResult->error);
             exit;
            }
          //sql execute 
          $sqlResult2 = $this->dbResult->query($sqlSelect2);
 $pdf="";
           //check the number of rows
           $nor2 = $sqlResult2->num_rows;
           if($nor2 > 0)
           {
            $pdf='<h5 style="color:red;">PDF<i class="fas fa-file-pdf" style="color:red;"></i></h5>';}
                $sqlSelect1 = "SELECT * FROM feedback_tbl WHERE d_status = 0 AND product_id = '$id';";
                //lets check the errors 
                 if($this->dbResult->error){
                 echo($this->dbResult->error);
                 exit;
                }
              //sql execute 
              $sqlResult1 = $this->dbResult->query($sqlSelect1);
     
               //check the number of rows
               $nor1 = $sqlResult1->num_rows;
                $feed="";
                $count=0;
                $total=0;
                $avarage=0;
               if($nor1 > 0)
               {
                while($rec1 = $sqlResult1->fetch_assoc())
                {
                  $total += $rec1['count'];
                  $count = $count + 1;
                };
                $avarage=round($total/$count);
                    if($avarage == 1)
                    { $feed='<i class="fas fa-star" style="color:yellow;"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>';}
                      else if ($avarage == 2)
                      { $feed='<i class="fas fa-star" style="color:yellow;"></i>
                        <i class="fas fa-star" style="color:yellow;"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>';}
                        else if($avarage == 3)
                        { $feed='<i class="fas fa-star" style="color:yellow;"></i>
                          <i class="fas fa-star" style="color:yellow;"></i>
                          <i class="fas fa-star" style="color:yellow;"></i>
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>';}
                          else if($avarage == 4)
                        {$feed='<i class="fas fa-star" style="color:yellow;"></i>
                          <i class="fas fa-star" style="color:yellow;"></i>
                          <i class="fas fa-star" style="color:yellow;"></i>
                          <i class="fas fa-star" style="color:yellow;"></i>
                          <i class="fas fa-star"></i>';}
                          else
                          { $feed='<i class="fas fa-star" style="color:yellow;"></i>
                            <i class="fas fa-star" style="color:yellow;"></i>
                            <i class="fas fa-star" style="color:yellow;"></i>
                            <i class="fas fa-star" style="color:yellow;"></i>
                            <i class="fas fa-star" style="color:yellow;"></i>';}
               
               }
               else
               { $feed='<i class="fas fa-star" "></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>';}
                  echo('
                       <div class="col-md-3 col-sm-6 my-4 ">
                        <div class="card shadow card border-info" id="sellItems">
                        <div>
                            <img src="lib/'.$rec['procut_Image'].'" style="width:300; height:250;border-top-left-radius: 5px;border-top-right-radius: 5px" alt="image1" class="img-fluid card-img-top">
                        </div>
                        <div class="card-body">
                          <h5 class="card-title">'.$rec['product_Name'].''.$pdf.'</h5>
                          <h6>
                              '. $feed.'
                          </h6>
                          <p class="card-text">
                            '.$rec['product_Details'].'
                          </p>
                          <h5>
                              <small><s class="text-secondary">LKR6999</s></small>
                              <span class="price">LKR'.$rec['product_Price'].'</span>
                          </h5>
                          <button type="submit" onclick="addtocart(
                            \''.$rec['product_Id'].'\',\''.$rec['product_Name'].'\',\''.$rec['procut_Image'].'\',\''.$rec['product_Price'].'\',\''.$rec['product_Details'].'\'
                            )" class="btn btn-warning my-3" >Add to Cart <i class="fas fa-shopping-cart"></i></button>
                          </div>
                        </div>
                       </div>');
              }
        }
        else {echo('
          <div class="alert alert-danger" role="alert">
          No Products Are Found!
        </div>');
        }
      }
      

      //view product Count
      function product_count(){

        
        $sqlSelect = "SELECT * FROM product_tbl WHERE d_status = 0 ORDER BY product_Name DESC;";
         //lets check the errors 
          if($this->dbResult->error){
          echo($this->dbResult->error);
          exit;
         }
       //sql execute 
       $sqlResult = $this->dbResult->query($sqlSelect);

        //check the number of rows
        $nor = $sqlResult->num_rows;

        echo($nor);
          
    }


      
      //lets create the Add Product Methord

public function addProduct($productName,$productDetails,$productCategory,$productPrice,$productPPrice,$productQuantity,$suppliyerName,$reorderlevel,$expairdate,$productSection,$productRow,$productColume,$productLevel,$productQuantityWH,$imageName,$imageSize,$imageType,$imageTemp){

   //generate new id for a product
   $autoNumber = new AutoNumber;
   $productId = $autoNumber -> NumberGeneration("product_Id","product_tbl","PRD");

   //image upload function
  $objImage =new ImageUpload();
  $imageUrl = $objImage ->imgUpload($imageName,$imageType,"products",$imageTemp,$productId);

   //insert product to databace
  $sqlInsert = "INSERT INTO product_tbl VALUES('$productId','$productName','$productDetails','$productPrice','$productPPrice','$imageUrl','$productCategory',0);";

  //lets check the errors 
  if($this->dbResult->error){
      echo($this->dbResult->error);
      exit;
  }

  //we need to execute our sql by query 
  $sqlResult = $this->dbResult->query($sqlInsert);

  //lest check the result is 0 or not 
  if($sqlResult > 0){
      
     //insert dataset into the product store
      $insertLogin = "INSERT INTO store_tbl VALUES('$productId','$productQuantity','$productQuantityWH','$productSection','$productRow','$productColume','$productLevel',0);";

      //lets check the errors 
      if($this->dbResult->error){
          echo($this->dbResult->error);
          exit;
      }
      $loginResult = $this->dbResult->query($insertLogin);

      if($loginResult > 0){
           //insert dataset into the product store
      $insertLogin = "INSERT INTO reorder_tbl VALUES('$productId','$suppliyerName','$reorderlevel','$expairdate');";

      //lets check the errors 
      if($this->dbResult->error){
          echo($this->dbResult->error);
          exit;
      }
      $loginResult = $this->dbResult->query($insertLogin);

      if($loginResult > 0){
          return("Item Add Success!");
      }
      else{
          return("Please Check the inputs and try again!");
      }
      }
      else{
          return("Please Check the inputs and try again!");
      }

  }
  else{
      return("Please Try again later!");
  }
}//end of add product

// this function use to get product liat to admin page

public function proList(){

  $sqlSelect = "SELECT * FROM product_tbl WHERE d_status = 0 ORDER BY product_Id ASC;";
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
          <td><button type="button" onclick="edit(\''.$rec['product_Id'].'\');" class="btn btn-warning">Edit</button>OR<button type="button" onclick="delete_pro(\''.$rec['product_Id'].'\');" class="btn btn-danger">Delete</button></td>
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

public function proList1($uid){

  $sqlSelect = "SELECT * FROM product_tbl INNER JOIN reorder_tbl ON product_tbl.product_Id = reorder_tbl.product_Id INNER JOIN store_tbl ON product_tbl.product_Id = store_tbl.product_Id WHERE product_tbl.d_status = 0 AND reorder_tbl.sup_Id ='$uid' ORDER BY product_tbl.product_Id ASC;";
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
          <td>'.$rec['reorder_level'].'</td>
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

public function proList2($uid){

  $sqlSelect = "SELECT * FROM product_tbl INNER JOIN reorder_tbl ON product_tbl.product_Id = reorder_tbl.product_Id 
  INNER JOIN store_tbl ON product_tbl.product_Id = store_tbl.product_Id  INNER JOIN reorderreq_tbl ON product_tbl.product_Id = reorderreq_tbl.product_Id
  WHERE product_tbl.d_status = 0 AND reorder_tbl.sup_Id ='$uid' ORDER BY product_tbl.product_Id ASC;";
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
          <td>'.$rec['qty'].'</td>
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
$sqlSearch = "SELECT * FROM product_tbl WHERE (product_Id LIKE '$searchData%' OR product_Name  LIKE '$searchData%') AND d_status=0";

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
    <td>'.$rec['product_Category'].'</td>
    <td><button type="button" onclick="edit(\''.$rec['product_Id'].'\');" class="btn btn-warning">Edit</button>OR<button type="button" onclick="delete_pro(\''.$rec['product_Id'].'\');" class="btn btn-danger">Delete</button></td>
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


function count($id){
  $sqlSelect = "SELECT * FROM product_tbl INNER JOIN store_tbl ON product_tbl.product_Id = store_tbl.product_Id WHERE product_tbl.d_status = 0 AND product_tbl.product_Id = '$id' ORDER BY product_Name DESC;";
         //lets check the errors 
          if($this->dbResult->error){
          echo($this->dbResult->error);
          exit;
         }
       //sql execute 
       $sqlResult = $this->dbResult->query($sqlSelect);
       $rec = $sqlResult -> fetch_assoc();
        return($rec['product_Quantity']);
}


public function delete_pro($uid){
  $update1 = "UPDATE product_tbl SET d_status = 1 WHERE  product_Id = '$uid' AND d_status = 0;";
  //lets check the errors 
   if($this->dbResult->error){
   echo($this->dbResult->error);
   exit;
  }
//sql execute 
$sqlResult = $this->dbResult->query($update1);

$update2 = "UPDATE store_tbl SET d_status = 1 WHERE  product_Id = '$uid' AND d_status = 0;";
  //lets check the errors 
   if($this->dbResult->error){
   echo($this->dbResult->error);
   exit;
  }

//sql execute 
$sqlResult = $this->dbResult->query($update2);
    return("ok"); 
 
 }

 function prodata($uid){
  $sqlSelect = "SELECT * FROM product_tbl WHERE product_Id = '$uid';";
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
 $rec = $sqlResult->fetch_assoc();

 return json_encode($rec);
 }
}



function editdata($id,$name,$details,$cat,$price){

  $update1 = "UPDATE product_tbl SET product_Name='$name', product_Details='$details', product_Category='$cat', product_Price='$price' WHERE  product_Id='$id' AND d_status = 0;";
     //lets check the errors 
      if($this->dbResult->error){
      echo($this->dbResult->error);
      exit;
     }
   //sql execute 
   $sqlResult = $this->dbResult->query($update1);
       return("ok"); 
}

function getprodroplist($cat){


  $sqlSelect = "SELECT * FROM product_tbl WHERE product_Category LIKE '%$cat%' ORDER BY product_Name DESC;";
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
    echo('<option value="0">Select Product</option>');
    while($rec = $sqlResult->fetch_assoc()){
        echo('<option value="'.$rec['product_Id'].'" data-name="'.$rec['product_Name'].'" data-price="'.$rec['product_Price'].'">'.$rec['product_Name'].'  -   LKR'.$rec['product_Price'].'</option>');
    }
  }
  else {
    echo('<option value="0"> No Products</option>');
  }
}

function pendingpay_count(){

        
  $sqlSelect = "SELECT * FROM delivery_tbl WHERE  order_payment = 0 AND d_status = 0 ;";
   //lets check the errors 
    if($this->dbResult->error){
    echo($this->dbResult->error);
    exit;
   }
 //sql execute 
 $sqlResult = $this->dbResult->query($sqlSelect);

  //check the number of rows
  $nor = $sqlResult->num_rows;

  echo($nor);
  
    
}

}



?>
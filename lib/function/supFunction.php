<?php
//we need to start the sessions 
session_start();


//include main.php
include_once('main.php');

//include auto number module 
include_once('auto_id.php');

//include image upload function
include_once('img_upload.php');

//include auto password genaretor
include_once('passwordgenaretor.php');

//include send mail function
include_once('phpmailer/mail.php');

class Sup extends Main{

//lets create the employer Registration method

public function addEmployer($Name,$br,$empAddress,$Phone,$Email,$Type,$service){

    //generate new id for a employer 
    $autoNumber = new AutoNumber;
    $empId = $autoNumber -> NumberGeneration("sup_Id","supplier_tbl","SUP");

    
    //insert data to emplyer table
    $sqlInsert = "INSERT INTO supplier_tbl VALUES('$empId','$Name','$br','$empAddress','$Phone','$Email','$Type','$service',0);";

    //lets check the errors 
    if($this->dbResult->error){
        echo($this->dbResult->error);
        exit;
    }

    //we need to execute our sql by query 
    $sqlResult = $this->dbResult->query($sqlInsert);

    //lest check the result is 0 or not 
    if($sqlResult > 0){

        //genarete new password
        $pwd= get_password();

        //lets create a hash by using MD5
        $newPwd = md5($pwd);

          //send password to Employer
          $email_send = new Mail();
          $email_send->Send_mail($Email,"Welcome to Dreamy Bookshop","<h3>Hello $Name,</h3><br> <h4>This is your account credentials, <br> please visit your account using this password<h4> <br> Username: $Email <br> Password: $pwd ");

        //insert dataset into the login table 
        $insertLogin = "INSERT INTO login_tbl VALUES('$empId','$Email','$newPwd','Supplier',1,0);";

        //lets check the errors 
        if($this->dbResult->error){
            echo($this->dbResult->error);
            exit;
        }
        $loginResult = $this->dbResult->query($insertLogin);

    }
    else{
        return("Please Try again later!");
    }
}


        public function empList(){

            $sqlSelect = "SELECT * FROM supplier_tbl WHERE d_status = 0 ORDER BY sup_Id DESC;";
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
                $badge="";
               if($rec['type'] == "Local")
                {$badge ='<span class="badge bg-danger">Local</span>';}
              else 
                {$badge ='<span class="badge bg-success">Forine</span>';}

              if($rec['service'] == "Products")
                {$badge1 ='<span class="badge bg-warning">Products</span>';}
              else 
                {$badge1 ='<span class="badge bg-info">Service</span>';}
              
                
                  echo('
                  <tr>
                    <th >'.$rec['sup_Id'].'</th>
                    <td>'.$rec['sup_Name'].'</td>
                    <td>'.$rec['sup_br'].'</td>
                    <td>'.$badge.'</td>
                    <td>'.$badge1.'</td>
                    <td><button type="button" onclick="editemp(\''.$rec['sup_Id'].'\');"  class="btn btn-warning">Edit
                    </button><button type="button" class="btn btn-danger" onclick="deleteemp(\''.$rec['sup_Id'].'\')">Delete</button></td>
                 </tr>
                        ');
              }
            }
            else {echo('
              <div class="alert alert-danger" role="alert">
              No Users Are Found!
            </div>');
            }
        }
  
   
     //lets create search employer methord
     public function empSearch($searchData){

        //sqlSearchData
        $sqlSearch = "SELECT * FROM supplier_tbl WHERE sup_Id LIKE '$searchData%' OR sup_Name LIKE '$searchData%' OR sup_br LIKE '$searchData%'";
        
          //lets check the errors 
          if($this->dbResult->error){
              echo($this->dbResult->error);
              exit;
          }

        $sqlSearchData = $this->dbResult -> query($sqlSearch);

        $nor = $sqlSearchData -> num_rows;

        if($nor > 0){
          while($rec = $sqlSearchData->fetch_assoc()){
            $badge="";
           if($rec['type'] == "Local")
            {$badge ='<span class="badge bg-danger">Local</span>';}
          else 
            {$badge ='<span class="badge bg-success">Forine</span>';}

          if($rec['service'] == "Products")
            {$badge1 ='<span class="badge bg-warning">Products</span>';}
          else 
            {$badge1 ='<span class="badge bg-info">Service</span>';}
          
            
              echo('
              <tr>
                <th >'.$rec['sup_Id'].'</th>
                <td>'.$rec['sup_Name'].'</td>
                <td>'.$rec['sup_br'].'</td>
                <td>'.$badge.'</td>
                <td>'.$badge1.'</td>
                <td><button type="button" onclick="editemp(\''.$rec['sup_Id'].'\');"  class="btn btn-warning">Edit
                </button><button type="button" class="btn btn-danger" onclick="deleteemp(\''.$rec['sup_Id'].'\')">Delete</button></td>
             </tr>
                    ');
          }
        }
        else{echo('
          <div class="alert alert-danger" role="alert">
          No Users are Found!
        </div>');
        }
      }



      public function delete_emp($uid){

        if(($_SESSION['user_id']) == $uid){
          return ("no");
        }else{

        $update1 = "UPDATE supplier_tbl SET d_status = 1 WHERE  sup_Id = '$uid' AND d_status = 0;";
        //lets check the errors 
         if($this->dbResult->error){
         echo($this->dbResult->error);
         exit;
        }
      //sql execute 
      $sqlResult = $this->dbResult->query($update1);
    
  
    
      $update2 = "UPDATE login_tbl SET d_status = 1 WHERE  user_id = '$uid' AND d_status = 0;";
        //lets check the errors 
         if($this->dbResult->error){
         echo($this->dbResult->error);
         exit;
        }
      //sql execute 
      $sqlResult = $this->dbResult->query($update2);
          
      return("ok"); 
       
       }
      }
    
      
      function userdata($uid){
        $sqlSelect = "SELECT * FROM supplier_tbl WHERE sup_Id = '$uid';";
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
      
      function editdata($id,$name,$phone,$email,$br,$address,$type,$service,){

        $update1 = "UPDATE supplier_tbl SET sup_Name='$name', phone='$phone', sup_br='$br', emp_Address='$address', type='$type', service='$service'  WHERE  sup_Id='$id' AND d_status = 0;";
           //lets check the errors 
            if($this->dbResult->error){
            echo($this->dbResult->error);
            exit;
           }
         //sql execute 
         $sqlResult = $this->dbResult->query($update1);
             return("ok"); 
      }
      
      function getsuplist(){


        $sqlSelect = "SELECT * FROM supplier_tbl ORDER BY sup_Id DESC;";
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
          echo('<option value="0">Select Supplier</option>');
          while($rec = $sqlResult->fetch_assoc()){
              echo('<option value="'.$rec['sup_Id'].'">'.$rec['sup_Name'].'</option>');
          }
        }
        else {
          echo('<option value="0">Select Supplier</option>');
        }
      }


}
?>
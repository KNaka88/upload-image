<?php
   if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size = $_FILES['image']['size'];
      $file_tmp = $_FILES['image']['tmp_name'];
      $file_type = $_FILES['image']['type'];
      $exploded = explode('.',$_FILES['image']['name']);
      $last_element = end($exploded);
      $file_ext=strtolower($last_element);

      $expensions= array("jpeg","jpg","png", "gif");

      if(in_array($file_ext,$expensions)=== false){
         $errors[]="please upload only JPEG or PNG, GIF file.";
      }

      if($file_size > 2097152) {
         $errors[]='File size must be less than 2 MB';
      }

      if(empty($errors)==true) {
         move_uploaded_file($file_tmp,"images/".$file_name);
         echo "Success";
         $img = '<img id="'.$file_name.'" src="'."images/".$file_name.'">';
         echo $img;
      }else{
         print_r($errors);
      }
   }
?>
<html>
   <body>
      <form action = "" method = "POST" enctype = "multipart/form-data">
         <input type = "file" name = "image" />
         <input type = "submit"/>
         <ul>
            <li>Sent file: <?php echo $_FILES['image']['name'];  ?>
            <li>File size: <?php echo $_FILES['image']['size'];  ?>
            <li>File type: <?php echo $_FILES['image']['type'] ?>
         </ul>
      </form>

   </body>
</html>

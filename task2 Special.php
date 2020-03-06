<!DOCTYPE html>
<html>
<head>
    <title>
        Forms
    </title>
</head>
<body>
    <?php
        if(isset($_POST['submit']))
        {
            //var_dump($_FILES);
            if(!empty($_POST['name'])) //to check if the name = "submit" button was pressed
            {
                echo $_POST['name']."<br>";
            }
            else echo "Enter name first";
            if(!empty($_POST['email'])) //to check if the name = "submit" button was pressed
            {
                echo $_POST['email']."<br>";
            }
            else echo "Enter email first";
            if(($_FILES['image']['type'] == 'image/jpeg' || $_FILES['image']['type'] == 'image/png') && $_FILES['image']['size'] <= 5000000)
            {
                $tmp = $_FILES['image']['tmp_name']; //upload to temp directory
                $type = explode('image/', $_FILES['image']['type']); //get the type of image
                $img_name = uniqid().".".$type[1]; //give unique name to imagge with its extension
                move_uploaded_file($tmp, "photos/".$img_name); //move file from temp directory to current directory
                $img_loc = "photos/".$img_name; //take location where image saved
                echo "<img src=$img_loc height=400 width=400 />"; //echo the image
            }
            elseif($_FILES['image']['size'] == 0) 
            {
                echo "Please select a file first";
            }
            elseif($_FILES['image']['size'] > 5000000) 
            {
                echo "The file size cannot exceed 5Mb";
            }
        }
    ?>
    <form method="POST" action="" enctype="multipart/form-data">
        <input type="text" name="name" value="Name"><br>
        <input type="email" name="email" value="Email"><br>
        <input type="file" name="image" accept="image/*"><br>
        <!-- type can be the type of input such as button(type is submit), dropdown etc -->
        <!--name is the name of the attribute that will be used in php-->
        <!-- value is the name that will be displayed on the button or input -->
        <input type="submit" name="submit" value="Sumbit">
 
    </form>


</body>
</html>
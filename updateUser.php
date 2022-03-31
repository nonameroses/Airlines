<?php
include "connection.php";



?>
<html>
<header> <?php include "ifSessionHeader.php";
   ?></header>
<style>
    button{
        width: 20%;
        height: 30px;

    }
    input{
        width: 50%;
        height: 30px;
    }
    text{
        width: 50%;
        height: 30px;

    }
    label{
        margin-right: 30px;

    }
    input{

        width: 60%;
    }
    .text-body{
        width: 50%;
    }
</style>
<body>

<h1>Update your account details</h1>
<form action ="" method="POST">
    <table width="50%" border="1" cellpadding="5" cellspacing="5">
        <tr>
            <td><br><br>
                <center>
                    <div class="text-body"

                    <label> Update Email</label>    <br>
                    <input type="text" name="email" value="<?php echo  $_SESSION["email"]?>"  "> <br>
                    <label> Update First Name</label>
                    <input type="text" name="first_name" value="<?php echo  $_SESSION["first_name"]?>"  " <br>
                    <br>
                    <label> Update Last Name</label>
                    <input type="text" name="last_name" value="<?php echo  $_SESSION["last_name"]?>"  <br>
                    <br>
                    <label> Update Country</label>
                    <input type="text" name="country" value="<?php echo  $_SESSION["country"]?>"  <br>
                    <br>
                    <label> Update Address</label>
                    <input type="text" name="address" value="<?php echo  $_SESSION["address"]?>"  ">
                    <br>
                    <label> Update Post Code</label>
                    <input type="text" name="post_code" value="<?php echo  $_SESSION["post_code"]?>"  ">
                    <br>
                    <label> Update Phone Number</label>
                    <input type="text" name="phone_number" value="<?php echo  $_SESSION["phone_number"]?>"  ">
                    <br>
                    <button type="submit" name = "update"> Update</button>
                </div>
                </center>
            </td>
        </tr>
    </table>
</form>
</body>
<?php
include ("footer.php");
?>


</html>

<?php
if(isset($_POST['update'])){
    $email = $_POST['email'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $country = $_POST['country'];
    $address = $_POST['address'];
    $post_code = $_POST['post_code'];
    $phone_number = $_POST['phone_number'];
    $id = $_SESSION['id'];


    $pdoQuery = "UPDATE users SET email = :email, first_name = :first_name, last_name = :last_name, 
                 country = :country, address = :address, post_code = :post_code, phone_number = :phone_number WHERE id= :id";
    $pdoQuery_run = $conn->prepare($pdoQuery);
    $pdoQuery_execute = $pdoQuery_run->execute(array(":email"=>$email, ":first_name"=>$first_name, ":last_name"=>$last_name,
        ":country"=>$country, ":address"=>$address, ":post_code"=>$post_code, ":phone_number"=>$phone_number, ":id"=>$id));

    if($pdoQuery_execute){
        echo '<script>alert("Profile Updated!") </script>';
        header("Refresh:0, url=index.php");
    }else{
        echo '<script>alert("Profile NOT Updated!") </script>';
    }


}



?>
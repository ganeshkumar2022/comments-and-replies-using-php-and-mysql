<?php
if(isset($_POST["add_comment"]))
{
    $name=$_POST["name"];
    $email=$_POST["email"];
    $comment=$_POST["comments"];

    include("db.php");
    $sql="insert into comments (name,email,comment,post_id,reply_of) values ('$name','$email','$comment',3,0)";
    if(mysqli_query($con,$sql))
    {
      setcookie("success","comments added successfully.",time()+3,"/");
      header("Location:index.php");
    }
    else
    {
        setcookie("error","Error to add comments.",time()+3,"/");
        header("Location:index.php");
    }

}
if(isset($_POST["reply_comment"]))
{
    $name=$_POST["name"];
    $email=$_POST["email"];
    $comment=$_POST["comments"];
    $reply_of=(int)$_POST["reply_of"];
    include("db.php");
    $sql="insert into comments (name,email,comment,post_id,reply_of) values ('$name','$email','$comment',3,$reply_of)";
    if(mysqli_query($con,$sql))
    {
      setcookie("success","Reply added successfully.",time()+3,"/");
      header("Location:index.php");
    }
    else
    {
        setcookie("error","Error to add Reply.",time()+3,"/");
        header("Location:index.php");
    }

}
?>
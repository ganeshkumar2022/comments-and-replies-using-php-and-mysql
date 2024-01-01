<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comments system</title>
    
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="style.css">
<style>
.media
{
    border:none;
}
</style>
</head>
<body>
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-12">
            <h3 class="font-weight-bold mt-3 mb-4 text-center text-primary">New horror Movies 2023</h3>
            <img src="images/horror.jpg" style="height:200px;width:350px;" class="float-left mr-4">
            <p class="text-justify">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint molestias illo cumque, aliquam alias velit corrupti atque, asperiores quam veritatis et! Consectetur totam ipsa est aliquam tempore ad tempora maiores dolore deserunt illum iste odio recusandae sequi commodi reiciendis, natus adipisci, aperiam nostrum eum laudantium quaerat eaque dignissimos. Exercitationem iste possimus labore cum molestiae facere sapiente ratione libero, eum velit, voluptatibus ut ea tempora modi odit? Incidunt, debitis? Asperiores sapiente pariatur maxime facilis tempora dolore sunt illo, eius nisi doloribus consequatur sed enim, reprehenderit iusto? Optio ipsa dolor ipsam quasi, tempore eos perferendis repellat facilis sunt sequi placeat doloremque neque nesciunt dolorum quod omnis. Voluptas dolore facilis deserunt dolor repudiandae dolorem alias repellat, tempore veniam quasi eius eveniet eos, atque optio animi inventore esse nobis ipsum aliquam numquam! Velit sequi nostrum delectus, sunt dolorum at, possimus, vero quos odit id cupiditate magni obcaecati amet iure ea non fugit tenetur enim perferendis? Cum eos molestias eius accusamus ratione, similique dolorum! Quo maiores animi facilis sapiente omnis molestiae hic perferendis eligendi accusantium dicta dolorum iure adipisci reprehenderit incidunt, ut est praesentium facere corporis ipsum cumque repellendus sit exercitationem unde quisquam. Magnam sint cumque in ratione perspiciatis totam quas officia consectetur perferendis vel.
            </p>
            <br>
            <p class="text-justify">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint molestias illo cumque, aliquam alias velit corrupti atque, asperiores quam veritatis et! Consectetur totam ipsa est aliquam tempore ad tempora maiores dolore deserunt illum iste odio recusandae sequi commodi reiciendis, natus adipisci, aperiam nostrum eum laudantium quaerat eaque dignissimos. Exercitationem iste possimus labore cum molestiae facere sapiente ratione libero, eum velit, voluptatibus ut ea tempora modi odit? Incidunt, debitis? Asperiores sapiente pariatur maxime facilis tempora dolore sunt illo, eius nisi doloribus consequatur sed enim, reprehenderit iusto? Optio ipsa dolor ipsam quasi, tempore eos perferendis repellat facilis sunt sequi placeat doloremque neque nesciunt dolorum quod omnis. Voluptas dolore facilis deserunt dolor repudiandae dolorem alias repellat, tempore veniam quasi eius eveniet eos, atque optio animi inventore esse nobis ipsum aliquam numquam! Velit sequi nostrum delectus, sunt dolorum at, possimus, vero quos odit id cupiditate magni obcaecati amet iure ea non fugit tenetur enim perferendis? Cum eos molestias eius accusamus ratione, similique dolorum! Quo maiores animi facilis sapiente omnis molestiae hic perferendis eligendi accusantium dicta dolorum iure adipisci reprehenderit incidunt, ut est praesentium facere corporis ipsum cumque repellendus sit exercitationem unde quisquam. Magnam sint cumque in ratione perspiciatis totam quas officia consectetur perferendis vel.
            </p>
            <div class="row">
                <div class="col-md-6">
                    <hr>
<div class="">
<?php
include("db.php");
$sql2="select count(*) as total from comments where reply_of=0";
$result2=mysqli_query($con,$sql2);
$row2=mysqli_fetch_assoc($result2);
$sql3="select * from comments where reply_of=0";
$result3=mysqli_query($con,$sql3);
?>
    <h4 class="text-primary"><i class="fa-solid fa-comments"></i> <?=$row2['total']?> Comments</h4>
    <?php
    if(mysqli_num_rows($result3)>0)
    {
         $mla=1;
        while($row3=mysqli_fetch_assoc($result3))
        {
           
            $time=strtotime($row3["created_at"]);
            $d=date("d");
            $m=date("m");
            $year=date("Y");
            $mk=["January","February","March","April","May","June","July","August","September","October","November","December"];
            $m=$mk[$m-1];
            ?>
            <div class="media border p-3 mb-1">
            <img src="images/avatar.png" alt="John Doe" class="mr-3 mt-3 rounded-circle" style="width:50px;">
            <div class="media-body">
                <h6><?=$row3["name"]?><small class="float-right"><i>Posted on <?=$m." $d, $year"?></small></h6>
                <p><?=$row3["comment"]?></p>
                <span class="float-right text-primary reply-btn" onclick="fun(<?=$row3['id']?>)"><i class="fa-solid fa-reply"></i> reply</span>
            </div>
            </div>
            <div class="pis<?=$row3['id']?>"></div>
            <?php
            $sql4="select * from comments where reply_of=".$row3["id"];
            $result4=mysqli_query($con,$sql4);
            
            if(mysqli_num_rows($result4)>0)
            {
                $ij=0;
                ?>
                
                <?php
                while($row4=mysqli_fetch_assoc($result4))
                {
                $time=strtotime($row4["created_at"]);
                $d=date("d");
                $m=date("m");
                $year=date("Y");
                $mk=["January","February","March","April","May","June","July","August","September","October","November","December"];
                $m=$mk[$m-1];
               
                ?>
                
                 <div class="media sdfg<?=$mla?> border samhj p-3 mb-1" style="margin-left:100px;">
            <img src="images/avatar.png" alt="John Doe" class="mr-3 mt-3 rounded-circle" style="width:50px;">
            <div class="media-body">
                <h6><?=$row4["name"]?><small class="float-right"><i>Posted on <?=$m." $d, $year"?></small></h6>
                <p><?=$row4["comment"]?></p>
                <?php
                $name=$row4["name"];
                $id=$row4["id"];
                $pid=$row3["id"];
                ?>
                <span class="float-right text-primary reply-btn" onclick="fun2('<?=$name?>',<?=$id?>,<?=$pid?>)"><i class="fa-solid fa-reply"></i> reply</span>
            </div>
            </div>
            <div class="pis<?=$row4['id']?>"></div>
                <?php
                 $ij++;
                }
                if($ij==1)
                {
                    ?>
                    <a class="seema" onclick='fun5(".sdfg<?=$mla?>")'><?=$ij?> reply</a>
                    <?php
                }
                else if($ij>1)
                {
                ?>
                <a class="seema" onclick='fun5(".sdfg<?=$mla?>")'><?=$ij?> replies</a>
                <?php
                }
            }
            
            ?>
            
            <?php
             $mla++;
        }
       
    }
    ?>
    </div>
    <hr>

<?php
if(isset($_COOKIE["success"]))
{
    ?>
    <div class="alert alert-success alert-dismissible">
<button type="button" class="close" data-dismiss="alert">&times;</button>
<strong>Success!</strong> <?=$_COOKIE["success"]?>
</div>
    <?php
}
if(isset($_COOKIE["error"]))
{
    ?>
    <div class="alert alert-danger alert-dismissible">
<button type="button" class="close" data-dismiss="alert">&times;</button>
<strong>danger!</strong> <?=$_COOKIE["error"]?>
</div>
    <?php
}

?>
                    <h4 class="text-primary">Leave a comment</h4>
                    <form method="post" autocomplete="off" action="verify.php">
                    <div class="form-row">
                        <div class="col">
                        <label>Name</label>
                        <input type="text" class="form-control" required id="email" placeholder="Enter name" name="name">
                        </div>
                        <div class="col">
                        <label>Email</label>
                        <input type="email" class="form-control" required placeholder="Enter email" name="email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="comment">Comments:</label>
                        <textarea class="form-control" rows="5" name="comments" required id="comment"></textarea>
                    </div>
                    <input type="submit" class="btn btn-primary" name="add_comment" value="Post comment">

                    </form>
                </div>
            </div>
            </div>
        </div>
    </div>
<!-- reply comment -->
<div class="reply-form" style="display:none;">
<form method="post" autocomplete="off" action="verify.php">
    <div class="form-row">
    <div class="col">
    <label>Name</label>
     <input type="text" class="form-control" required id="email" placeholder="Enter name" name="name">
    </div>
    <div class="col">
    <label>Email</label>
    <input type="email" class="form-control" required placeholder="Enter email" name="email">
    </div>
    </div>
    <input type="hidden" value="" class="reply_of" name="reply_of" >
    <div class="form-group">
    <label for="comment">Comments:</label>
    <textarea class="form-control" rows="5" name="comments" required id="mycomment"></textarea>
    </div>
    <input type="submit" class="btn btn-primary" name="reply_comment" value="Reply">

</form>
</div>

<script>
    $(document).ready(function()
    {
        $(".samhj").hide();
    });
    function fun(a)
    {
       var b=$(".reply-form").html();
       $(".pis"+a).html(b);
       $(".reply_of").val(a);
    }

    function fun2(name,a,pid)
    {
       var b=$(".reply-form").html();
       $(".pis"+a).html(b);
       $(".reply_of").val(pid);
       $("#mycomment").val("@"+name);
    }
    function fun5(a)
    {
        $(a).toggle();
    }
</script>
</body>
</html>
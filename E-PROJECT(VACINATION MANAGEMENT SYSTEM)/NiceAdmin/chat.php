<?php
include('header.php');
include('config2.php');
$query = mysqli_query($connection, "
select father_name as user,user_image,parent_id,'parents' as source from parents union 
select user_name as user , user_image,hospital_id,'hospital'as source from hospital");

    ?>
<main id="main" class="main">
    <div class="row">
        <div class="col-4">

            <?php
            while ($data = mysqli_fetch_assoc($query)) {
                ?>
                <a href="chat.php?<?php 
                if($data['source']=='parents'){
                    echo 'parent_id';
                }elseif($data['source']=='hospital'){
                    echo 'hospital_id' ;                  
                }
                ?>=<?php echo $data['parent_id']?>">
                    <div class="container_user d-flex align-items-center">
                    <div class="img">
                        <img  id="omg_i" src="image/<?php echo $data['user_image']?>" alt="">
                    </div>
                    <div class="name">
                        <span><?php echo $data['user']?></span> <br>
                        <span>
                            <?php $chk_msg=mysqli_query($connection,"select count(*) from p_messages");
                            if (mysqli_num_rows($chk_msg)>0) {
                                echo "no chat found";
                            }else {
                                echo "...";
                            }
                            ?>
                        </span>
                    </div>
                </div>
                </a>
                <?php
            }
            ?>
        </div>
        <div class="col-8">
            
        </div>
    </div>
</main>
<?php
include('footer.php');
?>
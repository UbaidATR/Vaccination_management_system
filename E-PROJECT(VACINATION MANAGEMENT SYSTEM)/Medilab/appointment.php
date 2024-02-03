<?php
include("header.php");
$query_v = mysqli_query($connection, "select * from vaccination");
$query_s = mysqli_query($connection, "select * from vaccine_status");
$query_h = mysqli_query($connection, "select * from hospital");
$id = $_SESSION['parent'];
if (isset($_POST['appointment'])) {
    $hos = $_POST['hospital'];
    $vacc = $_POST['vaccination'];
    $date = $_POST['date'];
    $email = $_POST['email'];
    $query = mysqli_query($connection, "INSERT INTO `vaccinations_system`.`appointments` (`parent_id`, `hospital_id`, `vaccination_id`, `date`, `booked_by`)
 VALUES ('$id', '$hos', '$vacc', '$date', '$email');");
}
; 
$query_chk = mysqli_query($connection, "select * from appointments where parent_id = '$id' and status='pending'");
$query_chk_d= mysqli_query($connection, "select * from appointments where parent_id = '$id' and status='active'");


?>
<!-- ======= Appointment Section ======= -->
<section id="appointment" class="appointment section-bg mt-5">
    <div class="container mt-4">

        <div class="section-title">
            <h2>Make an Appointment</h2>
            <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint
                consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat
                sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <?php
        if ($data_chk_h=mysqli_fetch_assoc($query_chk_d)) {
            ?>
            <div class="mb-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your appointment request has been proven successfully. check your email " <?php echo $data_chk_h['booked_by']?> " Thank you!</div>
            </div>
            <?php
        }
        elseif (mysqli_num_rows($query_chk) > 0) {
            ?>
            <div class="mb-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your appointment request has been sent successfully. Thank you!</div>
            </div>
            <?php
        } else {
            ?>
            <form action="" method="post" role="form" class="">
                <div class="row align-items-baseline">

                    <div class="col-md-4 form-group mt-3 mt-md-0">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Your Email"
                            data-rule="email" data-msg="Please enter a valid email">
                        <div class="validate"></div>
                    </div>

                    <div class="col-md-4 form-group mt-3">
                        <input type="datetime" name="date" class="form-control datepicker" id="date"
                            placeholder="Appointment Date" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                        <div class="validate"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 form-group mt-3">
                        <select name="hospital" id="department" class="form-select">
                            <?php
                            while ($data_h = mysqli_fetch_assoc($query_h)) {
                                ?>
                                <option value="<?php echo $data_h['hospital_id'] ?>">
                                    <?php echo $data_h['user_name'] ?>
                                </option>
                                <?php
                            }
                            ?>
                        </select>
                        <div class="validate"></div>
                    </div>
                    <div class="col-md-4 form-group mt-3">
                        <select name="vaccination" id="doctor" class="form-select">
                            <?php
                            while ($data_v = mysqli_fetch_assoc($query_v)) {
                                ?>
                                <option value="<?php echo $data_v['vaccination_id'] ?>">
                                    <?php echo $data_v['vaccination_name'] ?>
                                </option>
                                <?php
                            }
                            ?>
                        </select>
                        <div class="validate"></div>
                    </div>
                </div>

                <!-- <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message (Optional)"></textarea>
                <div class="validate"></div>
            </div>
             -->
                <div class="text-center"><button class="btn btn-info mt-2" type="submit" name="appointment">Make an
                        Appointment</button></div>
            </form>
            <?php
        }
        ?>


    </div>
</section><!-- End Appointment Section -->

<?php
include("footer.php");
?>
<?php
include('config2.php');
include('header.php');
$query = mysqli_query($connection, "select * from hospital where status ='active'");
if (isset($_SESSION['hospital_confrimation'])) {
    echo "<script>alert('The Hospital has been added!');</script>";
    unset($_SESSION['hospital_confrimation']); // Clear the session message
}
?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Hospitals Info</li>
            </ol>
        </nav>
    </div>
    <div style="overflow:scroll;height:60vh;" class="pb-5 p-3">
        <table style="width:100vw" class="table table-striped table-bordered mx-auto">
            <thead>
                <h1 class="text-center">Hospitals List</h1>
                <tr>
                    <th>user_name</th>
                    <th>user_password</th>
                    <th>hospital_location</th>
                    <th>hospital_number</th>
                    <th>number_of_departments</th>
                    <th>user_image</th>
                    <th>user_email</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($data_h = mysqli_fetch_assoc($query)) {
                    ?>
                    <tr>
                        <td>
                            <?php echo $data_h['user_name'] ?>
                        </td>
                        <td>
                            <?php echo $data_h['user_password'] ?>
                        </td>
                        <td>
                            <?php echo $data_h['hospital_location'] ?>
                        </td>
                        <td>
                            <?php echo $data_h['hospital_number'] ?>
                        </td>
                        <td>
                            <?php echo $data_h['number_of_departments'] ?>
                        </td>
                        <td>
                            <?php echo $data_h['user_image'] ?>
                        </td>
                        <td>
                            <?php echo $data_h['user_email'] ?>
                        </td>
                        <td>
                            <a <?php $_SESSION['edit_token'] = "ok" ?>
                                href="edit_hospitals.php?id=<?php echo $data_h['hospital_id'] ?>">Edit .</a>

                        </td>
                        <td>
                            <a class="text-danger" class="del_btn_h" id="<?php echo $data_h['hospital_id']?>" data-bs-toggle="modal" data-bs-target="#delete">
                                delete
                            </a>
                            <div class="modal fade" id="delete" data-bs-backdrop="static" data-bs-keyboard="false"
                                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Delete</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            are you sure to want the hospital.?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <a type="button" href="del_hospital.php?id" id="del_btn_h"
                                                class="btn btn-primary">Delete</a>
                                        </div>
                                        <script>
                                            $('.del_btn_h').click(function () {
                                                $("del_btn_h").attr('href','del_hospital.php?id='+this.id);
                                            })
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
        <!-- Button trigger modal -->
    </div>
    <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        Add More Hospitals
    </button>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Add Hospitals</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="add_hospital.php" method="post" class="form-control">
                        <div class="row mb-3">
                            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Hospital Name</label>
                            <div class="col-md-8 col-lg-9">
                                <input name="hospital" type="text" class="form-control" id="fullName">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">User Passwrod</label>
                            <div class="col-md-8 col-lg-9">
                                <input name="password" type="password" class="form-control" id="fullName">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="company" class="col-md-4 col-lg-3 col-form-label">hospital location</label>
                            <div class="col-md-8 col-lg-9">
                                <input name="h_l" type="text" class="form-control" id="company">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="Job" class="col-md-4 col-lg-3 col-form-label">No_Of Deapartments</label>
                            <div class="col-md-8 col-lg-9">
                                <input name="N_O_F" type="number" class="form-control" id="Job">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="Country" class="col-md-4 col-lg-3 col-form-label">Contact Number</label>
                            <div class="col-md-8 col-lg-9">
                                <input name="Contact" type="tel" class="form-control" id="Country">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                            <div class="col-md-8 col-lg-9">
                                <input name="email" type="email" class="form-control" id="Email">
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Add hospital</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
include('footer.php')
    ?>
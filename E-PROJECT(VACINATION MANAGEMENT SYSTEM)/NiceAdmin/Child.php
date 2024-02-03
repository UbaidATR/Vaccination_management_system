<?php
include('header.php');
include('config2.php');
$query = mysqli_query($connection, "SELECT p.parent_id, p.hospital_id, p.kid_name, p.father_name, p.date_of_birth, p.gender, p.cnic_no, p.email, p.vaccination_id,
p.created_at ,p.vaccination_id ,p.status_id,v.vaccination_name,vs.status_name, h.user_name as h_name
FROM parents p
JOIN hospital h ON p.hospital_id = h.hospital_id
JOIN vaccine_status vs ON p.status_id = vs.status_id
JOIN vaccination v on p.vaccination_id=v.vaccination_id
ORDER BY p.parent_id;
");
?>
<main style="height:80vh" id="main" class="main">
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Child Info</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <div id="table_div" style="overflow:scroll;height:60vh;">

        <table style="width:110vw;height:40vh;" class="table table-striped table-bordered table_v">
            <thead class="bg-dark text-white">
                <tr>
                    <th>Kid name</th>
                    <th>father Name</th>
                    <th>Hospital</th>
                    <th>D-O-B</th>
                    <th>Gender</th>
                    <th>Cnin_No</th>
                    <th>Email</th>
                    <th>Vaccination for</th>
                    <th>vaccination Status</th>
                    <th>Register Date</th>
                    <th>Edit record</th>
                    <th>Delete record</th>

                </tr>
            </thead>
            <tbody>
                <?php
                while ($data = mysqli_fetch_assoc($query)) {
                    ?>
                    <tr class="tr">
                        <td>
                            <?php echo $data['kid_name'] ?>
                        </td>
                        <td>
                            <?php echo $data['father_name'] ?>
                        </td>
                        <td>
                            <?php echo $data['h_name'] ?>
                        </td>
                        <td>
                            <?php echo $data['date_of_birth'] ?>
                        </td>
                        <td>
                            <?php echo $data['gender'] ?>
                        </td>
                        <td>
                            <?php echo $data['cnic_no'] ?>
                        </td>
                        <td>
                            <?php echo $data['email'] ?>
                        </td>
                        <td>
                            <?php echo $data['vaccination_name'] ?>
                        </td>
                        <td class="td">
                            <?php echo $data['status_name'] ?>
                        </td>
                        <td>
                            <?php echo $data['created_at'] ?>
                        </td>
                        <td>
                            <a class="text-primary"
                                href="edit_record.php?id=<?php echo $data['parent_id'] ?>">Edit_Record</a>
                        </td>
                        <td>
                            <a type="button" class="text-danger text-bold del_record" id="<?php echo $data['parent_id'] ?>"
                                data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Delete_record
                            </a>
                        </td>

                    </tr>
                    <?php
                }
                ?>
            </tbody>
            <script>
                document.addEventListener("DOMContentLoaded", function () {
                    const tdElements = document.querySelectorAll(".td"); // Select elements with class "td"
                    for (const td of tdElements) {
                        console.log(td);
                        const textContent = td.innerText; // Get text content and trim whitespace

                        switch (textContent) {
                            case "Vaccinated":
                                td.classList.add("text-success");
                                break;
                            case "Not Vaccinated":
                                td.classList.add("text-danger");
                                break;
                            case "Missed":
                                td.classList.add("text-warning");
                                break;
                        }
                    }
                });


            </script>
        </table>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete_record</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    the data you'll delete will never be restored..!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a type="button" href="del_record.php" id="del_record" class="btn btn-danger">Delete</a>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('.del_record').click(function () {
            $('#del_record').attr('href', 'del_record.php?id=' + this.id);
        })
    </script>
</main>
<?php
include('footer.php');
?>
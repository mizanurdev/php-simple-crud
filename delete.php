<?php include_once ('layouts/header.php'); ?>
<?php require_once ('database/config.php'); ?>
<div class="table-responsive">
    <h3 class="text-dark text-center pb-3"><b>Delete Admission Data</b></h3>
    <table class="table table-bordered border-success" style="font-size: 14px">
        <thead>
            <tr>
                <th>SL</th>
                <th>Action</th>
                <th>Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Course</th>
                <th>Fee</th>
                <th>City</th>
                <th>Gender</th>
                <th>Birthday</th>
                <th>Social</th>
                <th>Photo</th>
                <th>Certificate</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM admissions";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $sl = 1;
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $sl++ . "</td>";
                    echo "<td>
                            <a href='deleteSave.php?id=" . $row['id'] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure you want to delete this item?\");'><i class='fa fa-trash'></i></a>
                          </td>";
                    echo "<td>" . htmlspecialchars($row['fullname']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['username']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['phone']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['courseChoice']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['courseFee']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['city']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['gender']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['dob']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['socialUrl']) . "</td>";
                    echo "<td><img src='" . htmlspecialchars($row['image']) . "' alt='Photo' width='50' height='50'></td>";
                    echo "<td>";
                    $certificates = explode(',', $row['certificates']);
                    foreach ($certificates as $certificate) {
                        echo "<a href='" . htmlspecialchars($certificate) . "' target='_blank'>View</a><br>";
                    }
                    echo "</td>";
                    echo "<td>" . htmlspecialchars($row['description']) . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='15' class='text-center'>No records found</td></tr>";
            }

            $conn->close();
            ?>
        </tbody>
    </table>
</div>
<?php include_once ('layouts/footer.php'); ?>
<?php
// Connect to the database
require_once "data.php";

// Define the correct password
$correctPassword = "JoniRoine1";

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["add-achievement"])) {
    // Check if the correct password is provided
    $enteredPassword = $_POST["password"];

    if ($enteredPassword === $correctPassword) {
        // Password is correct, proceed with data insertion
        $courseName = $_POST["course-name"];
        $part = $_POST["part"];
        $exercises = $_POST["exercises"];
        $projects = $_POST["projects"];
        $projectLink = $_POST["project-link"];
        $date = $_POST["date"];

        // Insert data into the database
        $sql = "INSERT INTO courses (CourseName, Part, Exercises, Projects, `Project Link`, Date) 
                VALUES (:courseName, :part, :exercises, :projects, :projectLink, :date)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            "courseName" => $courseName,
            "part" => $part,
            "exercises" => $exercises,
            "projects" => $projects,
            "projectLink" => $projectLink,
            "date" => $date
        ]);

        // Display a JavaScript alert for successful data transfer
        echo '<script>alert("Data transferred successfully!");</script>';
        
        header("Location: index.php");
        exit(); // Ensure that the script stops here to avoid further execution
    } else {
        // Password is incorrect, display a popup message
        echo '<script>alert("Wrong password. To add content, you need a password.");</script>';
    }
}
?>

<?php require_once 'header.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Joni Roine</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="container-fluid border 1px border-gray rounded mt-2">
        <div class="row header text-center text-white bg-info m-2 rounded">
            <h3>Courses Completed</h3>
        </div>

        <div class="row">
            <!-- Form on the left -->
            <div class="col-md-4">
                <form method="POST" action="">

                    <div class="mb-3">
                        <label for="course-name" class="form-label">Course Name</label>
                        <input type="text" class="form-control" id="course-name" name="course-name" required>
                    </div>
                    <div class="mb-3">
                        <label for="part" class="form-label">Part</label>
                        <input type="text" class="form-control" id="part" name="part" required>
                    </div>
                    <div class="mb-3">
                        <label for="exercises" class="form-label">Exercises</label>
                        <input type="text" class="form-control" id="exercises" name="exercises" required>
                    </div>
                    <div class="mb-3">
                        <label for="projects" class="form-label">Projects</label>
                        <input type="text" class="form-control" id="projects" name="projects" required>
                    </div>
                    <div class="mb-3">
                        <label for="project-link" class="form-label">Project Link</label>
                        <input type="text" class="form-control" id="project-link" name="project-link">
                    </div>
                    <div class="mb-3">
                        <label for="date" class="form-label">Date</label>
                        <input type="date" class="form-control" id="date" name="date" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-info" name="add-achievement">Submit</button>
                </form>
            </div>

            <!-- Displayed data on the right -->
            <div class="col-md-8" style="max-height: 600px; overflow-y: auto;">
                <div class="course-container">
                    <table class="table table-striped course-table">
                        <thead>
                            <tr>
                                <th>Course Name</th>
                                <th>Part</th>
                                <th>Exercises</th>
                                <th>Projects</th>
                                <th>Project Link</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody class="course-table-body">
                            <?php
                            // Fetch data from the database
                            $stmt = $pdo->prepare("SELECT * FROM courses");
                            $stmt->execute();
                            $courses = $stmt->fetchAll(PDO::FETCH_ASSOC);

                            foreach ($courses as $course) {
                                echo '<tr>';
                                echo '<td>' . $course['CourseName'] . '</td>';
                                echo '<td>' . $course['Part'] . '</td>';
                                echo '<td>' . $course['Exercises'] . '</td>';
                                echo '<td>' . $course['Projects'] . '</td>';
                                echo '<td>';

                                // Check if there's a project link
                                if (!empty($course['Project Link'])) {
                                    // Displaying a link icon or text
                                    echo '<a href="' . $course['Project Link'] . '" target="_blank">';
                                    echo '<i class="fa fa-external-link" aria-hidden="true"></i>'; // Assuming you're using Font Awesome for icons
                                    // Or if you want to display a text like "Link"
                                    // echo 'Link';
                                    echo '</a>';
                                } else {
                                    echo 'N/A';
                                }
                                echo '</td>';
                                echo '<td>' . $course['Date'] . '</td>';
                                echo '</tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="javascript/search.js"></script>
</body>

</html>

<?php require_once 'footer.php'; ?>
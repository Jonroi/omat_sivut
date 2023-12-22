<?php
// Connect to the database
require_once "data.php";

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["add-achievement"])) {
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

    // Display a JavaScript alert
    echo '<script>alert("Data transferred successfully!");</script>';
    
    header("Location: index.php");
    
    exit(); // Ensure that the script stops here to avoid further execution
}
?>
<?php require_once 'header.php'; ?>
<?php require_once 'cards.php'; ?>


<!-- COURSE FORM -->
<html>

<head>
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
                    <button type="submit" class="btn btn-info" name="add-achievement">Submit</button>
                </form>
            </div>

            <!-- Displayed data on the right -->
            <div class="col-md-8" style="max-height: 600px; overflow-y: auto;">
                <table class="table table-striped">
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

                    <tbody>
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

<?php require_once 'footer.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Joni Roine</title>
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</head>

<body class="me-5 ms-5 bg-light">
    <!-- NAVBAR -->
    <nav class="navbar text-align-center navbar-expand-md p-5 rounded-bottom"
        style="background-image: url('images/lunar.png');background-size: cover;">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <!-- HOME button -->
                    <li class="nav-item ps-3 pt-2">
                        <a class="nav-link btn btn-outline-info text-white border border-white rounded"
                            href="index.php">HOME</a>
                    </li>
                    <!-- CONTACT button -->
                    <li class="nav-item pt-2">
                        <a class="nav-link btn btn-outline-info text-white border border-white rounded ms-3"
                            href="#contact-section">CONTACT</a>
                    </li>
                    <!-- WORKBOOK button -->
                    <li class="nav-item pt-2">
                        <a class="nav-link btn btn-outline-info text-white border border-white rounded ms-3"
                            href="workbook.php">WORKBOOK</a>
                    </li>
                </ul>
                <!-- Search bar -->
                <form class="d-flex ps-3 pt-2">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-info text-white border border-white rounded"
                        type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <script src="javascript/search.js"></script>
    <script src="js/contactScroll.js"></script>
</body>

</html>
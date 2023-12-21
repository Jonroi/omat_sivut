<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Joni Roine</title>
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body class="me-5 ms-5 bg-light">
    <!-- NAVBAR -->

    <nav class="navbar text-align-center navbar-expand-lg p-5 rounded-bottom"
        style="background-image: url('images/lunar.png');background-size: cover;">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <!-- Move the HOME button list item to the left -->
                    <li class="nav-item">
                        <a class="nav-link active text-white border border-white rounded" aria-current="page"
                            href="index.php">HOME</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <!-- Place search input and button to the right -->
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-info" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <div id="search-results"></div>

    <script src="javascript/search.js"></script>
</body>

</html>
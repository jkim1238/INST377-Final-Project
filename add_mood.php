<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Link to Bootstrap 5.1.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Link to main CSS file -->
    <link rel="stylesheet" href="css/main.css">

    <!-- Link to JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Link to Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <title>Moods</title>
</head>
<body>
    <h1 id="moods-header"><strong>Moods</strong></h1>

    <div class="container-fluid container-xxl bg-light">
        <nav class="navbar navbar-expand-xxl bg-dark navbar-dark fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">My Spotify Library</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Songs</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="view_songs.php">View</a></li>
                                <li><a class="dropdown-item" href="add_song.php">Add</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Artists</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="view_artists.php">View</a></li>
                                <li><a class="dropdown-item" href="add_artists.php">Add</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Genres</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="view_genres.php">View</a></li>
                                <li><a class="dropdown-item" href="add_genres.php">Add</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown">Moods</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="view_mood.php">View</a></li>
                                <li><a class="dropdown-item" href="add_mood.php">Add</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <h2>Add Moods</h2>

        <?php
            if (isset($_POST['name'])) {
                // Establish database connection
                include('mysqli_connect_to_myspotify.php');

                $name = $_POST['name'];
                $description = $_POST['description'];

                // Add the mood to the database.
                // Build the query.
                $query = "
                    INSERT INTO mood (mood_name, mood_description) 
                    VALUES ('$name', '$description')
                ";

                $result = @mysqli_query($dbc, $query); // Run the query.

                if ($result) { // If the query ran OK.

                    // Print a message.
                    echo "
                        <div class='alert alert-success'>
                            <strong>Success!</strong> You have added to the mood table.
                        </div>
                    ";

                    echo "
                        <table class='table table-striped table-hover table-responsive'>
                            <thead>
                                <tr>
                                    <th>Mood Name</th>
                                    <th>Mood Description</th>
                                </tr>
                            </thead>
                            <tbody id='myTable'>
                                <tr>
                                    <td>$name</td>
                                    <td>$description</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class='alert alert-info'>
                            <strong>Info!</strong> You can view the table <a href='view_mood.php'>here</a>.
                        </div>
                    ";
                } else { // If the query did not run OK.
                    echo "
                        <div class='alert alert-warning'>
                            <strong>System Error!</strong> The mood could not be added due to a system error. We apologize for any inconvenience.
                        </div>
                        <div class='alert alert-info'>
                            <strong>Info!</strong> " . mysqli_error($dbc) . "<br /><br />Query: $query
                        </div>
                    "; // Debugging message.
                }

                mysqli_close($dbc); // Close the database connection.
            }
        ?>

        <form action="add_mood.php" method="post" class="was-validated">
            <div class="mb-3 mt-3">
                <label for="Mood Name" class="form-label">Mood Name:</label>
                <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="<?php if (isset($_POST['name'])) echo $_POST['name']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="Mood Description" class="form-label">Mood Description:</label>
                <input type="text" class="form-control" id="description" placeholder="Enter description" name="description" value="<?php if (isset($_POST['description'])) echo $_POST['description']; ?>" required>
            </div>
            <p><button type="submit" class="btn btn-primary">Submit</button></p>
        </form>
    </div>

    <footer class="bg-dark text-white text-center">
        <div class="container">
            <p class="float-right">
                <a href="#moods-header">Back to top</a>
            </p>
            <p class="text-center">© 2021 by Jiin Kim, Campbell Cash, and Nour Fouladi</p>
        </div>
    </footer>
</body>
</html>
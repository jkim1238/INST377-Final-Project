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

    <title>Genres</title>
</head>
<body>
    <h1 id="genres-header"><strong>Genres</strong></h1>

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
                            <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown">Genres</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="view_genres.php">View</a></li>
                                <li><a class="dropdown-item" href="add_genres.php">Add</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Moods</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="view_mood.php">View</a></li>
                                <li><a class="dropdown-item" href="add_mood.php">Add</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <h2>Edit Genres</h2>

        <?php
            // This page edits a genre.

            // Check for a valid mood ID, through GET or POST.
            if ( (isset($_GET['id'])) && (is_numeric($_GET['id'])) ) { // Accessed through view_mood.php
                $id = $_GET['id'];
            } elseif ( (isset($_POST['id'])) && (is_numeric($_POST['id'])) ) { // Form has been submitted.
                $id = $_POST['id'];
            } else { // No valid ID, kill the script.
                echo '
                    <div class="alert alert-warning">
                        <strong>Page Error!</strong> This page has been accessed in error.
                    </div>
                ';
                exit();
            }

            // Establish database connection
            include('mysqli_connect_to_myspotify.php');

            // Check if the form has been submitted.
            if (isset($_POST['genre_name'])) {
                $genre_name = $_POST['genre_name'];
                $description = $_POST['description'];

                // Make the query.
                $query = "
                    UPDATE genre 
                    SET genre_name='$genre_name', 
                        description='$description'
                    WHERE genre_id = $id
                ";

                $result = @mysqli_query ($dbc, $query); // Run the query.

                if ((mysqli_affected_rows($dbc) == 1) || (mysqli_affected_rows($dbc) == 0)) { // If it ran OK.
                    // Print a message.
                    echo '
                        <div class="alert alert-success">
                            <strong>Success!</strong> The genre record has been edited.
                        </div>
                        <table class="table table-striped table-hover table-responsive">
                            <thead>
                                <tr>
                                    <th>Genre Name</th>
                                    <th>Genre Description</th>
                                </tr>
                            </thead>
                            <tbody id="myTable">
                                <tr>
                                    <td>' . $genre_name . '</td>
                                    <td>' . $description . '</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="alert alert-info">
                            <strong>Info!</strong> You can view the table <a href="view_genres.php">here</a>.
                        </div>
                    ';
                } else { // If it did not run OK.
                    echo '
                        <div class="alert alert-warning">
                            The genre could not be edited due to a system error. We apologize for any inconvenience.
                        </div>
                        <div class="alert alert-info">
                            <strong>Info!</strong> " . mysqli_error($dbc) . "<br /><br />Query: $query
                        </div>
                    ';
                    exit();
                }
            } // End of submit conditional.

            // Always show the form.

            // Retrieve the genre's information.
            $query = "
                SELECT genre_name,
                       description
                FROM genre
                WHERE genre_id = $id
            ";

            $result = @mysqli_query ($dbc, $query); // Run the query.

            if (mysqli_num_rows($result) == 1) { // Valid genre ID, show the form.
                // Get the genre's information.
                $row = mysqli_fetch_array ($result);

                // Create the form.
                echo '
                    <form action="edit_genres.php" method="post" class="was-validated">
                        <div class="mb-3 mt-3">
                            <label for="Genre Name" class="form-label">Genre Name:</label>
                            <input type="text" class="form-control" id="genre_name" placeholder="Enter name" name="genre_name" value="' . $row[0] . '" required>
                        </div>
                        <div class="mb-3">
                            <label for="Genre Description" class="form-label">Genre Description:</label>
                            <input type="text" class="form-control" id="description" placeholder="Enter description" name="description" value="' . $row[1] . '" required>
                        </div>
                        <input type="hidden" name="id" value="' . $id . '" />
                        <p><button type="submit" class="btn btn-primary">Submit</button></p>
                    </form>
                ';
            } else { // Not a valid genre ID.
                echo '
                    <div class="alert alert-warning">
                        <strong>Page Error!</strong> This page has been accessed in error. Not a valid genre ID.
                    </div>
                ';
            }

            mysqli_close($dbc); // Close the database connection.
        ?>
    </div>

    <footer class="bg-dark text-white text-center">
        <div class="container">
            <p class="float-right">
                <a href="#genres-header">Back to top</a>
            </p>
            <p class="text-center">© 2021 by Jiin Kim, Campbell Cash, and Nour Fouladi</p>
        </div>
    </footer>
</body>
</html>
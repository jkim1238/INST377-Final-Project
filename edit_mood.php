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

        <h2>Edit Moods</h2>

        <?php
            // This page edits a mood.

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
            if (isset($_POST['mood_name'])) {
                $mood_name = $_POST['mood_name'];
                $mood_description = $_POST['mood_description'];

                // Make the query.
                $query = "
                    UPDATE mood 
                    SET mood_name='$mood_name', 
                        mood_description='$mood_description'
                    WHERE mood_id = $id
                ";

                $result = @mysqli_query ($dbc, $query); // Run the query.

                if ((mysqli_affected_rows($dbc) == 1) || (mysqli_affected_rows($dbc) == 0)) { // If it ran OK.
                    // Print a message.
                    echo '
                        <div class="alert alert-success">
                            <strong>Success!</strong> The mood record has been edited.
                        </div>
                        <table class="table table-striped table-hover table-responsive">
                            <thead>
                                <tr>
                                    <th>Mood Name</th>
                                    <th>Mood Description</th>
                                </tr>
                            </thead>
                            <tbody id="myTable">
                                <tr>
                                    <td>' . $mood_name . '</td>
                                    <td>' . $mood_description . '</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="alert alert-info">
                            <strong>Info!</strong> You can view the table <a href="view_mood.php">here</a>.
                        </div>
                    ';
                } else { // If it did not run OK.
                    echo '
                        <div class="alert alert-warning">
                            The mood could not be edited due to a system error. We apologize for any inconvenience.
                        </div>
                        <div class="alert alert-info">
                            <strong>Info!</strong> " . mysqli_error($dbc) . "<br /><br />Query: $query
                        </div>
                    ';
                    exit();
                }
            } // End of submit conditional.

            // Always show the form.

            // Retrieve the mood's information.
            $query = "
                SELECT mood_name,
                       mood_description
                FROM mood 
                WHERE mood_id = $id
            ";

            $result = @mysqli_query ($dbc, $query); // Run the query.

            if (mysqli_num_rows($result) == 1) { // Valid mood ID, show the form.
                // Get the mood's information.
                $row = mysqli_fetch_array ($result);

                // Create the form.
                echo '
                    <form action="edit_mood.php" method="post" class="was-validated">
                        <div class="mb-3 mt-3">
                            <label for="Mood Name" class="form-label">Mood Name:</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter name" name="mood_name" value="' . $row[0] . '" required>
                        </div>
                        <div class="mb-3">
                            <label for="Mood Description" class="form-label">Mood Description:</label>
                            <input type="text" class="form-control" id="description" placeholder="Enter description" name="mood_description" value="' . $row[1] . '" required>
                        </div>
                        <input type="hidden" name="id" value="' . $id . '" />
                        <p><button type="submit" class="btn btn-primary">Submit</button></p>
                    </form>
                ';
            } else { // Not a valid mood ID.
                echo '
                    <div class="alert alert-warning">
                        <strong>Page Error!</strong> This page has been accessed in error. Not a valid mood ID.
                    </div>
                ';
            }

            mysqli_close($dbc); // Close the database connection.
        ?>
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
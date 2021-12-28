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

    <title>Artists</title>
</head>
<body>
    <h1 id="artists-header"><strong>Artists</strong></h1>

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
                            <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown">Artists</a>
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

        <h2>Edit Artists</h2>

        <?php
            // This page edits an artist.

            // Check for a valid artist ID, through GET or POST.
            if ( (isset($_GET['id'])) && (is_numeric($_GET['id'])) ) { // Accessed through view_artists.php
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
            if (isset($_POST['artist_first_name'])) {
                $artist_first_name = $_POST['artist_first_name'];
                $artist_last_name = $_POST['artist_last_name'];
                $gender = $_POST['gender'];
                $age = $_POST['age'];
                $birthday = $_POST['birthday'];
                $net_worth = $_POST['net_worth'];

                // Make the query.
                $query = "
                    UPDATE artists
                    SET artist_first_name='$artist_first_name', 
                        artist_last_name='$artist_last_name',
						gender='$gender',
						age='$age',
						birthday='$birthday',
						net_worth='$net_worth'
                    WHERE artist_id = $id
                ";

                $result = @mysqli_query ($dbc, $query); // Run the query.

                if ((mysqli_affected_rows($dbc) == 1) || (mysqli_affected_rows($dbc) == 0)) { // If it ran OK.
                    // Print a message.
                    echo '
                        <div class="alert alert-success">
                            <strong>Success!</strong> The artist record has been edited.
                        </div>
                        <table class="table table-striped table-hover table-responsive">
                            <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
									<th>Gender</th>
                                    <th>Age</th>
									<th>Birthday</th>
                                    <th>Net Worth</th>
                                </tr>
                            </thead>
                            <tbody id="myTable">
                                <tr>
                                    <td>' . $artist_first_name . '</td>
                                    <td>' . $artist_last_name . '</td>
									<td>' . $gender . '</td>
                                    <td>' . $age . '</td>
									<td>' . $birthday . '</td>
                                    <td>' . $net_worth . '</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="alert alert-info">
                            <strong>Info!</strong> You can view the table <a href="view_artists.php">here</a>.
                        </div>
                    ';
                } else { // If it did not run OK.
                    echo '
                        <div class="alert alert-warning">
                            The artist could not be edited due to a system error. We apologize for any inconvenience.
                        </div>
                        <div class="alert alert-info">
                            <strong>Info!</strong> " . mysqli_error($dbc) . "<br /><br />Query: $query
                        </div>
                    ';
                    exit();
                }
            } // End of submit conditional.

            // Always show the form.

            // Retrieve the artist's information.
            $query = "
                SELECT artist_first_name,
                       artist_last_name,
					   gender,
					   age,
					   birthday,
					   net_worth
                FROM artists 
                WHERE artist_id = $id
            ";

            $result = @mysqli_query ($dbc, $query); // Run the query.

            if (mysqli_num_rows($result) == 1) { // artist ID, show the form.
                // Get the artist's information.
                $row = mysqli_fetch_array ($result);

                // Create the form.
                echo '
                    <form action="edit_artists.php" method="post" class="was-validated">
                        <div class="mb-3 mt-3">
                            <label for="First Name" class="form-label">First Name:</label>
                            <input type="text" class="form-control" id="artist_first_name" placeholder="Enter first name" name="artist_first_name" value="' . $row[0] . '" required>
                        </div>
                        <div class="mb-3">
                            <label for="Last Name" class="form-label">Last Name:</label>
                            <input type="text" class="form-control" id="artist_last_name" placeholder="Enter last name" name="artist_last_name" value="' . $row[1] . '" required>
                        </div>
						<div class="mb-3">
                            <label for="Gender" class="form-label">Gender:</label>
                            <input type="text" class="form-control" id="gender" placeholder="Enter gender" name="gender" value="' . $row[2] . '" required>
                        </div>
						<div class="mb-3">
                            <label for="Age" class="form-label">age:</label>
                            <input type="number" class="form-control" id="age" placeholder="Enter age" name="age" value="' . $row[3] . '" required>
                        </div>
						<div class="mb-3">
                            <label for="Birthday" class="form-label">birthday</label>
                            <input type="date" class="form-control" id="birthday" placeholder="Enter birthday" name="birthday" value="' . $row[4] . '" required>
                        </div>
						<div class="mb-3">
                            <label for="Net Worth" class="form-label">Net Worth:</label>
                            <input type="number" class="form-control" id="net_worth" placeholder="Enter net worth" name="net_worth" value="' . $row[5] . '" required>
                        </div>
                        <input type="hidden" name="id" value="' . $id . '" />
                        <p><button type="submit" class="btn btn-primary">Submit</button></p>
                    </form>
                ';
            } else { // Not a valid artist ID.
                echo '
                    <div class="alert alert-warning">
                        <strong>Page Error!</strong> This page has been accessed in error. Not a valid artist ID.
                    </div>
                ';
            }

            mysqli_close($dbc); // Close the database connection.
        ?>
    </div>

    <footer class="bg-dark text-white text-center">
        <div class="container">
            <p class="float-right">
                <a href="#artists-header">Back to top</a>
            </p>
            <p class="text-center">© 2021 by Jiin Kim, Campbell Cash, and Nour Fouladi</p>
        </div>
    </footer>
</body>
</html>
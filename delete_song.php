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

    <title>Songs</title>
</head>
<body>
    <h1 id="songs-header"><strong>Songs</strong></h1>

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
                            <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown">Songs</a>
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

        <h2>Delete Songs</h2>

        <?php
            // This page deletes a song.
            // This page is accessed through view_songs.php.

            // Check for a valid song ID, through GET or POST.
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
            if (isset($_POST['id'])) {
                if ($_POST['sure'] == 'Yes') { // Delete the record.
                    $query = "
                                DELETE FROM spotify_songs 
                                WHERE track_no = $id
                            ";

                    $result_del = @mysqli_query ($dbc, $query); // Run the query.

                    if (mysqli_affected_rows($dbc) == 1) { // If it ran OK.
                        // Create the result page.
                        echo '
                                    <div class="alert alert-success">
                                        <strong>Success!</strong> The record has been deleted.
                                    </div>
                                    <div class="alert alert-info">
                                        <strong>Info!</strong> You can view the table <a href="view_songs.php">here</a>.
                                    </div>
                                ';
                    } else { // If the query did not run OK.
                        echo '
                                    <div class="alert alert-warning">
                                        <strong>System Error!</strong> The song could not be deleted due to a system error.
                                    </div>
                                    <div class="alert alert-info">
                                        <strong>Info!</strong> " . mysqli_error($dbc) . "<br /><br />Query: $query
                                    </div>
                                '; // Debugging message.
                    }
                } else { // Wasn't sure about deleting the song.
                    echo '
                                <div class="alert alert-warning">
                                    The record has NOT been deleted.
                                </div>
                                <div class="alert alert-info">
                                    <strong>Info!</strong> You can view the table <a href="view_songs.php">here</a>.
                                </div>
                            ';
                }
            } //End of if(isset()) block
            else { // Show the form.
                // Retrieve the song information.
                $query = "
                    SELECT track_no,
                           track_name,
                           length,
                           beats_per_minute,
                           spotify_rank,
                           energy,
                           danceability,
                           loudness,
                           liveness,
                           valence
                    FROM spotify_songs 
                    WHERE track_no = $id
                ";

                $result = @mysqli_query ($dbc, $query); // Run the query.

                if (mysqli_num_rows($result) == 1) { // Valid song ID, show the form.
                    // Get the song information.
                    $row = mysqli_fetch_array ($result);

                    // Create the form.
                    echo '
                                <table class="table table-striped table-hover table-responsive">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Length</th>
                                            <th>BPM</th>
                                            <th>Rank</th>
                                            <th>Energy</th>
                                            <th>Danceability</th>
                                            <th>Loudness</th>
                                            <th>Liveness</th>
                                            <th>Valence</th>
                                        </tr>
                                    </thead>
                                    <tbody id="myTable">
                                        <tr>
                                            <td>' . $row[1] . '</td>
                                            <td>' . $row[2] . '</td>
                                            <td>' . $row[3] . '</td>
                                            <td>' . $row[4] . '</td>
                                            <td>' . $row[5] . '</td>
                                            <td>' . $row[6] . '</td>
                                            <td>' . $row[7] . '</td>
                                            <td>' . $row[8] . '</td>
                                            <td>' . $row[9] . '</td>
                                        </tr>
                                    </tbody>
                                </table>
                                
                                <form action="delete_song.php" method="post">
                                <div class="alert alert-primary">
                                    Are you sure you want to delete this song?
                                </div>
                                
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" id="radio1" name="sure" value="Yes">Yes
                                    <label class="form-check-label" for="radio1"></label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" id="radio2" name="sure" value="No" checked>No
                                    <label class="form-check-label" for="radio2"></label>
                                </div>
                                
                                <p><button type="submit" class="btn btn-primary">Submit</button></p>
                                <input type="hidden" name="id" value="' . $id . '" />
                                </form>
                            ';
                } else { // Not a valid song ID.
                    echo '
                                <div class="alert alert-warning">
                                    <strong>Page Error!</strong> There is no record with the given ID.
                                </div>
                            ';
                }
            } // End of the main Submit conditional.

            mysqli_close($dbc); // Close the database connection.
        ?>
    </div>

    <footer class="bg-dark text-white text-center">
        <div class="container">
            <p class="float-right">
                <a href="#songs-header">Back to top</a>
            </p>
            <p class="text-center">© 2021 by Jiin Kim, Campbell Cash, and Nour Fouladi</p>
        </div>
    </footer>
</body>
</html>
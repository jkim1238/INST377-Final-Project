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

        <h2>Edit Songs</h2>

        <?php
            // This page edits a song.

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
            if (isset($_POST['track_name'])) {
                $track_name = $_POST['track_name'];
                $length = $_POST['length'];
                $beats_per_minute = $_POST['beats_per_minute'];
                $spotify_rank = $_POST['spotify_rank'];
                $energy = $_POST['energy'];
                $danceability = $_POST['danceability'];
                $loudness = $_POST['loudness'];
                $liveness = $_POST['liveness'];
                $valence = $_POST['valence'];

                // Make the query.
                $query = "
                            UPDATE spotify_songs 
                            SET track_name='$track_name', 
                                length='$length',
                                beats_per_minute='$beats_per_minute',
                                spotify_rank='$spotify_rank',
                                energy='$energy',
                                danceability='$danceability',
                                loudness='$loudness',
                                liveness='$liveness',
                                valence='$valence'
                            WHERE track_no = $id
                        ";

                $result = @mysqli_query ($dbc, $query); // Run the query.

                if ((mysqli_affected_rows($dbc) == 1) || (mysqli_affected_rows($dbc) == 0)) { // If it ran OK.
                    // Print a message.
                    echo '
                                <div class="alert alert-success">
                                    <strong>Success!</strong> The song record has been edited.
                                </div>
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
                                            <td>' . $track_name . '</td>
                                            <td>' . $length . '</td>
                                            <td>' . $beats_per_minute . '</td>
                                            <td>' . $spotify_rank . '</td>
                                            <td>' . $energy . '</td>
                                            <td>' . $danceability . '</td>
                                            <td>' . $loudness . '</td>
                                            <td>' . $liveness . '</td>
                                            <td>' . $valence . '</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="alert alert-info">
                                    <strong>Info!</strong> You can view the table <a href="view_songs.php">here</a>.
                                </div>
                            ';
                } else { // If it did not run OK.
                    echo '
                                <div class="alert alert-warning">
                                    The song could not be edited due to a system error. We apologize for any inconvenience.
                                </div>
                                <div class="alert alert-info">
                                    <strong>Info!</strong> " . mysqli_error($dbc) . "<br /><br />Query: $query
                                </div>
                            ';
                    exit();
                }
            } // End of submit conditional.

            // Always show the form.

            // Retrieve the song's information.
            $query = "
                SELECT track_name,
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
                // Get the song's information.
                $row = mysqli_fetch_array ($result);

                // Create the form.
                echo '
                            <form action="edit_song.php" method="post" class="was-validated">
                                <div class="mb-3 mt-3">
                                    <label for="Track Name" class="form-label">Track Name:</label>
                                    <input type="text" class="form-control" id="track_name" placeholder="Enter track name" name="track_name" value="' . $row[0] . '" required>
                                </div>
                                <div class="mb-3">
                                    <label for="Length" class="form-label">Length:</label>
                                    <input type="number" class="form-control" id="length" placeholder="Enter length" name="length" value="' . $row[1] . '" required>
                                </div>
                                <div class="mb-3">
                                    <label for="Beats Per Minute" class="form-label">Beats Per Minute:</label>
                                    <input type="number" class="form-control" id="beats_per_minute" placeholder="Enter beats per minute" name="beats_per_minute" value="' . $row[2] . '" required>
                                </div>
                                <div class="mb-3">
                                    <label for="Spotify Rank" class="form-label">Spotify Rank:</label>
                                    <input type="number" class="form-control" id="spotify_rank" placeholder="Enter Spotify rank" name="spotify_rank" value="' . $row[3] . '" required>
                                </div>
                                <div class="mb-3">
                                    <label for="Energy" class="form-label">Energy:</label>
                                    <input type="number" class="form-control" id="energy" placeholder="Enter energy" name="energy" value="' . $row[4] . '" required>
                                </div>
                                <div class="mb-3">
                                    <label for="Danceability" class="form-label">Danceability:</label>
                                    <input type="number" class="form-control" id="danceability" placeholder="Enter danceability" name="danceability" value="' . $row[5] . '" required>
                                </div>
                                <div class="mb-3">
                                    <label for="Loudness" class="form-label">Loudness:</label>
                                    <input type="number" class="form-control" id="loudness" placeholder="Enter loudness" name="loudness" value="' . $row[6] . '" required>
                                </div>
                                <div class="mb-3">
                                    <label for="Liveness" class="form-label">Liveness:</label>
                                    <input type="number" class="form-control" id="liveness" placeholder="Enter liveness" name="liveness" value="' . $row[7] . '" required>
                                </div>
                                <div class="mb-3">
                                    <label for="Valence" class="form-label">Valence:</label>
                                    <input type="number" class="form-control" id="valence" placeholder="Enter valence" name="valence" value="' . $row[8] . '" required>
                                </div>
                                <input type="hidden" name="id" value="' . $id . '" />
                                <p><button type="submit" class="btn btn-primary">Submit</button></p>
                            </form>
                        ';
            } else { // Not a valid song ID.
                echo '
                            <div class="alert alert-warning">
                                <strong>Page Error!</strong> This page has been accessed in error. Not a valid song ID.
                            </div>
                        ';
            }

            mysqli_close($dbc); // Close the database connection.
        ?>
    </div>

    <footer class="bg-dark text-white text-center">
        <div class="container">
            <p class="float-right">
                <a href="#songs-header">Back to top</a>
            </p>
            <p class="text-center">?? 2021 by Jiin Kim, Campbell Cash, and Nour Fouladi</p>
        </div>
    </footer>
</body>
</html>
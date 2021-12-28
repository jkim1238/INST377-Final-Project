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

        <h2>View Artists</h2>
        <p>Type something in the input field to search the table for an artist:</p>
        <input class="form-control" id="myInput" type="text" placeholder="Search...">

        <?php
            // Establish database connection
            include ('mysqli_connect_to_myspotify.php');

            //define total number of results you want per page
            $results_per_page = 10;

            // Assign the query string to the variable $query
            $query = "
                SELECT *
                FROM artists
            ";

            // Run the query against the connection $dbc
            $result = @mysqli_query ($dbc, $query);

            //find the total number of results stored in the database
            $number_of_result = mysqli_num_rows($result);

            //determine the total number of pages available
            $number_of_page = ceil ($number_of_result / $results_per_page);

            //determine which page number visitor is currently on
            if (!isset ($_GET['page']) ) {
                $current_page = 1;
            } else {
                $current_page = $_GET['page'];
            }

            //determine the sql LIMIT starting number for the results on the displaying page
            $page_first_result = ($current_page-1) * $results_per_page;

            // Default column links.
            $link1 = "{$_SERVER['PHP_SELF']}?sort=f_a";
            $link2 = "{$_SERVER['PHP_SELF']}?sort=l_a";
			$link3 = "{$_SERVER['PHP_SELF']}?sort=g_a";
            $link4 = "{$_SERVER['PHP_SELF']}?sort=a_a";
			$link5 = "{$_SERVER['PHP_SELF']}?sort=b_a";
            $link6 = "{$_SERVER['PHP_SELF']}?sort=n_a";
            // Determine the sorting order.
            if (isset($_GET['sort'])) {

                // Use existing sorting order.
                switch ($_GET['sort']) {
                    case 'f_a':
                        $order_by = 'artist_first_name ASC';
                        $link1 = "{$_SERVER['PHP_SELF']}?sort=f_d";
                        break;
                    case 'f_d':
                        $order_by = 'artist_first_name DESC';
                        $link1 = "{$_SERVER['PHP_SELF']}?sort=f_a";
                        break;
                    case 'l_a':
                        $order_by = 'artist_last_name ASC';
                        $link2 = "{$_SERVER['PHP_SELF']}?sort=l_d";
                        break;
                    case 'l_d':
                        $order_by = 'artist_last_name DESC';
                        $link2 = "{$_SERVER['PHP_SELF']}?sort=l_a";
                        break;
					case 'g_a':
                        $order_by = 'gender ASC';
                        $link3 = "{$_SERVER['PHP_SELF']}?sort=g_d";
                        break;
                    case 'g_d':
                        $order_by = 'gender DESC';
                        $link3 = "{$_SERVER['PHP_SELF']}?sort=g_a";
                        break;
                    case 'a_a':
                        $order_by = 'age ASC';
                        $link4 = "{$_SERVER['PHP_SELF']}?sort=a_d";
                        break;
                    case 'a_d':
                        $order_by = 'age DESC';
                        $link4 = "{$_SERVER['PHP_SELF']}?sort=a_a";
                        break;
					case 'b_a':
                        $order_by = 'birthday ASC';
                        $link5 = "{$_SERVER['PHP_SELF']}?sort=b_d";
                        break;
                    case 'b_d':
                        $order_by = 'birthday DESC';
                        $link5 = "{$_SERVER['PHP_SELF']}?sort=b_a";
                        break;
                    case 'n_a':
                        $order_by = 'net_worth ASC';
                        $link6 = "{$_SERVER['PHP_SELF']}?sort=n_d";
                        break;
                    case 'n_d':
                        $order_by = 'net_worth DESC';
                        $link6 = "{$_SERVER['PHP_SELF']}?sort=n_a";
                        break;
                    default:
                        $order_by = 'artist_first_name ASC';
                        break;
                }

                // $sort will be appended to the pagination links.
                $sort = $_GET['sort'];

            } else { // Use the default sorting order.
                $order_by = 'artist_first_name ASC';
                $sort = 'f_a';
            }

            // Assign the query string to the variable $query
            $query = "
                    SELECT artist_id,
                           artist_first_name,
                           artist_last_name,
						   gender,
						   age,
						   birthday,
						   net_worth
                    FROM artists
                    ORDER BY $order_by
                    LIMIT $page_first_result,$results_per_page
            ";

            // Run the query against the connection $dbc
            $result = @mysqli_query ($dbc, $query);

            // Display the query results in an HTML table structure
            echo '
                <div class="row">
                    <div class="col-lg-12">
                        <table class="table table-striped table-hover table-responsive">
                            <thead>
                                <tr>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                    <th><a href="' . $link1 . '">First Name</a></th>
                                    <th><a href="' . $link2 . '">Last Name</a></th>
									<th><a href="' . $link3 . '">Gender</a></th>
									<th><a href="' . $link4 . '">Age</a></th>
									<th><a href="' . $link5 . '">Birthday</a></th>
									<th><a href="' . $link6 . '">Net Worth</a></th>
                                </tr>
                            </thead>
                            <tbody id="myTable">
            ';

            while ($row = mysqli_fetch_assoc($result))
            {
                echo '
                    <tr>
                        <td><a href="edit_artists.php?id=' . $row['artist_id'] . '">Edit</a></td>
                        <td><a href="delete_artists.php?id=' . $row['artist_id'] . '">Delete</a></td>
                ';

                // Add badge to new items
                if ($row['artist_id'] >= $number_of_result) {
                    echo '
                        <td>'.$row['artist_first_name'].' <span class="badge bg-info">New</span></td>
                        <td>'.$row['artist_last_name'].'</td>
						<td>'.$row['gender'].'</td>
						<td>'.$row['age'].'</td>
						<td>'.$row['birthday'].'</td>
						<td>'.$row['net_worth'].'</td>
                    ';
                } else {
                    echo '
                        <td>'.$row['artist_first_name'].'</td>
                        <td>'.$row['artist_last_name'].'</td>
						<td>'.$row['gender'].'</td>
						<td>'.$row['age'].'</td>
						<td>'.$row['birthday'].'</td>
						<td>'.$row['net_worth'].'</td>
                    ';
                }

                echo '
                    </tr>
                ';
            }
            echo '
                            </tbody>
                        </table>
                    </div>
                </div>    
            ';

            //display the link of the pages in URL
            echo '
                <ul class="pagination">
            ';

            if ($current_page >= 2) {
                echo '<li class="page-item"><a class="page-link" href="view_artists.php?page=' . ($current_page - 1) . '&sort=' . $sort .'">Previous</a></li>';
            } else {
                echo '<li class="page-item disabled"><a class="page-link" href="view_artists.php?page=' . $current_page . '&sort=' . $sort .'">Previous</a></li>';
            }

            for($page = 1; $page <= $number_of_page; $page++) {
                if ($page == $current_page) {
                    echo '<li class="page-item active"><a class="page-link" href="view_artists.php?page=' . $page . '&sort=' . $sort .'">' . $page . ' </a></li>';
                } else {
                    echo '<li class="page-item"><a class="page-link" href="view_artists.php?page=' . $page . '&sort=' . $sort .'">' . $page . ' </a></li>';
                }
            }

            if ($current_page <= $number_of_page - 1) {
                echo '<li class="page-item"><a class="page-link" href="view_artists.php?page=' . ($current_page + 1) . '&sort=' . $sort .'">Next</a></li>';
            } else {
                echo '<li class="page-item disabled"><a class="page-link" href="view_artists.php?page=' . $current_page . '&sort=' . $sort .'">Next</a></li>';
            }

            echo '
                </ul>
            ';

            mysqli_free_result ($result); // Free up the resources.
            mysqli_close ($dbc); // Close the database connection.
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

    <!-- Link to search filter -->
    <script src="js/search_filter.js"></script>

</body>
</html>
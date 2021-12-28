<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Link to Bootstrap 5.1.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Link to main CSS file -->
    <link rel="stylesheet" href="css/main.css">

    <!-- Link to specific CSS -->
    <link rel="stylesheet" href="css/index.css">

    <!-- Link to Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <title>Home</title>
</head>
<body>
    <h1 id="home-header"><strong>Listening is Everything</strong></h1>

    <div class="bg-light">
        <nav class="navbar navbar-expand-xxl bg-dark navbar-dark fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">My Spotify Library</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php">Home</a>
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

        <div class="container-fluid">
            <div class="row">
                <div class="card col" style="width:400px">
                    <img class="card-img-top" src="img/songs.jpg" alt="Card image">
                    <div class="card-body">
                        <h4 class="card-title">Songs</h4>
                        <p class="card-text">Spotify is all the music you'll ever need.</p>
                        <a href="view_songs.php" class="home-btn btn btn-primary">View Songs</a>
                    </div>
                </div>
                <div class="card col" style="width:400px">
                    <img class="card-img-top" src="img/artists.jpg" alt="Card image">
                    <div class="card-body">
                        <h4 class="card-title">Artists</h4>
                        <p class="card-text">Whether you need to make a call about touring, releasing, or promoting,
                            Spotify for Artists has the numbers you need.</p>
                        <a href="view_artists.php" class="home-btn btn btn-primary">View Artists</a>
                    </div>
                </div>
                <div class="card col" style="width:400px">
                    <img class="card-img-top" src="img/genres.jpg" alt="Card image">
                    <div class="card-body">
                        <h4 class="card-title">Genres</h4>
                        <p class="card-text">Whether it’s hard rock, techno, pop, jazz, industrial, indie pop, folk,
                            classical, heavy metal, waltz, or whatever else takes your fancy, Spotify has the genre,
                            or type of music, covered.</p>
                        <a href="view_genres.php" class="home-btn btn btn-primary">View Genres</a>
                    </div>
                </div>
                <div class="card col" style="width:400px">
                    <img class="card-img-top" src="img/moods.jpg" alt="Card image">
                    <div class="card-body">
                        <h4 class="card-title">Moods</h4>
                        <p class="card-text">Playlists to match your mood.</p>
                        <a href="view_mood.php" class="home-btn btn btn-primary">View Moods</a>
                    </div>
                </div>
            </div>
        </div>

        <footer class="bg-dark text-white text-center">
            <div class="container">
                <p class="float-right">
                    <a href="#home-header">Back to top</a>
                </p>
                <p class="text-center">© 2021 by Jiin Kim, Campbell Cash, and Nour Fouladi</p>
            </div>
        </footer>
    </div>
</body>
</html>
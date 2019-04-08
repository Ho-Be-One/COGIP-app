<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container col-xl-6 ">
        <a class="navbar-brand" href="#">COGIP</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor02">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#"><i class="fa fa-home"></i> Acceuil <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa fa-file-o"></i> Factures</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa fa-building"></i> Sociétés</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa fa-envelope-open"></i> Contact</a>
                </li>
            </ul>
            <ul class="navbar-nav my-2">
                <li class="nav-item pr-5 text-white">
                    <strong><?= $_SESSION['auth']['first_name'].' '.$_SESSION['auth']['last_name'] ?></strong>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
            <a href="logout.php" class="btn btn-danger my-2 my-sm-0"><i class="fa fa-power-off"></i></a>
            </form>
        </div>
    </div>
</nav>
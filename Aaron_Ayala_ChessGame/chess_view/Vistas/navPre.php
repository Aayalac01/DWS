<nav class="navbar navbar-expand-sm bg-success bg-gradient sticky-top">
    <div class="container-fluid text-md-start text-center">
        <button class="navbar-toggler text" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a href="inicio.php" class="nav-link link-light" aria-current="page">Inicio</a>
                </li>
                <li class="nav-item"><a href="new_gameView.php" class="nav-link link-light">Nueva partida</a></li>
                <li class="nav-item"><a href="gameListView.php" class="nav-link link-light">Lista de partidas</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle link-light" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <?php
                        echo $_SESSION['usuario'];
                        ?>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="logout.php">Cerrar sesión</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
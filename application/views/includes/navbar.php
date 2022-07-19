<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">
        <a class="navbar-brand d-flex justify-content-between " href="<?= site_url('./') ?>">
            <!-- <img class="d-none d-sm-block" src="./img/logo/logo2.png" alt=""> -->
            <img width="60px" height="60px" class=" d-block " src="<?= base_url('issets/img/logo/logo.png') ?>" alt="">
            <div class="navbar-detail text-white my-auto mx-2">
                <h4 class="p-0 m-0" style="font-size: 1.7rem;">MUGH</h4>
                <p class="p-0 m-0 d-none d-sm-block" style="font-size: 1rem;">Mahidol University Global Health</p>
            </div>
        </a>
        <ul class="navbar-nav topbar">
            <li class="nav-item dropdown d-sm-flex flex-sm-row d-none ">
                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"> About <span class="sr-only">(current)</span> </a>
                <ul class="dropdown-menu fade-up">
                    <li><a class="dropdown-item" href="<?= site_url('About') ?>"> History </a></li>
                    <li><a class="dropdown-item" href="<?= site_url('About/ourgoal') ?>"> Vision Mission Goal and Objective </a></li>
                    <li><a class="dropdown-item" href="<?= site_url('About/ourscope') ?>"> Scope of Work </a></li>
                    <li><a class="dropdown-item" href="<?= site_url('About/ourPublcian') ?>"> Health Publication </a></li>
                    <li><a class="dropdown-item" href="<?= site_url('') ?>"> Journal </a></li>
                </ul>
            </li>

            <li class="nav-item dropdown d-sm-flex flex-sm-row d-none ">
                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false"> Education </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="<?= site_url('Education/ourProgram') ?>"> Program </a>
                        <ul class="submenu dropdown-menu">
                            <li><a class="dropdown-item" href="#">Global Health and <br> Social Policy for <br> Sustainability </a></li>
                            <hr class="m-0 p-0">
                            <li><a class="dropdown-item" href="#">Climate change, <br> Sustainability and <br> Health Public Health</a></li>
                            <hr class="m-0 p-0">
                            <li><a class="dropdown-item" href="#">Digital Health for <br> Sustainable <br> Development</a>
                                <!-- <ul class="submenu dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Multi level 1</a></li>
                                    <li><a class="dropdown-item" href="#">Multi level 2</a></li>
                                </ul> -->
                            </li>

                        </ul>
                    </li>
                    <li><a class="dropdown-item" href="<?= site_url('Education/ourCourses') ?>"> Courses </a>
                        <ul class="submenu dropdown-menu">
                            <li><a class="dropdown-item" href="#">Name of Faculty 1</a></li>
                            <hr class="m-0 p-0">
                            <li><a class="dropdown-item" href="#">Name of Faculty 2</a></li>
                            <hr class="m-0 p-0">
                            <li><a class="dropdown-item" href="#">Name of Faculty 3</a></li>

                            <!-- <ul class="submenu dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Multi level 1</a></li>
                                    <li><a class="dropdown-item" href="#">Multi level 2</a></li>
                                </ul> -->
                    </li>

                </ul>
            </li>

        </ul>
        <li class="nav-item dropdown d-sm-flex flex-sm-row d-none ">
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Research </a>
            <ul class="dropdown-menu fade-up">
                <li><a class="dropdown-item" href="#"> ASEAN PHC Research &Information Center </a></li>
                <li><a class="dropdown-item" href="#"> Digital Health in PHC </a></li>
                <li><a class="dropdown-item" href="#"> Social Health Protection </a></li>
                <li><a class="dropdown-item" href="#"> One Health </a></li>
            </ul>
        </li>


        <li class="nav-item d-sm-flex flex-sm-row d-none">
            <a class="nav-link " href="<?= site_url('News') ?>">News</a>
        </li>
        <li class="nav-item d-sm-flex flex-sm-row d-none">
            <a class="nav-link " href="<?= site_url('Events') ?>">Events</a>
        </li>
        <li class="nav-item d-sm-flex flex-sm-row d-none">
            <a class="nav-link " href="./newsletter.php">Newsletter</a>
        </li>
        <button class="btn btn d-block text-white" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbarOffcanvas" aria-controls="navbarOffcanvas" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


        <div class="offcanvas offcanvas-end bg-white " id="navbarOffcanvas" tabindex="-1" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body ">
                <ul class="navbar-nav ml-auto  d-flex flex-column  ">
                    <li class="nav-item ">
                        <a href="./" class="nav-link text-left  text-dark">Home</a>
                    </li>
                    <li class="nav-item ">
                        <a href="<?= site_url('Accadamic') ?>" class="nav-link text-left  text-dark">Accadamic Team</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= site_url('About') ?>" class="nav-link text-left text-dark">History</a>
                    </li>
                    <li class="nav-item">
                        <a href="#!" class="nav-link text-left text-dark">Excutive team</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= site_url('Download') ?>" class="nav-link text-left text-dark">Resource</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= site_url('gallery') ?>" class="nav-link text-left text-dark">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= site_url('linkto') ?>" class="nav-link text-left text-dark">Link to</a>
                    </li>
                    <li class="nav-item">
                        <a href="https://www.info-mugh.com/" target="blank" class="nav-link text-left text-dark">Login</a>
                    </li>
                </ul>

            </div>
        </div>
    </div>
</nav>
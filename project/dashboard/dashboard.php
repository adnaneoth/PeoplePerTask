<!DOCTYPE html>
<html lang="en">

<?php
include("cnx.php");
session_start();
if (!isset($_SESSION["admin"])) {
    header("Location:../pages/login.php");
} else {
    $id_admin = $_SESSION['id'];
    $query = " SELECT * FROM user where id = $id_admin";
    $result = mysqli_query($cnx, $query);
    $row = mysqli_fetch_assoc($result);

}
?>



<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="dashboard.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="wrapper">
        <aside id="sidebar" class="side">
            <div class="h-100">
                <div class="sidebar_logo d-flex align-items-end">
                    <img src="img/logo.svg" alt="icon">
                    <a href="#" class="nav-link text-white-50">Dashboard</a>
                    <img class="close align-self-start" src="img/close.svg" alt="icon">
                </div>

                <ul class="sidebar_nav">
                    <li class="sidebar_item active" style="width: 100%;">
                        <a href="dashboard.php" class="sidebar_link"> <img src="img/1. overview.svg"
                                alt="icon">Overview</a>
                    </li>
                    <li class="sidebar_item">
                        <a href="user.php" class="sidebar_link"> <img src="img/project-icon-2.svg" alt="icon">users</a>
                    </li>
                    <li class="sidebar_item">
                        <a href="agents.php" class="sidebar_link"> <img src="img/agents.svg" alt="icon">freelances</a>
                    </li>
                    <li class="sidebar_item">
                        <a href="project.php" class="sidebar_link"> <img src="img/task.svg" alt="icon">project</a>
                    </li>
                    <li class="sidebar_item">
                        <a href="categories.php" class="sidebar_link"><img src="img/agent.svg" alt="icon">categories</a>
                    </li>
                    <li class="sidebar_item">
                        <a href="testimonials.php" class="sidebar_link"><img src="img/articles.svg"
                                alt="icon">testimonials</a>
                    </li>

                </ul>
                <div class="line"></div>
                <a href="#" class="sidebar_link"><img src="img/settings.svg" alt="icon">Settings</a>


            </div>
        </aside>
        <div class="main">
            <nav class="navbar justify-content-space-between pe-4 ps-2">
                <button class="btn open">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar  gap-4">
                    <div class="">
                        <input type="search" class="search " placeholder="Search">
                        <img class="search_icon" src="img/search.svg" alt="iconicon">
                    </div>
                    <!-- <img src="img/search.svg" alt="icon"> -->
                    <img class="notification" src="img/new.svg" alt="icon">
                    <div class="card new w-auto">
                        <div class="list-group list-group-light">
                            <div class="list-group-item px-3 d-flex justify-content-between align-items-center ">
                                <p class="mt-auto">Notification</p><a href="#"><img src="img/settingsno.svg"
                                        alt="icon"></a>
                            </div>
                            <div class="list-group-item px-3 d-flex"><img src="img/notif.svg" alt="iconimage">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text mb-3">Some quick example text to build on the card title and
                                        make up
                                        the bulk of the card's content.</p>
                                    <small class="card-text">1 day ago</small>
                                </div>
                            </div>
                            <div class="list-group-item px-3 d-flex"><img src="img/notif.svg" alt="iconimage">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text mb-3">Some quick example text to build on the card title and
                                        make up
                                        the bulk of the card's content.</p>
                                    <small class="card-text">1 day ago</small>
                                </div>
                            </div>
                            <div class="list-group-item px-3 text-center"><a href="#">View all notifications</a></div>
                        </div>
                    </div>
                    <div class="inline"></div>
                    <div class="name">
                        <?php
                        echo $row['mame'];
                        ?>
                        <a class="btn btn-primary me-2 sign-style-color" href="../pages/login.php" role="button">log
                            out</a>

                    </div>
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-icon pe-md-0 position-relative" data-bs-toggle="dropdown">
                                <img src="img/photo_admin.svg" alt="icon">
                            </a>
                            <div class="dropdown-menu dropdown-menu-end position-absolute">
                                <a class="dropdown-item" href="#">Profile</a>
                                <a class="dropdown-item" href="#">Account Setting</a>
                                <a class="dropdown-item" href="/PeoplePerTask/project/pages/index.html">Log out</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <section class="overview">
                <div class="row p-4">
                    <?php
                    include('statistique_categ.php');
                    include('statistique_user.php');
                    include('statistique_prj.php')

                        ?>


                </div>
            </section>

            <div class="px-4">
                <div class="card mb-3">
                    <div class="row g-0 px-2">
                        <div class="col-xl-8 col-md-12 col-sm-12 col-12 p-4 ">
                            <div>
                                <h4>Today’s trends</h4>
                                <p>as of 27 oct 2023, 22:48 PM</p>
                            </div>
                            <div class="w-100" id="chart">
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-12 col-sm-12 col-12">

                            <div class="list-group h-100 text-center">
                                <div class="list-group-item row h-20">
                                    <p>Cras justo odio</p>
                                    <p>449</p>
                                </div>
                                <div class="list-group-item row h-20">
                                    <p>Dapibus ac facilisis in</p>
                                    <p>449</p>
                                </div>
                                <div class="list-group-item row h-20">
                                    <p>Vestibulum at eros</p>
                                    <p>449</p>
                                </div>
                                <div class="list-group-item row h-20">
                                    <p>Dapibus ac facilisis in</p>
                                    <p>449</p>
                                </div>
                                <div class="list-group-item row h-20">
                                    <p>Vestibulum at eros</p>
                                    <p>449</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="px-4 row">
                <div class="col-xl-6 col-md-12 col-sm-12 col-12 ">
                    <div class="card">
                        <div class="row p-4">
                            <div class="col">
                                <p class="title">Unresolved tickets</p>
                                <p><span>Group:</span> Support</p>
                            </div>
                            <a class="col d-flex justify-content-end fw-medium" href="#">View details</a>

                        </div>
                        <div class="list-group">
                            <div
                                class="list-group-item px-3 text d-flex justify-content-between align-items-center p-4">
                                <p>Cras justo odio</p>
                                <p>4444</p>
                            </div>
                            <div
                                class="list-group-item px-3 text d-flex justify-content-between align-items-center p-4">
                                <p>Dapibus ac facilisis in</p>
                                <p>4444</p>
                            </div>
                            <div
                                class="list-group-item px-3 text d-flex justify-content-between align-items-center p-4">
                                <p>Vestibulum at eros</p>
                                <p>4444</p>
                            </div>
                            <div
                                class="list-group-item px-3 text d-flex justify-content-between align-items-center p-4">
                                <p>Vestibulum at eros</p>
                                <p>4444</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-md-12 col-sm-12 col-12 ">
                    <div class="card">
                        <div class="row p-4">
                            <div class="col">
                                <p class="title">Tasks</p>
                                <p>Today</p>
                            </div>
                            <a class="col d-flex justify-content-end fw-medium" href="#">View all</a>

                        </div>
                        <div class="Admin_task list-group">
                            <div
                                class="list-group-item px-3 text d-flex justify-content-between align-items-center p-4">
                                <p>Create new task</p>
                                <img class="cursor " id="add_admin_task" src="img/inactive.svg" alt="icon">
                            </div>
                            <div
                                class="list-group-item px-3 text d-flex justify-content-between align-items-center p-4">
                                <p>Finish task update</p>
                                <img src="img/warning.svg" alt="icon">
                            </div>
                            <div
                                class="list-group-item px-3 text d-flex justify-content-between align-items-center p-4">
                                <p>Create new task example</p>
                                <img src="img/successnew.svg" alt="icon">
                            </div>
                            <div
                                class="list-group-item px-3 text d-flex justify-content-between align-items-center p-4">
                                <p>Update cliens report</p>
                                <img src="img/default.svg" alt="icon">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- edit modal -->
    <div class="modal">
        <div class="modal-content">
            <form id="forms">
                <!-- 2 column grid layout with text inputs for the first and last names -->
                <div class="mb-4">
                    <label class="form-label">Task description</label>
                    <input type="text" class="form-control task-desc">

                </div>

                <!-- select input -->
                <div class="mb-4">
                    <label class="form-label">Status</label>
                    <select class="form-control" name="task status" id="status">
                        <option value="img/default.svg">Default</option>
                        <option value="img/successnew.svg">New</option>
                        <option value="img/warning.svg">Urgent</option>
                    </select>
                </div>


                <div class="d-flex w-100 justify-content-center">
                    <button type="submit" class="btn btn-success btn-block mb-4 me-4 save">Save Edit</button>
                    <div class="btn btn-danger btn-block mb-4 annuler">Annuler</div>
                </div>
            </form>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="dashboard.js"></script>
    <script src="script.js"></script>
</body>

</html>
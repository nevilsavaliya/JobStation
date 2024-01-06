<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="css.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <title>Dashboard</title>
    <?php
    include '..\..\Connection_Module.php';
    ?>
</head>

<body>
<section class="header">
    <div class="logo">
        <i class="ri-menu-line icon icon-0 menu"></i>
        <h2 class="navbar-logo"><a href="../../index.php">Job Station</a>
        </h2>
    </div>
</section>
<section class="main">
    <div class="sidebar">
        <ul class="sidebar--items">
            <li>
                <a href="dashboard.php" id="active--link">
                    <span class="icon icon-1"><i class="ri-layout-grid-line"></i></span>
                    <span class="sidebar--item">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="Employer.php">
                    <span class="icon icon-3"><i class="ri-user-2-line"></i></span>
                    <span class="sidebar--item" style="white-space: nowrap;">Employers</span>
                </a>
            </li>
            <li>
                <a href="Jobseeker.php">
                    <span class="icon icon-4"><i class="ri-user-line"></i></span>
                    <span class="sidebar--item" style="white-space: nowrap;">Job seekers</span>
                </a>
            </li>
            <li>
                <a href="Jobpost.php">
                    <span class="icon icon-2"><i class="ri-calendar-2-line"></i></span>
                    <span class="sidebar--item" style="white-space: nowrap;">Job post</span>
                </a>
            </li>
        </ul>
        <ul class="sidebar--bottom-items">
            <li>
                <a href="../../index.php">
                    <span class="icon icon-8"><i class="ri-logout-box-r-line"></i></span>
                    <span class="sidebar--item">Logout</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="main--content">
        <div class="overview">
            <div class="title">

            </div>
            <div class="cards">
                <a href="Employer.php">
                    <div class="card card-1" style="text-align: center">
                        <div class="card--data">
                            <div class="card--content">
                                <h5 class="card--title" style="text-decoration: none">Total Employers</h5>
                                <h1 style="color: black;"><?php
                                    $sql = "SELECT count(*) as count FROM employer";
                                    $result = $conn->query($sql);
                                    $row = $result->fetch_assoc();
                                    echo $row['count'];
                                    ?></h1>
                            </div>
                            <i class="ri-user-2-line card--icon--lg"></i>
                        </div>

                    </div>
                </a>
                <a href="Jobseeker.php">
                    <div class="card card-2" style="white-space: nowrap;">
                        <div class="card--data">
                            <div class="card--content">
                                <h5 class="card--title">Total Job seekers</h5>
                                <h1 style="color: black;"><?php
                                    $sql = "SELECT count(*) as count FROM jobseeker";
                                    $result = $conn->query($sql);
                                    $row = $result->fetch_assoc();
                                    echo $row['count'];
                                    ?></h1>
                            </div>
                            <i class="ri-user-line card--icon--lg"></i>
                        </div>

                    </div>
                </a>
                <div class="card card-3" style="white-space: nowrap;">
                    <div class="card--data">
                        <div class="card--content">
                            <h5 class="card--title">Total job post</h5>
                            <h1 style="color: black;"><?php
                                $sql = "SELECT count(*) as count FROM jobpost";
                                $result = $conn->query($sql);
                                $row = $result->fetch_assoc();
                                echo $row['count'];
                                ?></h1>
                        </div>
                        <i class="ri-calendar-2-line card--icon--lg"></i>
                    </div>
                </div>
            </div>
        </div>
        <h1 class="title">Detailed report of Employer</h1>
        <div class="table">
            <table border="1">
                <tr>
                    <th>No.</th>
                    <th>company</th>
                    <th>Job Acceptance Rate</th>
                    <th>Total Salary Amount</th>
                    <th>Total Job Post</th>
                </tr>
                <?php
                $sql = "SELECT * from employer";
                $result = $conn->query($sql);
                $count = 1;
                while ($employer = $result->fetch_assoc()) {
                    $jobcount = 0;
                    $postcount = 0;
                    $eid = $employer['id'];
                    $sql = "SELECT * from jobpost where eid = $eid";
                    $jresult = $conn->query($sql);
                    while ($post = $jresult->fetch_assoc()) {
                        $pid = $post['id'];
                        $sql = "SELECT count(*) as count from jobpost_apply where id= $pid";
                        $presult = $conn->query($sql);
                        $row = $presult->fetch_assoc();
                        $jobcount = (int)$row['count'] + $jobcount;
                        $postcount++;
                    }
                    if ($postcount > 0) {
                        $jobcount = $jobcount / $postcount;
                    }
                    $sql = "SELECT SUM(hsalary) as sum from jobpost where eid = $eid";
                    $presult = $conn->query($sql);
                    $salary = $presult->fetch_assoc();
                    if (isset($salary['sum'])) {
                        $salary = $salary['sum'];
                    } else {
                        $salary = 0;
                    }
                    $sql = "SELECT count(*) as count from jobpost where eid = $eid";
                    $jresult = $conn->query($sql);
                    $post = $jresult->fetch_assoc();
                    if (isset($post['count'])) {
                        $post = $post['count'];
                    } else {
                        $post = 0;
                    }
                    echo '<tr>
                <td>' . $count . '</td>
                <td>' . $employer['name'] . '</td>
                <td>' . $jobcount . '</td>
                <td>' . $salary . '</td>
                <td>' . $post . '</td>
            </tr>';
                    $count++;
                }
                ?>
            </table>
        </div>
    </div>
</section>
<script>
    let menu = document.querySelector('.menu')
    let sidebar = document.querySelector('.sidebar')
    let mainContent = document.querySelector('.main--content')

    menu.onclick = function () {
        sidebar.classList.toggle('active')
        mainContent.classList.toggle('active')
    }
</script>
</body>

</html>


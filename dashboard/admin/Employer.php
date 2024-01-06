<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="css.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <title>Dashboard</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <?php
    include '..\..\Connection_Module.php';
    session_start();
    $sql = "SELECT * FROM employer";
    $result = $conn->query($sql);
    ?>
</head>

<body>
<?php
if (isset($_POST['ban']) && isset($_POST['del'])) {
    $delete = $_POST['del'];
    $time = $_POST['time'];
    $timespan = $_POST['timespan'];
    foreach ($delete as $value) {
        $sql = "UPDATE `employer` SET `bantime`='$time',`bantimespan`='$timespan',`startdate`= curdate(),`starttime`=curtime() WHERE id = $value";
        $conn->query($sql);
        echo '<script>window.location.href = "Employer.php"</script>';
    }
}
?>
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
                <a href="dashboard.php">
                    <span class="icon icon-1"><i class="ri-layout-grid-line"></i></span>
                    <span class="sidebar--item">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="Employer.php" id="active--link">
                    <span class="icon icon-3"><i class="ri-user-2-line"></i></span>
                    <span class="sidebar--item" style="white-space: nowrap;">Employers</span>
                </a>
            </li>
            <li>
                <a href="Jobseeker.php">
                    <span class="icon icon-4"><i class="ri-user-line"></i></span>
                    <span class="sidebar--item">Job seekers</span>
                </a>
            </li>
            <li>
                <a href="Jobpost.php">
                    <span class="icon icon-2"><i class="ri-calendar-2-line"></i></span>
                    <span class="sidebar--item">Job post</span>
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

        <div class="recent--patients">
            <div class="title">
                <h2 class="section--title">Job Station</h2>
                <h2 class="section--title">All Report of Employer</h2>
            </div>
            <form method="post">
                <div class="title">
                    Time Of Banning:<input type="number" name="time" required>
                    <select name="timespan" required>
                        <option value="h">Hour</option>
                        <option value="d">Day</option>
                        <option value="m">Month</option>
                        <option value="y">Year</option>
                    </select>
                </div>
                <div class="table">
                    <table>
                        <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Email</th>
                            <!--                        <th>Address</th>-->
                            <th>Field</th>
                            <th>Contact</th>
                            <th>Date of Establish</th>
                            <th>City</th>
                            <th>Status</th>
                            <th>Ban</th>
                            <th>Ban For</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        while ($row = $result->fetch_assoc()) {
                            echo '<tr>
                        <td class="id" style="display: none">' . $row['id'] . '</td>
                        <td> <img src="data:image/jpg;charset=utf8;base64,';
                            echo base64_encode($row['image']) . '"';
                            echo 'alt="avatar" class="thumb">
                                <td>';
                            echo $row['name'] . '</td>
                        <td>' . $row['email'] . '</td>
                        <td>' . $row['field_name'] . '</td>
                        <td>' . $row['phone'] . '</td>
                        <td>' . $row['date_of_establishment'] . '</td>
                        <td>' . $row['city'] . '</td>';
                            if(isset($row['bantime'])){
                                echo '<td class="ban">Banned</td>';
                            } elseif ($row['complete']) {
                                echo '<td class="confirmed">Complete</td>';
                            } else {
                                echo '<td class="pending">pending</td>';
                            }
                            echo '<td><input type="checkbox" name="del[]" value="' . $row['id'] . '"></td>
                            <td> ' . $row['bantime'];
                            if($row['bantimespan'] == "h"){
                                echo " Hour</td>";
                            }
                        
                            if($row['bantimespan'] == "d"){
                                echo " Day</td>";
                            }
                            if($row['bantimespan'] == "m"){
                                echo " Month</td>";
                            }
                            if($row['bantimespan'] == "y"){
                                echo " Year</td>";
                            }
                    echo '</tr>';
                        }
                        ?>
                        </tbody>
                    </table>
                </div>


                <div class="center">
                    <input type="submit" value="ban" name="ban" class="button">
                </div>
            </form>
        </div>
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


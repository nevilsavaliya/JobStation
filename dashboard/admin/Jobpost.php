<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    session_start();
    ?>
    <link rel="stylesheet" href="css.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <title>Dashboard</title>
    <?php
    include '..\..\Connection_Module.php';
    $sql = "SELECT * FROM jobpost";
    $result = $conn->query($sql);
    ?>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body>
<?php
if (isset($_POST['delete'])) {
    $delete = $_POST['del'];
    foreach ($delete as $value){
        $sql = "DELETE FROM `jobpost` WHERE id = $value";
        $conn->query($sql);
        echo '<script>window.location.href = "Jobpost.php"</script>';
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
                <a href="Employer.php" >
                    <span class="icon icon-3"><i class="ri-user-2-line"></i></span>
                    <span class="sidebar--item" style="white-space: nowrap;">Employers</span>
                </a>
            </li>
            <li>
                <a href="Jobseeker.php" >
                    <span class="icon icon-4"><i class="ri-user-line"></i></span>
                    <span class="sidebar--item">Job seekers</span>
                </a>
            </li>
            <li>
                <a href="Jobpost.php" id="active--link">
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
                <h2 class="section--title">Jobpost</h2>
            </div>
            <form method="post">
                <div class="table">
                    <table>
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>Lowest Salary</th>
                            <th>Highest Salary</th>
                            <th>Job Type</th>
                            <th>Category</th>
                            <th>Experience</th>
                            <th>Gender</th>
                            <th>Dead Line Date</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        while ($row = $result->fetch_assoc()) {
                            echo '<tr>
                        <td class="id" style="display: none">' . $row['id'] . '</td>';
                            echo '<td>';
                            echo $row['title'] . '</td>
                        <td>' . $row['lsalary'] . '</td>
                        <td>' . $row['hsalary'] . '</td>
                        <td>' . $row['jobtype'] . '</td>
                        <td>' . $row['category'] . '</td>
                        <td>' . $row['experience'] . '</td>
                        <td>';
                            if ($row['gender'] == 'M') {
                                echo 'Male';
                            } else if($row['gender'] == 'F') {
                                echo 'Female';
                            }else{
                                echo 'Both';
                            }
                            echo '</td>
                        <td>' . $row['deadline'] . '</td>';
                            echo '<td><input type="checkbox" name="del[]" value="' . $row['id'] . '"></td>
                    </tr>';
                        }
                        ?>
                        </tbody>
                    </table>
                </div>

                <div class="center">
                    <input type="submit" value="Delete" name="delete" class="button">
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


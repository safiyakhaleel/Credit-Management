<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title> Transfer-page</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0">
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-text mx-3"><span>TASK 6</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="nav navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="index.php"><i class="fas fa-table"></i><span>HOME</span></a><a class="nav-link" href="alltransfers.php"><i class="fas fa-angle-double-right"></i><span>ALL TRANSFERS</span></a><a class="nav-link" href="alltransfers.php"><i class="fas fa-code"></i><span>Github</span></a>
                        <a
                            class="nav-link" href="alltransfers.php"><i class="icon ion-person"></i><span>LinkedIn</span></a>
                    </li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <ul class="nav navbar-nav flex-nowrap ml-auto">
                            <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><i class="fas fa-search"></i></a>
                                <div class="dropdown-menu dropdown-menu-right p-3 animated--grow-in" role="menu" aria-labelledby="searchDropdown">
                                    <form class="form-inline mr-auto navbar-search w-100">
                                        <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
                                            <div class="input-group-append"><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                                        </div>
                                    </form>
                                </div>
                            </li>
                            <li class="nav-item dropdown no-arrow mx-1" role="presentation">
                                <div class="shadow dropdown-list dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown"></div>
                            </li>
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow" role="presentation">
                                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                                    <div class="sidebar-brand-text mx-3"><span>CREDIT MANAGEMENT</span></div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="container-fluid">
                    <h3 class="text-dark mb-4">TRANSFERING FROM:</h3>
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <table class="table my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                        <th>User_id</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Credit remaining</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        	include 'database.php';
                                        	$sql = "SELECT * FROM users WHERE id='".$_GET['userid']."'";
                                        	$result = $conn->query($sql);
                                        	if ($result->num_rows > 0) {
                                        		while($row = $result->fetch_assoc()) {
                                    ?>	
                                        		<tr>
                                        			<td><?=$row['id'];?></td>
                                        			<td><?=$row['username'];?></td>
                                        			<td><?=$row['email'];?></td>
                                        			<td><?=$row['credit'];?></td>
                                        		</tr>
                                    <?php	
                                        	}
                                        	}
                                        	else {
                                        		echo "0 results";
                                        	}
                                        	mysqli_close($conn);
                                    ?>
                                    </tbody>
                                        
                                    <tfoot>
                                        <tr></tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <h3 class="text-dark mb-4">SELECT WHOM TO TRANSFER:</h3>
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <table class="table my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                        <th>User_id</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Credit remaining</th>
                                            <th>Choose</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    	include 'database.php';
                                    	$sql = "SELECT * FROM users WHERE id!='".$_GET['userid']."'";
                                    	$result = $conn->query($sql);
                                    	if ($result->num_rows > 0) {
                                    		while($row = $result->fetch_assoc()) {
                                    ?>	
                                    		<tr>
                                    			<td><?=$row['id'];?></td>
                                    			<td><?=$row['username'];?></td>
                                    			<td><?=$row['email'];?></td>
                                    			<td><?=$row['credit'];?></td>
                                    			<td><a href="enter_credit.php?userid1=<?php echo $_GET["userid"]; ?>&userid2=<?php echo $row['id']; ?>">Transfer to</a></td>
                                    		</tr>
                                    <?php	
                                    	}
                                    	}
                                    	else {
                                    		echo "0 results";
                                    	}
                                    	mysqli_close($conn);
                                    ?>
                                    </tbody>
                                    <tfoot>
                                        <tr></tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>CREDIT MANAGEMENT</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>
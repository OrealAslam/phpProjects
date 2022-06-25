<!-- Navbar end-->

<div class="container-fluid">
	<div class="row">
		<!-- sidebar start 1st column -->
		<div class="col-lg-2 col-md-3 col-sm-8 col-sm-3 mb-sm-5 mb-md-0 col-lg-2">
			<div class="sidebar-sticky mt-3">
				<ul class="nav flex-column">
					<li class="nav-item"><a href="admindashboard.php" class="nav-link <?php if(PAGE == 'Admin Dashboard'){echo 'active bg-warning text-white';} ?>"><i class="fas fa-user mr-2"></i>Dashboard</a></li>

					<li class="nav-item"><a href="admincourses.php" class="nav-link <?php if(PAGE == 'Courses'){ echo 'active bg-warning text-white';}?>"><i class="fas fa-book-open mr-2"></i>Courses</a></li>

					<li class="nav-item"><a href="addcourses.php" class="nav-link <?php if(PAGE == 'Add Courses'){ echo 'active bg-warning text-white';}?>"><i class="fas fa-bible mr-2"></i>Add Course</a></li>

					<li class="nav-item"><a href="uploadlecture.php" class="nav-link <?php if(PAGE == 'Add Lecture'){ echo 'active bg-warning text-white';}?>"><i class="fas fa-file-upload mr-2"></i>Upload Lecture</a></li>

					<li class="nav-item"><a href="lecture_details.php" class="nav-link <?php if(PAGE == 'Manage Lectures'){ echo 'active bg-warning text-white';}?>"><i class="fas fa-info-circle mr-2"></i>Manage Lectures</a></li>

					<li class="nav-item"><a href="feedback.php" class="nav-link <?php if(PAGE == 'Course Requests'){echo 'active bg-warning text-white';} ?>"><i class="fab fa-accessible-icon mr-2 "></i>Course Requests</a></li>

					<li class="nav-item"><a href="" class="nav-link <?php if(PAGE == 'Tutor Help'){echo 'active bg-warning text-white';} ?>"><i class="fas fa-chalkboard-teacher mr-2"></i>Payment Statues</a></li>

					<li class="nav-item"><a href="handlestudents.php" class="nav-link <?php if(PAGE == 'Students'){echo 'active bg-warning text-white';} ?>"><i class="fas fa-user mr-2"></i>Students</a></li>

					<li class="nav-item"><a href="soldcourses.php" class="nav-link <?php if(PAGE == 'Sold Courses'){echo 'active bg-warning text-white';} ?>"><i class="fas fa-clipboard-check mr-2"></i>Sold Courses</a></li>

					<li class="nav-item"><a href="changepassword.php" class="nav-link <?php if(PAGE == 'Password'){echo 'active bg-warning text-white';} ?>"><i class="fas fa-key mr-2"></i>Change Password</a></li>

					<li class="nav-item"><a href="logout.php" class="nav-link <?php if(PAGE == ''){echo 'active bg-warning text-white';} ?>"><i class="fas fa-sign-out-alt mr-2"></i>Logout</a></li>
				</ul>
			</div>
		</div>
		
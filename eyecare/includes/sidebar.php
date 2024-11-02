
<div class="left-side-bar">
		<div class="brand-logo" style="border-bottom: 2px solid white;">
			<a href="home.php">
				<img src="pictures/eyecare.jpg" alt="" class="dark-logo" width="50px" height="50px">
				<img src="pictures/eyecare.jpg" alt="" class="light-logo" width="160px" height="60px" style="margin-left: -14px;">&ensp;&ensp;
				<!-- <h3 class="text-white">Project</h3> -->
			</a>
			<div class="close-sidebar" data-toggle="left-sidebar-close">
				<i class="ion-close-round"></i>
			</div>
		</div>
		<div class="menu-block customscroll">
			<div class="sidebar-menu">
				<ul id="accordion-menu">
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-house-1"></span><span class="mtext">Home</span>
						</a>
						<ul class="submenu">
							<li><a href="home.php">Dashboard</a></li>
							
						</ul>
					</li>
					
				<!-- 	<li>
						<a href="manage_users.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-user"></span><span class="mtext"></span>	
						</a>
					</li> -->
					<li>
						<a href="manageUsers.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-user"></span><span class="mtext">All Users</span>	
						</a>
					</li>
					<li>
						<a href="manageDailyVisitors.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-user"></span><span class="mtext">Daily Visitors</span>	
						</a>
					</li>
					<li>
						<a href="manageMonthlyVisitors.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-user"></span><span class="mtext">Monthly Visitors</span>	
						</a>
					</li>
					<li>
						<a href="manage_generalHealth.php" class="dropdown-toggle no-arrow">
							<span class="micon fa fa-plus-square"></span><span class="mtext">General Health</span>
						</a>
					</li>

					<li>
						<a href="manage_ocularSymptoms.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-focus1"></span><span class="mtext">Ocular Symptoms</span>
						</a>
					</li>
					<li>
						<a href="manage_cities.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-flag"></span><span class="mtext">Cities</span>
						</a>
					</li>

					<li>
						<a href="manage_states.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-flag"></span><span class="mtext">States</span>
						</a>
					</li>
					<!-- <li>
						<a href="manage_familyhistroy.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-hospital"></span><span class="mtext">Family/Medical History</span>
						</a>
					</li>
					<li>
						<a href="PatientHistory.php" class="dropdown-toggle no-arrow">
							<span class="micon ion-person-stalker"></span><span class="mtext">Patient History</span>
						</a>
					</li>
					<li>
						<a href="office_policies.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-file3"></span><span class="mtext">Office Policies</span>
						</a>
					</li>
					<li>
						<a href="office.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-home"></span><span class="mtext">Office</span>
						</a>
					</li> -->
				<!-- 	<li>
						<a href="view_ocularSymptoms.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-password"></span><span class="mtext">State</span>
						</a>
					</li> -->
					<!-- <li>
						<a href="view_ocularSymptoms.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-password"></span><span class="mtext">Cities</span>
						</a>
					</li> -->

					<!-- <li>
						<a href="mutlistep.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-building"></span><span class="mtext">Mutlistep Form</span>
						</a>
					</li> -->
				
					<?php if($_SESSION['user_type'] == 'user'){ ?>					
					<li>
						<a href="addform.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-building"></span><span class="mtext">Form</span>
						</a>
					</li>
					<li>
						<a href="patiente_eye_history.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-building"></span><span class="mtext">Patient Eye History</span>
						</a>
					</li>

					
					<!-- <li>
						<a href="manageDropdown.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-building"></span><span class="mtext">College Details</span>
						</a>
					</li>
					<li>
						<a href="manageforGoods.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-bell"></span><span class="mtext">GPI Analysis</span>
						</a>
					</li>
					<li>
						<a href="manageparking.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-bell"></span><span class="mtext">Notifications</span>
						</a>
					</li>					
					<li>
						<a href="manageStaff.php" class="dropdown-toggle no-arrow">
							<span class="micon fa fa-exclamation"></span><span class="mtext">Pending Fee</span>
						</a>
					</li>
				
					<li>
						<a href="manageVisitors.php" class="dropdown-toggle no-arrow">
							<span class="micon fa fa-user-circle"></span><span class="mtext">Faculty Details</span>
						</a>
					</li>
					<li>
						<a href="managewithGoods.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-upload"></span><span class="mtext">Upload Certificate</span>
						</a>
					</li>

					<li>
						<a href="managewithGoods.php" class="dropdown-toggle no-arrow">
							<span class="micon fa fa-upload"></span><span class="mtext">Upload Scholarship</span>
						</a>
					</li>

					<li>
						<a href="managewithGoods.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-user"></span><span class="mtext">Update Profile</span>
						</a>
					</li>

					<li>
						<a href="managewithGoods.php" class="dropdown-toggle no-arrow">
							<span class="micon fa fa-phone pb-5" style="transform: rotateY(180deg) !important;"></span><span class="mtext">Contact</span>
							<!- <i class="icon-copy fa fa-phone" aria-hidden="true"></i> -->
						</a>
					</li> -->
									
					
				<?php } ?>
					<li>
						<a href="ChangePassword.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-key"></span><span class="mtext">Change Password</span>
						</a>
					</li>
					<li>
						<a href="logout.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-lock"></span><span class="mtext">Logout</span>
						</a>
					</li>
				
				</ul>
			</div>
		</div>
	</div>
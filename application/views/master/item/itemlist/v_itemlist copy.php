<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- <meta name="keywords" content="">
	<meta name="author" content="">
	<meta name="robots" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="W3crm:Customer Relationship Management Admin Bootstrap 5 Template">
	<meta property="og:title" content="W3crm:Customer Relationship Management Admin Bootstrap 5 Template">
	<meta property="og:description" content="W3crm:Customer Relationship Management Admin Bootstrap 5 Template">
	<meta property="og:image" content="https://w3crm.dexignzone.com/xhtml/social-image.png">
	<meta name="format-detection" content="telephone=no"> -->
	
	<?php $this->load->view('template/css-header') ?>
	
</head>
<body data-typography="poppins" data-theme-version="light" data-layout="vertical" data-nav-headerbg="black" data-headerbg="color_1">

    <?php $this->load->view('template/preloader') ?>

    <div id="main-wrapper">
        <?php
			$this->load->view('template/nav-header');
			$this->load->view('template/chatbox');
			$this->load->view('template/header-body');
			$this->load->view('template/sidebar');
		?>
		
        <div class="content-body">
            <!-- row -->	
			<div class="page-titles">
				<ol class="breadcrumb">
					<li><h5 class="bc-title">Daftar Barang</h5></li> <!-- Menu name -->
					<!-- <li class="breadcrumb-item"><a href="javascript:void(0)">
						<svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M2.125 6.375L8.5 1.41667L14.875 6.375V14.1667C14.875 14.5424 14.7257 14.9027 14.4601 15.1684C14.1944 15.4341 13.8341 15.5833 13.4583 15.5833H3.54167C3.16594 15.5833 2.80561 15.4341 2.53993 15.1684C2.27426 14.9027 2.125 14.5424 2.125 14.1667V6.375Z" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round"/>
							<path d="M6.375 15.5833V8.5H10.625V15.5833" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round"/>
						</svg>
						Home </a>
					</li>
					<li class="breadcrumb-item active"><a href="javascript:void(0)">Dashboard</a></li> -->
				</ol>
				<a class="text-primary fs-13 d-none" data-bs-toggle="offcanvas" href="#offcanvasExample1" role="button" aria-controls="offcanvasExample1">+ Add Task</a>
			</div>
			<div class="container-fluid">
            <div class="row">
					<div class="col-xl-12 col-xxl-12">
						<div class="row">
							<div class="col-xl-12">
								<div class="card">
									<div class="card-body p-0">
										<div class="table-responsive active-projects style-1">
										<div class="tbl-caption">
											<h4 class="heading mb-0">Employees</h4>
											<div>
												<!-- <a href="javascript:void(0)" class="btn btn-primary btn-sm"data-bs-toggle="modal" data-bs-target="#offcanvasExample">+ Add Employee</a> -->
												<a class="btn btn-primary btn-sm" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">+ Add Employee</a>
												<!-- Button trigger modal -->
												<button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal1">
												  + Invite Employee
												</button>
											</div>
										</div>
											<table id="empoloyees-tbl" class="table">
												<thead>
													<tr>
														<th>Employee ID</th>
														<th>Employee Name</th>
														<th>Email Address</th>
														<th>Contact Number</th>
														<th>Gender</th>
														<th>Location</th>
														<th>Status</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td><span>1001</span></td>
														<td>
															<div class="products">
																<img src="<?php echo base_url() ?>assets/images/contacts/pic2.jpg" class="avatar avatar-md" alt="">
																<div>
																	<h6>Moni Antony</h6>
																	<span>Web Designer</span>	
																</div>	
															</div>
														</td>
														<td><span class="text-primary">abc@gmail.com</span></td>
														<td>
															<span>+91 123 456 7890</span>
														</td>
														<td>
															<span>Male</span>
														</td>	
														<td>
															<span>Delhi</span>
														</td>
														<td>
															<span class="badge badge-success light border-0">Active</span>
														</td>
													</tr>
													<tr>
														<td><span>1001</span></td>
														<td>
															<div class="products">
																<img src="<?php echo base_url() ?>assets/images/contacts/pic1.jpg" class="avatar avatar-md" alt="">
																<div>
																	<h6>Joney Antony</h6>
																	<span>Web Designer</span>	
																</div>	
															</div>
														</td>
														<td><span class="text-primary">abc@gmail.com</span></td>
														<td>
															<span>+91 123 456 7890</span>
														</td>
														<td>
															<span>Male</span>
														</td>	
														<td>
															<span>Delhi</span>
														</td>
														<td>
															<span class="badge badge-danger light border-0">Active</span>
														</td>
													</tr>
													<tr>
														<td><span>1001</span></td>
														<td>
															<div class="products">
																<img src="<?php echo base_url() ?>assets/images/contacts/pic3.jpg" class="avatar avatar-md" alt="">
																<div>
																	<h6>Peter Oliver</h6>
																	<span>Web Designer</span>	
																</div>	
															</div>
														</td>
														<td><span class="text-primary">abc@gmail.com</span></td>
														<td>
															<span>+91 123 456 7890</span>
														</td>
														<td>
															<span>Male</span>
														</td>	
														<td>
															<span>Delhi</span>
														</td>
														<td>
															<span class="badge badge-success light border-0">Active</span>
														</td>
													</tr>
													<tr>
														<td><span>1001</span></td>
														<td>
															<div class="products">
																<img src="<?php echo base_url() ?>assets/images/contacts/pic3.jpg" class="avatar avatar-md" alt="">
																<div>
																	<h6>Elijah James</h6>
																	<span>Web Designer</span>	
																</div>	
															</div>
														</td>
														<td><span class="text-primary">abc@gmail.com</span></td>
														<td>
															<span>+91 123 456 7890</span>
														</td>
														<td>
															<span>Male</span>
														</td>	
														<td>
															<span>Delhi</span>
														</td>
														<td>
															<span class="badge badge-success light border-0">Active</span>
														</td>
													</tr>
													<tr>
														<td><span>1001</span></td>
														<td>
															<div class="products">
																<img src="<?php echo base_url() ?>assets/images/contacts/pic1.jpg" class="avatar avatar-md" alt="">
																<div>
																	<h6>Ricky James</h6>
																	<span>Web Designer</span>	
																</div>	
															</div>
														</td>
														<td><span class="text-primary">abc@gmail.com</span></td>
														<td>
															<span>+91 123 456 7890</span>
														</td>
														<td>
															<span>Male</span>
														</td>	
														<td>
															<span>Delhi</span>
														</td>
														<td>
															<span class="badge badge-success light border-0">Active</span>
														</td>
													</tr>
													<tr>
														<td><span>1001</span></td>
														<td>
															<div class="products">
																<img src="<?php echo base_url() ?>assets/images/contacts/pic2.jpg" class="avatar avatar-md" alt="">
																<div>
																	<h6>James Antony</h6>
																	<span>Web Designer</span>	
																</div>	
															</div>
														</td>
														<td><span class="text-primary">abc@gmail.com</span></td>
														<td>
															<span>+91 123 456 7890</span>
														</td>
														<td>
															<span>Male</span>
														</td>	
														<td>
															<span>Delhi</span>
														</td>
														<td>
															<span class="badge badge-danger light border-0">Active</span>
														</td>
													</tr>
													
												</tbody>
												
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>			
			</div>
        </div>

		<?php $this->load->view('template/footer-body') ?>
	</div>
    <?php $this->load->view('template/js-footer') ?>
	<!-- START: Custome JS -->
		<script>
			async function fetchData() {
				try {
					const response 	= await fetch('<?php echo $url_getAllData; ?>');
					const data 		= await response.json();
					return data;
				} catch (error) {
					console.error('Error fetching data: ', error);
					return [];
				}
			}

			async function createDataTables() {
				const data 	= await fetchData();

				if(data.length > 0) {
					const table 	= $('#dataTable').DataTable({
						data: data,
						columns: [
							{ data: ''},
						]
					});
				}
			}
		</script>
	<!-- END: Custome JS -->
</body>
</html>
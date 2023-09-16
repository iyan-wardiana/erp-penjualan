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
					<li><h5 class="bc-title">Account List</h5></li> <!-- Menu name -->
					<!-- <li class="breadcrumb-item"><a href="javascript:void(0)">
						<svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M2.125 6.375L8.5 1.41667L14.875 6.375V14.1667C14.875 14.5424 14.7257 14.9027 14.4601 15.1684C14.1944 15.4341 13.8341 15.5833 13.4583 15.5833H3.54167C3.16594 15.5833 2.80561 15.4341 2.53993 15.1684C2.27426 14.9027 2.125 14.5424 2.125 14.1667V6.375Z" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round"/>
							<path d="M6.375 15.5833V8.5H10.625V15.5833" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round"/>
						</svg>
						Home </a>
					</li>
					<li class="breadcrumb-item active"><a href="javascript:void(0)">Dashboard</a></li> -->
				</ol>
			</div>
			<div class="container-fluid">
				<div class="row">
					<div class="col-xl-12">
						<div class="card">
							<div class="card-header border-0 pb-0 ">
								<h5 class="card-title">Custom Filter</h5>
							</div>
							<div class="card-body">
								<div class="basic-form">
                                    <form>
										<div class="row">
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label">Budget</label>
                                                <select name="PRJCODE" id="PRJCODE" class="default-select form-control wide">
                                                    <option value="NKE" selected>NKE</option>
                                                </select>
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label">Account Category</label>
                                                <select name="Account_Category" id="Account_Category" class="default-select form-control wide">
                                                    <option value="" selected>-- ALL --</option>
                                                    <?php
														$s_coatyp 	= "SELECT DISTINCT Account_Category FROM tbl_chartaccount WHERE PRJCODE = 'NKE'";
														$r_coatyp 	= $this->db->query($s_coatyp);
														if($r_coatyp->num_rows() > 0)
														{
															foreach($r_coatyp->result_array() as $rw_coatyp):
																$Account_Category 	= $rw_coatyp['Account_Category'];

																$Category  = "";
																if($Account_Category == 1) $Category = "ASSET";
																elseif($Account_Category == 2) $Category = "LIABILITAS";
																elseif($Account_Category == 3) $Category = "EKUITAS";
																elseif($Account_Category == 4) $Category = "PENDAPATAN";
																elseif($Account_Category == 5) $Category = "BEBAN KONTRAK";
																elseif($Account_Category == 6) $Category = "BEBAN USAHA";
																elseif($Account_Category == 7) $Category = "PENGHASILAN LAIN-LAIN";
																elseif($Account_Category == 8) $Category = "BEBAN LAIN-LAIN";
																else $Category = "Header";

																?>
																	<option value="<?=$Account_Category?>"><?php echo $Category; ?></option>
																<?php
															endforeach;
														}
													?>
                                                </select>
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label">Account Name</label>
                                                <input type="text" name="Account_Name" id="Account_Name" class="form-control" value="" placeholder="Account Name...">
                                            </div>
                                        </div>
                                    </form>
                                </div>
							</div>
							<div class="card-footer d-sm-flex justify-content-between">
								<a class="btn btn-warning btn-sm" onclick="refreshData()"><i class="fa fa-filter"></i> 
									<span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
									Filter
								</a>
								<a href="<?=$url_Add?>" class="btn btn-primary btn-sm">+ Add Account</a>
							</div>
						</div>
					</div>
				</div>
            	<div class="row">
					<div class="col-xl-12">
						<div class="card">
							<div class="card-body p-0">
								<div class="table-responsive active-projects manage-client">
									<div class="tbl-caption">
										<h4 class="heading mb-0">Account List</h4>
									</div>
									<table id="dataTable" class="table table-hover table-responsive-sm bordered" width="100%">
										<thead class="thead-primary">
											<tr>
												<th style="letter-spacing: 3px;" width="150">Account No.</th>
												<th style="letter-spacing: 3px;" width="200">Account Name</th>
												<th class="text-center" style="letter-spacing: 3px;" width="50">Type</th>
												<th style="letter-spacing: 3px; text-align: right;" width="100">Debit</th>
												<th style="letter-spacing: 3px; text-align: right;" width="100">Kredit</th>
												<th style="letter-spacing: 3px; text-align: right;" width="100">Saldo</th>
												<th class="text-center" style="letter-spacing: 3px;" width="150">Status</th>
												<th class="text-center" width="10"></th>
											</tr>
										</thead>
										<tbody>								
										</tbody>
										<tfoot class="bg-primary-light">
											<tr>
												<th colspan="3" class="bold" style="text-align: right;">Total</th>
												<th class="bold" id="TDebit" style="text-align: right;"></th>
												<th class="bold" id="TKredit" style="text-align: right;"></th>
												<th class="bold" id="TSaldo" style="text-align: right;"></th>
												<th>&nbsp;</th>
												<th>&nbsp;</th>
											</tr>
										</tfoot>
									</table>
								</div>
							</div>
							<div id="processing-indicator" class="center-img-container" style="display: none;">
								<img src='<?php echo base_url() . 'assets/images/loading/loading1.gif'; ?>' width='150' />
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
			$(document).ready(function() {
				get_DataTables();
			});
			
			async function fetchData() 
			{
				// Start Loading Data ..
				document.getElementById('processing-indicator').style.display = 'block';

				try {
					const PRJCODE 		= document.getElementById('PRJCODE');
					const Account_Category = document.getElementById('Account_Category');
					const Account_Name 	= document.getElementById('Account_Name');
					const formData 		= new FormData();
					formData.append('PRJCODE', PRJCODE.value);
					formData.append('Account_Category', Account_Category.value);
					formData.append('Account_Name', Account_Name.value);

					const response 	= await fetch('<?php echo $url_getAllData; ?>', {
						method: 'POST',
						body: formData
					});
					const data 		= await response.json();
					return data;
				} catch (error) {
					console.error('Error fetching data: ', error);
					return [];
				} finally {
					// End Loading Data
					document.getElementById('processing-indicator').style.display = 'none';
				}
			}

			async function get_DataTables() 
			{
				const data 	= await fetchData();
				console.log(data);

				if(data.length > 0) 
				{
					const table 	= $('#dataTable').DataTable({
						//dom: 'Bfrtip',
						dom: 'ZBfrltip',
						// dom: '<"row"<"col-sm-12 col-md-12"t>>' +
						// 	 '<"row"<"col-sm-12"tr>>' +
						// 	 '<"row"<"col-sm-12 col-md-3"i><"col-sm-12 col-md-9"p>>',
						buttons: [
							{ 
								extend: 'excel', 
								text: '<i class="fa-solid fa-file-excel"></i> Export Report',
								className: 'btn btn-sm border-0',
								exportOptions: {
									columns: [0, 1, 2, 3, 4, 5] // Specify the columns you want to export
								},
							}
						],
						processing: true,
						searching: false,
						select: false,
						pageLength:20,			
						lengthChange: false,
						data: data,
						order: [[0, 'asc']],
						columns: [
							{ data: 'Account_Number'},
							{ data: 'Account_Name', 
								render: function(data, type, row, meta) {
											return '<span class="text-wrap">'+ data +'</span>';
							}},
							{ data: 'Type', className: 'dt-body-center'},
							{ data: 'Debit', className: 'dt-body-right', 
								render: function(data, type, row, meta) {
											// const currencyFormatter = new Intl.NumberFormat('id-ID', {
											// 	style: 'currency',
											// 	currency: 'IDR',
  											// 	minimumFractionDigits: 2,
											// });
											// const formattedAmount = currencyFormatter.format(data);

											const formatter 		= new Intl.NumberFormat('en-US', { 
																			style: 'decimal', 
																			minimumFractionDigits: 2,
																			maximumFractionDigits: 2,
																		});
											const formattedNumber 	= formatter.format(Math.abs(data));
											// return doDecimalFormat(RoundNDecimal(parseFloat(Math.abs(data)), 2));
											return data < 0 ? `(${formattedNumber})` : formattedNumber;
							}},
							{ data: 'Kredit', className: 'dt-body-right', 
								render: function(data, type, row, meta) {
											// const currencyFormatter = new Intl.NumberFormat('id-ID', {
											// 	style: 'currency',
											// 	currency: 'IDR',
  											// 	minimumFractionDigits: 2,
											// });
											// const formattedAmount = currencyFormatter.format(data);

											const formatter 		= new Intl.NumberFormat('en-US', { 
																			style: 'decimal', 
																			minimumFractionDigits: 2,
																			maximumFractionDigits: 2,
																		});
											const formattedNumber 	= formatter.format(Math.abs(data));
											// return doDecimalFormat(RoundNDecimal(parseFloat(Math.abs(data)), 2));
											return data < 0 ? `(${formattedNumber})` : formattedNumber;
							}},
							{ data: 'Saldo', className: 'dt-body-right', 
								render: function(data, type, row, meta) {
											// const currencyFormatter = new Intl.NumberFormat('id-ID', {
											// 	style: 'currency',
											// 	currency: 'IDR',
  											// 	minimumFractionDigits: 2,
											// });
											// const formattedAmount = currencyFormatter.format(data);

											const formatter 		= new Intl.NumberFormat('en-US', { 
																			style: 'decimal', 
																			minimumFractionDigits: 2,
																			maximumFractionDigits: 2,
																		});
											const formattedNumber 	= formatter.format(Math.abs(data));
											// return doDecimalFormat(RoundNDecimal(parseFloat(Math.abs(data)), 2));
											return data < 0 ? `(${formattedNumber})` : formattedNumber;
							}},
							{ data: 'STATUS', className: 'dt-body-center'},
							{ data: 'Action', className: 'dt-body-center', orderable: false},
						],
						language: {
							paginate: {
								next: '<i class="fa-solid fa-angle-right"></i>',
								previous: '<i class="fa-solid fa-angle-left"></i>' 
							},
							processing: "<img src='<?php echo base_url() . 'assets/images/loading/loading1.gif'; ?>' width='150' />"
							
						},
					});
					
					updateTotal();

				} 
				else 
				{
					const table 	= $('#dataTable').DataTable({
						//dom: 'Bfrtip',
						dom: 'ZBfrltip',
						// dom: '<"row"<"col-sm-12 col-md-12"t>>' +
						// 	 '<"row"<"col-sm-12"tr>>' +
						// 	 '<"row"<"col-sm-12 col-md-3"i><"col-sm-12 col-md-9"p>>',
						buttons: [
							{ 
								extend: 'excel', 
								text: '<i class="fa-solid fa-file-excel"></i> Export Report',
								className: 'btn btn-sm border-0'
							}
						],
						processing: false,
						searching: false,
						select: false,
						pageLength:20,			
						lengthChange: false,
						language: {
							paginate: {
								next: '<i class="fa-solid fa-angle-right"></i>',
								previous: '<i class="fa-solid fa-angle-left"></i>' 
							}
							
						},
					});

					updateTotal();
				}
			}

			function refreshData() 
			{
				// Hapus data lama sebelum mengganti dengan data baru
				$('#dataTable').DataTable().clear().draw();
				// Menghancurkan instance DataTable
				$('#dataTable').DataTable().destroy();
				get_DataTables();
			}

			function updateTotal() 
			{
				var TDebit 		= 0;
				var TKredit		= 0;
				var TSaldo		= 0;
				var table 		= $('#dataTable').DataTable();

				const formatter = new Intl.NumberFormat('en-US', { 
									style: 'decimal', 
									minimumFractionDigits: 2,
									maximumFractionDigits: 2,
								});

				// Total Debit
				table.column(3).data().each(function(value) {
					TDebit += parseFloat(value);
				});

				// Total Debit
				table.column(4).data().each(function(value) {
					TKredit += parseFloat(value);
				});

				TSaldo 		= TDebit - TKredit;
				
				const TDebitVw 	= formatter.format(Math.abs(TDebit));
				document.getElementById('TDebit').innerHTML 	= TDebit < 0 ? `(${TDebitVw})` : TDebitVw;
				
				const TKreditVw = formatter.format(Math.abs(TKredit));
				document.getElementById('TKredit').innerHTML 	= TKredit < 0 ? `(${TKreditVw})` : TKreditVw;

				const TSaldoVw = formatter.format(Math.abs(TSaldo));
				document.getElementById('TSaldo').innerHTML 	= TSaldo < 0 ? `(${TSaldoVw})` : TSaldoVw;
			}

			function doDecimalFormat(angka) 
			{
				var a, b, c, dec, i, j;
				angka = String(angka);
				if(angka.indexOf('.') > -1){ a = angka.split('.')[0] ; dec = angka.split('.')[1]
				} else { a = angka; dec = -1; }
				b = a.replace(/[^\d]/g,"");
				c = "";
				var panjang = b.length;
				j = 0;
				for (i = panjang; i > 0; i--) {
					j = j + 1;
					if (((j % 3) == 1) && (j != 1)) c = b.substr(i-1,1) + "," + c;
					else c = b.substr(i-1,1) + c;
				}
				if(dec == -1) return angka;
				else return (c + '.' + dec); 
			}
			
			function RoundNDecimal(X, N) 
			{
				var T, S=new String(Math.round(X*Number("1e"+N)))
				while (S.length<=N) S='0'+S
				return S.substr(0, T=(S.length-N)) + '.' + S.substr(T, N)
			}
				
			function isIntOnlyNew(evt)
			{
				if (evt.which){ var charCode = evt.which; }
				else if(document.all && event.keyCode){ var charCode = event.keyCode; }
				else { return true; }
				return ((charCode == 45) || (charCode == 46) || (charCode == 8) || (charCode >= 48) && (charCode <= 57));
			}

			console.log($("ul#menu a").attr('href'));
		</script>
	<!-- END: Custome JS -->
</body>
</html>
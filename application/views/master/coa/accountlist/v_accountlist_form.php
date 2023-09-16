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

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
			<div class="page-titles">
				<ol class="breadcrumb">
					<li><h5 class="bc-title">Form Barang</h5></li> <!-- Menu name -->
				</ol>
			</div>
            <div class="container-fluid">
                <div class="col-xl-12 col-lg-12">
                    <form action="" method="post">
                        <div class="row">
                            <div class="col-xl-6 col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="basic-form">
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">Group/Category</label>
                                                <div class="col-sm-4">
                                                    <select class="default-select form-control wide mb-3">
                                                        <option value="">Choose...</option>
                                                        <option>Option 1</option>
                                                        <option>Option 2</option>
                                                        <option>Option 3</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-5">
                                                    <select class="default-select form-control wide mb-3">
                                                        <option value="">Choose...</option>
                                                        <option>Option 1</option>
                                                        <option>Option 2</option>
                                                        <option>Option 3</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">Tipe</label>
                                                <div class="col-sm-4">
                                                    <select class="default-select form-control wide mb-3">
                                                        <option value="">Choose...</option>
                                                        <option>Option 1</option>
                                                        <option>Option 2</option>
                                                        <option>Option 3</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-5">
                                                    <div class="input-group mb-3">
                                                        <button class="btn btn-primary" type="button">Search</button>
                                                        <input type="text" class="form-control" placeholder="Main Item...">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">Item</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" placeholder="Item Code...">
                                                </div>
                                                <div class="col-sm-5">
                                                    <input type="text" class="form-control" placeholder="Item Name...">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">Description</label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-txtarea form-control" id="comment"></textarea>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">Price/Unit</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" placeholder="Item Price...">
                                                </div>
                                                <div class="col-sm-5">
                                                    <select class="default-select form-control wide mb-3">
                                                        <option value="">Choose...</option>
                                                        <option>Option 1</option>
                                                        <option>Option 2</option>
                                                        <option>Option 3</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">Stock/Used</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control text-end" placeholder="0.00">
                                                </div>
                                                <div class="col-sm-5">
                                                    <div class="input-group mb-3">
                                                        <button class="btn btn-primary" type="button">Detail</button>
                                                        <input type="text" class="form-control text-end" placeholder="0.00">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title"><i class="fa fa-gear"></i> Pengaturan Lainnya</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="basic-form">
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">Stock Account</label>
                                                <div class="col-sm-9">
                                                    <select class="default-select form-control wide mb-3">
                                                        <option value="">Choose...</option>
                                                        <option>Option 1</option>
                                                        <option>Option 2</option>
                                                        <option>Option 3</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">Used Account</label>
                                                <div class="col-sm-9">
                                                    <select class="default-select form-control wide mb-3">
                                                        <option value="">Choose...</option>
                                                        <option>Option 1</option>
                                                        <option>Option 2</option>
                                                        <option>Option 3</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">Sales Account</label>
                                                <div class="col-sm-9">
                                                    <select class="default-select form-control wide mb-3">
                                                        <option value="">Choose...</option>
                                                        <option>Option 1</option>
                                                        <option>Option 2</option>
                                                        <option>Option 3</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">L/R Setting</label>
                                                <div class="col-sm-9">
                                                    <select class="default-select form-control wide mb-3">
                                                        <option value="">Choose...</option>
                                                        <option>Option 1</option>
                                                        <option>Option 2</option>
                                                        <option>Option 3</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">Status</label>
                                                <div class="col-sm-4">
                                                    <select class="default-select form-control wide mb-3">
                                                        <option value="0">Non Active</option>
                                                        <option value="1" selected>Active</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-5">
                                                    <button type="button" class="btn btn-success">
                                                        <svg xmlns="http://www.w3.org/2000/svg" height="1.5em" viewBox="0 0 448 512">
                                                            <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                                            <path fill="#fcfcfd" d="M48 96V416c0 8.8 7.2 16 16 16H384c8.8 0 16-7.2 16-16V170.5c0-4.2-1.7-8.3-4.7-11.3l33.9-33.9c12 12 18.7 28.3 18.7 45.3V416c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V96C0 60.7 28.7 32 64 32H309.5c17 0 33.3 6.7 45.3 18.7l74.5 74.5-33.9 33.9L320.8 84.7c-.3-.3-.5-.5-.8-.8V184c0 13.3-10.7 24-24 24H104c-13.3 0-24-10.7-24-24V80H64c-8.8 0-16 7.2-16 16zm80-16v80H272V80H128zm32 240a64 64 0 1 1 128 0 64 64 0 1 1 -128 0z"/>
                                                        </svg>
                                                    </button>
                                                    <button type="button" class="btn btn-danger">
                                                        <svg xmlns="http://www.w3.org/2000/svg" height="1.5em" viewBox="0 0 384 512">
                                                            <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                                            <path fill="#fcfcfd" d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <?php $this->load->view('template/footer-body') ?>        
    </div>
    <?php $this->load->view('template/js-footer') ?>
    <!-- START: Custome JS -->
    <script>
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
    </script>
    <!-- END: Custome JS -->    
</body>
</html>
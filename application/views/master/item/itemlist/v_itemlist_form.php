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
					<li><h5 class="bc-title">Form Item</h5></li> <!-- Menu name -->
				</ol>
			</div>
            <div class="container-fluid">
                <div class="col-xl-7 col-lg-7">
                    <form action="" method="post">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title"><i class="fa-solid fa-pen-to-square me-2"></i>Add - Form Item</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="basic-form">
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">Category / Parent</label>
                                                <div class="col-sm-4">
                                                    <select class="default-select form-control wide">
                                                        <option selected>Choose...</option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-5">
                                                    <select class="default-select form-control wide">
                                                        <option selected>Choose...</option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
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
                                                <label class="col-sm-3 col-form-label">Price / Unit</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control text-end" placeholder="0.00">
                                                </div>
                                                <div class="col-sm-5">
                                                    <select class="default-select form-control">
                                                        <option value="">Choose...</option>
                                                        <option>Option 1</option>
                                                        <option>Option 2</option>
                                                        <option>Option 3</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">Description</label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-txtarea form-control" rows="4" id="comment"></textarea>
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
                                                <div class="col-sm-5 text-end">
                                                    <button type="button" class="btn btn-success">
                                                        <i class="fa fa-save me-2"></i>Save
                                                    </button>
                                                    <button type="button" class="btn btn-danger">
                                                        <i class="fa fa-backward-step me-2"></i>Back
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
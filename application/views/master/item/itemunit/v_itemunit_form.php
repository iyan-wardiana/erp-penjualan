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
    <style>
        .error-feedback {
            font-size: 8pt;
            font-style: italic;
            color: red;
        }
    </style>
	
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
					<li><h5 class="bc-title"><?=$title?></h5></li> <!-- Menu name -->
				</ol>
			</div>
            <div class="container-fluid">
                <div class="col-xl-12 col-lg-12">
                    <div class="form-validation">
                        <form class="needs-validation" method="post" novalidate>
                            <div class="row">
                                <div class="col-xl-12 col-lg-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title"><i class="fa-solid fa-pen-to-square me-2"></i><?php echo ucfirst($task)." - ".$title;?></h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="basic-form">
                                                <div class="mb-3 row">
                                                    <label class="col-sm-2 col-form-label">Unit</label>
                                                    <div class="col-sm-5">
                                                        <input type="hidden" class="form-control" id="UNIT_NUM" name="UNIT_NUM" value="<?=$UNIT_NUM?>">
                                                        <input type="text" class="form-control" id="UNIT_CODE" name="UNIT_CODE" value="<?=$UNIT_CODE?>" placeholder="Unit Code..." required>
                                                        <div class="invalid-feedback" id="tes">
															Please enter a Unit Code...
														</div>
                                                    </div>
                                                    <div class="col-sm-5">
                                                        <input type="text" class="form-control" id="UNIT_NAME" name="UNIT_NAME" value="<?=$UNIT_NAME?>" placeholder="Unit Name..." required>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-2 col-form-label">Description</label>
                                                    <div class="col-sm-10">
                                                        <textarea class="form-txtarea form-control" rows="4" id="UNIT_DESC" name="UNIT_DESC"><?=$UNIT_DESC?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-success">
                                                <i class="fa fa-save me-2"></i>
                                                <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                                                Save
                                            </button>
                                            <button type="button" class="btn btn-danger" onclick="history.back()">
                                                <i class="fa fa-backward-step me-2"></i>Back
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <?php $this->load->view('template/footer-body') ?>        
    </div>
    <?php $this->load->view('template/js-footer') ?>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <!-- START: Custome JS -->
    <script>
        $(document).ready(function() {
            $('.needs-validation').validate({
                rules: {
                    UNIT_CODE: {
                        required: true,
                        remote: {
                            url: "<?php echo site_url('master/item/c_it3mun1t/chkCode/?id='.$UNIT_NUM) ?>",
                            type: "POST",
                            data: {
                                UNIT_CODE: function() {
                                    return $('#UNIT_CODE').val();
                                }
                            }
                        }
                    },
                    UNIT_NAME: {
                        required: true,
                    }
                },
                messages: {
                    UNIT_CODE: {
                        required: "<span class='error-feedback'>Unit Code is required.</span>",
                        remote: "<span class='error-feedback'>Unit code is already in use.</span>"
                    },
                    UNIT_NAME: {
                        required: "<span class='error-feedback'>Unit name is required.</span>",
                    },
                },
                // errorClass: "error-feedback",
                // errorElement: "span",
                invalidHandler: function(event, validator) {
                    console.log(validator);
                },
                submitHandler: function(form) {
                    // disabled button action
                    $('button:first-child').addClass('d-none');
                    $('button > span').removeClass('d-none');
                    // form.submit(); // Lanjutkan pengiriman or
                    // $(form).ajaxSubmit(); submit ajax or javascript

                    const UNIT_NUM    = document.getElementById('UNIT_NUM');
                    const UNIT_CODE   = document.getElementById('UNIT_CODE');
                    const UNIT_NAME   = document.getElementById('UNIT_NAME');
                    const UNIT_DESC   = document.getElementById('UNIT_DESC');
                    const formData 	= new FormData();
                    formData.append('UNIT_NUM', UNIT_NUM.value);
                    formData.append('UNIT_CODE', UNIT_CODE.value);
                    formData.append('UNIT_NAME', UNIT_NAME.value);
                    formData.append('UNIT_DESC', UNIT_DESC.value);

                    fetch('<?php echo $url_saveData; ?>', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.json())
                    .then(result => {
                        console.log(result);
                        // button active again & reset form
                        $('button:first-child').removeClass('d-none');
                        $('button > span').addClass('d-none');
                        Swal.fire({text: result['message'], type: "success"})
                        .then(e => {
                            location.href = "<?php echo site_url('itemunit') ?>";
                        });
                    })
                    .catch(error => {
                        console.error('Terjadi kesalahan:', error);
                    });
                }
            })
        });
            
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
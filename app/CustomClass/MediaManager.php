<?php
namespace App\CustomClass;

class MediaManager{

    //Media Manager
    public static function media($select, $modalClass, $wrapperImageClass){
		if($select == 'single'){
			$selectType = 'radio';
		} elseif($select == 'multiple') {
			$selectType = 'checkbox';
		}
		$library =	'lib-'.$wrapperImageClass;
		ob_start();?>
            <!-- media modal... -->


			<div id="<?php echo $modalClass;?>"  class="modal fade">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
                            <h5 class="modal-title">Media Manager</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
						</div>

						<div class="modal-body">
							<!-- nav tabs -->
							<ul class="nav nav-tabs" id="myTabs">
								<li class="nav-item"><a class="nav-link" href="#upload<?php echo $library;?>" data-toggle="tab">Upload</a></li>
								<li class="nav-item active"><a class="nav-link active show" href="#<?php echo $library;?>" data-toggle="tab">Library</a></li>
							</ul>

							<!-- tab panes -->
							<div class="tab-content">
								<div class="tab-pane fade" id="upload<?php echo $library;?>">
									<div class="py-3">
										
										 <form method="POST" enctype="multipart/form-data" class="uploadform" id="upload_image_form<?php echo $modalClass;?>" xaction="<?php echo route('admin_media_store'); ?>" >
                  
											<div class="row">
												<div class="col-md-12 mb-2 text-center">
													<img id="image_preview_container" src="" style="max-height: 150px;">
												</div>
												<div class="col-md-12">
													<div class="form-group alert alert-primary">
														<input type="file" class="form-control mx-auto w-75" name="image" placeholder="Choose image" id="image">
														<span class="text-danger"><?php //echo $errors->first('title'); ?></span>
													</div>
												</div>
												
												
												<div class="col-md-12 text-center mt-2">
													<button id="submitButton" type="submit" class="btn btn-primary">Upload</button>
												</div>
											</div>     
										</form>
										<br />
										<div class="progress">
											<div class="progress-bar" role="progressbar" xaria-valuenow=""
											xaria-valuemin="0" xaria-valuemax="100" style="width: 0%">
												0%
											</div>
										</div>
										
										<div id="uploadStatus">
											
										</div>

									</div>
								</div>

								<!-- library tab -->
								<div class="tab-pane active fade in active show librayr" id="<?php echo $library;?>">
									<!-- images hard coded.. -->
									<!-- data-image-id contains image id from database... -->
									<div class="py-3">
										
										<div class="row <?php echo $wrapperImageClass;?>ajaximage">

										</div>	
									</div>

									<div class="clearfix"></div>
									<!-- insert button -->
									<button type="button" class="btn btn-sm btn-primary insert" data-dismiss="modal">Insert</button>
								</div><!-- end .library -->
							</div><!-- end tab-content -->
						</div>
					</div><!-- end .modal-content -->
				</div><!-- end .modal-dialog -->
			</div><!-- end .modal -->
	
	<script>
		/*--------------------------------------------
			Show All Image from DB in Medial Library
		--------------------------------------------*/
		function ajaxImageShow(){
			$('[data-target="#<?php echo $modalClass;?>"], a[href$="#<?php echo $library;?>"]').click(function(e){
				e.preventDefault();
				$('.<?php echo $wrapperImageClass;?>ajaximage').empty();
				$('#<?php echo $modalClass;?> #image_preview_container').attr('src', '');
				$('#<?php echo $modalClass;?> #uploadStatus').empty()
				$('.progress-bar').width('0%')
				$.ajax({
					type : "GET",
					url	 : "<?php echo route('admin_media_get');?>", 	
					success: function(data){
						var fileLocaton = "<?php echo url('/public/uploads/images/').'/' ?>";
						//$('.ajd').append(data);
						for(var i = 0; i < data.length; i++){
							//console.log(data[i]);
							let sh = '<div class="col-md-3 col-6 mb-2">'
								sh +='<a href="#" data-image-id="'+data[i].id+'">'
								sh += '<img class="img-fluid" src="'+fileLocaton+data[i].filename+'">'
								sh += '<input type="<?php echo $selectType; ?>" name="images-check">'
								sh += '</a></div>'
							//console.log(sh);
							$('.<?php echo $wrapperImageClass;?>ajaximage').append(sh);
						}
					}
				})
			})
		}
		ajaxImageShow();

		//
		
		$('.close').click(function(e){
			e.preventDefault();
			$('.<?php echo $wrapperImageClass;?>ajaximage').empty();
			$('#<?php echo $modalClass;?>').hide();
			$('.progress-bar').width('0%')
		})
		
			//ajaxImageShow()
		
	</script>

    <script>
		/*--------------------------------------------
		For Modal Insert Image & Remove inserted Image
		--------------------------------------------*/
		var mediaModal = $('#<?php echo $modalClass;?>'),
    	library = $('#<?php echo $library;?>'), //tab
		productImagesContainer = $('.<?php echo $wrapperImageClass;?>'); //container

    	library.on('click','a',function(e){
    		e.preventDefault();

    		//checkboxprocessing........
    		var checkbox = $(this).find('input[type=<?php echo $selectType; ?>]');

    		if(!checkbox.is(':checked')){
    			checkbox.prop('checked', true);
    		}else{
    			checkbox.prop('checked', false);
    		}
    	});

    	//insert button and send images to the form and hidden fields tooo....
    	$('.insert').click(function(e){
    		//collect checkbox
			//var checkboxes = library.find('input[type=<?php //echo $selectType; ?>]');
			var checkboxes = $('#<?php echo $library;?>').find('input[type=<?php echo $selectType; ?>]');
			var checkboxType = '<?php echo $selectType; ?>';
    		checkboxes.each(function(i, el){
    			if(el.checked){
    				var imageId = $(el).parent().data('image-id');
					var imgSrc = $(el).siblings('img').attr('src');
					//alert(checkboxType);
					if(checkboxType == 'checkbox'){
						var image_ids = '<?php echo $wrapperImageClass;?>_id[]';
					} else {
						var image_ids = '<?php echo $wrapperImageClass;?>_id';
					}

    				//template
    				var template = 	'<div class="product-img product-images col-md-2 col-3">'+
    									'<input type="hidden" name="'+image_ids+'" value="'+ imageId +'">'+
    									'<img class="img-fluid" src="'+ imgSrc +'" />'+
    									'<a href="javascript:void()" class="remove">'+
										'<span class="fa fa-trash"></span></a>'+
    								'</div>';
					//append
					//productImagesContainer.append(template);
					//$('.<?php //echo $wrapperImageClass;?>').append(template);

					
						
					if(checkboxType == 'radio'){
						//productImagesContainer.append(template);
						$('.<?php echo $wrapperImageClass;?>').empty();
						$('.<?php echo $wrapperImageClass;?>').append(template);
					} else {
						//productImagesContainer.reset();
						$('.<?php echo $wrapperImageClass;?>').append(template);
						//$('.<?php echo $wrapperImageClass;?>ajaximage').empty();					
					}
					
    					
    			}
    		});
			//hide modal
			//$('.<?php //echo $wrapperImageClass;?>ajaximage').empty();
			//ajaxImageShow();
			//mediaModal.modal('hide');
    	});

    	//remove product images js
    	productImagesContainer.on('click', '.remove', function(e){
    		e.preventDefault();
    		//fadeout animation and remove....
    		$(this).parent('.product-img').fadeOut('100', function(){
    			$(this).remove();
    		});
    	});
	</script>


	<script type="text/javascript">
		/*--------------------------------------------
					Upload Image to DB
		--------------------------------------------*/
  
		$(document).ready(function (e) {

			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
			function imageShow(){
				$('#image').change(function(){
				
					let reader = new FileReader();
					reader.onload = (e) => { 
						$('#image_preview_container').attr('src', e.target.result); 
					}
					reader.readAsDataURL(this.files[0]); 
				});
			}
			//imageShow();
			$('#upload_image_form<?php echo $modalClass;?>').submit(function(event) {
					event.preventDefault();
					var formData = new FormData(this);
					var percentComplete = 0;
					$.ajax({
						xhr: function() {
							var xhr = new window.XMLHttpRequest();
							xhr.upload.addEventListener("progress", function(evt) {
								if (evt.lengthComputable) {
									var percentComplete = ((evt.loaded / evt.total) * 100);
									$(".progress-bar").width(percentComplete + '%');
									$(".progress-bar").html(percentComplete+'%');
								}
							}, false);
							return xhr;
						},

						type:'POST',
						url: "<?php echo route('admin_media_store'); ?>",
						data: formData,
						cache:false,
						contentType: false,
						processData: false,
						beforeSend: function(){
							$(".progress-bar").width('0%');
							//$('#uploadStatus').html('<img src="images/loading.gif"/>');
						},
						success: (data) => {
							//this.reset();
							//alert('Image has been uploaded successfully');
							if(data[0] == 'ok'){
								$('#upload_image_form<?php echo $modalClass;?>')[0].reset();
								$('#<?php echo $modalClass;?> .progress-bar').css('background', '#3d9970');
								
								$('#<?php echo $modalClass;?> #uploadStatus').html('<p style="color:#28A74B;">File has uploaded successfully!</p>');
								$('#<?php echo $modalClass;?> #image_preview_container').attr('src', data[1]); 						
							} else if(data == 'err'){
								$('#<?php echo $modalClass;?> .progress-bar').text('0%');
								$('#<?php echo $modalClass;?> .progress-bar').css('background', 'red');
								$('#<?php echo $modalClass;?> .progress-bar').css('width', '0%');
								$('#<?php echo $modalClass;?> #uploadStatus').html('<p style="color:#EA4335;">Please select a valid file to upload.</p>');
							}
						
						},
						error:function(){
							$('#<?php echo $modalClass;?> .progress-bar').text('0%');
							$('#<?php echo $modalClass;?> .progress-bar').css('background', 'red');
							$('#<?php echo $modalClass;?> #uploadStatus').html('<p style="color:#EA4335;">File upload failed, please try again.</p>');
						},
					}); //End Ajax
				// }) // end upload_image_form
			
			});
		});
		
		
	
		</script>
	

    <?php
        $content = ob_get_contents();
        ob_end_clean();
        return $content;

	}



	// All JS Script
	public static function mediaScript(){
		
		 ob_start();?>


	

		<link rel="stylesheet" href="<?php echo asset('public/admin/custom/media-manager.css?').rand(0,9000);?>">
		<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script> -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	
	
	


		 <?php
			$content = ob_get_contents();
			ob_end_clean();
			return $content;
	}
	
}
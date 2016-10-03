<?php error_reporting(0); ?>
<div class="ch-container">
    <div class="row my-container-class">
        <div id="content" class="col-lg-12 col-sm-12">
            <!-- content starts -->
            <div>
				<ul class="breadcrumb col-lg-9 col-sm-9">
					<li>
						<a href="<?php echo base_url('user/dashboard'); ?>">Home</a>
					</li>
					<li>
						<a href="#">Office Store</a>
					</li>
				</ul>
				<ul class="breadcrumb-my-toggle text-right  col-lg-3 col-sm-3">
					<li>
						<a href="<?php echo base_url('masterForm/office_master'); ?>">Show Offices </a>
					</li>
				</ul>
			</div>
			
			<div class="row">
			<div class="col-md-8 half-md-div col-md-push-2">
				<div class="box col-lg-12 col-md-12 col-xs-12" style=" margin-top: -10px;">
					<div class="box-inner">
						<div class="box-header well">
							<h2>Office Master Form</h2>
						</div>
						<div class="box-content">
						<form method="post" action="<?php echo base_url('masterForm/add_office_master'.$editUrl); ?>" autcomplete="off"/>
							<div class="row">
								<div class="form-group col-lg-4">
									<label class="control-label required">Region Office</label>
									<div class="controls">
										<select name="regional_store_id" id="regional_store_id" data-rel="chosen" class="form-control">
											<option value="">Select Region Office</option>
											<?php foreach($regional_store_master as $regional_store) {  
											$selected = '';
											if(isset($office_master_data->regional_store_id ) && $office_master_data->regional_store_id == $regional_store->regional_store_id){$selected = 'selected'; } else { $selected = '';}  											
											?>
											<option <?php echo $selected; ?> value="<?php echo $regional_store->regional_store_id;?>" <?php echo  set_select('regional_store_id', $regional_store->regional_store_id ); ?> ><?php echo $regional_store->regional_store_name."(".$regional_store->regional_store_type.")";?></option>
										<?php } ?>
										</select>
									</div>
									<?php echo form_error('regional_store_id'); ?>
								</div>
								<?php if($this->input->get('office_id')!=''){
									?>
									<label class="control-label">Operation Type: </label>
									<?php if($office_master_data->office_operation_type=='store'){ echo "Store";
										
									      }
										  if($office_master_data->office_operation_type=='showroom'){ echo "Showroom";} 
										  } ?>
								<div id="operation_type" class="form-group col-lg-5">
									<label class="control-label">Operation Type </label>
									
									
									<div class="clear-fix"></div>
									<input type="radio" name="office_operation_type" id="operation_type1" onclick="hideProductSold();" value="store" <?php if($office_master_data->office_operation_type=='store'){ echo "checked";} else { echo set_radio('office_operation_type', 'store'); } ?> >
									<label class="control-label">Store</label>									
									<input type="radio" name="office_operation_type" id="operation_type2" onclick="showProductSold();"  value="showroom" <?php if($office_master_data->office_operation_type=='showroom'){ echo "checked";} else{ echo set_radio('office_operation_type', 'showroom', TRUE); } ?> >
									<label class="control-label">Showroom</label>									
								</div>
							</div>
							<hr/>
							<div class="row">
								<div class="form-group col-lg-4">
									<label class="control-label required">Name </label>
									<input type="text" class="form-control text-uppercase" id="office_name" name="office_name" value="<?php if(isset($office_master_data->office_name )){echo $office_master_data->office_name;} else{ echo set_value('office_name'); } ?>" />
									<?php echo form_error('office_name'); ?>
								</div>
								<div class="form-group col-lg-4">
									<label class="control-label required">Short Code</label>
									<input type="text" class="form-control text-uppercase" id="office_short_code" name="office_short_code" value="<?php if(isset($office_master_data->office_short_code )){echo $office_master_data->office_short_code;} else{ echo set_value('office_short_code'); } ?>" />
									<?php echo form_error('office_short_code'); ?>
								</div>
								<div class="form-group col-lg-4">
									<label class="control-label required">Contact Person </label>
									<input type="text" class="form-control" id="office_contact_person" name="office_contact_person" value="<?php if(isset($office_master_data->office_contact_person )){echo $office_master_data->office_contact_person;} else{ echo set_value('office_contact_person'); } ?>" />
									<?php echo form_error('office_contact_person'); ?>
								</div>
							</div>
							
							<div class="row">
								<div class="form-group col-lg-4">
									<label class="control-label">Email-id </label>
									<input type="text" class="form-control" id="office_email_id" name="office_email_id" value="<?php if(isset($office_master_data->office_email_id )){echo $office_master_data->office_email_id;} else{ echo set_value('office_email_id'); } ?>" />
									<?php echo form_error('office_email_id'); ?>
								</div>
								<div class="form-group col-lg-4">
									<label class="control-label required">Phone Number </label>
									<input type="text" class="form-control" id="office_phone_number" name="office_phone_number" value="<?php if(isset($office_master_data->office_phone_number )){echo $office_master_data->office_phone_number;} else{ echo set_value('office_phone_number'); } ?>" />
									<?php echo form_error('office_phone_number'); ?>
								</div>
								<div class="form-group col-lg-4">
									<label class="control-label required">Mobile Number </label>
									<input type="text" class="form-control" id="office_mobile_number" name="office_mobile_number" value="<?php if(isset($office_master_data->office_mobile_number )){echo $office_master_data->office_mobile_number;} else{ echo set_value('office_mobile_number'); } ?>" />
									<?php echo form_error('office_mobile_number'); ?>
								</div>
							</div>
							<div class="row">
								<div class="form-group col-lg-4">
									<label class="control-label required">Address </label>
									<textarea class="form-control" style="resize:none;" rows="4" name="office_address"><?php if(isset($office_master_data->office_address )){echo $office_master_data->office_address;} else{ echo set_value('office_address'); } ?></textarea>
									<?php echo form_error('office_address'); ?>
								</div>
								<div class="form-group col-lg-4">
									<label class="control-label required">State </label>
									<div class="controls">
										<select id="state_id" name="state_id" data-rel="chosen" class="form-control" onchange="makeDistrictList();">
										<option value="">Select State</option>
										<?php foreach($state_master as $state) {  ?>
											<option value="<?php echo $state->state_id;?>" <?php echo  set_select('state_id', $state->state_id ); if(isset($office_master_data->state_id) && $office_master_data->state_id == $state->state_id){ echo 'selected';} ?> ><?php echo $state->state_name;?></option>
										<?php } ?>
										</select>
										<?php echo form_error('state_id'); ?>
									</div>
								</div>
								<div class="form-group col-lg-4">
									<label class="control-label required">District </label>
									<div class="controls" id="district_list">
										<select name="district_id" id="district_id" data-rel="chosen" class="form-control" onchange="makeCityList();">
										<?php foreach($district_master as $district) {  ?>
											<option value="<?php echo $district->district_id;?>" <?php echo  set_select('district_id', $district->district_id );  ?> ><?php echo $district->district_name;?></option>
										<?php } ?>
										</select>
									</div>
									<?php echo form_error('district_id'); ?>
								</div>
								<div class="form-group col-lg-4" >
									<label class="control-label required">City</label>
									<div class="controls" id="city_list">
										<select name="city_id" id="city_id" data-rel="chosen" class="form-control">
										<option value="">Select City</option>
										<?php foreach($city_master as $city) {  ?>
											<option value="<?php echo $city->city_id;?>" <?php echo  set_select('city_id', $city->city_id ); ?> ><?php echo $city->city_name;?></option>
										<?php } ?>
										</select>
									</div>
									<?php echo form_error('city_id'); ?>
								</div>
								<div class="form-group col-lg-4">
									<label class="control-label required">Pincode </label>
									<input type="text" class="form-control" id="office_pincode" onkeypress="return isNumeric(event);" name="office_pincode" value="<?php if(isset($office_master_data->office_pincode )){echo $office_master_data->office_pincode;} else{ echo set_value('office_pincode'); } ?>" />
									<?php echo form_error('office_pincode'); ?>
								</div>
							</div>
							<?php 
								$selectedProduct = array();
								foreach($office_product_data as $officeProductData){
									if(isset($officeProductData->product_id)){
										$selectedProduct[] = $officeProductData->product_id;
									} 
								}
								//print_r($selectedProduct);die;
							?>
							<div class="row">
								<div class="form-group col-lg-4" id="product_sold_div">
									<label class="control-label required">Products Sold </label><label class="pull-right"><a href="javascript:void(0);" onclick="selectAllProducts();">Select All</a></label><?php // print_r($selectedProduct); ?>
									<div class="controls" id="productList">
										<select name="product_id[]" id="product_id" multiple data-rel="chosen" class="form-control">
										<option value="">Select Products</option>
										<?php foreach($product_master as $product) {  ?>
											<option value="<?php echo $product->product_id;?>" <?php echo  set_select('product_id[]', $product->product_id,TRUE,1 ); if(in_array($product->product_id,$selectedProduct)){ echo 'selected'; } ?> ><?php echo $product->product_name;?></option>
										<?php } ?>
										</select>
									</div>
									<?php echo form_error('product_id[]'); ?>
								</div>
								<div class="form-group col-lg-4">
									<label class="control-label required">Access Rights From(Date)</label>
									<input type="text" id="access_rights_from" name="access_rights_from" class="form-control" value="<?php if(isset($office_master_data->access_rights_from )){echo $office_master_data->access_rights_from;} else{ echo set_value('access_rights_from'); } ?>" />
									<?php echo form_error('access_rights_from'); ?>
								</div>
								<div class="form-group col-lg-4">
									<label class="control-label">Access Rights To(Date)</label>
									<input type="text" id="access_rights_to" name="access_rights_to" class="form-control" value="<?php if(isset($office_master_data->access_rights_to )){echo $office_master_data->access_rights_to;} else{ echo set_value('access_rights_to'); } ?>" />
								</div>
							</div>
							<div class="row">
								<div class="control-group col-lg-4">
									<label class="control-label">Short Name</label>
									<input type="text" class="form-control" id="office_short_name" name="office_short_name" value="<?php if(isset($office_master_data->office_short_name )){echo $office_master_data->office_short_name;} else{ echo set_value('office_short_name'); } ?>" />
									<?php echo form_error('office_short_name'); ?>
								</div>
							</div>
						</div>
						
						<div class="box-header well" >
						<h2>Tax Details</h2>
						</div> 
						<div class="box-content">
							<div class="row">
								<div class="form-group col-lg-3">
									<label class="control-label required">TAN Number</label>
									<input type="text" class="form-control" id="office_service_tax_number" name="office_service_tax_number"  value="<?php if(isset($office_master_data->office_service_tax_number )){echo $office_master_data->office_service_tax_number;} else{ echo set_value('office_service_tax_number'); } ?>" />
									<?php echo form_error('office_service_tax_number'); ?>
								</div>
								<div class="form-group col-lg-3">
									<label class="control-label required">CST Number</label>
									<input type="text" class="form-control" id="office_vat_cst_number" name="office_vat_cst_number" value="<?php if(isset($office_master_data->office_vat_cst_number )){echo $office_master_data->office_vat_cst_number;} else{ echo set_value('office_vat_cst_number'); } ?>" />
									<?php echo form_error('office_vat_cst_number'); ?>
								</div>
								<div class="form-group col-lg-3">
									<label class="control-label required">VAT / TIN Number </label>
									<input type="text" class="form-control" id="office_tin_number" name="office_tin_number" value="<?php if(isset($office_master_data->office_tin_number )){echo $office_master_data->office_tin_number;} else{ echo set_value('office_tin_number'); } ?>" />
									<?php echo form_error('office_tin_number'); ?>
								</div>
								<div class="form-group col-lg-3">
									<label class="control-label required">PAN Number </label>
									<input type="text" class="form-control" id="office_pan_number" name="office_pan_number" value="<?php if(isset($office_master_data->office_pan_number )){echo $office_master_data->office_pan_number;} else{ echo set_value('office_pan_number'); } ?>"/>
									<?php echo form_error('office_pan_number'); ?>
								</div>
							</div>
							<div class="row">
								<div class="form-group col-lg-6">
									<button type="submit" class="btn btn-primary">Submit</button>
									<?php if($editUrl == ''){ ?>
									<a class="btn btn-primary" href="<?php echo base_url('masterForm/add_office_master'); ?>">Reset</a>
									<?php } else { ?>
									<a class="btn btn-primary" href="<?php echo base_url('masterForm/office_master'); ?>">Cancel</a>
									<?php } ?>
								</div>
								<div class="form-group col-lg-6">
								</div>
							</div>
						</form>
						</div>
					</div>
				</div>
			</div>
			</div><!--/row-->
    <!-- content ends -->
		</div><!--/#content.col-md-0-->
	</div><!--/fluid-row-->

	
<script type="text/javascript">
$(document).ready(function(){
	var districtId  = '<?php if(isset($office_master_data->district_id)){echo $office_master_data->district_id; } else {echo set_value('district_id'); } ?>';
	var cityId  = '<?php if(isset($office_master_data->city_id)){echo $office_master_data->city_id; } else {echo set_value('city_id'); } ?>';

	var pId = '<?php if(isset($office_master_data->office_operation_type)){echo $office_master_data->office_operation_type; } else { echo set_value('office_operation_type'); } ?>';
	
		makeDistrictList(districtId,cityId);
	
	if(pId== "store"){
		$('#operation_type1').prop('checked',true);
		$('#operation_type2').prop('checked',false);
		hideProductSold();
	}
	else{
		$('#operation_type1').prop('checked',false);
		$('#operation_type2').prop('checked',true);
		showProductSold();
	}	
});

function makeDistrictList(districtId,cityId)
{
	var stateId = $('#state_id :selected').val();
	$.ajax({
			url : "<?php echo base_url('masterForm/makeDistrictList');?>",
			type: "POST",
			data: {state_id:stateId,district_id:districtId},
			dataType: 'json',
			success:function(res){
				// $('#district_list').html(res.district);
				$('#district_id').html(res.district);
				$('#district_id').trigger('chosen:updated');
				if(cityId>0){
					makeCityList(cityId);
				}
			}
	});
}

function makeCityList(cityId)
{
	var districtId = $('#district_id :selected').val();
	$.ajax({
			url : "<?php echo base_url('masterForm/makeCityList');?>",
			type: "POST",
			data: {district_id:districtId,city_id:cityId},
			dataType: 'json',
			success:function(res){
				// $('#city_list').html(res.city);
				$('#city_id').html(res.city);
				$('#city_id').trigger('chosen:updated');
			}
			
	});
}
</script>

<script type="text/javascript">
$(function() {
    $( "#access_rights_from" ).datepicker({
		dateFormat : "dd/mm/yy",
      changeMonth: true,
	  changeYear: true,
	  minDate:0,
      numberOfMonths: 1,
      onClose: function( selectedDate ) {
        $( "#access_rights_to" ).datepicker( "option", "minDate", selectedDate );
      }
    });
	$('#access_rights_from').datepicker('setDate', new Date());
    $( "#access_rights_to" ).datepicker({
		dateFormat : "dd/mm/yy",
      changeMonth: true,
	  changeYear: true,
	  minDate:0,
      numberOfMonths: 1,
      onClose: function( selectedDate ) {
        $( "#access_rights_from" ).datepicker( "option", "maxDate", selectedDate );
      }
    });
});

function hideProductSold()
{
	$('#product_sold_div').addClass('hide');
	$('#product_id').prop('disabled',true);
}

function selectAllProducts()
{
	$('#product_id option').attr('selected', 'selected');
	$('#product_id option:first').attr('selected', false);
	$('#product_id').trigger('chosen:updated');
}

function showProductSold()
{ 
    var  productes=[];
	$('#product_sold_div').removeClass('hide');
	$('#product_id, #product_id_chosen').prop('disabled',false);
	$('#product_id_chosen').css('width','100%');
	productes="<?php echo $this->input->get('office_id'); ?>";
	//alert(productes);
	$.ajax({
			url : "<?php echo base_url('masterForm/getProductList'); ?>",
			type : "post",
			data : {data:productes},
			success : function(res){
				$('#productList').html(res);
			}
	});
}
<?php if($this->input->get('office_id')!=''){ ?>
$('#operation_type').hide();
<?php } ?>
</script>
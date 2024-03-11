<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<?php
use App\Services\CrmresultService;
$crmresultService = new CrmresultService();
?>
<style>
#success_category {
display: none;
}
#fail_category {
display: none;	
}
</style>
<div class ="container"><center>
<h1 class="bg-primary">Создание</h1>
<hr>
<p>
<form id="form" method = "post" action = "<?= base_url(route_to('crmresult.store')) ?>">
<h3 class="bg-secondary">Выбор тега</h3>
<div class="form-inline">
  <div class="form-group">
    <label for="tag">Выбор тега &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
	<select class="form-control" id="tag" name = "tag">
	    <?php foreach($tags as $tg):?>
	      <option value="<?=$tg?>"><?=$tg?></option>
	    <?php endforeach ?>
    </select>
  </div>
</div>
<hr>
<h3 class ="bg-success">Критерий успеха</h3>
<hr>
<div class="form-inline">
  <div class="form-group">
     <label for="success_entity">Лид или Сделка &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
	  <select class="form-control" id = "success_entity" name = "success_entity">
        <option value="lead">Лид</option>
	    <option value="deal">Сделка</option>
	  </select>
  </div>
</div>
<hr>
<div class="form-inline">
  <div class="form-group">
     <label for="success_category">Воронка &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
	  <select class="form-control" id = "success_category" name = "success_category">
	     <option value=""></option>
        <?php foreach($dealsCategoriesList as $dealsCategory):?>
		 
	      <option value="<?=$dealsCategory['ID']?>"><?=$dealsCategory['NAME']?></option>
	    <?php endforeach ?>
	  </select>
  </div>
</div>
<hr>
<div class="form-inline">
  <div class="form-group">
     <label for="success_stage">Стадия &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
	  <select class="form-control" id = "success_stage" name = "success_stage">
        <?php $crmresultService->getSuccessLeadStage(); ?>
	  </select>
  </div>
</div>
<hr>
<h3 class="bg-danger">Критерий провала</h3>
<hr>
<div class="form-inline">
  <div class="form-group">
     <label for="fail_entity">Лид или Сделка &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
	  <select class="form-control" id = "fail_entity" name = "fail_entity">
        <option value="lead">Лид</option>
	    <option value="deal">Сделка</option>
	  </select>
  </div>
</div>
<hr>
<div class="form-inline">
  <div class="form-group">
     <label for="fail_category">Воронка &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
	  <select class="form-control" id = "fail_category" name = "fail_category">
	    <option value=""></option>
        <?php foreach($dealsCategoriesList as $dealsCategory):?>
		  
	      <option value="<?=$dealsCategory['ID']?>"><?=$dealsCategory['NAME']?></option>
	    <?php endforeach ?>
	  </select>
  </div>
</div>
<hr>
<div class="form-inline">
  <div class="form-group">
     <label for="fail_stage">Стадия &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
	  <select class="form-control" id = "fail_stage" name = "fail_stage">
        <?php $crmresultService->getSuccessLeadStage(); ?>
	  </select>
  </div>
</div>
<hr>
<!--<h3 class="bg-secondary">Таймаут фиксации результата</h3>
<hr>
<div class="form-inline">
  <div class="form-group">
     <label for="timeout">Таймаут фиксации результата  &nbsp;&nbsp;&nbsp;&nbsp;</label>
	  <select class="form-control" id = "timeout" name = "timeout">
        <option value="5">5 минут</option>
	    <option value="10">10 минут</option>
		<option value="20">20 минут</option>
	    <option value="30">30 минут</option>
		<option value="60">60 минут</option>
	 </select>
  </div>
</div>
<hr>-->
<div class="form-inline">
  <div class="form-group">
    <input type="submit" class="btn btn-primary mb-2" name = "submit" value = "Создать">
  </div>
</div>
</form>

</p>
</center>
</div>
<script>
$("#success_entity").change(function(){
if($(this).val() === "lead"){
    $("#success_category").hide();
}
else if($(this).val() === "deal"){
    $("#success_category").show();
}
});

</script>

<script>
$("#fail_entity").change(function(){
if($(this).val() === "lead"){
    $("#fail_category").hide();
}
else if($(this).val() === "deal"){
    $("#fail_category").show();
}
});

</script>

<script> 
    
	 $('#success_entity').on('change', function() {
     var res =  this.value;
	 if(res === 'lead'){
		//var method = 'crm.status.list';
		$.ajax({
        url: "<?= base_url(route_to('crmresult.ajax')) ?>",
		method: 'get',
       // data : {'method':method},
        success: function(data){
        $('#success_stage').html(data);
           },
        });
	 }else if(res === 'deal'){
		var category = $("#success_category").val();
		$.ajax({
        url: "<?= base_url(route_to('crmresult.ajax2')) ?>",
		method: 'get',
        data : {'category':category},
        success: function(data){
        $('#success_stage').html(data);
           },
        });
	 }
	 
    });

</script>

<script> 
    
	 $('#success_category').on('change', function() {
     var category =  this.value;
	
	 $.ajax({
        url: "<?= base_url(route_to('crmresult.ajax2')) ?>",
		method: 'get',
        data : {'category':category},
        success: function(data){
        $('#success_stage').html(data);
           },
        });
    });

</script>

<script> 
    
	 $('#fail_entity').on('change', function() {
     var res =  this.value;
	 if(res === 'lead'){
		//var method = 'crm.status.list';
		$.ajax({
        url: "<?= base_url(route_to('crmresult.ajax')) ?>",
		method: 'get',
       // data : {'method':method},
        success: function(data){
        $('#fail_stage').html(data);
           },
        });
	 }else if(res === 'deal'){
		var category = $("#fail_category").val();
		$.ajax({
        url: "<?= base_url(route_to('crmresult.ajax2')) ?>",
		method: 'get',
        data : {'category':category},
        success: function(data){
        $('#fail_stage').html(data);
           },
        });
	 }
	 
    });

</script>

<script> 
    
	 $('#fail_category').on('change', function() {
     var category =  this.value;
	
	 $.ajax({
        url: "<?= base_url(route_to('crmresult.ajax2')) ?>",
		method: 'get',
        data : {'category':category},
        success: function(data){
        $('#fail_stage').html(data);
           },
        });
    });

</script>

<?= $this->endSection() ?>


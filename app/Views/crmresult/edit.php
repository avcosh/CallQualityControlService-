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
<h1>Редактирование</h1>
<hr>
<p>
<hr>
<form  method = "post" action = "<?= base_url(route_to('crmresult.update', $crmresult->id)) ?>">
<h3 class="bg-secondary">Тег</h3>
<div class="form-inline">
  <div class="form-group">
    <label for="tag">Выбор тега &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
	<select class="form-control" id="tag" name = "tag">
	    <?php foreach($tags as $tg):?>
	      <option value="<?=$tg?>" <?=$crmresult->tag == $tg ? "selected" : "" ?>><?=$tg?></option>
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
        <option value="lead" <?=$crmresult->success_entity == 'lead' ? "selected" : "" ?>>Лид</option>
	    <option value="deal" <?=$crmresult->success_entity == 'deal' ? "selected" : "" ?>>Сделка</option>
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
		  <option value="<?=$dealsCategory['ID']?>" <?=$crmresult->success_category == $dealsCategory['ID'] ? "selected" : "" ?>>
		    <?=$dealsCategory['NAME']?>
		  </option>
	    <?php endforeach ?>
	  </select>
  </div>
</div>
<hr>
<div class="form-inline">
  <div class="form-group">
     <label for="success_stage">Стадия &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
	  <select class="form-control" id = "success_stage" name = "success_stage">
        <?php $crmresultService->getLeadStageEdit($crmresult->success_stage); ?>
	  </select>
  </div>
</div>
<hr>

<!-- ПРОВАЛ-->

<h3 class="bg-danger">Критерий провала</h3>
<hr>
<div class="form-inline">
  <div class="form-group">
     <label for="fail_entity">Лид или Сделка &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
	  <select class="form-control" id = "fail_entity" name = "fail_entity">
        <option value="lead" <?=$crmresult->fail_entity == 'lead' ? "selected" : "" ?>>Лид</option>
	    <option value="deal" <?=$crmresult->fail_entity == 'deal' ? "selected" : "" ?>>Сделка</option>
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
		  
	      <option value="<?=$dealsCategory['ID']?>" <?=$crmresult->fail_category == $dealsCategory['ID'] ? "selected" : "" ?>>
		  <?=$dealsCategory['NAME']?>
		  </option>
	    <?php endforeach ?>
	  </select>
  </div>
</div>
<hr>
<div class="form-inline">
  <div class="form-group">
     <label for="fail_stage">Стадия &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
	  <select class="form-control" id = "fail_stage" name = "fail_stage">
         <?php $crmresultService->getLeadStageEdit($crmresult->fail_stage); ?>
	  </select>
  </div>
</div>
<hr>
<h3 class="bg-secondary">Таймаут фиксации результата</h3>
<hr>
<div class="form-inline">
  <div class="form-group">
     <label for="timeout">Таймаут фиксации результата  &nbsp;&nbsp;&nbsp;&nbsp;</label>
	  <select class="form-control" id = "timeout" name = "timeout">
        <option value="5"  <?=$crmresult->timeout == '5' ? "selected" : "" ?>>5 минут</option>
	    <option value="10" <?=$crmresult->timeout == '10' ? "selected" : "" ?>>10 минут</option>
		<option value="20" <?=$crmresult->timeout == '20' ? "selected" : "" ?>>20 минут</option>
	    <option value="30" <?=$crmresult->timeout == '30' ? "selected" : "" ?>>30 минут</option>
		<option value="60" <?=$crmresult->timeout == '60' ? "selected" : "" ?>>60 минут</option>
	 </select>
  </div>
</div>
<hr>
<div class="form-inline">
  <div class="form-group">
    <input type="submit" class="btn btn-primary mb-2" name = "submit" value = "Сохранить изменения">
  </div>
</div>
</form>
</p>
</center>
</div>

<script>
$(document).ready(function(){
 if($("#success_entity").val() === "lead"){
    $("#success_category").hide();
}
else if($("#success_entity").val() === "deal"){
    $("#success_category").show();
} 
});

</script>

<script>
$(document).ready(function(){
 if($("#fail_entity").val() === "lead"){
    $("#fail_category").hide();
}
else if($("#fail_entity").val() === "deal"){
    $("#fail_category").show();
} 
});

</script>

<script>
$(document).ready(function(){
     var res = $('#success_entity').val();
	 
	 if(res === 'lead'){
		var successStage = $("#success_stage").val();
		$.ajax({
        url: "<?= base_url(route_to('crmresult.ajax3')) ?>",
		method: 'get',
        data : {'successStage':successStage},
        success: function(data){
        $('#success_stage').html(data);
           },
        });
	 }else if(res === 'deal'){
		var category = $("#success_category").val();
		var success_stage = "<?= $crmresult->success_stage?>";
		$.ajax({
        url: "<?= base_url(route_to('crmresult.ajax4')) ?>",
		method: 'get',
        data : {'category':category, 'success_stage':success_stage},
        success: function(data){
        $('#success_stage').html(data);
           },
        });
	 }
});
</script>

<script>
$(document).ready(function(){
     var res = $('#fail_entity').val();
	 
	 if(res === 'lead'){
		var failStage = $("#fail_stage").val();
		$.ajax({
        url: "<?= base_url(route_to('crmresult.ajax5')) ?>",
		method: 'get',
        data : {'failStage':failStage},
        success: function(data){
        $('#fail_stage').html(data);
           },
        });
	 }else if(res === 'deal'){
		var category2 = $("#fail_category").val();
		var fail_stage = "<?= $crmresult->fail_stage?>";
		$.ajax({
        url: "<?= base_url(route_to('crmresult.ajax6')) ?>",
		method: 'get',
        data : {'category2':category2, 'fail_stage':fail_stage},
        success: function(data){
        $('#fail_stage').html(data);
           },
        });
	 }
});
</script>

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


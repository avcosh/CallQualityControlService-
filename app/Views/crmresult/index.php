<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<?php
use App\Services\CrmresultService;
$crmresultService = new CrmresultService();
?>

<div class ="container"><center>
<h1>Результат в CRM</h1>
<hr>
<h2>Блок Настройки</h2>
<p>
<hr>
<table id="dtBasicExample" class="table table-bordered table-striped">
  <thead>
    <tr>
	<th></th>
	<th scope="col" class=" text-center align-middle" colspan = "3">Критерий успеха : </th>
	<th scope="col" class="text-center align-middle" colspan = "3">Критерий провала : </th>
    <th></th>
	</tr>
    <tr>
      <th scope="col" class="bg-secondary text-center align-middle">Тег</th>
      <th scope="col" class="bg-success text-center align-middle">Сущность</th>
	  <th scope="col" class="bg-success text-center align-middle">Воронка</th>
      <th scope="col" class="bg-success text-center align-middle">Стадия</th>
      <th scope="col" class="bg-danger text-center align-middle">Сущность</th>
	  <th scope="col" class="bg-danger text-center align-middle">Воронка</th>
      <th scope="col" class="bg-danger text-center align-middle">Стадия</th>
	  <th scope="col" class="bg-secondary text-center align-middle">Таймаут фиксации результата</th>
	  <th></th>
	  <th></th>
    </tr>
  </thead>
  <tbody>

  <?php foreach($crmresultData as $data):?>
    <tr>
	
	<!-- Тег-->
    <td>
	<?php 
	    echo $data->tag;   
	?>
    </td>
	<!-- -->
	  
    <!-- Сущность -->
    <td class="text-center align-middle">
	<?php 
	    if($data->success_entity == "lead"){
			echo "Лид";
		}elseif($data->success_entity == "deal"){
			echo "Сделка";
		}
	?>
    </td>
	<!-- -->
	
	<!-- Воронка -->
    <td class="text-center align-middle"> 
	<?php 
	     if($data->success_entity == "lead"){
			 echo "";
		 }elseif($data->success_entity == "deal"){
			echo $crmresultService->getDealsCategoriesName($data->success_category);  
		 }
			    
	?>
    </td>
	<!-- -->
	
	<!-- Стадия -->
    <td class="text-center align-middle">
	<?php 
	   	if($data->success_entity == "lead"){
			echo $crmresultService->getLeadStageName($data->success_stage); 
		 }elseif($data->success_entity == "deal"){
			echo $crmresultService->getDealStageName($data->success_stage);
		 }
			    
	?>
    </td>
	<!-- -->
	

	<!-- Сущность -->
    <td class="text-center align-middle">
	<?php 
	   	if($data->fail_entity == "lead"){
			echo "Лид";
		}elseif($data->fail_entity == "deal"){
			echo "Сделка";
		}	    
	?>
    </td>
	<!-- -->
	
	<!-- Воронка -->
    <td class="text-center align-middle">
	<?php 
	     if($data->fail_entity == "lead"){
			 echo "";
		 }elseif($data->fail_entity == "deal"){
			echo $crmresultService->getDealsCategoriesName($data->fail_category);  
		 }
			    
	?>
    </td>
	<!-- -->
	
	<!-- Стадия -->
    <td class="text-center align-middle">
	<?php 
	   	if($data->fail_entity == "lead"){
			 echo $crmresultService->getLeadStageName($data->fail_stage); 
		 }elseif($data->fail_entity == "deal"){
			echo $crmresultService->getDealStageName($data->fail_stage); 
		 }	    
	?>
    </td>
	<!-- -->
	
	<!-- Таймаут фиксации результата -->
    <td class="text-center align-middle">
	<?php 
	   	echo $data->timeout;	    
	?>
    </td>
	<!-- -->
	  
	 
	  
	  <!-- Удалить отслеживание -->
	  <td>
	      <a href = "<?= base_url(route_to('crmresult.delete', $data->id))?>">
		     <button type="button" class="close" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
		  </a>
      </td>
	  <!-- -->
	  
	  <!-- Редактировать отслеживание -->
	  <td>
	    <p align="right">
	      <a href = "<?= base_url(route_to('crmresult.edit', $data->id))?>">&#128273; </a>
		</p>
	  </td>
	  <!-- -->
	  
    </tr>
   <?php endforeach ?>

  </tbody>
</table>
</p>
<hr>

<p>
<a href = "<?= base_url(route_to('crmresult.create'))?>" class = "btn btn-primary">СОЗДАТЬ</a>
</p>
</center>
</div>
<script>
$(document).ready(function () {
  $('#dtBasicExample').DataTable(
    {
        "paging": false
    }
  );
  $('.dataTables_length').addClass('bs-select');
});
</script>
<?= $this->endSection() ?>


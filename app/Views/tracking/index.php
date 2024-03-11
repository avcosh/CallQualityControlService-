<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<div class ="container"><center>
<h1>Отслеживание</h1>
<hr>
<h2>Какую фразу отслеживаем</h2>
<p>
<hr>
<table class="table table-bordered table-striped">
  <thead>
    <tr>
      <th scope="col">Какую фразу отслеживаем</th>
      <th scope="col">Кто говорит</th>
      <th scope="col">Тег</th>
    </tr>
  </thead>
  <tbody>

  <?php foreach($trackedTexts as $trackedText):?>
    <tr>
	
	<!-- Какую фразу отслеживаем-->
    <td>
	<?php 
	    echo $trackedText->trackedtext;
	?>
    </td>
	<!-- -->
	  
	<!-- Кто говорит -->
    <td>
    <?php 
		if($trackedText->who == '1'){
			echo "Клиент";
	    }elseif($trackedText->who == '2'){
			echo "Сотрудник";
		}
	?>
    </td>
	<!-- -->
	  
	<!-- Тег -->
    <td>
	<?php 
	    echo $trackedText->tag;		    
	?>
    </td>
	<!-- -->
	  
	 
	  
	  <!-- Удалить отслеживание -->
	  <td>
	      <a href = "<?= base_url(route_to('tracking.delete', $trackedText->id))?>">
		     <button type="button" class="close" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
		  </a>
      </td>
	  <!-- -->
	  
	  <!-- Редактировать отслеживание -->
	  <td>
	    <p align="right">
	      <a href = "<?= base_url(route_to('tracking.edit', $trackedText->id))?>">&#128273; </a>
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
<a href = "<?= base_url(route_to('tracking.create'))?>" class = "btn btn-primary">ДОБАВИТЬ ОТСЛЕЖИВАНИЕ</a>
</p>
</center>
</div>
<?= $this->endSection() ?>


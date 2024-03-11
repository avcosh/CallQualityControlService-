<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<div class ="container"><center>
<h1>Редактирование</h1>
<hr>
<p>
<hr>
<form  method = "post" action = "<?= base_url(route_to('tracking.update', $trackedText->id)) ?>">
<div class="form-inline">
   
     <div class="form-group">
     <label for="trackedtext">Какую фразу отслеживаем &nbsp;&nbsp;</label>
	 <textarea class="form-control" id="trackedtext" name = "trackedtext">
	     <?=$trackedText->trackedtext?>
	 </textarea>
     </div>
  
<hr>
  <div class="form-group">
    <label for="who">Кто говорит &nbsp;&nbsp;</label>
	  <select class="form-control" name = "who" id="who" value = "<?=$trackedText->who?>">
	    <option value="1" <?=$trackedText->who == '1'? "selected" : "" ?>>Клиент</option>
		<option value="2" <?=$trackedText->who == '2'? "selected" : "" ?>>Сотрудник</option>
	  </select>
  </div>
<hr>  
 
  <div class="form-group">
    <label for="tag">Тег &nbsp;&nbsp;</label>
	<input type = "text" class="form-control" id="tag" name = "tag" value = "<?=$trackedText->tag?>">
  </div>
  
<hr>
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
<?= $this->endSection() ?>


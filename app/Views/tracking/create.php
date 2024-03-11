<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<style>
form .hidden { display: none; important! }
form .visible { display: block; important! }
</style>
<div class ="container"><center>
<h1>Создание</h1>
<hr>
<p>
<form id="form" method = "post" action = "<?= base_url(route_to('tracking.store')) ?>">

<div class="form-inline">
  <div class="form-group">
    <label for="trackedtext">Какую фразу отслеживаем &nbsp;&nbsp;</label>
	<input type = "text" class="form-control" id="trackedtext" name = "trackedtext">
  </div>
</div>
<hr>

<div class="form-inline">
  <div class="form-group">
    <label for="who">Кто говорит &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
	  <select class="form-control" id = "who" name = "who">
	    <option value="1">Клиент</option>
	    <option value="2">Сотрудник</option>
	   </select>
  </div>
</div>
<hr>

<div class="form-inline">
  <div class="form-group">
    <label for="tag">Тег &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
	<input type = "text" class="form-control" id="tag" name = "tag">
  </div>
</div>
<hr>

<div class="form-inline">
  <div class="form-group">
    <input type="submit" class="btn btn-primary mb-2" name = "submit" value = "Создать">
  </div>
</div>
</form>

</p>
</center>
</div>

<?= $this->endSection() ?>


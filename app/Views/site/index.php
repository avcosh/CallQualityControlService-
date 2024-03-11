<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<div class ="container">

<div class="section sec-services">
	<div class="container">
		<div class="row mb-5">
			<div class="col-lg-5 mx-auto text-center" data-aos="fade-up">
				<h2 class="heading text-primary">Сервиса контроля качества звонков</h2>
				<p>Отчеты от CRM-Мастерской «TSL». Пакетное внедрение. Автоматизация процессов. Отраслевые решения </p>
			</div>
		</div>
        <div class="row">
			<div class="col-12 col-sm-6 col-md-6 col-lg-6" data-aos="fade-up">
                <div class="service text-center">
					<span class="bi-cash-coin"></span>
					<div>
						<h3>Отслеживание</h3>
						<p class="mb-4">  </p>
						<p><a href="<?= base_url(route_to('tracking.index')) ?>" class="btn btn-outline-primary py-2 px-3">Перейти</a></p>
					</div>
				</div>
			</div>
			
			<div class="col-12 col-sm-6 col-md-6 col-lg-6" data-aos="fade-up">
                <div class="service text-center">
					<span class="bi-cash-coin"></span>
					<div>
						<h3>Результат в CRM</h3>
						<p class="mb-4">  </p>
						<p><a href="<?= base_url(route_to('crmresult.index')) ?>" class="btn btn-outline-primary py-2 px-3">Перейти</a></p>
					</div>
			    </div>
			</div>
		</div>
	</div>
</div>

</div>
<?= $this->endSection() ?>


<div class="row">
	<div class="col-sm-6" style="padding-top:34px;">
		<div class="row">
			<div class='col-sm-12'>
			<ul class="nav nav-tabs">
			  <li class="active"><a href="#">Artikel Terkini</a></li>
			  <li><a href="#">Karier Dan Profesion</a></li>
			</ul>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12" style="padding:10px;padding-left:20px;">
				Masih tiada artikel terkini lagi!
			</div>
		</div>
	</div>
	<div class="col-sm-6">
		<div class="panel panel-default">
			<div class="panel-heading">
			<h3>Pengajar.My</h3>
			</div>
			<div class="panel-body">
				<p>Sebuah laman bagi komuniti para pengajar kemahiran berkolaborasi dan berkongsi pendapat untuk menjadikan industri kita, sebuah industri yang gah, kerana kita bukan sahaja pengajar, tetapi sebahagian dari assets berkemahiran untuk negara.</p>
				<div class="row">
					<div class="col-sm-12">
						<form action="" method="POST" role="form">
							<legend>Sertai Kami!</legend>
							<div class="form-group">
								<label for="">Email</label>
								<?php echo $exe->form->text('userEmail', 'class="form-control" placeholder="Email anda"');?>
							</div>
							<div class="form-group">
								<label for="">Kata-Laluan</label>
								<?php echo $exe->form->password('userPassword', 'class="form-control" placeholder="Tidak kurang dari 5 aksara"');?>
							</div>
							<p>p/s : pengajar kemahiran sahaja.</p>
							<button type="submit" class="btn btn-primary">Log Masuk</button>
							<button type="submit" class="btn btn-danger">Daftar</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		
	</div>
</div>
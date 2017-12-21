<div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="text-center">
					<h1>Login</h1>
				</div>
				
				<?= $this->Form->create() ?>
				<?= $this->Form->control('email') ?>
				<?= $this->Form->control('password') ?>
				<div class="text-center">
					<?= $this->Form->button('Login') ?>
					<?= $this->Form->button('Register') ?>
				</div>
				
				<?= $this->Form->end() ?>
				<br>
			</div>
		</div>
	</div>
	<div class="col-md-3"></div>
</div>


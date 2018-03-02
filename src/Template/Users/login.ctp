<!-- File: src/Template/Users/login.ctp -->
<!-- Main -->
<div id="main">
<article class="post">

<div class="table-wrapper">
<header>
        <h2>Please enter your username and password</h2>
		<?php echo $this->Flash->render(); ?>
		</header>
<?= $this->Form->create() ?>
    
        <div class="row uniform">
							<div class="6u$ 12u$(xsmall)">
		<?= $this->Form->input('username') ?>
		</div>
		
							<div class="6u$ 12u$(xsmall)">
							
							
        <?= $this->Form->input('password') ?>
		</div>
						</div>
  <div class="row uniform"><div class="12u$"><ul class="actions"><li>
<input type="submit" id="btn_comm"  class="" value="Submit" />
</li></ul></div></div>
<?= $this->Form->end() ?>
</div>
</article>
</div>
<!-- Sidebar -->
					<section id="sidebar">

						<!-- Intro -->
						<section id="intro">
								<a href="#" class="logo"><img src="/images/logo.png" alt="" /></a>
								<header>
									<h2>Login<h2>
									</header>
								<p></p>
							<ul class="icons">
												<li><a href="#" class="icon fa-linkedin"><span class="label">LinkedIn</span></a></li>
												<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
												<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
												<li><a href="#" class="icon fa-github"><span class="label">Github</span></a></li>
											</ul>
							</section>
							
							
							</section>
<!-- Main -->

<div id="main">

						<!-- Post -->
							<article class="post">


<div class="title">
<h1>Contact Form</h1>
<?php echo $this->Flash->render(); ?>
</div>


<?= $this->Form->create($cform); ?>
<div class="row uniform">
											<div class="12u 12u$(xsmall)">
<?= $this->Form->input('_name'); ?>
</div>
<div class="12u$ 12u$(xsmall)">
<?= $this->Form->input('_email'); ?>

</div>
<div class="12u$">
<?= $this->Form->input('_message'); ?>
</div>
<div class="12u$">
												<ul class="actions">
<?= $this->Form->button('Submit'); ?>
</ul>
</div>
<?= $this->Form->end(); ?>

</article>
</div>
		<!-- Sidebar -->
					<section id="sidebar">

						<!-- Intro -->
						<section id="intro">
								<a href="#" class="logo"><img src="/images/logo.png" alt="" /></a>
								<header>
									<h2>Contact<h2>
									</header>
								<p>Здравейте, ще се радвам да ми пишете по какъвто и да е повод!Може да ползвате контактната форма или линковете към социaлните мрежи.</p>
							<ul class="icons">
												<li><a href="#" class="icon fa-linkedin"><span class="label">LinkedIn</span></a></li>
												<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
												<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
												<li><a href="#" class="icon fa-github"><span class="label">Github</span></a></li>
											</ul>
							</section>
							
							
							</section>


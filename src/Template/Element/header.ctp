<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<h1>
						<a href="/"> Emil Peykov Blog</a>
						</h1>
						<nav class="links">
							<ul>
							
							<li><?= $this->Html->link('Категории','/categories/show') ?></li>
							<li><?= $this->Html->link('За Мен','#') ?></li>
							<li><?= $this->Html->link('Контакт','/contact') ?></li>
								
							</ul>
						</nav>
						<nav class="main">
							<ul>
								<li class="search">
									<a class="fa-search" href="#search">Search</a>
									
									<?php 
									echo $this->Form->create(null, [
    'url' => ['controller' => 'Articles', 'action' => 'search','id' => 'search']
]); 
									echo $this->Form->control('query', ['type' => 'text','placeholder'=>'Search']);

									

									/*<form id="search" method="get" action="#">
										<input type="text" name="query" placeholder="Search" />
									</form>
									*/
									echo $this->Form->end();
									?>

								</li>
								<li class="menu">
									<a class="fa-bars" href="#menu">Menu</a>
								</li>
							</ul>
						</nav>
					</header>

				<!-- Menu -->
					<section id="menu">

						<!-- Search -->
							<section>
							<?php 
									echo $this->Form->create(null, [
    'url' => ['controller' => 'Articles', 'action' => 'search']
]); 
									


							echo $this->Form->control('query', ['type' => 'text','placeholder'=>'Search']);
								/*<form class="search" method="get" action="#">
									<input type="text" name="query" placeholder="Search" />
								</form>
								*/
								echo $this->Form->end();
									?>
							</section>
	<section>
								<ul class="actions vertical">
									<?php echo $this->Html->link('Log In', array('controller'=>'users','action'=>'login'),['class'=>'button big fit']); ?></li>
									<li><?php echo $this->Html->link('Register', array('controller'=>'users','action'=>'register'),['class'=>'button big fit']); ?></li>
								</ul>
							</section>
						<!-- Links -->
							<section>
								<ul class="links">
									<li><?= $this->Html->link('Начало','/') ?></li>
									<li><?php echo $this->Html->link('Категории','/categories/show') ?></li>
								<li><a href="#">За Мен</a></li>
								<li><a href="#">Контакт</a></li>
									
								</ul>
							</section>

						<!-- Actions -->
						

					</section>


	
	
			
			
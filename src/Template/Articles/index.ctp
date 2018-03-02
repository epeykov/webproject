

				<!-- Main -->
					<div id="main">
<?php foreach ($articles as $article): ?>
						<!-- Post -->
							<article class="post">
								<header>
									<div class="title">
										<h2><?= $this->Html->link($article->title, ['action' => 'view', $article->id]) ?></h2>
										
									</div>
									<div class="meta">
										<time class="published" datetime="2015-11-01"><?= $article->created->format('d'); ?>
	<?= $article->created->i18nFormat('MMM'); ?>
	<?= $article->created->format('Y'); ?></time>
										<a href="#" class="author"><span class="name"><?=$article->user->fname.' '.$article->user->lname ?></span><img src=<?='/img/avatars/'.$article->user->avatar?> alt="" /></a>
									</div>
								</header>
								<a href="#" class="image featured"><?php echo $this->Html->image('/img/articles/'.$article->img,array('alt' => 'CakePHP','border' => '10')) ; ?></a>
									<?php
	$string =($article->body);
		if (strlen($string) > 400) {

    // truncate string
    $stringCut = substr($string, 0, 400);
   
    // make sure it ends in a word so assassinate doesn't become ass...
    $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'...'; 
	
	}
	 echo $string;

	
	?>
								
								<footer>
									<ul class="actions">
									<?php
	$string =($article->body);
	$str="";
		if (strlen($string) > 400) {
									$str .='<li><a href="/cake/articles/view/'.$article->id.'" class="button">'.__('ReadMore').'</a></li>';
									echo $str;
									}
									?>
									</ul>
									<ul class="stats">
										
										<li class="icon fa-eye"><?=$article->viewcount ?></li>
										<li class="icon fa-heart"><?= $article->likes_count ?></li>
										<li class="icon fa-comments-o"><?=$article->comm_count ?></li>
									</ul>
								</footer>
							</article>
<?php endforeach; ?>
						

						<!-- Post -->
						<!--
							<article class="post">
								<header>
									<div class="title">
										<h2><a href="#">Elements</a></h2>
										<p>Lorem ipsum dolor amet nullam consequat etiam feugiat</p>
									</div>
									<div class="meta">
										<time class="published" datetime="2015-10-18">October 18, 2015</time>
										<a href="#" class="author"><span class="name">Jane Doe</span><img src="images/avatar.jpg" alt="" /></a>
									</div>
								</header>

								<section>
									<h3>Text</h3>
									<p>This is <b>bold</b> and this is <strong>strong</strong>. This is <i>italic</i> and this is <em>emphasized</em>.
									This is <sup>superscript</sup> text and this is <sub>subscript</sub> text.
									This is <u>underlined</u> and this is code: <code>for (;;) { ... }</code>. Finally, <a href="#">this is a link</a>.</p>
									<hr />
									<p>Nunc lacinia ante nunc ac lobortis. Interdum adipiscing gravida odio porttitor sem non mi integer non faucibus ornare mi ut ante amet placerat aliquet. Volutpat eu sed ante lacinia sapien lorem accumsan varius montes viverra nibh in adipiscing blandit tempus accumsan.</p>
									<hr />
									<h2>Heading Level 2</h2>
									<h3>Heading Level 3</h3>
									<h4>Heading Level 4</h4>
									<hr />
									<h4>Blockquote</h4>
									<blockquote>Fringilla nisl. Donec accumsan interdum nisi, quis tincidunt felis sagittis eget tempus euismod. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan faucibus. Vestibulum ante ipsum primis in faucibus lorem ipsum dolor sit amet nullam adipiscing eu felis.</blockquote>
									<h4>Preformatted</h4>
									<pre><code>i = 0;

while (!deck.isInOrder()) {
  print 'Iteration ' + i;
  deck.shuffle();
  i++;
}

print 'It took ' + i + ' iterations to sort the deck.';</code></pre>
								</section>

								<section>
									<h3>Lists</h3>
									<div class="row">
										<div class="6u 12u$(medium)">
											<h4>Unordered</h4>
											<ul>
												<li>Dolor pulvinar etiam.</li>
												<li>Sagittis adipiscing.</li>
												<li>Felis enim feugiat.</li>
											</ul>
											<h4>Alternate</h4>
											<ul class="alt">
												<li>Dolor pulvinar etiam.</li>
												<li>Sagittis adipiscing.</li>
												<li>Felis enim feugiat.</li>
											</ul>
										</div>
										<div class="6u$ 12u$(medium)">
											<h4>Ordered</h4>
											<ol>
												<li>Dolor pulvinar etiam.</li>
												<li>Etiam vel felis viverra.</li>
												<li>Felis enim feugiat.</li>
												<li>Dolor pulvinar etiam.</li>
												<li>Etiam vel felis lorem.</li>
												<li>Felis enim et feugiat.</li>
											</ol>
											<h4>Icons</h4>
											<ul class="icons">
												<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
												<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
												<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
												<li><a href="#" class="icon fa-github"><span class="label">Github</span></a></li>
											</ul>
										</div>
									</div>
									<h3>Actions</h3>
									<div class="row">
										<div class="6u 12u$(medium)">
											<ul class="actions">
												<li><a href="#" class="button">Default</a></li>
												<li><a href="#" class="button">Default</a></li>
												<li><a href="#" class="button">Default</a></li>
											</ul>
											<ul class="actions small">
												<li><a href="#" class="button small">Small</a></li>
												<li><a href="#" class="button small">Small</a></li>
												<li><a href="#" class="button small">Small</a></li>
											</ul>
											<ul class="actions vertical">
												<li><a href="#" class="button">Default</a></li>
												<li><a href="#" class="button">Default</a></li>
												<li><a href="#" class="button">Default</a></li>
											</ul>
											<ul class="actions vertical small">
												<li><a href="#" class="button small">Small</a></li>
												<li><a href="#" class="button small">Small</a></li>
												<li><a href="#" class="button small">Small</a></li>
											</ul>
										</div>
										<div class="6u 12u$(medium)">
											<ul class="actions vertical">
												<li><a href="#" class="button fit">Default</a></li>
												<li><a href="#" class="button fit">Default</a></li>
											</ul>
											<ul class="actions vertical small">
												<li><a href="#" class="button small fit">Small</a></li>
												<li><a href="#" class="button small fit">Small</a></li>
											</ul>
										</div>
									</div>
								</section>

								<section>
									<h3>Table</h3>
									<h4>Default</h4>
									<div class="table-wrapper">
										<table>
											<thead>
												<tr>
													<th>Name</th>
													<th>Description</th>
													<th>Price</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>Item One</td>
													<td>Ante turpis integer aliquet porttitor.</td>
													<td>29.99</td>
												</tr>
												<tr>
													<td>Item Two</td>
													<td>Vis ac commodo adipiscing arcu aliquet.</td>
													<td>19.99</td>
												</tr>
												<tr>
													<td>Item Three</td>
													<td> Morbi faucibus arcu accumsan lorem.</td>
													<td>29.99</td>
												</tr>
												<tr>
													<td>Item Four</td>
													<td>Vitae integer tempus condimentum.</td>
													<td>19.99</td>
												</tr>
												<tr>
													<td>Item Five</td>
													<td>Ante turpis integer aliquet porttitor.</td>
													<td>29.99</td>
												</tr>
											</tbody>
											<tfoot>
												<tr>
													<td colspan="2"></td>
													<td>100.00</td>
												</tr>
											</tfoot>
										</table>
									</div>

									<h4>Alternate</h4>
									<div class="table-wrapper">
										<table class="alt">
											<thead>
												<tr>
													<th>Name</th>
													<th>Description</th>
													<th>Price</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>Item One</td>
													<td>Ante turpis integer aliquet porttitor.</td>
													<td>29.99</td>
												</tr>
												<tr>
													<td>Item Two</td>
													<td>Vis ac commodo adipiscing arcu aliquet.</td>
													<td>19.99</td>
												</tr>
												<tr>
													<td>Item Three</td>
													<td> Morbi faucibus arcu accumsan lorem.</td>
													<td>29.99</td>
												</tr>
												<tr>
													<td>Item Four</td>
													<td>Vitae integer tempus condimentum.</td>
													<td>19.99</td>
												</tr>
												<tr>
													<td>Item Five</td>
													<td>Ante turpis integer aliquet porttitor.</td>
													<td>29.99</td>
												</tr>
											</tbody>
											<tfoot>
												<tr>
													<td colspan="2"></td>
													<td>100.00</td>
												</tr>
											</tfoot>
										</table>
									</div>
								</section>

								<section>
									<h3>Buttons</h3>
									<ul class="actions">
										<li><a href="#" class="button big">Big</a></li>
										<li><a href="#" class="button">Default</a></li>
										<li><a href="#" class="button small">Small</a></li>
									</ul>
									<ul class="actions fit">
										<li><a href="#" class="button fit">Fit</a></li>
										<li><a href="#" class="button fit">Fit</a></li>
										<li><a href="#" class="button fit">Fit</a></li>
									</ul>
									<ul class="actions fit small">
										<li><a href="#" class="button fit small">Fit + Small</a></li>
										<li><a href="#" class="button fit small">Fit + Small</a></li>
										<li><a href="#" class="button fit small">Fit + Small</a></li>
									</ul>
									<ul class="actions">
										<li><a href="#" class="button icon fa-download">Icon</a></li>
										<li><a href="#" class="button icon fa-upload">Icon</a></li>
										<li><a href="#" class="button icon fa-save">Icon</a></li>
									</ul>
									<ul class="actions">
										<li><span class="button disabled">Disabled</span></li>
										<li><span class="button disabled icon fa-download">Disabled</span></li>
									</ul>
								</section>

								<section>
									<h3>Form</h3>
									<form method="post" action="#">
										<div class="row uniform">
											<div class="6u 12u$(xsmall)">
												<input type="text" name="demo-name" id="demo-name" value="" placeholder="Name" />
											</div>
											<div class="6u$ 12u$(xsmall)">
												<input type="email" name="demo-email" id="demo-email" value="" placeholder="Email" />
											</div>
											<div class="12u$">
												<div class="select-wrapper">
													<select name="demo-category" id="demo-category">
														<option value="">- Category -</option>
														<option value="1">Manufacturing</option>
														<option value="1">Shipping</option>
														<option value="1">Administration</option>
														<option value="1">Human Resources</option>
													</select>
												</div>
											</div>
											<div class="4u 12u$(small)">
												<input type="radio" id="demo-priority-low" name="demo-priority" checked>
												<label for="demo-priority-low">Low</label>
											</div>
											<div class="4u 12u$(small)">
												<input type="radio" id="demo-priority-normal" name="demo-priority">
												<label for="demo-priority-normal">Normal</label>
											</div>
											<div class="4u$ 12u$(small)">
												<input type="radio" id="demo-priority-high" name="demo-priority">
												<label for="demo-priority-high">High</label>
											</div>
											<div class="6u 12u$(small)">
												<input type="checkbox" id="demo-copy" name="demo-copy">
												<label for="demo-copy">Email me a copy</label>
											</div>
											<div class="6u$ 12u$(small)">
												<input type="checkbox" id="demo-human" name="demo-human" checked>
												<label for="demo-human">Not a robot</label>
											</div>
											<div class="12u$">
												<textarea name="demo-message" id="demo-message" placeholder="Enter your message" rows="6"></textarea>
											</div>
											<div class="12u$">
												<ul class="actions">
													<li><input type="submit" value="Send Message" /></li>
													<li><input type="reset" value="Reset" /></li>
												</ul>
											</div>
										</div>
									</form>
								</section>

								<section>
									<h3>Image</h3>
									<h4>Fit</h4>
									<div class="box alt">
										<div class="row uniform">
											<div class="12u$"><span class="image fit"><img src="images/pic02.jpg" alt="" /></span></div>
											<div class="4u"><span class="image fit"><img src="images/pic04.jpg" alt="" /></span></div>
											<div class="4u"><span class="image fit"><img src="images/pic05.jpg" alt="" /></span></div>
											<div class="4u$"><span class="image fit"><img src="images/pic06.jpg" alt="" /></span></div>
											<div class="4u"><span class="image fit"><img src="images/pic06.jpg" alt="" /></span></div>
											<div class="4u"><span class="image fit"><img src="images/pic04.jpg" alt="" /></span></div>
											<div class="4u$"><span class="image fit"><img src="images/pic05.jpg" alt="" /></span></div>
											<div class="4u"><span class="image fit"><img src="images/pic05.jpg" alt="" /></span></div>
											<div class="4u"><span class="image fit"><img src="images/pic06.jpg" alt="" /></span></div>
											<div class="4u$"><span class="image fit"><img src="images/pic04.jpg" alt="" /></span></div>
										</div>
									</div>
									<h4>Left &amp; Right</h4>
									<p><span class="image left"><img src="images/pic07.jpg" alt="" /></span>Fringilla nisl. Donec accumsan interdum nisi, quis tincidunt felis sagittis eget. tempus euismod. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent tincidunt felis sagittis eget. tempus euismod. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent. Donec accumsan interdum nisi, quis tincidunt felis sagittis eget. tempus euismod. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent tincidunt felis sagittis eget. tempus euismod. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent tincidunt felis sagittis eget. tempus euismod. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent.</p>
									<p><span class="image right"><img src="images/pic04.jpg" alt="" /></span>Fringilla nisl. Donec accumsan interdum nisi, quis tincidunt felis sagittis eget. tempus euismod. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent tincidunt felis sagittis eget. tempus euismod. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent. Donec accumsan interdum nisi, quis tincidunt felis sagittis eget. tempus euismod. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent tincidunt felis sagittis eget. tempus euismod. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent tincidunt felis sagittis eget. tempus euismod. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent.</p>
								</section>

							</article>
						-->

						<!-- Pagination -->
                                <ul class="actions pagination">
							    <?= $this->Paginator->prev(__('pg_prev')) ?>
								<?= $this->Paginator->counter() ?>
								
								<?= $this->Paginator->next(__('pg_next')) ?>
							</ul>

					</div>

				<!-- Sidebar -->
					<section id="sidebar">

						<!-- Intro -->
							<section id="intro">
								<a href="#" class="logo"><img src="images/logo.png" alt="" /></a>
								<header>
									<h2>"Veridis Quo"</h2>
									<p>Добре дошли в личното ми пространство за споделяне.</p><p>Приятно четене.</p>
								</header>
							</section>

						<!-- Mini Posts -->
							<section>
								<div class="mini-posts">

									<!-- Mini Post -->
									<?php foreach ($articles_lh as $minipost): ?>
										<article class="mini-post">
											<header>
												<h3><?= $this->Html->link($minipost->title, ['action' => 'view', $minipost->id]) ?></h3>
												<time class="published" datetime="2015-10-20"><?= $minipost->created ?></time>
												<a href="#" class="author"><img src=<?='/img/avatars/'.$minipost->user->avatar?> alt="" /></a>
											</header>
											<a href="#" class="image"><?php echo $this->Html->image('/img/articles/'.$minipost->img,array('alt' => 'CakePHP','border' => '10')) ; ?></a>
										</article>
											<?php endforeach; ?>
									

								</div>
							</section>


						<!-- About -->
							<section class="blurb">
								<h2>About</h2>
								<p>Привет, този сайт беше изграден с много желание и с малко свобоно време, което намирах след работа или посред нощите... 
								Бях си поставил две цели.Първата бе да се запозная с cake php , а втората бе  да оползотворя вече създаденото за нещо полезно.
								Затова наред с усъвършенстването ми в сферата на програмирането , ще публикуам полезни материали от интернет ,на които съм попаднал в процеса, но не само.</p>
								<p>Тук ще намерите статии и от други сфери на живота.
							    Технологиите , които ползвах са тривиалните php,mysql,javaScrip/jQuery,html.</p>
								<p>Прекрасния темплейт, който "покрива" всичко е наличен <a href="https://html5up.net/">на този адрес</a>.
								Надявам се този проект да е от полза и за Вас.</p>
								
								<ul class="actions">
									<li><a href="/contact" class="button">Contact</a></li>
								</ul>
							</section>


<!-- Footer -->
							<section id="footer">
								<ul class="icons">
									<li><a href="#" class="fa-twitter"><span class="label">Twitter</span></a></li>
									<li><a href="#" class="fa-facebook"><span class="label">Facebook</span></a></li>
									<li><a href="#" class="fa-instagram"><span class="label">Instagram</span></a></li>
									<li><a href="#" class="fa-rss"><span class="label">RSS</span></a></li>
									<li><a href="#" class="fa-envelope"><span class="label">Email</span></a></li>
								</ul>
								
							</section>

					</section>


		

	</body>
</html>
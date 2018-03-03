
<!-- Main -->
					<div id="main">

<article class="post">
<header>
<div class="title">
<h2><?=h($article->title) ?>
<ul class="icons">
<li>
<a class="icon fa-facebook-square" target="popup" onclick="window.open(this.href,'popup','width=430,height=680,resizable=yes')" href="https://www.facebook.com/sharer/sharer.php?u=<?= $this->Url->build(null,['fullBase'=>true]) ?>"></a>
</li>
<li>
<a class="icon fa-linkedin-square" target="popup" onclick="window.open(this.href,'popup','width=430,height=680,resizable=yes')" href="https://www.linkedin.com/sharing/share-offsite?mini=true&url=<?= $this->Url->build(null,['fullBase'=>true]) ?>"></a>
</li>
</ul>
</h2>
</div>
<div class="meta">

<?php function renderCat($catArray,$tmpHtml){
		
		if(!isset($return)){$return="";}
		foreach ($catArray  as $key => $category){
		
		$return .=$tmpHtml->link($category['title'],['controller' => 'Categories', 'action' => 'view',$key]);
		if (isset($category['parents']) && !($category['parents'])==""){
	
		$return .=' / ';
		}
		foreach ($category['parents'] as $key =>$parent ){
	
		$return .=$tmpHtml->link($parent['title'],['controller' => 'Categories', 'action' => 'view',$key]);
			
			if (isset($parent['parents']) && !($parent['parents'])==""){
		$return .=' / ';
		
		$return .=renderCat($parent['parents'],$tmpHtml);
		}
	}
}
	
		
		
return $return;

}?>
				
			<p class="icon fa-calendar"><?php echo $article->created->i18nFormat('d.MMMY') ?></p>
			<p class="icon fa-tags"><?php $tmpHtml = $this->Html;echo renderCat($categories,$tmpHtml); ?></p>
			<p class="icon fa-eye"><?=$article->viewcount ?></p> 
		
</div>

</header>

<?php echo $this->Html->image('/img/articles/'.$article->img,array('class'=>'image featured')) ; ?>
<?= $article->body ?>
 <?php if (!empty($article->images) && ($article->has_img_gallery)): ?>
<div class="box alt"> 
<div class="row uniform">
<div class="12u$"><span class="image fit"><?php echo $this->Html->image('/img/articles/'.$article->images[0]->img,array('alt' => 'Article image','class'=>'gallery-items')) ; ?></span></div>
 <?php foreach (array_slice($article->images,1 )as $image): ?>
  
											<div class="4u"><span class="image fit"><?php echo $this->Html->image('/img/articles/'.$image->img,array('alt' => 'Article image','class'=>'gallery-items')) ; ?></span></div>
									<?php endforeach; ?>		
											
										</div>
									</div>
 <?php endif; ?>

<footer id="artInfo">

<a href="#comments" id='btnComms' class="button">Last Coments : <?= count($newComments) ?> </a>
<a href="#addcomment" class="button">Add Comment </a>
<a href="#addlike" id='addLike' class="button" action="/articles/like/<?php echo $article->id ?>"><i class="icon fa-thumbs-up fa-2x"></i><?= $article->likes_count  ?></a>

</footer>
</article>
<article>
<div id="allComm" >
<div id="newComm" class="open">

<?php function renderPosts($commArray, $tmpModel,$tmpForm){
        //set return for the first time
        if(!isset($return)){ $return = ""; }
		//create list
		if (!empty($commArray)){
			
        foreach ($commArray as $comments){
			
		if ($comments->parent_id===null)
		{$return .='<blockquote class="parent" id="'.$comments->id.'" ><div class="post boxed">';} 
		else if (!empty($comments->children) && !($comments->parent_id===null)){
			{$return .='<blockquote class="parent" id="'.$comments->id.'" ><div class="post boxed_in">';} 
		}
		
		else 
		{$return .='<blockquote class="children" id="'.$comments->id.'" ><div class="post boxed_ch">';}
		
				
				$return .='<header><div class="meta">';
				//$return .='<table><thead><tr><th>';
				if (isset($comments->user->username))
				{
				$return .='<a class="author"><span class="name">'.$comments->user->fname.' '.$comments->user->lname.'</span>';
				if ($comments->user->avatar) {
					$return .='<img src=/img/avatars/'.$comments->user->avatar.'></a>';
				}
				else {
					$return .='<img src="/images/avatar.jpg" alt="" /></a>';
				}
				$return .='<time class="published" datetime="2015-11-01">'.$comments->created.'</time>';
				//$return .='<a class="author"><span class="name">'.$comments->user->fname.' '.$comments->user->lname.'</span><img src="/images/avatar.jpg" alt="" /></a>';
				}
				else {
					$return .='<a class="author"><span class="name">Guest</span><img src="/images/avatar.jpg" alt="" /></a>';
				$return .='<time class="published" datetime="2015-11-01">'.$comments->created.'</time>';
				}
				$return .= '<p>'.$tmpModel->link('Reply..', ['target'=>'#'],['class'=>'icon fa-reply viewhide','id'=>$comments->id]).'</p></div>';
				
				
				//$return .='</tr></table>';
				$return .='<div class="title">'.$comments->body;
				
			$return .='<div id="wrapper_comm">';
				$return .=$tmpForm->create('Post',['class'=>'replyForm','id'=>$comments->id ,'default'=>'false']);
				$return .= '<div class="row"><input class="text" type="hidden" name="parent_id" id="parent_id" value="'.$comments->id.'" >';
				$return .= '<textarea type="text"  name="body" id="body" value=""  placeholder="Enter your comment" ></textarea></div>';
				$return .='<div class="row"><ul class="actions"><li><input type="submit" id="btn_comm"  class="reply-form" value="Submit" /></li></ul></div>';
				$return .= $tmpForm->end();
				
				$return .='</div></div></header>';
				
                

                //if post has children, go deeper
                if(!empty($comments->children)){
				
				
                    $return .= renderPosts($comments->children, $tmpModel, $tmpForm);
					
                }
$return .='</div>';	
            $return .='</blockquote>';
		
						
					
        }
		
		}
        
        
        return $return;
    } ?>
         

					<?php $tmpModel = $this->Html; // we have to pass html helper inside, I am not sure it this is best way but it works
					 $tmpForm = $this->Form;
    echo renderPosts($newComments, $tmpModel, $tmpForm); //finally, we render the $result returned. ?>
				
					  <?php if (!empty($lastComments)): ?>
					<footer>
<a href="#comments" id='btnlastComms' class="button">Older Coments : <?= count($lastComments) ?> </a>
</footer>
				
				<?php endif; ?>
			
					  </div>
					  <div id="lastComm" class="open">
<?php echo renderPosts($lastComments, $tmpModel, $tmpForm); //finally, we render the $result returned. ?>
</div>
				

					
					  <section id="addcomment">
					  	
					<?= $this->Form->create('Post',['default'=>'false','id'=>'addComm']) ?>
				      				  
						
					  <div class="row">
							<div class="12u">
								<textarea type="text" name="body" id="body" value="" placeholder="Enter your comment" ></textarea>
							</div>
						</div>
						<div class="row">
							<div class="12u">
								<ul class="actions">
									<li><input type="submit" id="btn_comm" value="Submit" /></li>
									<li><input type="reset"  value="Clear Form" /></li>
								</ul>
							</div>
						</div>
					  
					 <?= $this->Form->end() ?>
					
				</section>
				
				</article>
</div>

								<!-- Sidebar -->
					<section id="sidebar">

						<!-- Intro -->
						<section id="intro">
								<a href="#" class="logo"><img src="/images/logo.png" alt="" /></a>
								<header>
									<h2>"Veridis Quo"</h2>
									<p>Добре дошли в личното ми пространство за споделяне.</p><p>Приятно четене.</p>
								</header>
							</section>

						<!-- Mini Posts -->
							<section>
								<div class="mini-posts">

									<!-- Mini Post -->
										<article class="mini-post">
											<header>
												<h3><a href="#">Vitae sed condimentum</a></h3>
												<time class="published" datetime="2015-10-20">October 20, 2015</time>
												<a href="#" class="author"><img src="/images/avatar.jpg" alt="" /></a>
											</header>
											<a href="#" class="image"><img src="/images/pic04.jpg" alt="" /></a>
										</article>

									<!-- Mini Post -->
										<article class="mini-post">
											<header>
												<h3><a href="#">Rutrum neque accumsan</a></h3>
												<time class="published" datetime="2015-10-19">October 19, 2015</time>
												<a href="#" class="author"><img src="/images/avatar.jpg" alt="" /></a>
											</header>
											<a href="#" class="image"><img src="/images/pic05.jpg" alt="" /></a>
										</article>

									<!-- Mini Post -->
										<article class="mini-post">
											<header>
												<h3><a href="#">Odio congue mattis</a></h3>
												<time class="published" datetime="2015-10-18">October 18, 2015</time>
												<a href="#" class="author"><img src="/images/avatar.jpg" alt="" /></a>
											</header>
											<a href="#" class="image"><img src="/images/pic06.jpg" alt="" /></a>
										</article>

									<!-- Mini Post -->
										<article class="mini-post">
											<header>
												<h3><a href="#">Enim nisl veroeros</a></h3>
												<time class="published" datetime="2015-10-17">October 17, 2015</time>
												<a href="#" class="author"><img src="/images/avatar.jpg" alt="" /></a>
											</header>
											<a href="#" class="image"><img src="/images/pic07.jpg" alt="" /></a>
										</article>

								</div>
							</section>

						<!-- Posts List -->
							<section>
								<ul class="posts">
									<li>
										<article>
											<header>
												<h3><a href="#">Lorem ipsum fermentum ut nisl vitae</a></h3>
												<time class="published" datetime="2015-10-20">October 20, 2015</time>
											</header>
											<a href="#" class="image"><img src="/images/pic08.jpg" alt="" /></a>
										</article>
									</li>
									<li>
										<article>
											<header>
												<h3><a href="#">Convallis maximus nisl mattis nunc id lorem</a></h3>
												<time class="published" datetime="2015-10-15">October 15, 2015</time>
											</header>
											<a href="#" class="image"><img src="/images/pic09.jpg" alt="" /></a>
										</article>
									</li>
									<li>
										<article>
											<header>
												<h3><a href="#">Euismod amet placerat vivamus porttitor</a></h3>
												<time class="published" datetime="2015-10-10">October 10, 2015</time>
											</header>
											<a href="#" class="image"><img src="/images/pic10.jpg" alt="" /></a>
										</article>
									</li>
									<li>
										<article>
											<header>
												<h3><a href="#">Magna enim accumsan tortor cursus ultricies</a></h3>
												<time class="published" datetime="2015-10-08">October 8, 2015</time>
											</header>
											<a href="#" class="image"><img src="/images/pic11.jpg" alt="" /></a>
										</article>
									</li>
									<li>
										<article>
											<header>
												<h3><a href="#">Congue ullam corper lorem ipsum dolor</a></h3>
												<time class="published" datetime="2015-10-06">October 7, 2015</time>
											</header>
											<a href="#" class="image"><img src="/images/pic12.jpg" alt="" /></a>
										</article>
									</li>
								</ul>
							</section>

						<!-- About -->
						


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



<article class="container box style3">

<header>


<h2><?=h($article->title) ?></h2>
</header>


<div class="info-bar">

		<ul>
		<? function renderCat($catArray,$tmpHtml){
		if(!isset($return)){$return="";}
		foreach ($catArray  as $key => $category){
		$return .='<div title="Code: 0xe80f" class="the-icons span3"><i class="icon-email"></i> <span class="i-name">icon-email</span><span class="i-code">0xe80f</span></div>';
		$return .='<li>'.$tmpHtml->link($category['title'],['controller' => 'Categories', 'action' => 'view',$key]).'</li>';
		foreach ($category['parents'] as $parent ){
		$return .='<li>'.$tmpHtml->link($parent['title'],['controller' => 'Categories', 'action' => 'view',$key]).'</li>';
		$return .=renderCat($parent['parents'],$tmpHtml);
	}
}
	
		
		
return $return;

}?>
		
			<li class="date"><?php echo __('Postedon').$article->created->i18nFormat('d.MMMY') ?></li>
			<li><? $tmpHtml = $this->Html; echo __('Postedin').renderCat($categories,$tmpHtml); ?></li>
			<li class="read-more"><a href="#">Read more</a></li>
		</ul>
</div>
<section>
<p><?= $article->body ?></p>
<?php echo $this->Html->image('/img/articles/'.$article->img,array('alt' => 'CakePHP','padding' => '10','class'=>'image fit')) ; ?>
<footer>
<a href="#comments" id='btnComms' class="button style3 scrolly">Last Coments : <?= count($newComments) ?> </a>
<a href="#addcomment" class="button style3 scrolly">Add Comment </a>
</footer>					
			
</section>


	
<div id="allComm" >

<div id="newComm" class="open">
         
<? function renderPosts($commArray, $tmpModel,$tmpForm){
        //set return for the first time
        if(!isset($return)){ $return = ""; }

        
        //create list
		if (!empty($commArray)){
        foreach ($commArray as $comments){
		if (!empty($comments->children))
		{$return .='<blockquote class="children" id="'.$comments->id.'" >';} 
		else
		{$return .='<blockquote class="parent" id="'.$comments->id.'" >';}
		
				if (isset($comments->user->username))
				{
				$return .='<div class="boxed 12u">';
				$return .='<p><b>By: </b>'.$comments->user->username.' <b>On: </b><i>'.$comments->created.'</i></p>';
				$return .='<p>'.$comments->body.'</p>';
				
				$return .= $tmpModel->link('Reply...', ['target'=>'#'],['class'=>'viewhide','id'=>$comments->id]);
			$return .='<div id="wrapper">';
				$return .=$tmpForm->create('Post',['class'=>'replyForm','id'=>$comments->id ,'default'=>'false']);
				$return .= '<div class="row"><input class="text" type="hidden" name="parent_id" id="parent_id" value="'.$comments->id.'" ></input>';
				$return .= '<textarea type="text"  name="body" id="body" value=""  placeholder="Enter your comment" ></textarea></div>';
				$return .='<div class="row"><ul class="actions"><li><input type="submit" id="btn_comm"  class="reply-form" value="Submit" /></li></ul></div>';
				$return .= $tmpForm->end();
				$return .='</div>';
				
				}
				else
				{
				
					$return .='<div class="boxed 12u">';
				$return .='<p><b>By: Guest On: </b><i>'.$comments->created.'</i></p><p>';
				$return .='<p>'.$comments->body.'</p>';
				
				
					$return .= $tmpModel->link('Reply...', ['target'=>'#'],['class'=>'viewhide','id'=>$comments->id]);
				$return .='<div id="wrapper">';
				$return .=$tmpForm->create('Post',['class'=>'replyForm','id'=>$comments->id ,'default'=>'false']);
				$return .= '<div class="row"><input class="text" type="hidden" name="parent_id" id="parent_id" value="'.$comments->id.'" ></input>';
				$return .= '<textarea type="text"  name="body" id="body" value=""  placeholder="Enter your comment" ></textarea></div>';
				$return .='<div class="row"><ul class="actions"><li><input type="submit" id="btn_comm"  class="reply-form" value="Submit" /></li></ul></div>';
				$return .= $tmpForm->end();
				$return .='</div>';
				}
                

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
         

					<? $tmpModel = $this->Html; // we have to pass html helper inside, I am not sure it this is best way but it works
					 $tmpForm = $this->Form;
    echo renderPosts($newComments, $tmpModel, $tmpForm); //finally, we render the $result returned. ?>
				
					  <?php if (!empty($lastComments)): ?>
					  <footer>
<a href="#comments" id='btnlastComms' class="button style3 scrolly">Older Coments : <?= count($lastComments) ?> </a>

</footer>					
				<?php endif; ?>
				
				</div>
					  
					  <div id="lastComm" class="open">
<? echo renderPosts($lastComments, $tmpModel, $tmpForm); //finally, we render the $result returned. ?>
</div>
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
									<li><input type="reset" class="style3" value="Clear Form" /></li>
								</ul>
							</div>
						</div>
					  
					 <?= $this->Form->end() ?>
					
				</section>
		



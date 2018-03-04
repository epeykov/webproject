<div id="newComm" class="open">

<?php function renderPosts($commArray, $tmpModel,$tmpForm){
        //set return for the first time
        if(!isset($return)){ $return = ""; }
		//create list
		if (!empty($commArray)){
			
        foreach ($commArray as $comments){
			
		if (!empty($comments->children) && $comments->parent_id===null)
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
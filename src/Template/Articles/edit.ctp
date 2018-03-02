<!-- File: src/Template/Articles/edit.ctp -->
<div id="main">
<h1>Edit Article</h1>
<?php

    echo $this->Form->create($article,array('type' => 'file')); 
	echo $this->Form->input('category_id');
	
	echo $this->Form->input('title');
    echo $this->Ck->input('body',[],['extraAllowedContent'=>'span(*);img(*);div(*);p(*);code(*);','contentsCss'=>'/assets/css/main.css']);
	

	


	
	
    
?>
<h4><?= __('Related Images') ?></h4>
        <?php if (!empty($article->images)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('File Name') ?></th>
                <th><?= __('Article Id') ?></th>
                <th><?= __('Created on') ?></th>
                <th><?= __('Modified on') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($article->images as $image): ?>
            <tr>
                <td><?= h($image->id) ?></td>
                <td><?= h($image->img) ?></td>
                <td><?= h($image->article_id) ?></td>
                <td><?= h($image->created) ?></td>
                <td><?= h($image->modified) ?></td>
                
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Images', 'action' => 'view', $image->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Images', 'action' => 'edit', $image->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Images', 'action' => 'delete', $image->id], ['confirm' => __('Are you sure you want to delete # {0}?', $image->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
		
		 <?php endif; ?>
<?php		
		

		echo $this->Form->input('image_upload', array('type' => 'file'));
		echo $this->Form->input('head_image_upload', array('type' => 'file'));
		echo $this->Form->input('has_img_gallery',array('type'=>'select','options'=>['1' => 'Y', '0' => 'N'],'templates' => [
        'inputContainer' => '<div class="row uniform"><div class="6u 12u$(xsmall)">{{content}}</div></div>'
    ]
));
		
	echo $this->Form->button(__('Save Article')); 
	echo $this->Form->end();
	?>
	
</div>
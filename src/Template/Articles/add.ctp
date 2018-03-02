<h1>Add Article</h1>
<?php
echo $this->Form->create($article,array('type' => 'file')); 
echo $this->Form->input('category_id');
echo $this->Form->input('title');
echo $this->Form->input('body', ['rows' => '3']);
echo $this->Form->input('image_upload', array('type' => 'file'));
echo $this->Form->button(__('Add Article'));
echo $this->Form->end(); 
?>
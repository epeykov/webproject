<!DOCTYPE html>
<html lang="en">
<head>
    <?= $this->element('article_head') ?>
</head>

<body>
    <?= $this->element('header') ?>
	
    <!-- Page Content -->
     <?= $this->Flash->render() ?>
    
        <?= $this->fetch('content') ?>
   
    <?= $this->element('footer') ?>
</body>
</html>

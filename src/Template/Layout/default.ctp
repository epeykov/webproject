<!DOCTYPE html>
<html lang="en">
<head>
    <?= $this->element('head') ?>
</head>

<body>
    <?= $this->element('header') ?>
	
    <!-- Page Content -->
     <?= $this->Flash->render() ?>
    
        <?= $this->fetch('content') ?>
   
    <?= $this->element('footer') ?>
</body>
</html>

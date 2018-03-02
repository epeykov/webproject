<!DOCTYPE html>
<html lang="bg">
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

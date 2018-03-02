<title><?=h($article->title) ?></title>
<?= $this->Html->meta(['property'=>'og:type','content'=>'article']); ?>
<?= $this->Html->meta(['property'=>'og:title','content'=>$article->title]); ?>
<?= $this->Html->meta(['property'=>'og:image','content'=>$this->Url->image('/img/articles/'.$article->img,['fullBase'=>true])]); ?>
<meta property="og:image:width" content="400" />
<meta property="og:image:height" content="300" />

<?= $this->Html->meta(['property'=>'og:url','content'=>$this->Url->build(null,['fullBase'=>true])]); ?>
<?= $this->Html->meta(['property'=>'og:description','content'=>strip_tags($article->body)]); ?>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<?php
    echo $this->Html->charset();
   // echo $this->Html->script('http://code.jquery.com/jquery-1.11.1.min.js');
  
    echo $this->Html->script('http://code.jquery.com/jquery-latest.min.js');
	echo $this->Html->script('/assets/js/skel.min.js');
	echo $this->Html->script('/assets/js/util.js');
	echo $this->Html->script('/assets/js/main.js');
	echo $this->Html->script('postcomment.js');
	echo $this->Html->script('imageviewer/imageviewer.js');
	echo $this->Html->script('prism.js');
	
	

	?>
  
 
 
<!--[if lte IE 8]><script src="/assets/js/ie/html5shiv.js"></script><![endif]-->
<link rel="stylesheet" href="/assets/css/main.css" />
<link rel="stylesheet" href="/assets/css/style.css" />
<link rel="stylesheet" href="/js/imageviewer/imageviewer.css" />
<link rel="stylesheet" href="/assets/css/main.css" />
<link rel="stylesheet" href="/assets/css/prism.css" />




<!--[if lte IE 9]><link rel="stylesheet" href="/assets/css/ie9.css" /><![endif]-->
<!--[if lte IE 8]><link rel="stylesheet" href="/assets/css/ie8.css" /><![endif]-->




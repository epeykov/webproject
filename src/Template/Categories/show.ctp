<!-- Main -->
<?php

function RecursiveCategories($array,$tmpHtml) {

    if (count($array)) {
			
         // echo '<div class="6u 12u$(medium)">';
		 
        foreach ($array as $vals) {
					$count=0;
					if (isset($vals['articles'][0])){
					$count=$vals['articles'][0]->records;
					}
					
					echo '<div class="post boxed_in"><h3>'.$tmpHtml->link($vals['name'],['controller' => 'Articles', 'action' => 'catview',$vals['id']]).'<span class="fa fa-stack fa-1x"><i class="fa fa-file fa-stack-2x"></i><strong style="color:white" class="fa-stack-1x">'.$count.'</strong></span></h3>';
                    echo '<p>'.$vals->description.'</p>';
					//echo "<a href=\"".><li id=\"".$vals['id']."\">".$vals['name'];
                    if (count($vals['children'])) {
                          RecursiveCategories($vals['children'],$tmpHtml);
                    }
                    echo "</div>";
        }
      //    echo "</div>";
			
			 
    }
	
} ?>


			<div id="main">
			<section>
		
		<? $tmpHtml = $this->Html;RecursiveCategories($categories_list,$tmpHtml); ?>	
	
	

		
		


</section>
</div>
	<section id="sidebar">
	<!-- Intro -->
							<section id="intro">
								<a href="/" class="logo"><img src="/images/logo.png" alt="" /></a>
								<header>
									<h2>Categories</h2>
									
								</header>
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

	


</div>
</body>
</html>

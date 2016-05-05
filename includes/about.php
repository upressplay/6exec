<div id="about">
	<div id="about_title" class="section_title black_title">
		about°	
	</div><!-- about_title -->
	<div id="about_desc" class="white_txt">
		<?php 
		
		$count = 0;
		foreach ( $about_data as $a ) {
			if($count<1) {
				echo $a['desc'];
			}
			
			$count++;
		}
		?>
	</div><!-- about_title -->
</div><!-- about -->





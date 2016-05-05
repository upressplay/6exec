<div id="team">
	<div id="team_title" class="section_title white_title">
		team°	
	</div><!-- team_title -->
	<div id="team_content">
		
		<?php 
		
		$count = 0;
		foreach ( $team_data as $t ) {
			echo '<div class="team_member">';
				echo '<div class="team_name">';
					echo $t['title'] . ' <span class="team_role">' . $t['position'] .'</span>';
				echo '</div><!-- team_name -->';
				echo '<div class="team_bio">';
					echo $t['bio'];
				echo '</div><!-- team_bio -->';
			echo '</div><!-- team_member -->';
		}
		?>

		

	</div><!-- team_content -->
</div><!-- team -->





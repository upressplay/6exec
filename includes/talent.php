<div id="talent">
	<div id="talent_title" class="section_title blue_title">
		talent°	
	</div><!-- services_title -->
	<div id="talent_holder">

    <?php  if($segments[1] == "") : ?>
        <?php foreach ( $talent_data as $t ) : ?>
            <a href="/talent/<?php echo $t['id']; ?>">
                <div class="talent-thumb">
                    <div class="talent-thumb-title">
                        <?php echo $t['title']; ?>
                    </div><!-- talent-thumb-title -->
                    <div class="talent-thumb-title">
                        <?php echo $t['skills']; ?>
                    </div><!-- talent-thumb-title -->
                </div><!-- talent-thumb -->
            </a>
        <?php endforeach; ?>
    <?php else: ?>
        <?php foreach ( $talent_data as $t ) : ?>
            <?php if($t['id'] == $segments[1]) : ?> 
                <div class="talent">
                    <img src="<?php echo $t['img']; ?> "/>
                    <h2>
                        <?php echo $t['name']; ?>     
                    </h2>
                    <h3>   
                        <?php echo $t['title']; ?>
                    </h3><!-- talent -->
                    <h4>
                        Skills
                    </h4>
                    <p>
                        <?php echo $t['skills']; ?>
                    </p>
                    <h4>
                        Experience
                    </h4>
                    <?php foreach ( $t['experience'] as $e ) : ?>
                    <p>
                        <strong><?php echo $e['title']; ?></strong><br/>
                        <?php echo $e['company']; ?><br/>
                        <?php echo $e['location']; ?><br/>
                        <?php echo $e['start_date']; ?> - 
                        <?php 
                            if($e['end_date'] != "") {
                                echo $e['end_date'].'<br/>';
                            } 
                        ?>
                        <?php 
                            if($e['current_role'] != "") {
                                echo "Present";
                            } 
                        ?>
                        <?php echo $e['description']; ?><br/>
                    </p>
                    <?php endforeach; ?>
                    <h4>
                        Education
                    </h4>
                    <?php foreach ( $t['education'] as $ed ) : ?>
                    <p>
                        <strong><?php echo $ed['school']; ?></strong><br/>
                        <?php echo $ed['location']; ?><br/>
                        <?php echo $ed['start_year']; ?> - 
                        <?php echo $ed['end_year']; ?>
                       
                        <?php echo $ed['description']; ?><br/>
                    </p>
                    <?php endforeach; ?>
                </div><!-- talent -->
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endif; ?>
		
	</div><!-- talent_holder -->
</div><!-- talent -->





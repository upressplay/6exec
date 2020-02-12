<div id="talent">
	<div id="talent_title" class="section_title blue_title">
		<a href="/talent">talent°</a>
	</div><!-- services_title -->
	<div id="talent_holder">

    <?php  if($segments[1] == "") : ?>
        <?php foreach ( $talent_data as $t ) : ?>
            <a href="/talent/<?php echo $t['id']; ?>" class="talent-card thumb">
                <?php if($t['img']) : ?> 
                    <img src="<?php echo $t['img']; ?> "/>
                <?php endif; ?>
                <h2>
                    <?php echo $t['title']; ?>     
                </h2>
                <?php if($t['position']) : ?>
                    <h3>   
                        <?php echo $t['position']; ?>
                    </h3>
                <?php endif; ?>
                <?php if($t['excerpt']) : ?>
                    <p>
                        <?php echo $t['excerpt']; ?>    
                    </p>
                <?php endif; ?>
            </a>
        <?php endforeach; ?>
    <?php else: ?>
        <?php foreach ( $talent_data as $t ) : ?>
            <?php if($t['id'] == $segments[1]) : ?> 
                <div class="talent-card">
                    <?php if($t['img']) : ?> 
                        <img src="<?php echo $t['img']; ?> "/>
                    <?php endif; ?>
                    <h2>
                        <?php echo $t['title']; ?> 
                    </h2>
                    <?php if($t['position']) : ?>
                        <h3>   
                            <?php echo $t['position']; ?>
                        </h3>
                    <?php endif; ?>
                    <?php if($t['resume-file']) : ?>  
                            <a href="<?php echo $t['resume-file']['url']; ?>  " target="_blank" class="resume"><i class="fa fa-file-text" aria-hidden="true"></i> Download Resume</a>
                        <?php endif; ?>   
   
                    
                </div>

                <?php if($t['resume']) : ?>
                    <div class="talent-card">
                        <?php echo $t['resume']; ?>
                    </div>
                <?php endif; ?>

                <?php if($t['skills']) : ?>
                    <div class="talent-card">
                        <h4>Skills </h4>
                        <?php echo $t['skills']; ?>
                    </div>
                <?php endif; ?>
                <?php if($t['bio']) : ?>
                    <div class="talent-card">
                        <h4>Bio</h4>
                        <p>
                            <?php echo $t['bio']; ?>
                        </p>
                    </div>
                <?php endif; ?>
                <?php if($t['experience']) : ?> 
                    <div class="talent-card">
                        <h4>Experience </h4>
                        <?php foreach ( $t['experience'] as $e ) : ?>
                        <div class="talent-block">
                            <strong><?php echo $e['title']; ?></strong><br/>
                            <?php if($t['company']) : ?>
                                <?php echo $e['company']; ?><br/>
                            <?php endif; ?>
                            <?php if($t['location']) : ?>
                                <?php echo $e['location']; ?><br/>
                            <?php endif; ?>
                            <div class="dates">
                                <?php echo $e['start_date']; ?> - 
                                <?php 
                                    if($e['end_date']) {
                                        echo $e['end_date'].'<br/>';
                                    } 
                                ?>
                                <?php 
                                    if($e['current_role']) {
                                        echo "Present";
                                    } 
                                ?>
                            </div><!-- dates -->
                            <?php if($e['description']) : ?> 
                                <div class="desc">                     
                                    <?php echo $e['description']; ?>
                                </div><!-- desc -->
                            <?php endif; ?>
                        </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                <?php if($t['education']) : ?> 
                    <div class="talent-card">
                        <h4>
                            Education
                        </h4>
                        <?php foreach ( $t['education'] as $ed ) : ?>
                            <div class="talent-block">

                                <?php if($ed['school']) : ?> 
                                    <strong><?php echo $ed['school']; ?></strong><br/>
                                <?php endif; ?>
                                <?php if($ed['degree']) : ?> 
                                    <?php echo $ed['degree']; ?><br/>
                                <?php endif; ?>
                                <?php if($ed['location']) : ?> 
                                    <?php echo $ed['location']; ?><br/>
                                <?php endif; ?>
                                <div class="dates">
                                <?php 
                                    if($ed['start_year'] != "") {
                                        echo $ed['start_year'].' - ';
                                    } 
                                ?>

                                <?php 
                                    if($ed['end_year'] != "") {
                                        echo $ed['end_year'];
                                    } 
                                ?>   
                                </div>
                                <?php if($ed['description'] != "") : ?> 
                                    <div class="desc">                     
                                        <?php echo $ed['description']; ?>
                                    </div><!-- desc -->
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div><!-- talent-card -->
                <?php endif; ?>
                <?php if($t['accomplishments']) : ?> 
                    <div class="talent-card">
                        <h4>
                            Accomplishments
                        </h4>
                        <?php foreach ( $t['accomplishments'] as $a ) : ?>
                            <div class="talent-block">
                            <strong><?php echo $a['title']; ?></strong><br/>
                            
                            <?php if($a['issuer'] != "") : ?> 
                                <?php echo $a['issuer']; ?><br/>
                            <?php endif; ?>
                            <?php if($a['date'] != "") : ?> 
                                <div class="dates">
                                    <?php echo $a['date']; ?>
                                </div>
                            <?php endif; ?>
                            <?php if($a['description'] != "") : ?> 
                                <div class="desc">                     
                                    <?php echo $a['description']; ?>
                                </div><!-- desc -->
                            <?php endif; ?>
                            
                        </div>
                        <?php endforeach; ?>
                    </div><!-- talent-card -->
                <?php endif; ?>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endif; ?>
		
	</div><!-- talent_holder -->
</div><!-- talent -->





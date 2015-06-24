<div class="sidebar-wrap">
  External Links In This Article<br>
  <?php 
    if( have_rows('github_links') ) {
      while( have_rows('github_links') ) {
        the_row();
        ?>
          <i class="fa fa-github-square"></i><a href="<?php the_sub_field('git_url'); ?>" target="_blank"><?php the_sub_field('git_name'); ?></a><br>
        <?php
      }
    } else { }
    
    if( have_rows('external_links') ) {
      while( have_rows('external_links') ) {
        the_row();
        ?>
          <i class="fa fa-external-link-square"></i><a href="<?php the_sub_field('external_url'); ?>"><?php the_sub_field('external_name'); ?></a><br>
        <?php
      }
    }
  ?>
</div>
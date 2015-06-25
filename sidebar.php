<div class="sidebar-wrap">
  External Links In This Article<br>
  <?php 
    if( have_rows('external_links') ) {
      while( have_rows('external_links') ) {
        the_row();
          if(strpos(get_sub_field('external_url'), "github") ) {
          ?>
            <i class="fa fa-github-square"></i>
          <?php } else { ?>
            <i class="fa fa-external-link-square"></i>
          <?php } ?>
          <a href="<?php the_sub_field('external_url'); ?>"><?php the_sub_field('external_name'); ?></a><br>
        <?php
      }
    }
  ?>
</div>
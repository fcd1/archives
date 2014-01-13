<?php echo head(array('title' => metadata('exhibit', 'title'), 'bodyclass'=>'exhibits summary')); ?>
<div class="headBack">
  <?php
    $ur = exhibit_builder_link_to_exhibit();
    $imageURL = '';
    if (stristr($ur,'varsity-show'))  $imageURL = img("varsity-1.jpg");
    if ($imageURL != "")
      echo "<div style='padding:0;margin:0;width:100%;background:url(\"$imageURL\") top right no-repeat'>";
    $title = metadata('exhibit','title');
    $matches = explode(":", $title, 2);
  ?>
  <h1 class="exhHeader">
    <?php 
      echo $matches[0]; 
      if ($matches[1]):
        echo ':';
        echo $matches[1]; 
      endif; 
    ?>
  </h1>
  <?php if ($imageURL) echo "</div>"; ?>
</div><!--end class="headBack"-->
<!-- end custom header -->
<table class="layoutTable">
  <tr>
    <td class="exhibit-nav">
      <ul class="exhibit-section-nav current" style="padding:0; margin:0;">
        <li style="background:#9cf;font-weight:bold;">
          <?php
            $title = exhibit_builder_link_to_exhibit(get_current_record('exhibit'),
						     "Home",
						     array('style' => 'font-weight:bold;'));
            echo $title;
          ?>
        </li>
      </ul>
      <div id="secondary">
        <ul class="exhibit-section-nav">
          <?php set_exhibit_pages_for_loop_by_exhibit(); ?>
          <?php foreach (loop('exhibit_page') as $exhibitPage): ?>
            <?php 
	      $html = '<li class="exhibit-section-title">' . '<a class="exhibit-section-list" href="' . 
	              exhibit_builder_exhibit_uri(get_current_record('exhibit'), $exhibitPage) .'">' . 
                      cul_insert_angle_brackets(metadata($exhibitPage, 'title')) . '</a></li>';

              echo $html;
            ?>
          <?php endforeach; ?>
        </ul>
      </div><!--end id="secondary"-->
    </td>
    <td class="content">
      <div class="exhibit-description">
        <?php echo $exhibit->description; ?>
      </div>
      <div id="exhibit-credits">	
	<h3>Exhibit Curator</h3>
	<p>
          <?php echo $exhibit->credits; ?>
	</p>
      </div><!--end class="exhibit-description"-->
      <div id="exhibit-sections">
        <?php set_exhibit_pages_for_loop_by_exhibit(); ?>
        <?php foreach (loop('exhibit_page') as $exhibitPage): ?>
          <?php 
	    $html = '<h3><a href="' . 
	            exhibit_builder_exhibit_uri(get_current_record('exhibit'), 
						$exhibitPage) . 
                    '">' . cul_insert_angle_brackets(metadata($exhibitPage, 'title')) .'</a></h3>';
            if (exhibit_builder_page_text(1)) {
              $html .= exhibit_builder_page_text(1);
            }
            echo $html;
          ?>
        <?php endforeach; ?>
      </div><!--end id="exhbition-sections"-->
    </td>
  </tr>
</table>
<?php echo foot(); ?>


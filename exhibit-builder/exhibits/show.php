<?php
  echo head(array('title' => metadata('exhibit', 'title'),'bodyclass' => 'exhibits show'));
?>
<div class="headBack">
  <?php
    $ur = exhibit_builder_link_to_exhibit();
    $imageURL = '';
    if (stristr($ur,'varsity-show')) {
      $imageURL = img("varsity-1.jpg");
    }
    if ($imageURL != "") {
      echo "<div style='padding:0;margin:0;width:100%;background:url(\"$imageURL\") top right no-repeat'>";
    }
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
<?php
  // fcd1, 9/9/11: In Omeka 1.5.3, exhibitions had sections, with no landing page.
  // When a section was selected, the first page in the section was displayed
  // From Omeka 2.0 on, there are no more sections. Instead, there are top-level
  // pages, which can have content, and these top-level pages can have child pages.
  // To mimic the Omeka 1.5.3 behavior for legacy exhibitions that were ported to
  // Omeka 2.1, we need to check if the current page is a top-level page, and 
  // display the content of the first child, if there is one. We also need this 
  // info so that "Next" links to the correct page
  $currentExhibitPage = get_current_record('exhibit_page');
  $exhibitPageParent = $currentExhibitPage->getParent();      
  $firstChild = null;
  if (!($exhibitPageParent)) {
    // this is a top-level page, and we want section-like behavior. First page in "section" will display
    // and the breadcrumb links have to reflect this
    $firstChild = $currentExhibitPage->getFirstChildPage();
   }
?>
<table class="layoutTable">
  <tr>
    <td class="exhibit-nav">
      <?php 
        echo cul_legacy_exhibit_builder_page_nav($firstChild);
      ?>
    </td>
    <td class="content">
      <div class="exhibit-page-navigation">
        <?php $pn = culWritePrevNext($firstChild); ?>
        <?php echo $pn; ?>
      </div>
      <div id="primary">
        <?php 
          echo "<h1>";
          if ($firstChild) {
	    echo str_replace("&gt;",">",str_replace("&lt;","<",metadata($firstChild,'title')));
	  } else {
	    echo str_replace("&gt;",">",str_replace("&lt;","<",metadata('exhibit_page','title'))); 
	  }
          echo "</h1>";
          // show contents of page
          exhibit_builder_render_exhibit_page($firstChild);
        ?>
      </div><!--end id="primary"-->
      <div class="exhibit-page-navigation">
        <?php echo $pn; ?>
      </div>
    </td>
  </tr>
</table>
<?php echo foot(); ?>

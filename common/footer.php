</div><!--end id="wrap"-->
<?php
$exhibit = get_current_record('exhibit', false);
if ($exhibit):
  $ur = exhibit_builder_link_to_exhibit();
  $e = '';
  if (stristr($ur,'nyccc'))
    $e = "nyccc";
  else if (stristr($ur,'group_research'))
    $e = "gr";
  if ($e == "nyccc" || $e = "gr") {
    echo '<p class="footer11px">Columbia University Libraries / Rare Book &amp; Manuscript Library / Butler Library, 6th Fl. / 535 West 114th St. / New York, NY 10027 / (212) 854-5590 / <a href="mailto:rbml@libraries.cul.columbia.edu">rbml@libraries.cul.columia.edu</a></p>';
  }
  else {
    echo '<p class="footer11px">Columbia University Libraries / University Archives / Rare Book &amp; Manuscript Library / Butler Library, 6th Fl. / 535 West 114th St. / New York, NY 10027 / (212) 854-3786 / <a href="mailto:uarchives@libraries.cul.columbia.edu">uarchives@libraries.cul.columia.edu</a></p>';
  } 
endif;
?>

<p class="copyright-footer"> 
  <?php echo cul_copyright_information();?>
</p>

<!-- CULTNBW START -->

<script type="text/javascript">
<!-- 
	CULh_style = 'staticlink'; // staticlink, static, search, standard (default)
CULh_width = ''; // fixed, fluid (default)
//CULh_colorfg = '#333333'; // topnavbar foreground color. hex value. ex: #002B7F
//CULh_colorbg = '#666666'; // topnavbar background color. hex value. ex: #779BC3
//CULh_nobs = 1; // uncomment to NOT load our bootstrap javascript file and or use your own (v2.3.x required)
//CULh_notk = 1; // uncomment to NOT load our ldpd-toolkit.js and or use your own.
//-->
</script>
<script src="//ldpd.cul.columbia.edu/ldpd-toolkit/build/js/jquery-1.7.2.min.js"></script>
<script src="//ldpd.cul.columbia.edu/ldpd-toolkit/widgets/cultnbw.min.js"></script>
<!-- /CULTNBW END -->

</body>
</html>

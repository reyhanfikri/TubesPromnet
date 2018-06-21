	<script src="<?php echo site_url(); ?>assets/js/jquery.js" type="text/javascript"></script>
	<script src="<?php echo site_url(); ?>assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?php echo site_url(); ?>assets/js/jquery-ui.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $( "#search_part" ).autocomplete({
              source: "<?php echo site_url().'search/?';?>"
            });
        });
    </script>
  </body>
</html>

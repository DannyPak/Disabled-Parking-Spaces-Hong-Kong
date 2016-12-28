<h2><?php echo $text_instruction; ?></h2>
<div class="content">
<p><?php echo $text_description; ?></p>
<p><?php echo $wu; ?></p>
<p><?php echo $text_payment; ?></p>
</div>
<div class="buttons">
  <div class="right">
  <a id="button-confirm" class="button"><span><?php echo $button_confirm; ?></span></a></div>
</div>
<script type="text/javascript"><!--
$('#button-confirm').bind('click', function() {
    $.ajax({
        type: 'GET',
        url: 'index.php?route=payment/western_union/confirm',
        success: function() {
            location = '<?php echo $continue; ?>';
        }
    });
});
//--></script>
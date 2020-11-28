<div class="blog-post-share">
  <h3>Share this post on</h3>
  <?php echo generate_share_link('Facebook') ?>
  <?php echo generate_share_link('Twitter') ?>
</div>

<script type="text/javascript">
$('button').click(function(ev) {
  window.open(
      $(this).data('href'),
      '',
      'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600'
    );
  });
</script>
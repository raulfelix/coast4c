  
  <?php 

    $prev_num = null;
    $next_num = null;

    if ( $wp_query->max_num_pages > 1 ) {
      if ( $paged > 1 ) {
        $prev_num = '?page=' . ($paged - 1);
      }

      if ( $paged < $wp_query->max_num_pages ) {
        $next_num = '?page=' . ($paged + 1);
      }
    }

    // append order query variable
    $order = isset($_GET['orderby']) ? $_GET['orderby'] : 'desc';
    if ($prev_num == null) {
      $order_prev = '?orderby=' . $order;
    } else {
      $order_prev = '&orderby=' . $order;
    }

    if ($next_num == null) {
      $order_next = '?orderby=' . $order;
    } else {
      $order_next = '&orderby=' . $order;
    }

  ?>
  
  <a class="button button-prev <?php echo $prev_num === null ? 'button-disabled':'' ?>" href="<?php echo $prev_num; ?><?php echo $order_prev; ?>"><i class="icon-arrow-prev"></i> Prev</a>
  <a class="button button-next <?php echo $next_num === null ? 'button-disabled':'' ?>" href="<?php echo $next_num; ?><?php echo $order_next; ?>">Next <i class="icon-arrow-next"></i></a>
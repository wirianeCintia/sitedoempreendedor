<?php
if ( ! defined( 'ABSPATH' ) ) exit;  // Exit if accessed directly  
$tests = get_option($this->p2_options_key);
$tests2 = array();

/* wrap
*********************************************************************************/
echo '<div class="wrap">';
echo '<h2>'. $this->pluginname . ' : ' . __('Vulnerability', $this->hook) . '</h2>';
?>
<h2 class="nav-tab-wrapper">
<a class="nav-tab" href="<?php echo admin_url('admin.php?page='.$this->hook); ?>"><?php _e('Dashboard', $this->hook); ?></a>
<a class="nav-tab nav-tab-active" href="<?php echo admin_url('admin.php?page='.$this->hook . '-'.$this->_p2); ?>"><?php _e('Vulnerability', $this->hook ); ?></a>
<a class="nav-tab" href="<?php echo admin_url('admin.php?page='.$this->hook . '-'.$this->_p3); ?>"><?php _e('File System', $this->hook); ?></a>
<a class="nav-tab" href="<?php echo admin_url('admin.php?page='.$this->hook . '-'.$this->_p5); ?>"><?php _e('Core Scanner', $this->hook); ?></a>
<a class="nav-tab" href="<?php echo admin_url('admin.php?page='.$this->hook . '-'.$this->_p4); ?>">404 Log</a>
<a class="nav-tab" href="<?php echo admin_url('admin.php?page='.$this->hook . '-'.$this->_p6); ?>"><?php _e('Settings', $this->hook); ?></a>
</h2>
<?php
//display warning if test were never run
if (!$tests['last_run']) {
    echo '<div class="box-shortcode box-yellow">'.__('Not yet executed!', $this->hook).'</div>';
    } elseif ((current_time('timestamp') - 15*24*60*60) > $tests['last_run']) {
    echo '<div class="box-shortcode box-yellow">'. sprintf( __('<strong>Warning:</strong> The vulnerability information for this system is <code>%s</code> days old!' , $this->hook) , '15' ) . '</div>';
    } else {
    echo '<div class="box-shortcode box-blue">'.__('Last run on', $this->hook).': <strong>' . date(get_option('date_format') . ', ' . get_option('time_format'), $tests['last_run']) . '</strong></div>';
}


/* poststuff and sidebar
*********************************************************************************/
echo '<div id="poststuff"><div id="post-body" class="metabox-holder columns-2">';
include('inc-sidebar.php'); //include
echo '<div class="postbox-container"><div class="meta-box-sortables">';

//------------postbox 1
echo '<div class="postbox">';
echo '<div class="handlediv" title="' . __('Click to toggle', $this->hook) . '"><br /></div><h3 class="hndle"><span>'. __('Vulnerability', $this->hook) . '</span>&nbsp;&nbsp;&nbsp;';
submit_button( __('Execute', $this->hook ), 'primary', 'Submit', false, array( 'id' => 'run-tests' ) );
echo '</h3><div class="inside">';
//left
echo '<p>'.__('These tests covers most of the hardening tips of the WordPress Security Codex and includes a lot of additional security checks.', $this->hook);
echo '<br />'.__('It was designed to clearly show at a single glance what security problems exist in your website and to provide you with all the information needed to understand these issues and eliminate them.', $this->hook).'</p>';

      if ($tests['last_run']) {
      echo '<table class="widefat">';
      echo '<thead><tr>';
      echo '<th>'.__('WordPress Security Checks', $this->hook).'</th>';
      echo '<th style="width: 120px;"><small>', __('Result', $this->hook), '</small></th> ';
      echo '<th style="width: 30px;"></th>';
      echo '</tr></thead>';
      echo '<tbody>';
        // test Results
        foreach($tests['test'] as $test_name => $details) {
          echo  $details['msg'];
          echo '<td>'. strval($details['status']) . '</td></tr>';
       } // foreach
      echo '</tbody>';
      echo '</table>';

//--------------------


          } else {
     echo '<table class="widefat">';
      echo '<thead><tr>';
      echo '<th class="fdx-status1" id="red">'.__('Unexecuted!', $this->hook).'</th>';
      echo '</tr></thead>';
      echo '<tbody>';
      echo '</table>';
      }



//--------------------
echo '<div class="clear"></div></div></div>';

echo '<div id="fdx-dialog-wrap"><div id="fdx-dialog"></div></div>'; //popup

//------------ meta-box-sortables | postbox-container | post-body | poststuff | wrap
echo '</div></div></div></div></div>';
//----------------------------------------- ?>
<script language="JavaScript" type="text/javascript">
jQuery(document).ready(function($){
//  $('#run-tests').removeAttr('disabled');
  // run tests, via ajax
  $('#run-tests').click(function(){
    var data = {action: 'sn_run_tests'};
     $(this).attr('disabled', 'disabled')
           .val('<?php _e('Executing, please wait!', $this->hook) ?>');
           $.blockUI({ message: '<img src="<?php echo plugins_url( 'images/loading.gif',dirname(__FILE__));?>" width="24" height="24" border="0" alt="" /><br /><?php _e('Executing, please wait!', $this->hook) ?> <?php _e('it can take a few minutes.', $this->hook) ?>' });
    $.post(ajaxurl, data, function(response) {
          window.location.reload();
    });
  }); // run tests
//-----------------------------------------------------
$('a.fdx-dialog').click(function(event) {
              event.preventDefault();
              var link = $(this).attr('href');
              $("#fdx-dialog").load(link,function(){
               $( "#fdx-dialog-wrap" ).dialog( "open" );
              });
              return false;
});
$('#fdx-dialog-wrap').dialog({'dialogClass': 'wp-dialog',
                               'modal': true,
                               'resizable': false,
                               'zIndex': 9999,
                               'width': 700,
                               'title': '<?php _e('Details, tips and help', $this->hook)?>',
                               'height': 550,
                               'hide': 'fade',
                               'show': 'fade',
                               'autoOpen': false,
                               'closeOnEscape': true
                              });
//---------------------
});
</script>
<?php     
if ( current_user_can('edit_others_pages') || is_user_logged_in()) {
?>
<?php 
$usuario = get_current_user_id();
function count_user_posts_by_status($post_status = 'publish',$user_id = 0){
    global $wpdb;
    $count = $wpdb->get_var(
        $wpdb->prepare( 
        "
        SELECT COUNT(ID) FROM $wpdb->posts 
        WHERE post_status = %s 
        AND post_author = %d",
        $post_status,
        $user_id
        )
    );
    return ($count) ? $count : 0;
}
$count_publish = count_user_posts( $usuario , "post"  );
$count_draft = count_user_posts_by_status('draft',$usuario); 

?>
<h4 class="widget-title h6" style="
    margin-bottom: 0px;
">
<span>Administración</span></h4>
<div class="borde" style="
    border: solid 2px;
    border-radius: 0px 0px 3px 3px;
    padding: 2px 0px 13px;
    border-color: #004c61;
">
<center><a class="mks_button mks_button_medium rounded" href="/lista/" style="width: 90%; color: #FFFFFF;background-color: #004c61;font-size: 18px;border-bottom: none!important;padding: 12px 28px;border-radius: 3px;    margin-top: 10px; display: -webkit-inline-box;"><i class="fa fa-list-alt" aria-hidden="true"></i> Lista de entradas <div id="publicados" class="badge-posts" style="
    float: right;
    position: static;
    display: block;
    margin-top: 3px;
    margin-left: 5px;
"><?php echo $count_publish; ?></div></a></center>
<center><a class="mks_button mks_button_medium rounded" href="/nueva-entrada/" style="width: 90%; color: #FFFFFF;background-color: #004c61;font-size: 18px;border-bottom: none!important;padding: 12px 28px;border-radius: 3px;    margin-top: 10px; display: -webkit-inline-box;"><i class="fa fa-pencil" aria-hidden="true"></i> Nueva Entrada</a></center>
<center><a class="mks_button mks_button_medium rounded" href="/lista-borradores/" style="width: 90%; color: #FFFFFF;background-color: #004c61;font-size: 18px;border-bottom: none!important;padding: 12px 28px;border-radius: 3px;    margin-top: 10px; display: -webkit-inline-box;"><i class="fa fa-list-alt" aria-hidden="true"></i> Borradores <?php if($count_draft >0 ){echo '<div id="borradores" class="badge-posts">'.$count_draft. '</div>';} ?></a></center></div>
<?php } else { ?>
<center><i class="fa fa-exclamation-circle" aria-hidden="true" style="
    color: orange!important;
    font-size: 15em!important;
"></i><h1>No estas autorizado</h1></center>
<?php } ?>

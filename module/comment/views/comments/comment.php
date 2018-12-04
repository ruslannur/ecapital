<?php
use app\module\comment\models\Comments;
//print_r($tree);

$tree = Comments::getTree();
?>

<ul class="media-list">
<li class="media">
<? foreach ($tree as $model) {
    //echo '<li id="'.$model->id.'" class="media">';
    echo '<div class="media">';
    echo '    <a class="pull-left" href="#">'.$model->user_name.'</a>';
    echo '    <div class="media-body">
                <h4 class="media-heading">'.$model->created_at.'</h4>';
    echo '      <p>'.$model->content.' <button id="'.$model->id.'" class="reply btn btn-link">reply</button> </p>';
    echo '      <div id="box-'.$model->id.'"></div>';
    echo $this->render('_view', array('model' => $model));
    echo '    </div>';
    echo '</div>';
}
?>
</li>
</ul>
<hr>
<div class="show_main_reply_block" style="display: none">
    <button id="main_reply_button" class="btn btn-link">make comment</button>
</div>
<div class="hr"></div>
<div class="well" id="form_well">
<form id="form1">
    <p><input name="Comments[user_name]" type="text" placeholder="name" id="user_name"></p>
    <textarea name="Comments[content]" style="width: 100%" placeholder="text" id="content"></textarea>
    <input name="Comments[parent_id]" type="hidden" value="0" id="parent_id">
    <input type="button" value="send" id="send_button" class="btn">
</form>
</div>


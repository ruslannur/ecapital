<?php

if (count($model->childs)) {

    foreach ($model->childs as $child) {
        echo '<div class="media">';
        echo '    <a class="pull-left" href="#">'.$child->user_name.'</a>';
        echo '    <div class="media-body">';
        echo '        <h4 class="media-heading">'.$child->created_at.'</h4>';
        echo '        <p>'.$child->content.' <button id="'.$child->id.'" class="reply btn btn-link">reply</button> </p>';
        echo '        <div id="box-'.$child->id.'"></div>';
        echo $this->render('_view', array('model' => $child));
        echo '    </div>';
        echo '</div>';
    }
}

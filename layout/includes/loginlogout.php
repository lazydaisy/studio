 <?php

if (!isloggedin() or isguestuser()) {

echo '<a href="'.$CFG->wwwroot.'/login/index.php">'.get_string('login').'</a>';


} else {
echo '<a href="'.$CFG->wwwroot.'/login/logout.php">'.get_string('logout').'</a>';
echo '</li>';
echo '<li><a href="'.$CFG->wwwroot.'/user/edit.php?id='.$USER->id.'&amp;course='.$COURSE->id.'">'.get_string('updatemyprofile').'</a></li>';
echo '<li><a href="'.$CFG->wwwroot.'/my">'.get_string('mycourses').'</a>';

} ?>
<?php
require_once '../controllers/CroustagramGUI_Mobile.php';
require_once '../controllers/controllerLeaderboard.php';

start_page('Classement par PointCrous !');

echo '<div id="contenuClassement">';
    showLeaderboard();
echo '</div>';

end_page();
?>

</body>

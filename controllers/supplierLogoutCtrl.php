<?php
if (isset($_SESSION['user_role'])) {
   unset($_SESSION['user_role']);
      unset($_SESSION['user_id']);
} 
 
// On détruit la session. Unset ou session_destroy
//session_destroy();
?>

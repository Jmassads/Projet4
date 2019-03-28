<?php
session_start();

// Flash message helper
// EXAMPLE:
// In Controller: flash('chapter_message', 'Chapitre ajouté')'
// DISPLAY IN VIEW - <?php echo flash('chapter_message');
function flash($name = '', $message = '', $class = 'alert alert-success')
{
 // No message, create it
 // example flash('chapter_message', 'Chapitre ajouté sans image');
 if (!empty($name)) {
  if (!empty($message) && empty($_SESSION[$name])) {
   if (!empty($_SESSION[$name])) {
    unset($_SESSION[$name]);
   }

   if (!empty($_SESSION[$name . '_class'])) {
    unset($_SESSION[$name . '_class']);
   }

   $_SESSION[$name] = $message;
   $_SESSION[$name . '_class'] = $class;
  }
  //Message exists, display it
  // example flash('chapter_message')
  elseif (empty($message) && !empty($_SESSION[$name])) {
   $class = !empty($_SESSION[$name . '_class']) ? $_SESSION[$name . '_class'] : '';
   echo '<div class="' . $class . '" id="msg-flash">' . $_SESSION[$name] . '</div>';
   unset($_SESSION[$name]);
   unset($_SESSION[$name . '_class']);
  }
 }
}

function isLoggedIn()
{
 if (isset($_SESSION['user_id'])) {
  return true;
 } else {
  return false;
 }
}

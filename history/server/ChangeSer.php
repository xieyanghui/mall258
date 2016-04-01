<?php
if (!isset($_SESSION)) {
    session_start();
};
if ($_SESSION['device'] == 'mobile') {
    $_SESSION['device'] = 'pc';
} else {
    $_SESSION['device'] = 'mobile';
}
?>
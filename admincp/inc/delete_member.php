<?php 
    if (isset($_GET['id'])) {
        $sp->voidMember($sp->db->real_escape_string($_GET['id']));
    }
    header('Location: index.php?action=members');
?>
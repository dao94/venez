<?php 
    if (isset($_GET['id'])) {
        $id = $sp->db->real_escape_string($_GET['id']);
        $sp->voidOrderItem($id);
    }
    header('Location: index.php?action=order');
?>
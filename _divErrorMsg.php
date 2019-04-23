<div class="formRow errorDiv" id="errorDiv">
    <?php
        echo (isset($_SESSION['error_msg']) ? htmlspecialchars($_SESSION['error_msg']) : '');
    ?>
</div>

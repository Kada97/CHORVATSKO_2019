<div class="formRow errorDiv" id="errorDiv">
    <?php
        (isset($_SESSION['error_msg']) ? htmlspecialchars($_SESSION['error_msg']) : '')
    ?>
</div>

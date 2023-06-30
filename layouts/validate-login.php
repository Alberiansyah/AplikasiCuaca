<?php if (isset($_SESSION['gagal'])) : ?>
    <strong class="text-<?= ($_SESSION['gagal']['type'] == true) ? 'success' : 'danger' ?>"><?= $_SESSION['gagal']['message'] ?></strong>
    <?php unset($_SESSION['gagal']) ?>
<?php endif; ?>
<?php if (isset($_SESSION['oldForm'])) : ?>
    <strong class="text-<?= ($_SESSION['oldForm']['type'] == true) ? 'success' : 'danger' ?>"><?= $_SESSION['oldForm']['message'] ?></strong>
    <?php unset($_SESSION['oldForm']) ?>
<?php elseif (isset($_SESSION['berhasil'])) : ?>
    <strong class="text-<?= ($_SESSION['berhasil']['type'] == true) ? 'success' : 'danger' ?>"><?= $_SESSION['berhasil']['message'] ?></strong>
    <?php unset($_SESSION['berhasil']) ?>
<?php endif; ?>
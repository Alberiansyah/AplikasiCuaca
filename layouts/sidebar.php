<!-- Page Sidebar -->
<div class="page-sidebar">
    <div class="page-sidebar-inner">
        <div class="page-sidebar-menu">
            <ul>
                <li>
                    <a type="button" id="backToTop" data-toggle="tooltip" data-placement="right" title="Back to Top"><i class="fa fa-arrow-up"></i></a>
                </li>
                <li>
                    <a href="https://github.com/Alberiansyah" target="_blank" data-toggle="tooltip" data-placement="right" title="GitHub"><i class="icon-github"></i></a>
                </li>
                <li>
                    <a href="<?= $hostToRoot ?>" data-toggle="tooltip" data-placement="right" title="Dashboard"><i class="icon-home"></i></a>
                </li>
                <li>
                    <a href="https://id.linkedin.com/in/alberiansyah" target="_blank" data-toggle="tooltip" data-placement="right" title="LinkedIn"><i class="icon-linkedin"></i></a>
                </li>
                <li>
                    <a type="button" id="pushToBottom" data-toggle="tooltip" data-placement="right" title="Push to Bottom"><i class="fa fa-arrow-down"></i></a>
                </li>
            </ul>
        </div>
    </div>
    <div class="sign-out">
        <a href="<?= $hostToRoot ?>logout" data-toggle="tooltip" data-placement="right" title="Logout"><i class="fas fa-sign-out-alt"></i></a>
    </div>
</div><!-- /Page Sidebar -->
<div class="settings-overlay"></div>
<!-- Page Content -->
<div class="page-content">
    <div class="secondary-sidebar">
        <div class="secondary-sidebar-bar">
            <a href="<?= $hostToRoot ?>" class="logo-box"><?= $title ?></a>
        </div>
        <div class="secondary-sidebar-menu">
            <ul class="accordion-menu">
                <?php if ($_SESSION['role'] == 'ADMIN') : ?>
                    <?php require 'menu-admin.php' ?>
                <?php else : ?>
                    <li id="dashboard">
                        <a href="<?= $hostToRoot ?>home">
                            <i class="menu-icon icon-home4"></i><span>Home</span>
                        </a>
                    </li>
                    <li id="profil">
                        <a href="profil">
                            <i class="icon-user icon-custom"></i><span>Profil</span>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
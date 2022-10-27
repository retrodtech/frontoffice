<nav id="topNavBar"
    class="navbar navbar-main navbar-expand-lg position-sticky mt-4 top-1 px-0 mx-4 shadow-none border-radius-xl z-index-sticky"
    id="navbarBlur" data-scroll="true">
    <div class="container-fluid py-1 px-3">
        <div aria-label="breadcrumb" class="navFlex">

            <div class="logo"><img src="<?php echo FRONT_SITE_IMG." logo/Jamindars_palace_663.png" ?>" alt=""></div>

            <ul class="mainNav">
                <li>
                    <a href="<?php echo FO_FRONT_SITE ?>">Front Office</a>
                    <ul class="dropNav" style="max-width: 372px;">
                        <li><a href="<?php echo FO_FRONT_SITE ?>/reservations.php">Reservations</a></li>
                        <li><a href="<?php echo FO_FRONT_SITE ?>/stay-view.php">Stay View</a></li>
                        <li><a href="<?php echo FO_FRONT_SITE ?>/room-view.php">Room View</a></li>
                        <li><a href="">Insert Transaction</a></li>
                        <li><a href="<?php echo FO_FRONT_SITE ?>/guest.php">Guest Database</a></li>
                        <li><a href="<?php echo FO_FRONT_SITE ?>/night-audit.php">Night Audit</a></li>
                        <li><a href="<?php echo FO_FRONT_SITE ?>/review.php">Guest Reviews</a></li>
                        <li><a href="">Lost and Found</a></li>
                        <li><a href="">Unsettled Folios</a></li>
                    </ul>
                </li>
                <li>
                    <a href="">Cashiering</a>
                    <ul class="dropNav" style="max-width:426px">
                        <li><a href="<?= FO_FRONT_SITE ?>/cashing/cashiering.php">Cashiering Center</a></li>
                        <li><a href="<?= FO_FRONT_SITE ?>/cashing/travel-agent.php">Travel Agent Database</a></li>
                        <li><a href="<?= FO_FRONT_SITE ?>/cashing/sale-person.php">Sales Person Database</a></li>
                        <li><a href="<?= FO_FRONT_SITE ?>/cashing/company.php">Company Database</a></li>
                        <li><a href="">Expense Voucher</a></li>
                        <li><a href="">POS</a></li>
                        <li><a href="">Exchange Rate</a></li>
                    </ul>
                </li>
                <li>
                    <a href="">Housekeeping</a>
                    <ul class="dropNav" style="max-width: 374px;">
                        <li><a href="">House Status</a></li>
                        <li><a href="">Maintenance Block</a></li>
                        <li><a href="">Work Order</a></li>
                    </ul>
                </li>
                <li>
                    <a href="">Booking Engine</a>
                    <ul class="dropNav" style="width: 220px;">
                        <li><a href="<?php echo FO_FRONT_SITE ?>/inventory.php">Inventory</a></li>
                        <li><a href="<?php echo FO_FRONT_SITE ?>/amenities.php">Amenities</a></li>
                    </ul>
                </li>
                <li>
                    <a href="">Web builder</a>
                    <ul class="dropNav" style="max-width:180px">
                        <li><a href="<?php echo WB_FRONT_SITE ?>/slider.php">Slider</a></li>
                        <li><a href="<?php echo WB_FRONT_SITE ?>/gallery.php">Gallery</a></li>
                        <li><a href="<?php echo WB_FRONT_SITE ?>/offer.php">Offer</a></li>
                        <li><a href="<?php echo WB_FRONT_SITE ?>/blog.php">Blog</a></li>
                    </ul>
                </li>
                <li>
                    <a href="">Reports</a>
                    <ul class="dropNav" style="max-width:175px">
                        <li style="width:100%"><a href="">Reports</a></li>
                        <li style="width:100%"><a href="<?php echo FO_FRONT_SITE ?>/night-audit.php">Night Audit Log</a></li>
                    </ul>
                </li>
            </ul>

            <ul class="navbar-nav  justify-content-end">
                <li class="nav-item d-flex align-items-center mr-2" data-bs-toggle="tooltip" data-bs-placement="left"
                    title="Profile">
                    <a href="profile.php" class="nav-link text-body font-weight-bold px-0">
                        <i class="fa fa-user me-sm-1"></i>
                        <span class="d-sm-inline d-none">Profile</span>
                    </a>
                </li>
                <li>
                    <a href="<?= FO_FRONT_SITE ?>/night-audit.php">
                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                            viewBox="0 0 80 80" style="fill: #67748e;width: 15px;" xml:space="preserve">
                        <path id="XMLID_14_" d="M63.6,3.2c-2.6,2.8-4,6.6-3.6,10.7c0.7,7.5,7.4,13.1,14.9,12.3C76,26,77,25.8,78,25.5
                            c-2.2,2.4-5.2,4-8.7,4.3c-7.5,0.7-14.2-4.8-14.9-12.3C53.7,11,57.7,5.2,63.6,3.2z"/>
                        <path id="XMLID_5_" d="M58.4,57.3h-5.5L43.4,37c2.6-2.5,4.2-6,4.2-9.9c0-7.6-6.1-13.7-13.7-13.7c-7.6,0-13.7,6.1-13.7,13.7
                            c0,4.1,1.8,7.7,4.6,10.2l-9.3,20H9.5c-3.3,0-6,2.7-6,6v5.2h60.9v-5.2C64.4,60,61.7,57.3,58.4,57.3z"/>
                        <path id="XMLID_7_" d="M3.5,72.3h60.9v1.3c0,2-1.6,3.6-3.6,3.6H7c-2,0-3.6-1.6-3.6-3.6V72.3z"/>
                    </svg>

                    </a>
                </li>
                <li class="nav-item d-flex align-items-center mr-2" id="configBtn" data-bs-toggle="tooltip" data-bs-placement="left"
                    title="Configuration" style="position:relative">
                    <a href="javascript:void(0)" class="nav-link text-body font-weight-bold px-0">
                        <i class="fas fa-users-cog"></i>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton" data-bs-popper="static" style="margin:0 !important">
                        
                        <li class="mb-2"><a href="<?php echo FO_FRONT_SITE ?>/room-list.php">Room List</a></li>
                        <li class="mb-2"><a href="<?php echo FO_FRONT_SITE ?>/room-number.php">Room Number</a></li>
                        <li class="mb-2"><a href="<?php echo FO_FRONT_SITE ?>/coupon_code.php">Coupon</a></li>

                    </ul>

                </li>
                
                <!-- <li class="nav-item d-xl-none ps-3 d-flex align-items-center toggleNav">
                    <a href="javascript:;.html" class="nav-link text-body p-0" id="iconNavbarSidenav">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                        </div>
                    </a>
                </li> -->

                <li class="nav-item  pe-2 d-flex align-items-center" data-bs-toggle="tooltip" data-bs-placement="left"
                    title="Logout">
                    <a href="logout.php" class="nav-link text-body p-0" id="dropdownMenuButton">
                        <i class="fas fa-sign-out-alt"></i>
                    </a>
                </li>

            </ul>

        </div>

        <!-- <div class="sidenav-toggler sidenav-toggler-inner d-xl-block d-none ">
            <a href="javascript:;.html" class="nav-link text-body p-0">
                <div class="sidenav-toggler-inner">
                    <i class="sidenav-toggler-line"></i>
                    <i class="sidenav-toggler-line"></i>
                    <i class="sidenav-toggler-line"></i>
                </div>
            </a>
        </div>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="topNavBar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                <ul class="navbar-nav  justify-content-end quickLink">
                    <li class="nav-item d-flex align-items-center px-3" data-bs-toggle="tooltip"
                        data-bs-placement="left" title="Hotel">
                        <a href="<?php echo FRONT_ADMIN_SITE ?>manage-hotel.php"
                            class="nav-link text-body font-weight-bold px-0">
                            <i class="far fa-building"></i>
                        </a>
                    </li>
                </ul>
            </div>
            
        </div> -->
    </div>
</nav>
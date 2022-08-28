<?php ?>

<body>
<div class="sidebar" data-image="./assets/img/burger.jpg" data-color="blue">
            <div class="sidebar-wrapper">
                <div class="logo">
                    <a class="simple-text">
                        LU Restaurant
                    </a>
                </div>
                <ul class="nav">
                    <li  id="menu" >
                        <a class="nav-link" href="./menus.php">
                            <i class="nc-icon nc-notes"></i>
                            <p>Menus</p>
                        </a>
                    </li>
                    <li id="offer" >
                        <a class="nav-link" href="./offers.php">
                            <i class="nc-icon nc-paper-2"></i>
                            <p>Offers</p>
                        </a>
                    </li>
                    <li id="event">
                        <a class="nav-link" href="./events.php">
                            <i class="nc-icon nc-atom"></i>
                            <p>Events</p>
                        </a>
                    </li >
                    <li id="table">
                        <a class="nav-link" href="./tables.php">
                            <i class="nc-icon nc-pin-3"></i>
                            <p>Tables</p>
                        </a>
                    </li>
                    <li id="reservation">
                        <a class="nav-link" href="./reservations.php">
                            <i class="bi bi-card-checklist"></i>
                            <p>Reservations</p>
                        </a>
                    </li>
                    <li id="about">
                        <a class="nav-link" href="./about.php">
                            <i class="bi bi-info-circle"></i>
                            <p>About</p>
                        </a>
                    </li>
                   <?php if($_SESSION['is_super']==1){
                         ?><li id="admin">
                        <a class="nav-link" href="./admins.php">
                        <i class="bi bi-person"></i>
                            <p>Admins</p>
                        </a>
                    </li>
                   <?php   }?>
                </ul>
            </div>
        </div>
</body>
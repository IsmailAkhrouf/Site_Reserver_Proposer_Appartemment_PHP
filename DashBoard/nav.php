<?php session_start(); ?>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <h4 class="logo"><b> Systeme pour gestion des appartements</b></h4>
        </div>
    
        <ul class="nav navbar-right top-nav">
                        
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b><?php echo $_SESSION['NomAdmin']; ?></b> <b class="fa fa-angle-down"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="ChangerAdmin.php"><i class="fa fa-fw fa-user"></i> Edit Profile</a></li>
                    <li class="divider"></li>
                    <li><a href="Logout.php"><i class="fa fa-fw fa-power-off"></i> Logout</a></li>
                </ul>
            </li>
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-1"><i class="fa fa-fw fa-paper-plane-o"></i> <b>Gestion Appartement</b> <i class="fa fa-fw fa-angle-down pull-right"></i></a>
                    <ul id="submenu-1" class="collapse">
                        <li><a href="Ajouter.php"><i class="fa fa-angle-double-right"></i> Ajouter</a></li>
                        <li><a href="Supprimer.php"><i class="fa fa-angle-double-right"></i> Confirmer</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-2"><i class="fa fa-fw fa-paper-plane-o"></i> <b>Gestion Commande</b><i class="fa fa-fw fa-angle-down pull-right"></i></a>
                    <ul id="submenu-2" class="collapse">
                        <li><a href="Consulter.php"><i class="fa fa-angle-double-right"></i> Consulter</a></li>
                        <li><a href="Valider.php"><i class="fa fa-angle-double-right"></i> Valider</a></li>
                        <li><a href="Annuler.php"><i class="fa fa-angle-double-right"></i> Annuler</a></li>
                    </ul>
                </li>
                
				 <li>
                    <a href="Notification.php"><i class="fa fa-fw fa-paper-plane-o"></i> <b>Notifications</b></a>
                </li>
                <li>
                    <a href="imprimer_tarif.php"><i class="fa fa-fw fa-paper-plane-o"></i> <b>Imprimer Tarif</b></a>
                </li>
                
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<title>InfoC++2 :: Főoldal</title>

		<link rel="stylesheet" href="css/materialize.min.css">
		<link href="https://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet">
		<link rel="stylesheet" href="css/main.css">
		<link rel="stylesheet" href="css/prism.css">

		<script src="js/jquery.min.js"></script>
		<script src="js/materialize.min.js"></script>
		<script src="js/d694dee3c4.js"></script>
		<script src="js/loadPage.js"></script>
		<script src="js/menu.js"></script>

		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
		<link rel="icon" href="favicon.ico" type="image/x-icon">
	</head>

	<body>
			<?php $a = '
			<li><a data-page="PRE" onclick="menu(this)">Bevezető</a></li>
			<li><a data-page="LS1" onclick="menu(this)">1: C és C++ eltérések</a></li>
			<li><a data-page="LS2" onclick="menu(this)">2: OOP alapok</a></li>
			<li><a data-page="LS3" onclick="menu(this)">3: Osztályok tulajdonságai</a></li>
			<li><a data-page="LS4" onclick="menu(this)">4: Öröklés</a></li>
			<li><a data-page="LS5" onclick="menu(this)">5: Példányok tulajdonságai</a></li>
			<li><a data-page="LS6" onclick="menu(this)">6: Sablonok</a></li>
			<li><a data-page="LS7" onclick="menu(this)">7: Iterátorok</a></li>
			<li><a data-page="LS8" onclick="menu(this)">8: Többszörös öröklés, szerializáció</a></li>
			<li><a data-page="LS9" onclick="menu(this)">9: Kivételkezelés, az STL elemei</a></li>
			';
			$b = '<li><a data-page="APX" onclick="menu(this)">Függelék</a></li>
			<li><a data-page="TSK" onclick="menu(this)">Példatár</a></li>
			<li><a data-page="EXT" onclick="menu(this)">Érdekességek</a></li>
			<li><a data-page="HFT" onclick="menu(this)">HFTest</a></li>
			';
			?>

		<ul id="cppLessons" class="dropdown-content">
			<?php echo $a; ?>
		</ul>

		<ul id="cppExtras" class="dropdown-content">
			<?php echo $b; ?>
		</ul>

		<!-- Navbar -->
		<div class="navbar-fixed">
			<nav class="menubar green">
				<div class="nav-wrapper">
					<a class="brand-logo" data-page="TTL" onclick="menu(this)"><i class="fa fa-code fa-1" aria-hidden="true"></i> InfoC++2</a>
					<a data-activates="cppSideNav" class="button-collapse hide-on-med-and-up"><i class="fa fa-bars" aria-hidden="true"></i></a>
					<ul class="right hide-on-small-only">
						<li><a data-page="INF" onclick="menu(this)">Info</a></li>
						<li><a class="dropdown-button" data-activates="cppLessons">Tananyag <i class="fa fa-caret-down" aria-hidden="true"></i></a></li>
						<li><a class="dropdown-button" data-activates="cppExtras">Extrák <i class="fa fa-caret-down" aria-hidden="true"></i></a></li>
						<li><a data-page="CTC" onclick="menu(this)">Kapcsolat</a></li>
					</ul>
					<ul class="side-nav show-on-small" id="cppSideNav">
						<li><a data-page="INF" onclick="menu(this)" class="cppSideNavItem">Info</a></li>

						<ul class="collapsible collapsible-accordion"> <li> <a class="collapsible-header">Tananyag</a> <div class="collapsible-body"> <ul>
							<?php echo $a; ?>
						</ul> </div> </li> </ul>

						<ul class="collapsible collapsible-accordion"> <li> <a class="collapsible-header">Extrák</a> <div class="collapsible-body"> <ul>
							<?php echo $b; ?>
						</ul> </div> </li> </ul>

						<li><a data-page="CTC" onclick="menu(this)" class="cppSideNavItem">Kapcsolat</a></li>
					</ul>
				</div>
			</nav>
		</div>

		<!-- Content -->
		<div class="container">

		</div>

		<script type="text/javascript">
			$(document).ready(function(){
				$(".dropdown-button").dropdown({
					belowOrigin: true,
					gutter: 0,
					constrainWidth: false
				});

				$(".button-collapse").sideNav();

				var page = sessionStorage.getItem('lastPage');
				console.log(page)
				if(page == null)
					loadPage("TTL", false)
				else
					loadPage(page, false)

			});

			window.onpopstate = function(e) {
				console.log(e, e.state)
				if(e.state != undefined && e.state != null) loadPage(e.state.page, false);
			}
		</script>
	</body>
</html>

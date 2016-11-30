<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title><?php echo $this->e($title) ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/reset.css') ?>"type="text/css" />
	<link rel="stylesheet" href="<?= $this->assetUrl('css/style.css') ?>" type="text/css" />
	<!-- "<?= $this->assetUrl('css/style.css') ?>"  vaudra assets /css/style.css-->
</head>
<body>
	<header>
		<?php $fmsg->display(); ?>
		<h1><?php echo $this->e($title); ?></h1>
	</header>
	<aside>
		<h3>
			<a href="<?php echo $this->url('default_home') ?>" title="Revenir a l'accueil">Les salons</a>
		</h3>
		<nav>
			<ul id="menu-salons">
				<?php  
					foreach ($salons as $salon): ?>
					<li> <a href="<?php echo $this->url('see_salon', array('id'=>$salon['id'] )) ?>"> <?php echo $this -> e($salon['nom']); ?></a></li>
				<?php endforeach; ?> 
				<?php if(in_array($w_user['role'],['admin','superadmin'])): ?>

			<li>
				<a class="button" href="<?php echo $this->url('users_list') ?>" title="Liste des utilisateurs">Liste des utilisateurs</a>
			</li>
			<?php endif; ?>
			<li>
				<?php if ($w_user): ?>
				<a class="button" href="<?php echo $this->url('logout') ?>">Deconnection !</a>
				<?php else: ?>
				<a class="button" href="<?php echo $this->url('login') ?>" title="">Connection !</a>
			<?php endif; ?>
			</li>
			</ul>
		</nav>
	</aside><main>

		<section>
			<?= $this->section('main_content') ?>
		</section>
	</main>
	<footer>
	</footer>

	<script
	  src="https://code.jquery.com/jquery-2.2.4.min.js"
	  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
	  crossorigin="anonymous">
	</script>

	<script type="text/javascript" src="<?php echo $this->assetUrl('js/close-flash-messages.js') ?>"></script>

	<?php  $sectionJavascripts =$this->section('javascripts');
		if(!empty($sectionJavascripts)){
			echo $sectionJavascripts;
			} 
	?>
</body>
</html>
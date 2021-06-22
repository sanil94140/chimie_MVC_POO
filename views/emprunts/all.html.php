<!doctype html>
<html lang="en">

<head>
	<title>Les emprunts</title>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>


	<div class="container">
		<div class="row">
			<?php foreach ($emprunts as $emprunt) : ?>

				<div class="card col-12 col-sm-6 col-lg-4 m-2">
					<div class="card-body">
						<h4 class="card-title">

							<?php /**
							 * La balise "<?=" est équivalente à "<?php echo"
							 */ ?>

							<?= $emprunt['titre'] ?>
							(<?= $emprunt['prenom_auteur']  . ' ' . $emprunt['nom_auteur'] ?>)
						</h4>
						<p class="card-text">
							Emprunté par
							<?= $emprunt['prenom_emprunteur'] ?> <?= $emprunt['nom_emprunteur'] ?>

							<?php if ($emprunt['role_emprunteur'] != null) {
								echo '(' .  $emprunt['role_emprunteur'] . ')';
							} ?>

							le <?= $emprunt['date_emprunt'] ?>. <br>


							<?php if ($emprunt['date_retour'] == null) : ?>
								<b style="color:red;">Livre non rendu !</b>
							<?php else : ?>
								Date de retour&nbsp;: <?= $emprunt['date_retour'] ?>.
							<?php endif; ?>
						</p>
						<p class="card-text">
							<a href="<?= url('/supprimer-emprunt') . '?id=' . $emprunt['id'] ?>" class="btn btn-danger">Supprimer</a>
						</p>
					</div>
				</div>

			<?php endforeach; ?>

		</div>
	</div>

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
<div class="alert  <?= (isset($_SESSION['alert'])) ? $_SESSION['alert'] : "" ?>">
	<?= (isset($_SESSION['notify'])) ? $_SESSION['notify'] : "";
	unset($_SESSION["notify"]);
	unset($_SESSION["alert"]);
	?>
</div>
<div class="container-fluid">
	<div class="main row mt-4">
		<div class="manager">
			<div class="w-100 d-flex justify-content-between align-items-center py-4">
				<form class="search" action="FindAccount" method="get">
					<div class="row py-1 px-1">
						<div class="col-10 ">
							<input type="text" name="keyword" id="search" placeholder="Search"
								class="border-0 form-control">
						</div>
						<div class="col-2">

							<button class="bg-white border-0" type="submit">
								<svg style="width: 30px;" xmlns="http://www.w3.org/2000/svg" fill="none"
									viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
									<path stroke-linecap="round" stroke-linejoin="round"
										d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
								</svg>
							</button>
						</div>
					</div>
				</form>
				<div>
					<a class="btn btn-primary" href="create.php">Add
						Accout</a>
				</div>
			</div>


		</div>
	</div>

	<div class="table w-100" style="overflow-x: auto ">
		<table class="w-100 border-1">
			<thead class="bg-light text-dark">
				<th>action</th>
				<th>username</th>
				<th>name</th>
				<th>email</th>
				<th>password</th>
				<th>role</th>

			</thead>
			<tbody>
				<?php
				foreach ($users as $user):
					?>
					<tr>
						<td>
							<div class="me-5 d-flex">
								<a class="btn btn-primary mx-3" href="edit.php?id=<?=$user['id']?>">Edit</a>
								<form action="destroy.php" method="post" onSubmit=" return confirm('Confirm delete');">
									<button class="btn btn-danger" type="submit" value="<?=$user['id'] ?>"
										name="id">Delete</button>
								</form>
							</div>
						</td>
						<td class="py-2">
							<?= $user['username'] ?>
						</td>
						<td class="py-2">
							<?= $user['fullname'] ?>
						</td>
						<td class="py-2 px-3">
							<?= $user['email'] ?>
						</td>
						<td class="py-2">
							<?= $user['password'] ?>
						</td>
						<td class="py-2">
							<?=$user['role_id'] ?>
						</td>
					</tr>
				<?php endforeach ?>

			</tbody>
		</table>
	</div>
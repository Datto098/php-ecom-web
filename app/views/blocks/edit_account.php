<div class="container mt-4" style="display: flex; justify-content: center;">
	<div class="main-content">
		<form id="product-form" method="POST" action="update.php">
		<div class="wrap-field">
				 <input class="id" type="hidden" name="id" value="<?= $user['id']?>" />
				<div class="clear-both"></div>
				<p class="alert alert-username" style="display: none; color: red">Username da ton tai
			</div>
			<div class="wrap-field">
				<label>Username</label> <input class="username" type="text" name="username" value="<?= $user['username']?>"  required/>
				<div class="clear-both"></div>
				<p class="alert alert-username" style="display: none; color: red">Username da ton tai
			</div>
			<div class="wrap-field">
				<label>Fullname</label> <input type="text" name="fullname" value="<?= $user['fullname']?>" required/>
				<div class="clear-both"></div>
			</div>
			<div class="wrap-field">
				<label>Email</label>
				<input type="email" name="email" class="email" value="<?= $user['email']?>" required/>

				<div class="clear-both"></div>
				<p class="alert alert-email" style="display: none; color: red">Email da duoc lien ket voi tai khoan khac
				</p>
			</div>

			<div class="wrap-field">
				<label>Password</label> <input value="<?= $user['password']?>" class="input-password" type="text" name="password" />
				<div class="clear-both"></div>
			</div>

			<div class="wrap-field">
				<label>Confirm Password</label> <input value="<?= $user['password']?>" class="input-cfpassword" type="text" />
				<div class="clear-both"></div>
				<p id="errorText" style="margin-left: 10px"></p>
			</div>

			<div class="wrap-field mt-4">
				<label>Role </label>
				<div class="d-flex flex-column box-role">
					<?php foreach($roles as $role): ?>
					<div class="form-check">
						<input class="form-check-input" type="radio" name="role_id" id="flexRadioDefault1" value="<?php echo $role['id'] ?>" <?php echo ($role['id'] == $user['role_id']) ? "checked" : ""?> required>
						<label class="form-check-label" for=""><?php echo $role['name'] ?>
						</label>
					</div>

					<?php endforeach ?>
				</div>
				<div class="clear-both"></div>
			</div>
			<button class="btn btn-primary my-5 btnAdd" style="margin-left: 142px;">Update</button>
		</form>
		<div class="clear-both"></div>
	</div>
</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
	// Thêm event listener để kiểm tra khi người dùng nhập dữ liệu
	const inputPw = document.querySelector('.input-password');
	const inputUsername = document.querySelector('.username');
	const inputCfPw = document.querySelector('.input-cfpassword');
  	const errorText = document.getElementById("errorText");
	const errorUsername = document.querySelector(".alert-username");
  	const btnAdd = document.querySelector(".btnAdd");
  	inputPw.addEventListener("input", validatePassword);
  	inputCfPw.addEventListener("input", validatePassword);
	//xu ly password
	function validatePassword(checkPw){
	if(inputCfPw.value != "")
	{
		if (inputPw.value !== inputCfPw.value) {
		    errorText.textContent = "Passwords do not match!";
		    errorText.style.color = "red"
		  	} else {
		    // Passwords match, proceed with form submission or other actions
		    errorText.textContent = "Passwords match!";
		    errorText.style.color = "#00a67d";
		  	}
		}
  	


	}

	const currentUsername = inputUsername.value;
	inputUsername.addEventListener('input' , function(){
		$.ajax({
			url : "./check-username.php",
			type : "POST",
			data : {
				username : inputUsername.value,
				currentUsername : currentUsername,
			},
			success: function(data){
				if (data)
				{
					errorUsername.style.display = "none"
				}
				else{
					errorUsername.style.display = "block"
				}

				
			},
			error: function(xhr){
				
			}
		});
	});
</script>
<div class="container">
<div class="position-absolute py-5 px-3 bg-white"
			style="">
			<form action="store.php" method="post">
				<div class="row">
					
					<div
						class="mb-3 col-12 col-sm-6 form-password-toggle fv-plugins-icon-container">
						<div class="input-group input-group-merge">
							<div class="form-floating form-floating-outline">
								<input value="" class="form-control" type="text" id="username"
									name="username" placeholder="············"> <label
									for="username">username</label>
							</div>
						</div>
						<div
							class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
					</div>

					<div
						class="mb-3 col-12 col-sm-6 form-password-toggle fv-plugins-icon-container">
						<div class="input-group input-group-merge">
							<div class="form-floating form-floating-outline">
								<input value="" class="form-control" type="email" id="email"
									name="email" placeholder="············"> <label
									for="email">email</label>
							</div>
						</div>
						<div
							class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
					</div>

					<div
						class="mb-3 col-12 col-sm-6 form-password-toggle fv-plugins-icon-container">
						<div class="input-group input-group-merge">
							<div class="form-floating form-floating-outline">
								<input value="" class="form-control" type="password" id="password"
									name="password" placeholder="············"> <label
									for="password">password</label>
							</div>
						</div>
						<div
							class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
					</div>

					<div
						class="mb-3 col-12 col-sm-6 form-password-toggle fv-plugins-icon-container">
						<div class="input-group input-group-merge">
							<div class="form-floating form-floating-outline">
								<input value="" class="form-control" type="fullname" id="fullname"
									name="fullname" placeholder="············"> <label
									for="fullname">fullname</label>
							</div>
						</div>
						<div
							class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
					</div>

					<div class="d-flex">
						<span style="margin-right : 10px ; font-weight: bold">Role</span>
						<div class="me-4" style="margin-right: 15px;">
						<label for="user" class="me-2">User</label>
						<input type="radio" id="user" value="0" name="role">
						</div>
                        <div class="d-flex" class="me-4" >
						<label for="admin" class="me-2"  >Admin</label>
						<input type="radio" id="admin" value="1" name="role">
						</div>
						
					</div>
					
				</div>

				<button type="submit" class="btn btn-primary">Add</button>
			</form>
		</div>
</div>
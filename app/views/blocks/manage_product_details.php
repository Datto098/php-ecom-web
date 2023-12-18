<div class="container">
    <div class="row gutter">
        <div class="col-4 bg-light mt-5">
            <h5 class="title_detail my-4  fw-bold">
                Manage Category Size
            </h5>
            <div class="table" style="overflow-x: auto;">
					<table class="border-1 " >
						<thead class="bg-light text-dark ">
							<th>action</th>
							<th>id</th>
							<th class="px-4">name</th>
						</thead>
						<tbody>

						<?php foreach($sizeModels as $sizeModel): ?>
							<tr>
								<td>
									<div class="me-5 d-flex">
										<button class="btn btn-primary btnEdit me-3" type="button">Edit</button>
										<form action="DeleteCategory" method="post" onsubmit="return confirm('Delete category');">
											<button class="btn btn-danger" name="input_id" value="<%=category.getId()%>">Delete</button>
										</form>
									</div>
								</td>
								<td class="py-2"><?= $sizeModel['id']?></td>
								<td class="py-2 px-4">
									<div class="d-flex">
										<input class="form-control me-2 input-name " type="text"
											name="name" value="<?= $sizeModel['name']?>" disabled>
										<button class="btn btn-primary btnSave d-none">Save</button>
									</div>
								</td>
								
							</tr>
							<?php endforeach ?>
							
							<tr class="box-add-category">
								<td></td>
								<td></td>
								<td class="py-2 px-4">
									<form action="AddCategory" method="post">
										<div class="d-flex">
										<input class="form-control me-2 input-add-name " type="text"
											name="name">
										<button class="btn btn-primary btnAddName" type="submit">Add</button>
									</div>
									</form>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
        </div>
        <div class="col-4 mt-5">
        	<h5 class="title_detail my-4  fw-bold">
                Manage Size
            </h5>

			<select>
			<?php foreach($sizeModels as $sizeModel): ?>
				<option class="select-option-model" value="<?= $sizeModel['id']?>"><?= $sizeModel['name']?></option>
				<?php endforeach?>
			</select>

			<div class="table" style="overflow-x: auto;">
					<table class="border-1 " >
						<thead class="bg-light text-dark">
							<th>action</th>
							<th>id</th>
							<th class="px-4">name</th>
						</thead>
						<tbody class="manage-size-box">
							<tr>
								<td>
									<div class="me-5 d-flex">
										<button class="btn btn-primary btnEdit me-3" type="button">Edit</button>
										<form action="DeleteCategory" method="post" onsubmit="return confirm('Delete category');">
											<button class="btn btn-danger" name="category_id" value="<%=category.getId()%>">Delete</button>
										</form>
									</div>
								</td>
								<td class="py-2"></td>
								<td class="py-2 px-4">
									<div class="d-flex">
										<input class="form-control me-2 input-name " type="text"
											name="name" value=" " disabled>
										<button class="btn btn-primary btnSave d-none">Save</button>
									</div>
								</td>
							</tr>
							
							<tr class="box-add-category">
								<td></td>
								<td></td>
								<td class="py-2 px-4">
									<form action="AddCategory" method="post">
										<div class="d-flex">
										<input class="form-control me-2 input-add-name " type="text"
											name="name">
										<button class="btn btn-primary btnAddName" type="submit">Add</button>
									</div>
									</form>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
        </div>
        <div class="col-4 bg-light mt-5">
        <h5 class="title_detail my-4 fw-bold">
                Manage Category Color
            </h5>

			<div class="table" style="overflow-x: auto;">
					<table class="border-1 " >
						<thead class="bg-light text-dark">
							<th>action</th>
							<th>id</th>
							<th class="px-4">name</th>
						</thead>
						<tbody>

							<?php foreach($colors as $color): ?>
							<tr>
								<td>
									<div class="me-5 d-flex">
										<button class="btn btn-primary btnEdit me-3" value="<?php echo $color['id'] ?>" type="button">Edit</button>
										<form action="DeleteCategory" method="post" onsubmit="return confirm('Delete category');">
											<button class="btn btn-danger" name="input_id" value="<?php echo $color['id'] ?>">Delete</button>
										</form>
									</div>
								</td>
								<td class="py-2 category-id"><?php echo $color['id'] ?></td>
								<td class="py-2 px-4">
									<div class="d-flex">
										<input style="width: 100px;" class="form-control me-2 input-name" type="text"
											name="name" value="<?php echo $color['name'] ?>" disabled>
										<button class="btn btn-primary btnSave d-none">Save</button>
									</div>
								</td>
							</tr>
							<?php endforeach ?>
							
							<tr class="box-add-category">
								<td></td>
								<td></td>
								<td class="py-2 px-4">
									<form action="AddCategory" method="post">
										<div class="d-flex">
										<input class="form-control me-2 input-add-name " type="text"
											name="name">
										<button class="btn btn-primary btnAddName" type="submit">Add</button>
									</div>
									</form>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>

	const listSizeModel =document.querySelectorAll('.select-option-model');
	const boxManageSize =document.querySelector('.manage-size-box');
	listSizeModel.forEach(element => {
		element.addEventListener('click', function(){
			$.ajax({
					url : "./get-size.php",
					type : "GET",
					data : {
						id : element.value,
					},
					success: function(data){
						boxManageSize.innerHTML = "";
						data.forEach(item => {
            			let htmlCategoriesBox = `
            			<tr>
							<td>
									<div class="me-5 d-flex">
										<button class="btn btn-primary btnEdit me-3" type="button">Edit</button>
										<form action="DeleteCategory" method="post" onsubmit="return confirm('Delete category');">
											<button class="btn btn-danger" name="category_id" value="${item.id}">Delete</button>
										</form>
									</div>
								</td>
								<td class="py-2">${item.id}</td>
								<td class="py-2 px-4">
									<div class="d-flex">
										<input class="form-control me-2 input-name " type="text"
											name="name" value="${item.name}" disabled>
										<button class="btn btn-primary btnSave d-none">Save</button>
									</div>
								</td>
							</tr>
            			`;
						boxManageSize.insertAdjacentHTML('beforeend', htmlCategoriesBox);
        });
						},
						error: function(xhr){
					}
				});
		})
	})




	//edit category
	const btnEdits = document.querySelectorAll('.btnEdit');
	edit(btnEdits,'update-color')
	function edit(btnEdits,link){
		btnEdits.forEach(element => {
		let varCheckInp = true;
		element.addEventListener('click', function(){
			const btnSave = element.parentNode.parentNode.parentNode.querySelector('.btnSave');
			const inputElement = element.parentNode.parentNode.parentNode.querySelector('.input-name');
			const id = element.value;
			varCheckInp = !varCheckInp;
			inputElement.disabled = varCheckInp;
	        btnSave.classList.toggle('d-none');

			btnSave.addEventListener('click', function(){
			$.ajax({
				url : `./${link}.php`,
				type : "GET",
				data : {
					id : id,
					name : inputElement.value,
				},
				success: function(data){
					if (data)
					{
						alert("Sua thanh cong");
						btnSave.classList.toggle('d-none');
						inputElement.disabled = true;
					}
					else{
						alert("Sua that bai");
					}
					// console.log(data)
				},
				error: function(xhr){
					
				}
			});
		})
			
		})

	})
	}
</script>
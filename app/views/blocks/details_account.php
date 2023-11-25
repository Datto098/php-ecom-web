<div class="container">

    <div class="container mt-4 mb-4 p-3 d-flex justify-content-center">

        <div class="card p-4">
        <a href="index.php" class="btn btn-dark" style="position:absolute; top: 10px; left: 10px;"><i class="fa-solid fa-arrow-left"></i></a>

            <div class=" image d-flex flex-column justify-content-center align-items-center">
                <button class="btn "> <img src="https://www.svgrepo.com/download/120488/idea.svg" height="100"
                        width="100" /></button>
                <h5 class="name mt-3">
                    <?php echo $user['fullname'] ?>
                </h5>
                <span class="idd">@
                    <?php echo $user['username'] ?>
                </span>
                <div class="d-flex flex-row justify-content-center align-items-center gap-2">
                    <span class="idd1">
                        <?php echo $user['email'] ?>
                    </span>
                    <span><i class="fa-solid fa-envelope"></i>
                    </span>
                </div>
                
                <div class="">
                    <span class="idd1">
                        <span class="fw-bold">Password :</span>
                        <span>
                            <?php echo $user['password'] ?>
                        </span>
                    </span>

                </div>

                <div class="fw-bold">
                    <span class="idd1"><span class="fw-bold">Role :</span><span>
                            <?php echo $user['role'] ?>
                        </span>
                    </span>
                </div>
                <div class=" d-flex mt-2">

                    <a href="edit.php?id=<?php echo $user['id'] ?>" class="btn btn-primary">Edit Profile</a>
                </div>
            </div>

        </div>
    </div>
</div>
</div>
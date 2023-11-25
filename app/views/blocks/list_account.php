<div class="container-fluid">
        <div class="main row mt-4">
                <div class="manager">
                        <div class="w-100 d-flex justify-content-between align-items-center py-4">
                                <form class="search" action="FindCategory" method="get">
                                        <div class="row py-1 px-1">
                                                <div class="col-10 ">
                                                        <input type="text" name="name" id="search" placeholder="Search"
                                                                class="border-0 form-control">
                                                </div>
                                                <div class="col-2">
                                                        <button class="bg-white border-0" type="submit">
                                                                <svg style="width: 30px;"
                                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                        viewBox="0 0 24 24" stroke-width="1.5"
                                                                        stroke="currentColor" class="w-6 h-6">
                                                                        <path stroke-linecap="round"
                                                                                stroke-linejoin="round"
                                                                                d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                                                                </svg>
                                                        </button>
                                                </div>
                                        </div>
                                </form>
                                <div>
                                        <a class="button btn btn-user-add" style="background-color: #9055fd;"
                                                onclick="clickButtonToOn()" href="create.php">Add
                                                Accout</a>
                                </div>
                        </div>
                </div>



                <table class="w-100">
                        <thead class="bg-light text-dark">
                                <th>id</th>
                                <th>username</th>
                                <th>email</th>
                                <th>password</th>
                                <th>fullname</th>
                                <th>role</th>
                                <th>action</th>
                        </thead>
                        <tbody>

                                <?php foreach ($users as $user): ?>
                                <tr>
                                        <td class="py-2"><?php echo $user['id'] ?></td>
                                        <td class="py-2"><?php echo $user['username'] ?></td>
                                        <td><?php echo $user['email'] ?></td>
                                        <td class="py-2"><?php echo $user['password'] ?></td>
                                        <td class="py-2"><?php echo $user['fullname'] ?></td>
                                        <td class="py-2"><?php echo $user['role'] ?></td>

                                        <td>
                                                <div class="d-flex" style="justify-content: space-between;">
                                                        <a class="btn btn-primary" href="edit.php?id=<?php echo $user['id'] ?>">Edit</a>
                                                        <a class="btn btn-danger" href="destroy.php?id=<?php echo $user['id'] ?>"
                                                                onclick="return deleteCommit();">Delete</a>
                                                        <a class="btn btn-secondary" href="show.php?id=<?php echo $user['id'] ?>"
                                                                >Details</a>
                                                </div>
                                        </td>

                                </tr>

                                <?php endforeach ?>

                        </tbody>
                </table>

        </div>
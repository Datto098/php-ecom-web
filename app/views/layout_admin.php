<!DOCTYPE html>
<html lang="zxx">

<head>
  <meta charset="UTF-8" />
  <meta name="description" content="Male_Fashion Template" />
  <meta name="keywords" content="Male_Fashion, unica, creative, html" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>
    <?php
    if (!empty($title)) {
      echo $title;
    }
    ?>
  </title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap" rel="stylesheet" />

  <!-- Css Styles -->
  <link rel="stylesheet" href="../../css/bootstrap.min.css" type="text/css" />
  <link rel="stylesheet" href="../../css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="../../css/elegant-icons.css" type="text/css" />
  <link rel="stylesheet" href="../../css/magnific-popup.css" type="text/css" />
  <link rel="stylesheet" href="../../css/nice-select.css" type="text/css" />
  <link rel="stylesheet" href="../../css/owl.carousel.min.css" type="text/css" />
  <link rel="stylesheet" href="../../css/slicknav.min.css" type="text/css" />
  <link rel="stylesheet" href="../../css/dashboard.css" type="text/css" />
</head>

<body>
  <!-- header start -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light position-relative">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img style="width: 40px" src="https://www.pma-india.org/assets/frontend/img/pma-images/project-management-blue.png" alt="" />
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="ManagerUsersController">Manager Account</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="ManagerFeedbacksController">Manager Feedbacks</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Manager ecommerce
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#">Manager Products</a></li>
              <li><a class="dropdown-item" href="#">Manager Discount</a></li>
              <li>
                <a class="dropdown-item" href="#">Manager Categories</a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>

    <div class="d-flex align-items-start">
      <img class="avata" src="https://demos.themeselection.com/materio-bootstrap-html-admin-template/assets/img/avatars/17.png" style="width: 50px; border-radius: 99px; margin-right: 15px;" alt="">
    </div>

    <div class="py-4 px-3 rounded-2 flex-column box-admin position-absolute bg-white d-none" style="width: 350px; top: 60px; right: 0; border: 1px solid #eee;">
      <a href="#" class="d-flex text-decoration-none align-items-center">
        <img src="https://demos.themeselection.com/materio-bootstrap-html-admin-template/assets/img/avatars/17.png" style="width: 50px; border-radius: 99px; margin-right: 15px;" alt="">
        <span class="fs-5 text-dark">Nguyen Phuong Tan</span>
      </a>
      <a href="LogoutController" class="btn btn-dark mt-4">Logout</a>
    </div>
  </nav>
  <?php

  if (!empty($slot)) {
    echo $slot;
  }
  ?>
  <!-- Js Plugins -->
  <script>
    /*---------------------
	js for avata nav admin
	------------------------- */

    const avata = document.querySelector('.avata');
    const boxAdmin = document.querySelector('.box-admin');
    const btnUserAdd = document.querySelector('.btn-user-add');
    const userAdd = document.querySelector('.user-add');




    let isVisible = false;
    avata.addEventListener('click', () => {
      if (isVisible) {
        boxAdmin.classList.remove('d-flex');
        boxAdmin.classList.add('d-none');
        isVisible = false;
      } else {
        boxAdmin.classList.remove('d-none');
        boxAdmin.classList.add('d-flex');
        isVisible = true;
      }
    });


    function deleteCommit() {
      return confirm("Confirm delete ?");
    }


    function clickButtonToOn() {
      userAdd.classList.add('d-block');
      userAdd.classList.remove('d-none');
    }
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
  </script>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  <script src="../../js/jquery-3.3.1.min.js"></script>
  <script src="../../js/bootstrap.min.js"></script>
  <script src="../../js/jquery.nice-select.min.js"></script>
  <script src="../../js/jquery.nicescroll.min.js"></script>
  <script src="../../js/jquery.magnific-popup.min.js"></script>
  <script src="../../js/jquery.countdown.min.js"></script>
  <script src="../../js/jquery.slicknav.js"></script>
  <script src="../../js/mixitup.min.js"></script>
  <script src="../../js/owl.carousel.min.js"></script>
</body>

</html>
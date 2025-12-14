<?php
include 'process/db_connection.php';
/*include 'process/session_check.php';*/

$conn = OpenCon();
$sql = "SELECT * FROM `salestbl` ORDER BY id DESC LIMIT 5;";
$result = $conn->query($sql);

$sql2 = "SELECT id FROM `personal_infotbl`;";
$result2 = mysqli_fetch_all($conn->query($sql2));

$sql3 = "SELECT COUNT(privilege) AS privilege_count FROM user_accounttbl WHERE privilege != 0 GROUP BY privilege WITH ROLLUP;";
$result3 = mysqli_fetch_all($conn->query($sql3));
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</head>

<body style="background:black url(Images/Assets/pattern.webp);">
    <div class="d-flex">
        <div class="vh-100 sticky-top" style="width: 320px; background-color:#111927">
            <nav class="navbar my-5 mx-4 px-3">
                <a class="navbar-brand text-white fw-bold" href="#">
                    Rian's Choice Enterprise
                </a>
            </nav>

            <ul class="nav flex-column mb-auto mx-4">
                <li class="">
                    <a href="Admin_page.php" class="nav-link text-white mb-2" style="background-color: #343b47;border-radius: 5px;">
                        Home
                    </a>
                </li>
                <li>
                    <a href="employee_registration_save.php" class="nav-link text-white mb-2 <?php echo $user_privilege == 1 ? '' : 'd-none' ?>">
                        Employee Registration
                    </a>
                </li>
                <li>
                    <a href="employee_report.php" class="nav-link text-white mb-2 <?php echo $user_privilege == 1 ? '' : 'd-none' ?>">
                        Employee Report
                    </a>
                </li>
                <li>
                    <a href="Payroll_page.php" class="nav-link text-white mb-2 <?php echo ($user_privilege == 1 || $user_privilege == 2) ? '' : 'd-none' ?>">
                        Payroll
                    </a>
                </li>
                <li>
                    <a href="payroll_report.php" class="nav-link text-white  mb-2 <?php echo ($user_privilege == 1 || $user_privilege == 2) ? '' : 'd-none' ?>">
                        Payroll Report
                    </a>
                </li>
                <li>
                    <a href="Bags.php" class="nav-link text-white mb-2 <?php echo ($user_privilege == 1 || $user_privilege == 3) ? '' : 'd-none' ?>">
                        POS
                    </a>
                </li>
                <li>
                    <a href="pos_sales_report.php" class="nav-link text-white mb-2 <?php echo ($user_privilege == 1 || $user_privilege == 3) ? '' : 'd-none' ?>">
                        POS Sales Report
                    </a>
                </li>
                <li>
                    <a href="user_account_page.php" class="nav-link text-white mb-2 <?php echo ($user_privilege == 1) ? '' : 'd-none' ?>">
                        User Account Report
                    </a>
                </li>
                <li>
                    <a href="logout_page.php" class="nav-link text-white  mb-2">
                        Logout
                    </a>
                </li>
            </ul>
        </div>
        <div class="flex-grow-1">
            <div class="container text-white">
                <h1 class="text-center my-3">Rian's Choice Enterprise</h1>
                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" >
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 3"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://images.unsplash.com/photo-1611078489935-0cb964de46d6?auto=format&fit=crop&q=80&w=1974&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="d-block w-100" alt="..." height="800">
                            <div class="carousel-caption d-none d-md-block">
                                <h1 class="fw-bold">Laptops</h1>
                                <p>Some representative placeholder content for the first slide.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="https://plus.unsplash.com/premium_photo-1663127330677-8d15656d6c39?q=80&w=1102&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="d-block w-100" alt="..." height="800">
                            <div class="carousel-caption d-none d-md-block">
                                <h1 class="fw-bold">Bags</h1>
                                <p>Some representative placeholder content for the second slide.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="https://images.unsplash.com/photo-1615634260167-c8cdede054de?q=80&w=1332&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="d-block w-100" alt="..." height="800">
                            <div class="carousel-caption d-none d-md-block">
                                <h1 class="fw-bold">Perfumes</h1>
                                <p>Some representative placeholder content for the third slide.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="https://images.unsplash.com/photo-1610701596061-2ecf227e85b2?auto=format&fit=crop&q=80&w=2070&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="d-block w-100" alt="..." height="800">
                            <div class="carousel-caption d-none d-md-block">
                                <h1 class="fw-bold">Utensils</h1>
                                <p>Some representative placeholder content for the third slide.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="https://images.unsplash.com/photo-1540221652346-e5dd6b50f3e7?auto=format&fit=crop&q=80&w=2069&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="d-block w-100" alt="..." height="800">
                            <div class="carousel-caption d-none d-md-block">
                                <h1 class="fw-bold">Clothes</h1>
                                <p>Some representative placeholder content for the third slide.</p>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                        <span class="carousel-control-next-icon " aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <!-- list and cards -->
                <div>
                    <h1 class="text-center my-5 pt-5">New Arrival</h1>
                    <ul class="nav d-flex gap-5 justify-content-center align-items-center mb-4" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active text-blue" id="Bags-tab" data-bs-toggle="tab" data-bs-target="#Bags-pane" type="button" role="tab" aria-controls="Bags-pane" aria-selected="true">Bags</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link text-blue" id="Clothes-tab" data-bs-toggle="tab" data-bs-target="#Clothes-tab-pane" type="button" role="tab" aria-controls="Clothes-tab-pane" aria-selected="false">Clothes</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link text-blue" id="Laptops-tab" data-bs-toggle="tab" data-bs-target="#Laptops-tab-pane" type="button" role="tab" aria-controls="Laptops-tab-pane" aria-selected="false">Laptops</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link text-blue" id="Perfumes-tab" data-bs-toggle="tab" data-bs-target="#Perfumes-tab-pane" type="button" role="tab" aria-controls="Perfumes-tab-pane" aria-selected="false">Perfumes</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link text-blue" id="Perfume-tab" data-bs-toggle="tab" data-bs-target="#Perfume-tab-pane" type="button" role="tab" aria-controls="Perfume-tab-pane" aria-selected="false">Utensils</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="Bags-pane" role="tabpanel" aria-labelledby="Bags" tabindex="0">
                            <div class="row container mx-auto">
                                <?php
                                for ($i = 1; $i < 9; $i++) {
                                    echo "
                                <div class='col mb-4'>
                                    <div class='card' style='width: 18rem;'>
                                        <img src='Images/Bags/$i.jpg' class='card-img-top' alt='...' height='200'>
                                        <div class='card-body'>
                                            <h5 class='card-title text-center'>Hawk Bags</h5>
                                            <p class='card-text'>Buy the Hawk Bags at the lowest offered prices in the market!</p>
                                        </div>
                                    </div>
                                </div>
                                ";
                                }
                                ?>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="Clothes-tab-pane" role="tabpanel" aria-labelledby="Clothes-tab" tabindex="0">
                            <div class="row container mx-auto">
                                <?php
                                for ($i = 1; $i < 9; $i++) {
                                    echo "
                                <div class='col mb-4'>
                                    <div class='card' style='width: 18rem;'>
                                        <img src='Images/Clothes/$i.jpg' class='card-img-top' alt='...' height='200'>
                                        <div class='card-body'>
                                            <h5 class='card-title text-center'>Penshoppe</h5>
                                            <p class='card-text'>Buy the Clothes at the lowest offered prices in the market!</p>
                                            
                                        </div>
                                    </div>
                                </div>
                                ";
                                }
                                ?>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="Laptops-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
                            <div class="row container mx-auto">
                                <?php
                                for ($i = 1; $i < 9; $i++) {
                                    echo "
                                <div class='col mb-4'>
                                    <div class='card' style='width: 18rem;'>
                                        <img src='Images/Laptops/$i.jpg' class='card-img-top' alt='...' height='200'>
                                        <div class='card-body'>
                                            <h5 class='card-title text-center'>Laptops</h5>
                                            <p class='card-text'>Buy these Laptops at the lowest offered prices in the market!</p>
                                        </div>
                                    </div>
                                </div>
                                ";
                                }
                                ?>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="Perfumes-tab-pane" role="tabpanel" aria-labelledby="Perfumes-tab" tabindex="0">
                            <div class="row container mx-auto">
                                <?php
                                for ($i = 1; $i < 9; $i++) {
                                    echo "
                                <div class='col mb-4'>
                                    <div class='card' style='width: 18rem;'>
                                        <img src='Images/Perfumes/$i.jpg' class='card-img-top' alt='...' height='200'>
                                        <div class='card-body'>
                                            <h5 class='card-title text-center'>OXGN Scents</h5>
                                            <p class='card-text'>Buy these Scents at the lowest offered prices in the market!</p>
                                        </div>
                                    </div>
                                </div>
                                ";
                                }
                                ?>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="Perfume-tab-pane" role="tabpanel" aria-labelledby="Perfume-tab" tabindex="0">
                            <div class="row container mx-auto">
                                <?php
                                for ($i = 1; $i < 9; $i++) {
                                    echo "
                                <div class='col mb-4'>
                                    <div class='card' style='width: 18rem;'>
                                        <img src='Images/Utensils/$i.jpg' class='card-img-top' alt='...' height='200'>
                                        <div class='card-body'>
                                            <h5 class='card-title text-center'>Kitchen Tools</h5>
                                            <p class='card-text'>Buy these wares at the lowest offered prices in the market!</p>
                                        </div>
                                    </div>
                                </div>
                                ";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <h1 class="text-center my-5 pt-5">Recommended</h1>
                    <div class="card-group mx-4 my-5">
                        <div class="card">
                            <img src="Images/Bags/16.jpg" class="card-img-top" alt="..." height="300">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            </div>
                        </div>
                        <div class="card">
                            <img src="Images/Clothes/18.jpg" class="card-img-top" alt="..." height="300">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                            </div>
                        </div>
                        <div class="card">
                            <img src="Images/Laptops/19.jpg" class="card-img-top" alt="..." height="300">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- footer -->
                <div class="container">
                    <footer class="d-flex  justify-content-between align-items-center py-3 my-4">
                        <p class="col-md-4 mb-0 text-white-50">&copy; 2025 Rian Enterprise, Inc</p>
                        <ul class="nav justify-content-end">
                            <li class="nav-item"><a href="#" class="nav-link px-2 text-white-50">Home</a></li>
                            <li class="nav-item"><a href="#" class="nav-link px-2 text-white-50">Features</a></li>
                            <li class="nav-item"><a href="#" class="nav-link px-2 text-white-50">Pricing</a></li>
                            <li class="nav-item"><a href="#" class="nav-link px-2 text-white-50">FAQs</a></li>
                            <li class="nav-item"><a href="#" class="nav-link px-2 text-white-50">About</a></li>
                        </ul>
                    </footer>
                </div>
            </div>

        </div>
    </div>
    </div>
</body>

</html>
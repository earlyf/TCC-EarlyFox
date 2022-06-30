<?php
 include_once '/xampp/htdocs/yourParty/privateWork/pages/validar-login.php';
    

 require_once '/xampp/htdocs/yourParty/Classes/Conexao.php';
 require_once '/xampp/htdocs/yourParty/Classes/Buffet.php';
 
 if (isset($_SESSION['idEmpresa'])) {
 
     $id = $_SESSION['idEmpresa'];
 }
 
 $buffet = new Buffet();
 $list = $buffet->listar($id);
 
 ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Your Party - Dashboard</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="../dashboard/assets/css/style.css">
    <link rel="stylesheet" href="../dashboard/assets/css/style-index-buffet.css">
    <link rel="stylesheet" href="../dashboard/assets/css/style-modal.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">


    <link rel="shortcut icon" href="../dashboard/assets/img/balão.png" type="image/x-icon">
</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon">
                            <img src="../dashboard/assets/img/balão.png" alt="">
                        </span>
                        <span class="title-yp"> YOUR PARTY </span>
                    </a>
                </li>

                <li>
                    <a href="../dashboard/dashboard2.php">
                        <span class="icon">
                            <i class="fa fa-home" aria-hidden="true"></i>
                        </span>
                        <span class="title">Painel</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <i class="fa fa-cutlery" aria-hidden="true"></i>
                        </span>
                        <span class="title"> Buffet</span>
                    </a>
                </li>

                <li>
                    <a href="../decoracao/index-decoracao-2.php">
                        <span class="icon">
                            <i class="fa fa-gift" aria-hidden="true"></i>
                        </span>
                        <span class="title">Decoração </span>
                    </a>
                </li>

                <li>
                    <a href="../local/index-local-2.php">
                        <span class="icon">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                        </span>
                        <span class="title">Local / Segurança </span>
                    </a>
                </li>

                <li>
                    <a href="../avaliacao/index.php">
                        <span class="icon">
                            <i class="fa-solid fa-lock" aria-hidden="true"></i>
                        </span>
                        <span class="title">Orçamentos Concluídos</span>
                    </a>
                </li>
                
                <li>
                    <a href="../avaliacao/budgetpendentes.php">
                        <span class="icon">
                            <i class="fa-solid fa-question" aria-hidden="true"></i>
                        </span>
                        <span class="title">Orçamentos Pendentes</span>
                    </a>
                </li>

                <li>
                    <a href="../sair-empresa.php">
                        <span class="icon">
                            <i class="fa fa-sign-out" aria-hidden="true"></i>
                        </span>
                        <span class="title">Sair</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>


                <div class="user">
                    <img src="../../pages/dashboard/assets/img/empresa.png" alt="">
                </div>
            </div>



            <section id="feature" class="section-p1">
                <section id="product1" class="section-p1">

                    <div class="pro-container">
                        <div class="pro">

                            <div class="des">
                                <span> BUFFET </span>
                                <h5>CADASTRE JÁ UM BUFFET</h5>

                            </div>
                            <a href="form-buffet-2.php">
                                <input type="submit" value="Cadastrar" class="btn solid" name="logarCliente" />
                            </a>
                        </div>

                        <div class="pro">

                            <div class="des">
                                <span> ÍTEM DO PACOTE DO BUFFET </span>
                                <h5>CADASTRE JÁ UM ÍTEM</h5>

                            </div>

                            <a href="form-item-buffet-2.php"><input type="submit" value="Cadastrar" class="btn solid" name="logarCliente" /></a>

                        </div>
                    </div>
                </section>
            </section>

            <br>
            <br>

            <div class="table_responsive">
                <table>
                    <thead>
                        <tr>
                            <th> Código: </th>
                            <th> Foto: </th>
                            <th> Nome: </th>
                            <th> Descrição: </th>
                            <th> Valor: </th>
                        </tr>

                    </thead>
                    <tbody>
                        <?php foreach ($list as $row) { ?>
                            <tr>
                                <td> <?php echo $row[0] ?> </td>
                                <td> <img src="../../<?php echo $row[4] ?>" alt="" data-id="<?php echo $row[0] ?>" data-image="<?php echo $row[4] ?>" onclick="updateImage(this)"> </td>
                                <td> <?php echo $row[1] ?> </td>
                                <td> <?php echo $row[2] ?> </td>
                                <td> <?php echo $row[3] ?> </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

            <br>
            <br>


        </div>
    </div>

            <!-- =========== Scripts =========  -->
            <script src="../dashboard/assets/js/main.js"></script>

            <!-- ====== ionicons ======= -->
            <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
            <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>
<?php
    session_start();

    require('../../bd/conexao.php');
    require('../../class/Produto.class.php');
?>

<html>

    <head>
        <title>Site</title>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
        <link href="../../assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
    </head>

    <body class="dark-edition">
        <div class="wrapper">
            <div class="sidebar" data-color="purple" data-background-color="black">
                <div class="logo">
                    <a class="simple-text logo-normal">
                        <p>PGM</p>
                    </a>
                </div>
                <div class="sidebar-wrapper">
                    <ul class="nav">
                        <li class="nav-item">
                            <a href="../inicio.php" class="nav-link">
                                <i class="material-icons">home</i>
                                <p>Início</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../sobre.php" class="nav-link">
                                <i class="material-icons">info</i>                                
                                <p>Sobre</p>
                            </a>
                        </li>
                        <li class="nav-item active">
                            <a href="javascript:void(0)" class="nav-link">
                                <i class="material-icons">shopping_cart</i>
                                <p>Produtos</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../contato/formulario.php" class="nav-link">
                                <i class="material-icons">contact_page</i>
                                <p>Contato</p>
                            </a>
                        </li>
                        <li class="nav-item">
                        <?php
                            if(!isset($_SESSION["usuarionome"])) {
                        ?>
                            <a href="../login/formulario.php" class="nav-link">
                                <i class="material-icons">login</i>
                                <p>Login</p>
                            </a>
                        <?php
                            } else {
                        ?>
                            <a href="../area_restrita.php" class="nav-link">
                                <i class="material-icons">manage_accounts</i>
                                <p>Área restrita</p>
                            </a>
                        <?php
                            }
                        ?>  
                        </li>
                    </ul>
                </div>
            </div>
            <div class="main-panel">
                <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
                    <div class="container-fluid">
                        <div class="navbar-wrapper">
                            <a class="navbar-brand">Painel do Usuário</a>
                        </div>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="navbar-toggler-icon icon-bar"></span>
                            <span class="navbar-toggler-icon icon-bar"></span>
                            <span class="navbar-toggler-icon icon-bar"></span>
                        </button>
                        <?php
                            if(isset($_SESSION['usuarionome'])) {
                        ?>
                        <div class="justify-content-end">
                            <a href="login/limpar_sessao.php"><i class="material-icons">logout</i></a>
                        </div>
                        <?php
                            }
                        ?>

                    </div>
                </nav>
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-plain">
                                    <div class="card-header card-header-primary">
                                        <h4 class="card-title mt-0"> Lista de produtos</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead class="">
                                                    <tr>
                                                        <th style="text-align: center">Foto</th>
                                                        <th>Nome</th>
                                                        <th>Descrição</th>
                                                        <th>Categoria</th>
                                                        <th style="width: 2%;"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                    $p = new Produto();
                                                    $produtos = $p->listAll();
                                                    if(isset($produtos)) {
                                                    for ($i = 0; $i < count($produtos); $i++) {
                                                        echo '<tr>';
                                                        echo '<td style="width: 10%; text-align: center"><img src="fotos/'.$produtos[$i]['foto'].'.'.$produtos[$i]['ext'].'" style="width: 90%; border-radius: 50%"></td>';
                                                        echo '<td>'.$produtos[$i]['nome'].'</td>';
                                                        echo '<td>'.$produtos[$i]['descricao'].'</td>';
                                                        echo '<td>'.$produtos[$i]['categoria'].'</td>';
                                                        echo '<td><a href="detail_nouser/?ref='.$produtos[$i]['id'].'"><i class="material-icons" style="color: #5555c0">visibility</i></a></td>';
                                                        echo '</tr>';
                                                    }
                                                    } else echo 'Nenhum produto disponível';
                                                ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <script src="../../assets/js/core/jquery.min.js"></script>
        <script src="../../assets/js/core/popper.min.js"></script>
        <script src="../../assets/js/core/bootstrap-material-design.min.js"></script>
        <script src="https://unpkg.com/default-passive-events"></script>
        <script src="../../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
        <script async defer src="https://buttons.github.io/buttons.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
        <script src="../../assets/js/plugins/chartist.min.js"></script>
        <script src="../../assets/js/plugins/bootstrap-notify.js"></script>
        <script src="../../assets/js/material-dashboard.js?v=2.1.0"></script>
        <script src="../../assets/demo/demo.js"></script>
        <script>
            $(document).ready(function() {
            $().ready(function() {
                $sidebar = $('.sidebar');

                $sidebar_img_container = $sidebar.find('.sidebar-background');

                $full_page = $('.full-page');

                $sidebar_responsive = $('body > .navbar-collapse');

                window_width = $(window).width();

                $('.fixed-plugin a').click(function(event) {
                if ($(this).hasClass('switch-trigger')) {
                    if (event.stopPropagation) {
                    event.stopPropagation();
                    } else if (window.event) {
                    window.event.cancelBubble = true;
                    }
                }
                });

                $('.fixed-plugin .active-color span').click(function() {
                $full_page_background = $('.full-page-background');

                $(this).siblings().removeClass('active');
                $(this).addClass('active');

                var new_color = $(this).data('color');

                if ($sidebar.length != 0) {
                    $sidebar.attr('data-color', new_color);
                }

                if ($full_page.length != 0) {
                    $full_page.attr('filter-color', new_color);
                }

                if ($sidebar_responsive.length != 0) {
                    $sidebar_responsive.attr('data-color', new_color);
                }
                });

                $('.fixed-plugin .background-color .badge').click(function() {
                $(this).siblings().removeClass('active');
                $(this).addClass('active');

                var new_color = $(this).data('background-color');

                if ($sidebar.length != 0) {
                    $sidebar.attr('data-background-color', new_color);
                }
                });

                $('.fixed-plugin .img-holder').click(function() {
                $full_page_background = $('.full-page-background');

                $(this).parent('li').siblings().removeClass('active');
                $(this).parent('li').addClass('active');


                var new_image = $(this).find("img").attr('src');

                if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                    $sidebar_img_container.fadeOut('fast', function() {
                    $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                    $sidebar_img_container.fadeIn('fast');
                    });
                }

                if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                    var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                    $full_page_background.fadeOut('fast', function() {
                    $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                    $full_page_background.fadeIn('fast');
                    });
                }

                if ($('.switch-sidebar-image input:checked').length == 0) {
                    var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
                    var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                    $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                    $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                }

                if ($sidebar_responsive.length != 0) {
                    $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
                }
                });

                $('.switch-sidebar-image input').change(function() {
                $full_page_background = $('.full-page-background');

                $input = $(this);

                if ($input.is(':checked')) {
                    if ($sidebar_img_container.length != 0) {
                    $sidebar_img_container.fadeIn('fast');
                    $sidebar.attr('data-image', '#');
                    }

                    if ($full_page_background.length != 0) {
                    $full_page_background.fadeIn('fast');
                    $full_page.attr('data-image', '#');
                    }

                    background_image = true;
                } else {
                    if ($sidebar_img_container.length != 0) {
                    $sidebar.removeAttr('data-image');
                    $sidebar_img_container.fadeOut('fast');
                    }

                    if ($full_page_background.length != 0) {
                    $full_page.removeAttr('data-image', '#');
                    $full_page_background.fadeOut('fast');
                    }

                    background_image = false;
                }
                });

                $('.switch-sidebar-mini input').change(function() {
                $body = $('body');

                $input = $(this);

                if (md.misc.sidebar_mini_active == true) {
                    $('body').removeClass('sidebar-mini');
                    md.misc.sidebar_mini_active = false;

                    $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

                } else {

                    $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

                    setTimeout(function() {
                    $('body').addClass('sidebar-mini');

                    md.misc.sidebar_mini_active = true;
                    }, 300);
                }

                var simulateWindowResize = setInterval(function() {
                    window.dispatchEvent(new Event('resize'));
                }, 180);

                setTimeout(function() {
                    clearInterval(simulateWindowResize);
                }, 1000);

                });
            });
            });
        </script>

    </body>
    
</html>
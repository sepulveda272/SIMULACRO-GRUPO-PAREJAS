<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="#" class="brand-link">
        <img src="views/assets/img/alquilartemis.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-bold">ALQUILARTEMIS</span>
    </a>

    <div class="sidebar">
        <div class="">
            <h5 class="brand-link">Gerentes</h5>
        </div>

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="views/assets/img/jose.jpeg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Jose Arley Pabón</a>
            </div>
        </div>

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="views/assets/img/sepulveda.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Juan David Sepúlveda</a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="/SIMULACRO-GRUPO-PAREJAS/alquilartemis/"
                        class="nav-link <?php if ($routesArray[3] == ""): ?> active <?php endif ?>">
                        <i class="nav-icon far fa-user"></i>
                        <p>
                            Home
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/SIMULACRO-GRUPO-PAREJAS/alquilartemis/clientes"
                        class="nav-link <?php if ($routesArray[3] == "clientes"): ?> bg-lightblue <?php endif ?>">
                        <i class="nav-icon far fa-user"></i>
                        <p>
                            Clientes
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/SIMULACRO-GRUPO-PAREJAS/alquilartemis/empleados"
                        class="nav-link <?php if ($routesArray[3] == "empleados"): ?> bg-warning <?php endif ?>">
                        <i class="nav-icon far fa-user"></i>
                        <p>
                            Empleados
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Entradas
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/SIMULACRO-GRUPO-PAREJAS/alquilartemis/entrada"
                                class="nav-link <?php if ($routesArray[3] == "entrada"): ?> bg-lime <?php endif ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Entrada</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/SIMULACRO-GRUPO-PAREJAS/alquilartemis/entradaDetalle"
                                class="nav-link <?php if ($routesArray[3] == "entradaDetalle"): ?> bg-lime <?php endif ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Detalles</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Salidas
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/SIMULACRO-GRUPO-PAREJAS/alquilartemis/salida"
                                class="nav-link <?php if ($routesArray[3] == "salida"): ?> bg-danger <?php endif ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Salida</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/SIMULACRO-GRUPO-PAREJAS/alquilartemis/salidaDetalle"
                                class="nav-link <?php if ($routesArray[3] == "salidaDetalle"): ?> bg-danger <?php endif ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Detalles</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="/SIMULACRO-GRUPO-PAREJAS/alquilartemis/inventario"
                        class="nav-link <?php if ($routesArray[3] == "inventario"): ?> bg-orange <?php endif ?>">
                        <i class="nav-icon far fa-user"></i>
                        <p>
                            Inventario
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/SIMULACRO-GRUPO-PAREJAS/alquilartemis/productos"
                        class="nav-link <?php if ($routesArray[3] == "productos"): ?> bg-maroon <?php endif ?>">
                        <i class="nav-icon far fa-user"></i>
                        <p>
                            Productos
                        </p>
                    </a>
                </li>

            </ul>
        </nav>

    </div>

</aside>
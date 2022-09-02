<div class="sidebar">

                    <div class="profile_info">
                        <img src="../Assets/imagenes/logo.jpg" class="profile_image" alt="">
                        <h4><?php echo $_SESSION['usernom']." ".$_SESSION['userape']; ?></h4>
                    </div>
            
                    <nav class="sidebar-nav">
                        <ul>
                            <li><a href="#"><i class="fas fa-city"></i><span>Empresa</span></a>
                                <ul class="nav-flyout">
                                    <li>
                                        <a id="company" href="#"><i class="far fa-list-alt"></i>Gestionar Empresa</a>
                                    </li>
                                </ul>
                             </li>
                             <li><a href="#"><i class="fas fa-users"></i><span class="">Persona</span></a>
                                <ul class="nav-flyout">
                                    <li>
                                        <a id="person" href="#"><i class="fas fa-list-ul"></i>Gestionar Persona</a>
                                    </li>
                                    <li>
                                        <a id="typerson" href="#"><i class="fas fa-user-check"></i>Gestionar Tipo Persona</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="#"><i class="far fa-user-circle"></i><span class="">Rol</span></a>
                                <ul class="nav-flyout">
                                    <li>
                                        <a id="rol" href="#"><i class="fas fa-th-list"></i>Gestionar Rol</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="#"><i class="fas fa-users-cog"></i><span class="">Usuario</span></a>
                                <ul class="nav-flyout">
                                    <li>
                                        <a id="users" href="#"><i class="fas fa-user-friends"></i>Gestionar Usuarios</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="#"><i class="fas fa-home"></i><span class="">Propiedad</span></a>
                                <ul class="nav-flyout">
                                    <li>
                                        <a id="catproperty" href="#"><i class="fas fa-ethernet"></i>Categoria Propiedad</a>
                                    </li>
                                    <li>
                                        <a id="tiproperty" href="#"><i class="fas fa-warehouse"></i>Tipo Propiedad</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="#"><i class="fab fa-stack-overflow"></i><span class="">Operacion</span></a>
                                <ul class="nav-flyout">
                                    <li>
                                        <a id="tyoperation" href="#"><i class="fas fa-list-alt"></i>Tipo Operacion</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="#"><i class="fas fa-folder"></i><span class="">Carpeta</span></a>
                                <ul class="nav-flyout">
                                    <li>
                                        <a id="archive" href="#"><i class="fas fa-archive"></i>Archivo</a>
                                    </li>
                                    <li>
                                        <a id="typefile" href="#"><i class="far fa-folder"></i>Tipo Carpeta</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="#"><i class="fas fa-file-signature"></i><span class="">Serie</span></a>
                                <ul class="nav-flyout">
                                    <li>
                                        <a id="serie" href="#"><i class="fas fa-file-invoice"></i>Gestionar Serie</a>
                                    </li>
                                    <li>
                                        <a id="subserie" href="#"><i class="far fa-file-alt"></i>Gestionar Subserie</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>      
</div>
<div class="main">
        <div class="content"></div>
</div>
<script type="text/javascript" language="javascript" src="../Libraries/administrador/administrador.js" charset="utf-8"></script>
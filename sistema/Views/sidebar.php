
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
                                        <a href="#"><i class="far fa-list-alt"></i>Gestionar Empresa</a>
                                    </li>
                                </ul>
                             </li>
                             <li><a href="#"><i class="fas fa-users"></i><span class="">Persona</span></a>
                                <ul class="nav-flyout">
                                    <li>
                                        <a href="#"><i class="fas fa-list-ul"></i>Gestionar Persona</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="#"><i class="far fa-user-circle"></i><span class="">Rol</span></a>
                                <ul class="nav-flyout">
                                    <li>
                                        <a href="#"><i class="fas fa-th-list"></i>Gestionar Rol</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="#"><i class="fas fa-network-wired"></i><span class="">Tipo Funcionalidad</span></a>
                                <ul class="nav-flyout">
                                    <li>
                                        <a href="#"><i class="fas fa-list-ol"></i>Gestionar Tipo Funcionalidad</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="#"><i class="fas fa-briefcase"></i><span class="">Funcionalidad</span></a>
                                <ul class="nav-flyout">
                                    <li>
                                        <a href="#"><i class="fas fa-stream"></i>Gestionar Funcionalidad</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>      
</div>
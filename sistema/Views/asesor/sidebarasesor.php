<div class="sidebar">

                    <div class="profile_info">
                        <img src="../Assets/imagenes/logo.jpg" class="profile_image" alt="">
                        <h4><?php echo $_SESSION['usernom']." ".$_SESSION['userape']; ?></h4>
                    </div>
            
                    <nav class="sidebar-nav">
                        <ul>
                            <li><a href="#"><i class="fas fa-address-card"></i><span>Contratos</span></a>
                                <ul class="nav-flyout">
                                    <li>
                                        <a id="mandate" href="#"><i class="far fa-address-book"></i>Contrato Mandato</a>
                                    </li>
                                    <li>
                                        <a id="mandatesearch" href="#"><i class="fas fa-file-alt"></i>Buscar Contrato Mandato</a>
                                    </li>
                                    <li>
                                        <a id="leasing" href="#"><i class="fas fa-file-contract"></i>Contrato Arrendamiento</a>
                                    </li>
                                    <li>
                                        <a id="leasingsearch" href="#"><i class="fas fa-print"></i>Buscar Contrato Arrendamiento</a>
                                    </li>
                                </ul>
                             </li>

                             <li><a href="#"><i class="fas fa-id-card-alt"></i><span>Propietarios</span></a>
                                <ul class="nav-flyout">
                                    <li>
                                        <a id="propertys" href="#"><i class="fas fa-user-alt"></i>Gestionar Propietarios</a>
                                    </li>
                                </ul>
                             </li>

                             <li><a href="#"><i class="fab fa-houzz"></i><span>Inmuebles</span></a>
                                <ul class="nav-flyout">
                                    <li>
                                        <a id="houses" href="#"><i class="fas fa-door-open"></i>Gestionar Inmuebles</a>
                                    </li>
                                </ul>
                             </li>
                             
                        </ul>
                    </nav>      
</div>
<div class="main">
        <div class="content"></div>
</div>
<script type="text/javascript" language="javascript" src="../Libraries/asesor/asesor.js" charset="utf-8"></script>
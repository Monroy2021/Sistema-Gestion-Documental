<?php
    $namerute = $_SERVER['DOCUMENT_ROOT']."/sistema/Controllers/controllerperson.php";
    $namerute1 = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/ValueObjects/personVO.php";
    $namerute2 = $_SERVER['DOCUMENT_ROOT']."/sistema/Controllers/controllerrol.php";
    $namerute3 = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/ValueObjects/rolVO.php";
    require_once($namerute);
    require_once($namerute1);
    require_once($namerute2);
    require_once($namerute3);
    session_start();
    $getperson = new controllerperson();
    $personVO = new personVO();
    $getrol = new controllerrol();
    $rolVO = new rolVO();
 ?>
 <!-- inicio OPCION PARA ABRIR EL FORMULARIO MODAL PARAR CREAR NUEVOS REGISTROS EN LA BASE DE DATOS -->                 
 <div class="form_modal">
                            <div class="button_create"><a href="#modalagregar" id="open_modal">Agregar</a></div>
                        </div>
                        <!-- FIN OPCION PARA ABRIR EL FORMULARIO MODAL PARAR CREAR NUEVOS REGISTROS EN LA BASE DE DATOS --> 
                        
                        <!-- inicio FORMULARIO MODAL PARA CREAR NUEVOS REGISTROS EN LA BASE DE DATOS -->    
                            <aside id="modalagregar" class="modal">
                                <form class="form_module" id="form_module" action="" method="post">
                                     
                                    <div class="main_modal">
                                        <div class="header_modal">
                                            <div class="title"><span>Usuario</span></div>
                                            <div><a href="#" class="close_modal">Cerrar</a></div>
                                        </div>

                                    <div class="container_modal">
                                        <div class="label_modal"><label>Cedula Persona</label></div>
                                            <div class="modal_select">
                                                <select class="select_item" name="selectced" id="selectced">
                                                    <option value="" selected>Seleccione Cedula</option>
                                                    <?php foreach($getperson->read() as $r){?>
                                                        <option value="<?php echo $r->getCed_pers();?>"><?php echo $r->getCed_pers();?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                    </div>
                                    
                                    <div class="container_modal">
                                        <div class="label_modal"><label>Nombres Persona</label></div>
                                            <div class="modal_input">
                                                <input type="text" name="nompers" id="nompers" placeholder="Nombres Persona" class="text_name">
                                            </div>
                                    </div>

                                    <div class="container_modal">
                                        <div class="label_modal"><label>Apellidos Persona</label></div>
                                            <div class="modal_input">
                                                <input type="text" name="apepers" id="apepers" placeholder="Apellidos Persona" class="text_name">
                                            </div>
                                    </div>
                                    <div class="container_modal">
                                        <div class="label_modal"><label>Rol Persona</label></div>
                                            <div class="modal_select">
                                                <select class="select_item" name="selectrol" id="selectrol">
                                                    <option value="" selected>Seleccione Rol</option>
                                                    <?php foreach($getrol->read() as $r){?>
                                                        <option value="<?php echo $r->getId_rol();?>"><?php echo $r->getNom_rol();?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                    </div>

                                    <div class="container_modal">
                                        <div class="label_modal"><label>Nombre Usuario</label></div>
                                            <div class="modal_input">
                                                <input type="text" name="nomuser" id="nomuser" placeholder="Nombre Usuario" class="text_name">
                                            </div>
                                    </div>

                                    <div class="container_modal">
                                        <div class="label_modal"><label>Password Usuario</label></div>
                                            <div class="modal_pass">
                                                <input class="text_password" type="password" name="passuser" id="passuser" placeholder="Password">
                                            </div>
                                </div>    
            
                                    <div class="footer_modal">
                                        <div class="button_create_modal"><button type="button" id="create" name="create" class="button_session" value="create"><span>REGISTRAR</span></button></div>
                                    </div>
                                </form>
                            </aside>
                            <!-- fIN FORMULARIO MODAL PARA CREAR NUEVOS REGISTROS EN LA BASE DE DATOS -->    

                            <!-- inicio FORMULARIO MODAL PARA MODIFICAR Y ELIMINAR REGISTROS EN LA BASE DE DATOS -->  
                            <aside id="modalconsultar" class="modal">
                                <form class="form_module_edit" id="form_module_edit" action="" method="post">      
                                    <div class="main_modal">
                                        <div class="header_modal">
                                            <div><span>Usuario</span></div>
                                            <div><a href="#" class="close_modal">Cerrar</a></div>
                                    </div>

                                    <div class="container_modal">
                                        <div class="label_modal"><label>Nombres Persona</label></div>
                                            <div class="modal_input">
                                                <input type="text" name="nompersedit" id="nompersedit" placeholder="Nombres Persona" class="text_name">
                                            </div>
                                    </div>

                                    <div class="container_modal">
                                        <div class="label_modal"><label>Apellidos Persona</label></div>
                                            <div class="modal_input">
                                                <input type="text" name="apepersedit" id="apepersedit" placeholder="Apellidos Persona" class="text_name">
                                            </div>
                                    </div>
                                                   
                                    <div class="container_modal">
                                        <div class="label_modal"><label>Rol Persona</label></div>
                                            <div class="modal_select">
                                                <select class="select_item" name="roledit" id="roledit">
                                                    <option value="" selected>Seleccione Rol</option>
                                                    <?php foreach($getrol->read() as $r){?>
                                                        <option value="<?php echo $r->getId_rol();?>"><?php echo $r->getNom_rol();?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                    </div>

                                    <div class="container_modal">
                                        <input type="hidden" name="coduseredit" id="coduseredit"/>
                                        <div class="label_modal"><label>Nombre Usuario</label></div>
                                            <div class="modal_input">
                                                <input type="text" name="nomuseredit" id="nomuseredit" placeholder="Nombre Usuario" class="text_name">
                                            </div>
                                    </div>

                                    <div class="container_modal">
                                        <input type="hidden" name="ceduseredit" id="ceduseredit"/>
                                        <div class="label_modal"><label>Password Usuario</label></div>
                                            <div class="modal_pass">
                                                <input class="text_password" type="password" name="passuseredit" id="passuseredit" placeholder="Password">
                                            </div>
                                </div>    

                                    <div class="footer_modal">
                                        <div class="button_create_modal"><button type="button" id="update" name="update" class="button_session" value="update"><span>MODIFICAR</span></button></div>
                                        <div class="button_create_modal"><button type="button" id="delete" name="delete" class="button_session" value="delete"><span>ELIMINAR</span></button></div>
                                    </div>
                                </form>
                            </aside>
                    <!-- fin FORMULARIO MODAL PARA MODIFICAR Y ELIMINAR REGISTROS EN LA BASE DE DATOS --> 
                            <table id="tablageneral" class="display nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>CEDULA USUARIO</th>
                                        <th>NOMBRES USUARIO</th>
                                        <th>APELLIDOS USUARIO</th>
                                        <th>USUARIO</th>
                                        <th>ROL USUARIO</th>
                                        <th>MODULO</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot>
                                </tfoot>
                            </table>
                            <script type="text/javascript" language="javascript" src="../Libraries/user/user.js" charset="utf-8"></script>
<!-- fin DATATABLE PARA BUSCAR REGISTROS EN LA BASE DE DATOS --> 
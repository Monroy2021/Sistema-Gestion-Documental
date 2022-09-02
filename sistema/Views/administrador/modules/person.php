<?php
    $namerute = $_SERVER['DOCUMENT_ROOT']."/sistema/Controllers/controllercompany.php";
    $namerute1 = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/ValueObjects/companyVO.php";
    require_once($namerute);
    require_once($namerute1);
    session_start();
    $getempresa = new controllercompany();
    $compVO = new companyVO();
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
                                            <div class="title"><span>Persona</span></div>
                                            <div><a href="#" class="close_modal">Cerrar</a></div>
                                        </div>

                                        <div class="container_modal">
                                            <div class="label_modal"><label>Cedula Persona</label></div>
                                                <div class="modal_input">
                                                     <input type="text" name="cedperson" id="cedperson" placeholder="Cedula Persona" class="text_name">
                                                </div>
                                        </div>

                                        <div class="container_modal">
                                            <div class="label_modal"><label>Empresa</label></div>
                                                <div class="modal_select">
                                                    <select class="select_item" name="selectcompany" id="selectcompany">
                                                        <option value="" selected>Seleccione Empresa</option>
                                                        <?php foreach($getempresa->read() as $r){?>
                                                            <option value="<?php echo $r->getId_emp();?>"><?php echo $r->getNom_emp();?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                        </div>
                                    
                                        <div class="container_modal">
                                            <div class="label_modal"><label>Nombres Persona</label></div>
                                                <div class="modal_input">
                                                    <input type="text" name="nomperson" id="nomperson" placeholder="Nombres Persona" class="text_name">
                                                </div>
                                        </div>

                                        <div class="container_modal">
                                            <div class="label_modal"><label>Apellidos Persona</label></div>
                                                <div class="modal_input">
                                                    <input type="text" name="apeperson" id="apeperson" placeholder="Apellidos Persona" class="text_name">
                                                </div>
                                        </div>

                                        <div class="container_modal">
                                            <div class="label_modal"><label>Fecha Expedición Cédula</label></div>
                                                <div class="modal_date">
                                                    <input class="date_time" id="fecexpcedperson" name="fecexpcedperson" type="date">
                                                </div>
                                        </div>

                                        <div class="container_modal">
                                            <div class="label_modal"><label>Celular Persona</label></div>
                                                <div class="modal_input">
                                                    <input type="text" name="celuperson" id="celuperson" placeholder="Celular Persona" class="text_name">
                                                </div>
                                        </div>

                                        <div class="container_modal">
                                            <div class="label_modal"><label>Teléfono Persona</label></div>
                                                <div class="modal_input">
                                                    <input type="text" name="telperson" id="telperson" placeholder="Telefono Persona" class="text_name">
                                                </div>
                                        </div>

                                        <div class="container_modal">
                                            <div class="label_modal"><label>Email Persona</label></div>
                                                <div class="modal_input">
                                                <input class="email_data" type="email" name="emailperson" id="emailperson" placeholder="correoelectronico@email.com">
                                                </div>
                                        </div>

                                        <div class="container_modal">
                                            <div class="label_modal"><label>Sexo Persona</label></div>
                                            <div class="modal_select">
                                                <select class="select_item" name="sexperson" id="sexperson">
                                                    <option value="" selected>Seleccione Sexo</option>
                                                    <option value="Masculino">Masculino</option>
                                                    <option value="Femenino">Femenino</option>
                                                    <option value="Otro">Otro</option>
                                                </select>
                                            </div>   
                                        </div>

                                        <div class="container_modal">
                                            <div class="label_modal"><label>Dirección Persona</label></div>
                                                <div class="modal_input">
                                                    <input type="text" name="dirperson" id="dirperson" placeholder="Dirección Persona" class="text_name">
                                                </div>
                                        </div>

                                        <div class="container_modal">
                                            <div class="label_modal"><label>Ciudad Persona</label></div>
                                                <div class="modal_input">
                                                    <input type="text" name="ciudperson" id="ciudperson" placeholder="Ciudad Persona" class="text_name">
                                                </div>
                                        </div>

                                        <div class="footer_modal">
                                            <div class="button_create_modal"><button type="button" id="create" name="create" class="button_session" value="create"><span>REGISTRAR</span></button></div>
                                        </div>
                                    </div>
                                </form>
                            </aside>
                            <!-- fIN FORMULARIO MODAL PARA CREAR NUEVOS REGISTROS EN LA BASE DE DATOS -->    

                            <!-- inicio FORMULARIO MODAL PARA MODIFICAR Y ELIMINAR REGISTROS EN LA BASE DE DATOS -->  
                            <aside id="modalconsultar" class="modal">
                                <form class="form_module_edit" id="form_module_edit" action="" method="post">      
                                    <div class="main_modal">
                                        <div class="header_modal">
                                            <div><span>Persona</span></div>
                                            <div><a href="#" class="close_modal">Cerrar</a></div>
                                        </div>
                                    
                                        <div class="container_modal">
                                            <div class="label_modal"><label>Empresa</label></div>
                                                <div class="modal_select">
                                                    <select class="select_item" name="companyedit" id="companyedit">
                                                        <?php foreach($getempresa->read() as $r){?>
                                                            <option value="<?php echo $r->getId_emp();?>"><?php echo $r->getNom_emp();?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                        </div>
                                    
                                        <div class="container_modal">
                                            <input type="hidden" name="cedupersonedit" id="cedupersonedit"/>
                                            <div class="label_modal"><label>Nombres Persona</label></div>
                                                <div class="modal_input">
                                                    <input type="text" name="nompersonedit" id="nompersonedit" placeholder="Nombres Persona" class="text_name">
                                                </div>
                                        </div>

                                        <div class="container_modal">
                                            <div class="label_modal"><label>Apellidos Persona</label></div>
                                                <div class="modal_input">
                                                    <input type="text" name="apepersonedit" id="apepersonedit" placeholder="Apellidos Persona" class="text_name">
                                                </div>
                                        </div>

                                        <div class="container_modal">
                                            <div class="label_modal"><label>Fecha Expedición Cédula</label></div>
                                                <div class="modal_date">
                                                    <input class="date_time" type="date" id="fecexpcedpersonedit" name="fecexpcedpersonedit">
                                                </div>
                                        </div>

                                        <div class="container_modal">
                                            <div class="label_modal"><label>Celular Persona</label></div>
                                                <div class="modal_input">
                                                    <input type="text" name="celupersonedit" id="celupersonedit" placeholder="Celular Persona" class="text_name">
                                                </div>
                                        </div>

                                        <div class="container_modal">
                                            <div class="label_modal"><label>Teléfono Persona</label></div>
                                                <div class="modal_input">
                                                    <input type="text" name="telpersonedit" id="telpersonedit" placeholder="Telefono Persona" class="text_name">
                                                </div>
                                        </div>

                                        <div class="container_modal">
                                            <div class="label_modal"><label>Email Persona</label></div>
                                                <div class="modal_input">
                                                    <input class="email_data" type="email" name="emailpersonedit" id="emailpersonedit" placeholder="correoelectronico@email.com">
                                                </div>
                                        </div>
                                    
                                        <div class="container_modal">
                                            <div class="label_modal"><label>Sexo Persona</label></div>
                                            <div class="modal_select">
                                                <select class="select_item" name="sexpersonedit" id="sexpersonedit">
                                                    <option value="Masculino">Masculino</option>
                                                    <option value="Femenino">Femenino</option>
                                                    <option value="Otro">Otro</option>
                                                </select>
                                            </div>   
                                        </div>
                                
                                        <div class="container_modal">
                                            <div class="label_modal"><label>Dirección Persona</label></div>
                                                <div class="modal_input">
                                                    <input type="text" name="dirpersonedit" id="dirpersonedit" placeholder="Dirección Persona" class="text_name">
                                                </div>
                                        </div>

                                        <div class="container_modal">
                                            <div class="label_modal"><label>Ciudad Persona</label></div>
                                                <div class="modal_input">
                                                    <input type="text" name="ciudpersonedit" id="ciudpersonedit" placeholder="Ciudad Persona" class="text_name">
                                                </div>
                                        </div>
                
                                        <div class="footer_modal">
                                            <div class="button_create_modal"><button type="button" id="update" name="update" class="button_session" value="update"><span>MODIFICAR</span></button></div>
                                            <div class="button_create_modal"><button type="button" id="delete" name="delete" class="button_session" value="delete"><span>ELIMINAR</span></button></div>
                                        </div>
                                    </div>
                                </form>
                            </aside>
                    <!-- fin FORMULARIO MODAL PARA MODIFICAR Y ELIMINAR REGISTROS EN LA BASE DE DATOS --> 
                            <table id="tablageneral" class="display nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>CEDULA PERSONA</th>
                                        <th>NOMBRES PERSONA</th>
                                        <th>APELLIDOS PERSONA</th>
                                        <th>EMPRESA</th>
                                        <th>EMAIL</th>
                                        <th>MODULO</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot>
                                </tfoot>
                            </table>
                            <script type="text/javascript" language="javascript" src="../Libraries/person/person.js" charset="utf-8"></script>
<!-- fin DATATABLE PARA BUSCAR REGISTROS EN LA BASE DE DATOS -->  


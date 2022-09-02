<?php
    $namerute = $_SERVER['DOCUMENT_ROOT']."/sistema/Controllers/controllercatproperty.php";
    $namerute1 = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/ValueObjects/catpropertyVO.php";
    require_once($namerute);
    require_once($namerute1);
    session_start();
    $getproperty = new controllercatproperty();
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
                                            <div class="title"><span>Tipo Propiedad</span></div>
                                            <div><a href="#" class="close_modal">Cerrar</a></div>
                                        </div>
                                    
                                        <div class="container_modal">
                                            <div class="label_modal"><label>Codigo Tipo Propiedad</label></div>
                                                <div class="modal_input">
                                                    <input type="text" name="idtiprop" id="idtiprop" placeholder="Codigo Tipo Propiedad" class="text_name">
                                                </div>
                                        </div>

                                        <div class="container_modal">
                                            <div class="label_modal"><label>Categoria Propiedad</label></div>
                                                <div class="modal_select">
                                                    <select class="select_item" name="selectcatprop" id="selectcatprop">
                                                        <option value="" selected>Escogue Categoria Propiedad</option>
                                                            <?php foreach($getproperty->read() as $r){?>
                                                            <option value="<?php echo $r->getId_cat_prop();?>"><?php echo $r->getNom_cat_prop();?></option>
                                                            <?php } ?>
                                                    </select>
                                                </div>
                                        </div>

                                        <div class="container_modal">
                                            <div class="label_modal"><label>Nombre Tipo Propiedad</label></div>
                                                <div class="modal_input">
                                                    <input type="text" name="nomtiprop" id="nomtiprop" placeholder="Nombre Tipo Propiedad" class="text_name">
                                                </div>
                                        </div>
                                    
                                        <div class="container_modal">
                                            <div class="label_modal"><label>Descripción Tipo Propiedad</label></div>
                                                <div class="modal_area">
                                                    <textarea class="text_area" name="destiprop" id="destiprop" placeholder="Descripción Tipo Propiedad"></textarea>
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
                                            <div><span>Tipo Propiedad</span></div>
                                            <div><a href="#" class="close_modal">Cerrar</a></div>
                                        </div>

                                        <div class="container_modal">
                                            <div class="label_modal"><label>Categoria Propiedad</label></div>
                                                <div class="modal_select">
                                                    <select class="select_item" name="catpropedit" id="catpropedit">
                                                        <?php foreach($getproperty->read() as $r){?>
                                                            <option value="<?php echo $r->getId_cat_prop();?>"><?php echo $r->getNom_cat_prop();?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                        </div>
                                    
                                        <div class="container_modal">
                                            <input type="hidden" name="codtipropedit" id="codtipropedit"/>
                                                <div class="label_modal"><label>Nombre Tipo Propiedad</label></div>
                                                    <div class="modal_input">
                                                        <input type="text" name="nomtipropedit" id="nomtipropedit" placeholder="Codigo Categoria Propiedad" class="text_name">
                                                </div>
                                        </div>
                                    
                                        <div class="container_modal">
                                            <div class="label_modal"><label>Descripción Tipo Propiedad</label></div>
                                                <div class="modal_area">
                                                    <textarea class="text_area" name="destipropedit" id="destipropedit" placeholder="Descripción Categoria Propiedad"></textarea>
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
                                        <th>CODIGO TIPO PROPIEDAD</th>
                                        <th>CATEGORIA PROPIEDAD</th>
                                        <th>TIPO PROPIEDAD</th>
                                        <th>MODULO</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot>
                                </tfoot>
                            </table>
                            <script type="text/javascript" language="javascript" src="../Libraries/property/tiproperty.js" charset="utf-8"></script>
<!-- fin DATATABLE PARA BUSCAR REGISTROS EN LA BASE DE DATOS -->  
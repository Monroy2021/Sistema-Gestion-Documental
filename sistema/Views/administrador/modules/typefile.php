<?php
    $namerute = $_SERVER['DOCUMENT_ROOT']."/sistema/Controllers/controllerarchive.php";
    $namerute1 = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/ValueObjects/archiveVO.php";
    require_once($namerute);
    require_once($namerute1);
    session_start();
    $getarchive = new controllerarchive();
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
                                            <div class="title"><span>Tipo Carpeta</span></div>
                                            <div><a href="#" class="close_modal">Cerrar</a></div>
                                        </div>
                                    
                                        <div class="container_modal">
                                            <div class="label_modal"><label>Codigo Tipo Carpeta</label></div>
                                                <div class="modal_input">
                                                    <input type="text" name="codtipcarp" id="codtipcarp" placeholder="Codigo Tipo Carpeta" class="text_name">
                                                </div>
                                        </div>

                                        <div class="container_modal">
                                            <div class="label_modal"><label>Archivo</label></div>
                                                <div class="modal_select">
                                                    <select class="select_item" name="selectarch" id="selectarch">
                                                        <option value="" selected>Seleccione Archivo</option>
                                                        <?php foreach($getarchive->read() as $r){?>
                                                            <option value="<?php echo $r->getCod_arch();?>"><?php echo $r->getNom_arch()." ".$r->getNum_arch();?></option>
                                                        <?php } ?> 
                                                    </select>
                                                </div>
                                        </div>


                                        <div class="container_modal">
                                            <div class="label_modal"><label>Nombre Tipo Carpeta</label></div>
                                                <div class="modal_input">
                                                    <input type="text" name="nomtipcarp" id="nomtipcarp" placeholder="Nombre Tipo Carpeta" class="text_name">
                                                </div>
                                        </div>
                                    
                                        <div class="container_modal">
                                            <div class="label_modal"><label>Descripción Tipo Carpeta</label></div>
                                                <div class="modal_area">
                                                    <textarea class="text_area" name="destipcarp" id="destipcarp" placeholder="Descripción Tipo Carpeta"></textarea>
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
                                            <div><span>Tipo Carpeta</span></div>
                                            <div><a href="#" class="close_modal">Cerrar</a></div>
                                        </div>

                                        <div class="container_modal">
                                            <div class="label_modal"><label>Archivo</label></div>
                                                <div class="modal_select">
                                                    <select class="select_item" name="archedit" id="archedit">
                                                        <?php foreach($getarchive->read() as $r){?>
                                                            <option value="<?php echo $r->getCod_arch();?>"><?php echo $r->getNom_arch()." ".$r->getNum_arch();?></option>
                                                        <?php } ?>
                                                    </select>
                                            </div>
                                        </div>
                                    
                                        <div class="container_modal">
                                            <input type="hidden" name="codtipcarpedit" id="codtipcarpedit"/>
                                                <div class="label_modal"><label>Nombre Tipo Carpeta</label></div>
                                                    <div class="modal_input">
                                                        <input type="text" name="nomtipcarpedit" id="nomtipcarpedit" placeholder="Nombre Tipo Carpeta" class="text_name">
                                                    </div>
                                        </div>
                                    
                                        <div class="container_modal">
                                            <div class="label_modal"><label>Descripción Tipo Carpeta</label></div>
                                                <div class="modal_area">
                                                    <textarea class="text_area" name="destipcarpedit" id="destipcarpedit" placeholder="Descripción Tipo Carpeta"></textarea>
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
                                        <th>CODIGO TIPO CARPETA</th>
                                        <th>ARCHIVO CARPETA</th>
                                        <th>NOMBRE TIPO CARPETA</th>
                                        <th>MODULO</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot>
                                </tfoot>
                            </table>
                            <script type="text/javascript" language="javascript" src="../Libraries/file/typefile.js" charset="utf-8"></script>
<!-- fin DATATABLE PARA BUSCAR REGISTROS EN LA BASE DE DATOS -->  
<?php
    $namerute = $_SERVER['DOCUMENT_ROOT']."/sistema/Controllers/controllerserie.php";
    $namerute1 = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/ValueObjects/serieVO.php";
    require_once($namerute);
    require_once($namerute1);
    session_start();
    $getserie = new controllerserie();
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
                                            <div class="title"><span>Subserie</span></div>
                                            <div><a href="#" class="close_modal">Cerrar</a></div>
                                        </div>
                                    
                                        <div class="container_modal">
                                            <div class="label_modal"><label>Codigo Subserie</label></div>
                                                <div class="modal_input">
                                                    <input type="text" name="codsubserie" id="codsubserie" placeholder="Codigo Subserie" class="text_name">
                                                </div>
                                        </div>

                                        <div class="container_modal">
                                            <div class="label_modal"><label>Serie</label></div>
                                                <div class="modal_select">
                                                    <select class="select_item" name="selectserie" id="selectserie">
                                                        <option value="" selected>Seleccione Serie</option>
                                                        <?php foreach($getserie->read() as $r){?>
                                                            <option value="<?php echo $r->getId_serie();?>"><?php echo $r->getNom_serie();?></option>
                                                        <?php } ?> 
                                                    </select>
                                                </div>
                                        </div>

                                        <div class="container_modal">
                                            <div class="label_modal"><label>Nombre Subserie</label></div>
                                                <div class="modal_input">
                                                    <input type="text" name="nomsubserie" id="nomsubserie" placeholder="Nombre Subserie" class="text_name">
                                                </div>
                                        </div>
                                    
                                        <div class="container_modal">
                                            <div class="label_modal"><label>Descripción Subserie</label></div>
                                                <div class="modal_area">
                                                    <textarea class="text_area" name="descsubserie" id="descsubserie" cols="5" rows="5" placeholder="Descripción Subserie"></textarea>
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
                                            <div><span>Rol</span></div>
                                            <div><a href="#" class="close_modal">Cerrar</a></div>
                                        </div>

                                        <div class="container_modal">
                                            <div class="label_modal"><label>Serie</label></div>
                                                <div class="modal_select">
                                                    <select class="select_item" name="serieedit" id="serieedit">
                                                        <?php foreach($getserie->read() as $r){?>
                                                            <option value="<?php echo $r->getId_serie();?>"><?php echo $r->getNom_serie();?></option>
                                                        <?php } ?>
                                                    </select>
                                            </div>
                                        </div>
                                    
                                        <div class="container_modal">
                                            <input type="hidden" name="codsubserieedit" id="codsubserieedit"/>
                                                <div class="label_modal"><label>Nombre Subserie</label></div>
                                                    <div class="modal_input">
                                                        <input type="text" name="nomsubserieedit" id="nomsubserieedit" placeholder="Nombre Subserie" class="text_name">
                                                    </div>
                                        </div>
                                    
                                        <div class="container_modal">
                                            <div class="label_modal"><label>Descripción Subserie</label></div>
                                                <div class="modal_area">
                                                    <textarea class="text_area" name="descsubserieedit" id="descsubserieedit" cols="5" rows="5" placeholder="Descripción Subserie"></textarea>
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
                                        <th>CODIGO SUBSERIE</th>
                                        <th>SERIE</th>
                                        <th>NOMBRE SUBSERIE</th>
                                        <th>MODULO</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot>
                                </tfoot>
                            </table>
                            <script type="text/javascript" language="javascript" src="../Libraries/serie/subserie.js" charset="utf-8"></script>
<!-- fin DATATABLE PARA BUSCAR REGISTROS EN LA BASE DE DATOS -->  
<?php
    session_start();
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
                                            <div class="title"><span>Archivo</span></div>
                                            <div><a href="#" class="close_modal">Cerrar</a></div>
                                        </div>
                                

                                    <div class="container_modal">
                                        <div class="label_modal"><label>Nombre Archivo</label></div>
                                            <div class="modal_input">
                                                <input type="text" name="nomarch" id="nomarch" placeholder="Nombre Archivo" class="text_name">
                                            </div>
                                    </div>

                                    <div class="container_modal">
                                        <div class="label_modal"><label>Numero Archivo</label></div>
                                            <div class="modal_input">
                                                <input type="text" name="numarch" id="numarch" placeholder="Numero Archivo" class="text_name">
                                            </div>
                                    </div>

                                    <div class="container_modal">
                                        <div class="label_modal"><label>Tipo Archivo</label></div>
                                            <div class="modal_input">
                                                <input type="text" name="tiparch" id="tiparch" placeholder="Tipo Archivo" class="text_name">
                                            </div>
                                    </div>
                                    
                                    <div class="container_modal">
                                        <div class="label_modal"><label>Descripción Archivo</label></div>
                                            <div class="modal_area">
                                                <textarea class="text_area" name="desarch" id="desarch" placeholder="Descripción Archivo"></textarea>
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
                                            <div><span>Archivo</span></div>
                                            <div><a href="#" class="close_modal">Cerrar</a></div>
                                        </div>
                                    
                                    <div class="container_modal">
                                        <input type="hidden" name="codarchedit" id="codarchedit"/>
                                        <div class="label_modal"><label>Nombre Archivo</label></div>
                                            <div class="modal_input">
                                                <input type="text" name="nomarchedit" id="nomarchedit" placeholder="Nombre Archivo" class="text_name">
                                            </div>
                                    </div>

                                    <div class="container_modal">
                                        <div class="label_modal"><label>Numero Archivo</label></div>
                                            <div class="modal_input">
                                                <input type="text" name="numarchedit" id="numarchedit" placeholder="Numero Archivo" class="text_name">
                                            </div>
                                    </div>

                                    <div class="container_modal">
                                        <div class="label_modal"><label>Tipo Archivo</label></div>
                                            <div class="modal_input">
                                                <input type="text" name="tiparchedit" id="tiparchedit" placeholder="Tipo Archivo" class="text_name">
                                            </div>
                                    </div>
                                    
                                    <div class="container_modal">
                                        <div class="label_modal"><label>Descripción Archivo</label></div>
                                            <div class="modal_area">
                                                <textarea class="text_area" name="desarchedit" id="desarchedit" placeholder="Descripción Archivo"></textarea>
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
                                        <th>NOMBRE ARCHIVO</th>
                                        <th>NUMERO ARCHIVO</th>
                                        <th>TIPO ARCHIVO</th>
                                        <th>MODULO</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot>
                                </tfoot>
                            </table>
                            <script type="text/javascript" language="javascript" src="../Libraries/file/archive.js" charset="utf-8"></script>
<!-- fin DATATABLE PARA BUSCAR REGISTROS EN LA BASE DE DATOS -->  
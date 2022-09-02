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
                                            <div class="title"><span>Serie</span></div>
                                            <div><a href="#" class="close_modal">Cerrar</a></div>
                                        </div>

                                    <div class="container_modal">
                                        <div class="label_modal"><label>Código Serie</label></div>
                                            <div class="modal_input">
                                                <input type="text" name="codserie" id="codserie" placeholder="Código Serie" class="text_name">
                                            </div>
                                    </div>

                                    <div class="container_modal">
                                        <div class="label_modal"><label>Nombre Serie</label></div>
                                            <div class="modal_input">
                                                <input type="text" name="nomserie" id="nomserie" placeholder="Nombre Serie" class="text_name">
                                            </div>
                                    </div>
                                    
                                    <div class="container_modal">
                                        <div class="label_modal"><label>Descripción Serie</label></div>
                                            <div class="modal_area">
                                                <textarea class="text_area" name="desserie" id="desserie" cols="10" rows="5" placeholder="Descripción Serie"></textarea>
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
                                            <div><span>Serie</span></div>
                                            <div><a href="#" class="close_modal">Cerrar</a></div>
                                        </div>
                                    
                                        <div class="container_modal">
                                        <input type="hidden" name="codserieedit" id="codserieedit"/>
                                        <div class="label_modal"><label>Nombre Serie</label></div>
                                            <div class="modal_input">
                                                <input type="text" name="nomserieedit" id="nomserieedit" placeholder="Nombre Serie" class="text_name">
                                            </div>
                                        </div>
                                    
                                        <div class="container_modal">
                                            <div class="label_modal"><label>Descripción Serie</label></div>
                                                <div class="modal_area">
                                                    <textarea class="text_area" name="desserieedit" id="desserieedit" cols="10" rows="5" placeholder="Descripción Serie"></textarea>
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
                                        <th>CODIGO SERIE</th>
                                        <th>SERIE</th>
                                        <th>MODULO</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot>
                                </tfoot>
                            </table>
                            <script type="text/javascript" language="javascript" src="../Libraries/serie/serie.js" charset="utf-8"></script>
<!-- fin DATATABLE PARA BUSCAR REGISTROS EN LA BASE DE DATOS -->  
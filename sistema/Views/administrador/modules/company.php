
                
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
                                            <div class="title"><span>Empresa</span></div>
                                            <div><a href="#" class="close_modal">Cerrar</a></div>
                                        </div>
                                    <div class="container_modal">
                                    
                                    <div class="label_modal"><label>Nit Empresa</label></div>
                                        <div class="modal_input">
                                            <input type="text" name="nitempresa" id="nitempresa" placeholder="Nit Empresa" class="text_name">
                                        </div>
                                    </div>
                                    
                                    <div class="container_modal">
                                        <div class="label_modal"><label>Nombre Empresa</label></div>
                                            <div class="modal_input">
                                                <input type="text" name="nomempresa" id="nomempresa" placeholder="Nombre Empresa" class="text_name">
                                            </div>
                                    </div>

                                    <div class="container_modal">
                                        <div class="label_modal"><label>Dirección Empresa</label></div>
                                            <div class="modal_input">
                                                <input type="text" name="dirempresa" id="dirempresa" placeholder="Dirección Empresa" class="text_name">
                                            </div>
                                    </div>

                                    <div class="container_modal">
                                        <div class="label_modal"><label>Régimen Empresa</label></div>
                                            <div class="modal_input">
                                                <input type="text" name="regempresa" id="regempresa" placeholder="Régimen Empresa" class="text_name">
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
                                            <div><span>Empresa</span></div>
                                            <div><a href="#" class="close_modal">Cerrar</a></div>
                                    </div>

                                    <div class="container_modal">
                                            <input type="hidden" name="idempresaedit" id="idempresaedit"/>
                                            <div class="label_modal"><label>Nit Empresa</label></div>
                                                <div class="modal_input">
                                                    <input type="text" name="nitempresaedit" id="nitempresaedit" placeholder="Nit Empresa" class="text_name">
                                                </div>
                                    </div>

                                    <div class="container_modal">
                                        <div class="label_modal"><label>Nombre Empresa</label></div>
                                            <div class="modal_input">
                                                <input type="text" name="nomempresaedit" id="nomempresaedit" placeholder="Nombre Empresa" class="text_name">
                                            </div>
                                    </div>

                                    <div class="container_modal">
                                        <div class="label_modal"><label>Dirección Empresa</label></div>
                                            <div class="modal_input">
                                                <input type="text" name="dirempresaedit" id="dirempresaedit" placeholder="Dirección Empresa" class="text_name">
                                            </div>
                                    </div>

                                    <div class="container_modal">
                                        <div class="label_modal"><label>Régimen Empresa</label></div>
                                            <div class="modal_input">
                                                <input type="text" name="regempresaedit" id="regempresaedit" placeholder="Régimen Empresa" class="text_name">
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
                                        <th>NIT_EMPRESA</th>
                                        <th>NOM_EMPRESA</th>
                                        <th>DIR_EMPRESA</th>
                                        <th>REG_EMPRESA</th>
                                        <th>MODULO</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot>
                                </tfoot>
                            </table>
                            <script type="text/javascript" language="javascript" src="../Libraries/company/company.js" charset="utf-8"></script>
<!-- fin DATATABLE PARA BUSCAR REGISTROS EN LA BASE DE DATOS -->  
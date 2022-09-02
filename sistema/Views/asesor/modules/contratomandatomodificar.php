<?php
    $namerute = $_SERVER['DOCUMENT_ROOT']."/sistema/Controllers/controllerserie.php";
    $nameruteuno = $_SERVER['DOCUMENT_ROOT']."/sistema/Controllers/controllertiproperty.php";
    $namerutedos = $_SERVER['DOCUMENT_ROOT']."/sistema/Controllers/controllerarchive.php";
    $namerutetres = $_SERVER['DOCUMENT_ROOT']."/sistema/Controllers/controllertyoperation.php";
    $namerutecuatro = $_SERVER['DOCUMENT_ROOT']."/sistema/Controllers/controllertyperson.php";
    $namerutecinco = $_SERVER['DOCUMENT_ROOT']."/sistema/Controllers/controllerperson.php";
    require_once($namerute);
    require_once($nameruteuno);
    require_once($namerutedos);
    require_once($namerutetres);
    require_once($namerutecuatro);
    require_once($namerutecinco);
    session_start();
    $getserie = new controllerserie();
    $getproperty = new controllertiproperty();
    $getarch = new controllerarchive();
    $getipoper= new controllertyoperation();
    $getipopers= new controllertyperson();
    $getpers= new controllerperson();
?>
<div class="card">
    <div class="main_form">
        <form class="form_module" id="form_module" action="" method="post" enctype="multipart/form-data">
            <div class="title_header">
                    <div class="title_header"><span>Gestionar Contrato Propietario - Inmueble</span></div>
            </div>
            <div class="body_form">
                <div class="title_form_uno">
                    <div class="title_span"><span>Gestionar Contrato</span></div>
                </div>

                    <div class="body_container_nivelcuatro">
                        <div class="body_label">
                            <label>Número de Contrato</label>
                        </div>
                        <div class="body_input">
                            <input type="hidden" name="validatenumcontract" id="validatenumcontract"/>
                            <input class="textnameniveluno" type="text" name="numcontract" id="numcontract">
                        </div>
                    </div>

                    <div class="body_container_nivelcuatro">
                        <div class="body_label">
                            <label>Tipo Contrato</label>
                        </div>
                        <div class="body_select">
                            <select class="selectitem" name="tipcontract" id="tipcontract">
                                <option value="" selected>Seleccione Tipo Contrato</option>
                                    <?php foreach($getipoper->read() as $r){?>
                                        <option value="<?php echo $r->getCod_tip_oper();?>"><?php echo $r->getNom_tip_oper();?></option>
                                    <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="body_container_nivelcuatro">
                        <div class="body_label">
                            <label>Persona del Contrato</label>
                        </div>
                        <div class="body_select">
                            <select class="selectitem" name="perscontract" id="perscontract">
                                <option value="" selected>Seleccione Persona del Contrato</option>
                                    <?php foreach($getipopers->read() as $r){?>
                                        <option value="<?php echo $r->getId_tip_pers();?>"><?php echo $r->getNom_tip_pers();?></option>
                                    <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="body_container_niveldos">
                        <div class="body_label">
                            <label>Archivo Documental</label>
                        </div>
                        <div class="body_select">
                            <select class="selectitem" name="tiparch" id="tiparch">
                            <option value="" selected>Seleccione Archivo</option>
                                    <?php foreach($getarch->read() as $r){
                                            $nom_num_arch = $r->getNom_arch()."".$r->getNum_arch();
                                        ?>
                                        <option value="<?php echo $r->getCod_arch();?>"><?php echo $nom_num_arch;?></option>
                                    <?php } ?>
                            </select>
                        </div>
                        <div class="body_label">
                            <label>Carpeta Documental</label>
                        </div>
                        <div class="body_select">
                            <select class="selectitem" name="filedoc" id="filedoc">
                            </select>
                        </div>   
                    </div>

                    <!-- aca va la serie documental -->

                    <div class="body_container_nivelcuatro">
                        <div class="body_label">
                            <label>Serie Documental</label>
                        </div>
                        <div class="body_select">
                            <select class="selectitem" name="seriedoc" id="seriedoc">
                                <option value="" selected>Seleccione Serie</option>
                                    <?php foreach($getserie->read() as $r){?>
                                        <option value="<?php echo $r->getId_serie();?>"><?php echo $r->getNom_serie();?></option>
                                    <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="body_container_nivelcuatro">
                        <div class="body_label">
                            <label>Estado del Contrato Mandato</label>
                        </div>
                        <div class="body_select">
                            <select class="selectitem" name="estadocon" id="estadocon">
                            </select>
                        </div>
                    </div>

                    <!-- cod carpeta para los documentos -->

                <div class="title_form_uno">
                    <div class="title_span"><span>Propietario</span></div>
                </div>

                    <div class="body_container_nivelcuatro">
                        <div class="body_label">
                            <label>Consultar Persona Registrada para Propietario</label>
                        </div>

                        <div class="body_select">
                        <input type="hidden" name="codcarpvalidate" id="codcarpvalidate"/>
                            <select class="selectitem" name="cc" id="cc">
                                <option value="" selected>Seleccione Persona</option>
                                    <?php foreach($getpers->read() as $r){?>
                                        <option value="<?php echo $r->getCed_pers();?>"><?php echo $r->getNom_pers()." ".$r->getApe_pers();?></option>
                                    <?php } ?>
                            </select>
                        </div>

                    </div>

                    <div class="body_container_niveluno">
                        <div class="body_label">
                            <label>Cedula Persona</label>
                        </div>
                        <div class="body_input">
                            <input type="hidden" name="idemp" id="idemp" value="<?php echo $_SESSION['useremp'];?>"/>
                            <input type="hidden" name="ccpers" id="ccpers"/>
                            <input class="textnameniveluno" type="text" name="ccperson" id="ccperson" placeholder="Cedula Persona">
                        </div>
                        <div class="body_label">
                            <label>Nombres Persona</label>
                        </div>
                        <div class="body_input">
                            <input class="textnameniveluno" type="text" name="nameperson" id="nameperson" placeholder="Nombres Persona">
                        </div>
                        <div class="body_label">
                            <label>Apellidos Persona</label>
                        </div>
                        <div class="body_input">
                            <input class="textnameniveluno" type="text" name="lastperson" id="lastperson" placeholder="Apellidos Persona">
                        </div>
                    </div>

                    <div class="body_container_niveluno">
                        <div class="body_label">
                            <label>Fecha de Expedición Cédula</label>
                        </div>
                        <div class="body_input">
                            <input class="datetime" id="dateccperson" name="dateccperson" type="date">
                        </div>
                        <div class="body_label">
                            <label>Celular Persona</label>
                        </div>
                        <div class="body_input">
                            <input class="textnameniveluno" type="text" name="celperson" id="celperson" placeholder="Celular Persona">
                        </div>
                        <div class="body_label">
                            <label>Teléfono Persona</label>
                        </div>
                        <div class="body_input">
                            <input class="textnameniveluno" type="text" name="teleperson" id="teleperson" placeholder="Teléfono Persona">
                        </div>
                    </div>

                    <div class="body_container_niveldos">
                        <div class="body_label">
                            <label>Email Persona</label>
                        </div>
                        <div class="body_input">
                            <input class="emaildata" type="email" name="corperson" id="corperson" placeholder="correoelectronico@email.com">
                        </div>
                        <div class="body_label">
                            <label>Dirección Persona</label>
                        </div>
                        <div class="body_input">
                            <input class="textnameniveldos" type="text" name="direcperson" id="direcperson" placeholder="Dirección Persona">
                        </div>
                    </div>

                    <div class="body_container_niveldos">
                        <div class="body_label">
                            <label>Ciudad Persona</label>
                        </div>
                        <div class="body_input">
                            <input class="textnameniveldos" type="text" name="cityperson" id="cityperson" placeholder="Ciudad Persona">
                        </div>
                        <div class="body_label">
                            <label>Sexo Persona</label>
                        </div>
                        <div class="body_select">
                            <select class="selectitem" name="genperson" id="genperson">
                                <option value="" selected>Seleccione Sexo</option>
                                <option value="Masculino">Masculino</option>
                                <option value="Femenino">Femenino</option>
                                <option value="Otro">Otro</option>
                            </select>
                        </div>   
                    </div>

                    <div class="body_container_nivelcuatro">
                        <div class="body_label">
                            <label>Subserie Documental</label>
                        </div>
                        <div class="body_select">
                            <select class="selectitem" name="subsepro" id="subsepro">
                                <option value="" selected>Seleccione Subserie Documental</option>
                            </select>
                        </div>   
                    </div>

                <div class="title_form_dos">
                    <div class="title_span"><span>Documentos Propietario</span></div>
                </div>

                    <div class="body_container_nivelcuatro_document">
                        <!-- aca se cargan los documentos-->
                    </div>
                
                <div class="title_form_uno">
                    <div class="title_span"><span>Inmueble</span></div>
                </div>

                    <div class="body_container_niveldos">
                        <div class="body_label">
                            <label>Número de Matricula de Inmueble</label>
                        </div>
                        <div class="body_input">
                        <input type="hidden" name="validatenuminmueble" id="validatenuminmueble"/>
                            <input class="textnameniveldos" type="text" name="numinmueble" id="numinmueble" placeholder="Número de Matricula Inmueble" >
                        </div>
                        <div class="body_label">
                            <label>Tipo de Inmueble</label>
                        </div>
                        <div class="body_select">
                            <select class="selectitem" name="tipinmueble" id="tipinmueble">
                                <option value="" selected>Seleccione Tipo de Propiedad</option>
                                <?php foreach($getproperty->read() as $r){?>
                                        <option value="<?php echo $r->getId_tip_prop();?>"><?php echo $r->getNom_tip_prop();?></option>
                                <?php } ?>
                            </select>
                        </div>   
                    </div>

                    <div class="body_container_niveldos">
                        <div class="body_label">
                            <label>Dirección del Inmueble</label>
                        </div>
                        <div class="body_input">
                            <input class="textnameniveldos" type="text" name="dirinmueble" id="dirinmueble" placeholder="Dirección Inmueble">
                        </div>
                        <div class="body_label">
                            <label>Ciudad Ubicado el Inmueble</label>
                        </div>
                        <div class="body_input">
                            <input class="textnameniveldos" type="text" name="ciudinmueble" id="ciudinmueble" placeholder="Ciudad Inmueble">
                        </div>
                    </div>

                    <div class="body_container_nivelcuatro">
                        <div class="body_label">
                            <label>Subserie Documental</label>
                        </div>
                        <div class="body_select">
                            <select class="selectitem" name="subseinm" id="subseinm">
                               <option value="" selected>Seleccione Subserie Documental</option>
                            </select>
                        </div>   
                    </div>

                    <div class="body_container_niveltres">
                        <div class="body_textareauno">
                            <label>Descripcion del Inmueble</label>
                        </div>
                        <div class="body_textareados">
                        <textarea class="textareas" name="descinmueble" id="descinmueble" cols="5" rows="5" placeholder="Descripción del Inmueble"></textarea>
                        </div>
                    </div>

                <div class="title_form_dos">
                    <div class="title_span"><span>Documentos Inmueble</span></div>
                </div>
                    <div class="body_container_nivelcuatro_documentdos">
                        <!-- aca se cargan los documentos-->
                    </div>
                    <div class="body_container_nivelcuatro_fianza">
                        <div class="body_label">
                            <label>Documento de Autorización de Fianza (Opcional) </label>
                        </div>
                        <div class="body_input">
                            <input class="textnameniveluno" type="file" name="daf" id="daf" accept=".doc, .docx, .pdf">
                        </div>
                    </div>

                <div class="title_form_dos">
                    <div class="title_span"><span>Galeria Inmueble</span></div>
                </div>

                    <div class="body_container_nivelcuatro_documentres">
                        <!-- aca se cargan las imagenes-->
                    </div>

                    <div class="body_container_nivelcuatro">
                        <div class="body_label">
                            <label>Imágenes del Inmueble</label>
                        </div>
                        <div class="body_input">
                            <input class="textnameniveluno" type="file" data-previewable="true" data-preview-container=".body_container_imagen" name="fotos[]" id="fotos" accept="image/png, .jpeg, .jpg" multiple>
                        </div>
                    </div>
                    <div class="body_container_imagen">
                        <!--Acá se cargan las nuevas fotos -->
                    </div>
                   
                <div class="title_form_uno">
                    <button type="button" id="update" name="update" class="button_session" value="update"><span>MODIFICAR</span></button>
                    <button type="button" id="delete" name="delete" class="button_session" value="delete"><span>ELIMINAR</span></button>
                </div>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript" language="javascript" src="../Libraries/contract/searchcm.js" charset="utf-8"></script>
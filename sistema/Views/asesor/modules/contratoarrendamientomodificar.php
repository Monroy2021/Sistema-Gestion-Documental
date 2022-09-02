<?php
    $namerute = $_SERVER['DOCUMENT_ROOT']."/sistema/Controllers/controllerserie.php";
    $nameruteuno = $_SERVER['DOCUMENT_ROOT']."/sistema/Controllers/controllertiproperty.php";
    $namerutedos = $_SERVER['DOCUMENT_ROOT']."/sistema/Controllers/controllerarchive.php";
    $namerutetres = $_SERVER['DOCUMENT_ROOT']."/sistema/Controllers/controllertyoperation.php";
    $namerutecuatro = $_SERVER['DOCUMENT_ROOT']."/sistema/Controllers/controllertyperson.php";
    $namerutecinco = $_SERVER['DOCUMENT_ROOT']."/sistema/Controllers/controllerperson.php";
    $nameruteseis = $_SERVER['DOCUMENT_ROOT']."/sistema/Controllers/controllercontractmandate.php";
    require_once($namerute);
    require_once($nameruteuno);
    require_once($namerutedos);
    require_once($namerutetres);
    require_once($namerutecuatro);
    require_once($namerutecinco);
    require_once($nameruteseis);
    session_start();
    $getserie = new controllerserie();
    $getproperty = new controllertiproperty();
    $getarch = new controllerarchive();
    $getipoper= new controllertyoperation();
    $getipopers= new controllertyperson();
    $getpers= new controllerperson();
    $getmandate= new controllercontractmandate();
?>
<div class="card">
    <div class="main_form">
        <form class="form_module" id="form_module" action="" method="post" enctype="multipart/form-data">
            <div class="title_header">
                    <div class="title_header"><span>Gestionar Contrato Arrendatario - Inmueble</span></div>
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
                            <input type="hidden" name="validatenumcontracta" id="validatenumcontracta"/>
                            <input class="textnameniveluno" type="text" name="numcontracta" id="numcontracta" placeholder="Número Contrato Arrendamiento">
                        </div>
                    </div>

                    <div class="body_container_nivelcuatro">
                        <div class="body_label">
                            <label>Tipo Contrato</label>
                        </div>
                        <div class="body_select">
                            <select class="selectitem" name="tipcontracta" id="tipcontracta">
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
                            <select class="selectitem" name="perscontracta" id="perscontracta">
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
                            <select class="selectitem" name="tiparcha" id="tiparcha">
                            <option value="" selected>Seleccione Archivo</option>
                                    <?php foreach($getarch->read() as $r){
                                            $nom_num_arch = $r->getNom_arch()."".$r->getNum_arch();
                                        ?>
                                        <option value="<?php echo $r->getCod_arch();?>"><?php echo $nom_num_arch;?></option>
                                    <?php } ?>
                            </select>
                        </div>
                        <div class="body_label">
                            <label>Carpeta Documental Principal</label>
                        </div>
                        <div class="body_select">
                            <input type="hidden" name="fileprin" id="fileprin"/> <!-- carpeta principal -->
                            <input type="hidden" name="codfileprin" id="codfileprin"/> <!-- carpeta principal -->
                            <select class="selectitem" name="filedoca" id="filedoca">
                                <option value="" selected>Seleccione Carpeta Documental</option>
                            </select>
                        </div>   
                    </div>

                    <!-- aca va la serie documental -->

                    <div class="body_container_nivelcuatro">
                        <div class="body_label">
                            <label>Serie Documental</label>
                        </div>
                        <div class="body_select">
                            <select class="selectitem" name="seriedoca" id="seriedoca">
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
                            <select class="selectitem" name="estadocona" id="estadocona">
                                <option value="0" selected>No terminado</option>
                                <option value="1">Terminado</option>
                            </select>
                        </div>
                    </div>


                <!-- Gestionar formatos de vinculación -->    

                <div class="title_form_uno">
                    <div class="title_span"><span>Formatos de Vinculación Arrendatario - Codeudores</span></div>
                </div>

                    <div class="body_container_nivelcuatro">
                        <div class="body_label">
                            <label>Subserie Documental</label>
                        </div>
                        <div class="body_select">
                            <select class="selectitem" name="subserievin" id="subserievin">
                               <option value="" selected>Seleccione Subserie Documental</option>
                            </select>
                        </div>   
                    </div>
                <!-- Fin Gestionar formatos de vinculación -->

                <div class="title_form_dos">
                    <div class="title_span"><span>Documentos de Vinculación Arrendatario</span></div>
                </div>

                    <div class="body_container_nivelcuatro_document">
                        <!-- aca se cargan los documentos vinculacion arrendatario-->
                    </div>

                <div class="title_form_dos">
                    <div class="title_span"><span>Formatos de Vinculación Codeudor o Deudor 1</span></div>
                </div>

                    <div class="body_container_nivelcuatro_documentdos">
                        <!-- aca se cargan los documentos vinculacion codeudor1-->
                    </div>

                <div class="title_form_dos">
                    <div class="title_span"><span>Formatos de Vinculación Codeudor o Deudor 2</span></div>
                </div>
                    
                    <div class="body_container_nivelcuatro_documentres">
                        <!-- aca se cargan los documentos vinculacion codeudor1-->
                    </div>
                    
                
                <div class="title_form_uno">
                    <div class="title_span"><span>Contrato Arrendatario</span></div>
                </div>
                    <div class="body_container_nivelcuatro">
                        <div class="body_label">
                            <label>Subserie Documental</label>
                        </div>
                        <div class="body_select">
                            <select class="selectitem" name="subserieca" id="subserieca">
                               <option value="" selected>Seleccione Subserie Documental</option>
                            </select>
                        </div>   
                    </div>

                <div class="title_form_dos">
                    <div class="title_span"><span>Contrato de Arrendamiento</span></div>
                </div>

                    <div class="body_container_nivelcuatro_documentcuatro">
                        <!-- aca se cargan el contrato de arrendamiento-->
                    </div>

                <div class="title_form_uno">
                    <div class="title_span"><span>Arrendatario</span></div>
                </div>

                    <div class="body_container_nivelcuatro">
                        <div class="body_label">
                            <label>Consultar Persona Registrada como Arrendatario</label>
                        </div>

                        <div class="body_select">
                            <select class="selectitem" name="cc" id="cc">
                                <option value="" selected>Seleccione Persona</option>
                                    <?php foreach($getpers->read() as $r){?>
                                        <option value="<?php echo $r->getCed_pers();?>"><?php echo $r->getCed_pers()."=>".$r->getNom_pers()." ".$r->getApe_pers();?></option>
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
                            <label>Carpeta Documental Auxiliar</label>
                        </div>
                        <div class="body_select">
                            <input type="hidden" name="fileaux" id="fileaux"/> <!-- carpeta auxiliar -->
                            <input type="hidden" name="codfileaux" id="codfileaux"/> <!-- carpeta auxiliar -->
                            <select class="selectitem" name="auxiliara" id="auxiliara">
                               <option value="" selected>Seleccione Carpetal Documental</option>
                            </select>
                        </div>   
                    </div>

                    <div class="body_container_nivelcuatro">
                        <div class="body_label">
                            <label>Subserie Documental</label>
                        </div>
                        <div class="body_select">
                            <select class="selectitem" name="subseriereqar" id="subseriereqar">
                               <option value="" selected>Seleccione Subserie Documental</option>
                            </select>
                        </div>   
                    </div>

                
                    <div class="title_form_dos">
                        <div class="title_span"><span>Documentos Arrendatario</span></div>
                    </div>

                        <div class="body_container_nivelcuatro_documentcinco">
                            <!-- aca se cargan los documentos del arrendatario-->
                        </div>

                    <!--  Actualizar Codeudor 1 -->
                <div class="title_form_uno">
                    <div class="title_span"><span>Codeudor o Deudor 1</span></div>
                </div>

                    <div class="body_container_nivelcuatro">
                        <div class="body_label">
                            <label>Consultar Persona Registrada como Arrendatario</label>
                        </div>

                        <div class="body_select">
                            <select class="selectitem" name="cc1" id="cc1">
                                <option value="" selected>Seleccione Persona</option>
                                    <?php foreach($getpers->read() as $r){?>
                                        <option value="<?php echo $r->getCed_pers();?>"><?php echo $r->getCed_pers()."=>".$r->getNom_pers()." ".$r->getApe_pers();?></option>
                                    <?php } ?>
                            </select>
                        </div>

                    </div>

                    <div class="body_container_niveluno">
                        <div class="body_label">
                            <label>Cedula Persona</label>
                        </div>
                        <div class="body_input">
                            <input type="hidden" name="idemp1" id="idemp1" value="<?php echo $_SESSION['useremp'];?>"/>
                            <input type="hidden" name="ccpers1" id="ccpers1"/>
                            <input class="textnameniveluno" type="text" name="ccperson1" id="ccperson1" placeholder="Cedula Persona">
                        </div>
                        <div class="body_label">
                            <label>Nombres Persona</label>
                        </div>
                        <div class="body_input">
                            <input class="textnameniveluno" type="text" name="nameperson1" id="nameperson1" placeholder="Nombres Persona">
                        </div>
                        <div class="body_label">
                            <label>Apellidos Persona</label>
                        </div>
                        <div class="body_input">
                            <input class="textnameniveluno" type="text" name="lastperson1" id="lastperson1" placeholder="Apellidos Persona">
                        </div>
                    </div>

                    <div class="body_container_niveluno">
                        <div class="body_label">
                            <label>Fecha de Expedición Cédula</label>
                        </div>
                        <div class="body_input">
                            <input class="datetime" id="dateccperson1" name="dateccperson1" type="date">
                        </div>
                        <div class="body_label">
                            <label>Celular Persona</label>
                        </div>
                        <div class="body_input">
                            <input class="textnameniveluno" type="text" name="celperson1" id="celperson1" placeholder="Celular Persona">
                        </div>
                        <div class="body_label">
                            <label>Teléfono Persona</label>
                        </div>
                        <div class="body_input">
                            <input class="textnameniveluno" type="text" name="teleperson1" id="teleperson1" placeholder="Teléfono Persona">
                        </div>
                    </div>

                    <div class="body_container_niveldos">
                        <div class="body_label">
                            <label>Email Persona</label>
                        </div>
                        <div class="body_input">
                            <input class="emaildata" type="email" name="corperson1" id="corperson1" placeholder="correoelectronico@email.com">
                        </div>
                        <div class="body_label">
                            <label>Dirección Persona</label>
                        </div>
                        <div class="body_input">
                            <input class="textnameniveldos" type="text" name="direcperson1" id="direcperson1" placeholder="Dirección Persona">
                        </div>
                    </div>

                    <div class="body_container_niveldos">
                        <div class="body_label">
                            <label>Ciudad Persona</label>
                        </div>
                        <div class="body_input">
                            <input class="textnameniveldos" type="text" name="cityperson1" id="cityperson1" placeholder="Ciudad Persona">
                        </div>
                        <div class="body_label">
                            <label>Sexo Persona</label>
                        </div>
                        <div class="body_select">
                            <select class="selectitem" name="genperson1" id="genperson1">
                                <option value="" selected>Seleccione Sexo</option>
                                <option value="Masculino">Masculino</option>
                                <option value="Femenino">Femenino</option>
                                <option value="Otro">Otro</option>
                            </select>
                        </div>   
                    </div>

                    <div class="body_container_nivelcuatro">
                        <div class="body_label">
                            <label>Persona del Contrato Codeudor 1</label>
                        </div>
                        <div class="body_select">
                            <select class="selectitem" name="perscontractac1" id="perscontractac1">
                                <option value="" selected>Seleccione Persona del Contrato</option>
                                    <?php foreach($getipopers->read() as $r){?>
                                        <option value="<?php echo $r->getId_tip_pers();?>"><?php echo $r->getNom_tip_pers();?></option>
                                    <?php } ?>
                            </select>
                        </div>
                    </div>
                <!--Fin Actualizar Codeudor 1 -->

                
                    <div class="title_form_dos">
                        <div class="title_span"><span>Documentos Codeudor o Deudor 1</span></div>
                    </div>

                        <div class="body_container_nivelcuatro_documentseis">
                            <!-- aca se cargan los documentos codeudor1-->
                        </div>               


                     <!--  Actualizar Codeudor 2 -->
                <div class="title_form_uno">
                    <div class="title_span"><span>Codeudor o Deudor 2</span></div>
                </div>

                    <div class="body_container_nivelcuatro">
                        <div class="body_label">
                            <label>Consultar Persona Registrada como Arrendatario</label>
                        </div>

                        <div class="body_select">
                            <select class="selectitem" name="cc2" id="cc2">
                                <option value="" selected>Seleccione Persona</option>
                                    <?php foreach($getpers->read() as $r){?>
                                        <option value="<?php echo $r->getCed_pers();?>"><?php echo $r->getCed_pers()."=>".$r->getNom_pers()." ".$r->getApe_pers();?></option>
                                    <?php } ?>
                            </select>
                        </div>

                    </div>

                    <div class="body_container_niveluno">
                        <div class="body_label">
                            <label>Cedula Persona</label>
                        </div>
                        <div class="body_input">
                            <input type="hidden" name="idemp2" id="idemp2" value="<?php echo $_SESSION['useremp'];?>"/>
                            <input type="hidden" name="ccpers2" id="ccpers2"/>
                            <input class="textnameniveluno" type="text" name="ccperson2" id="ccperson2" placeholder="Cedula Persona">
                        </div>
                        <div class="body_label">
                            <label>Nombres Persona</label>
                        </div>
                        <div class="body_input">
                            <input class="textnameniveluno" type="text" name="nameperson2" id="nameperson2" placeholder="Nombres Persona">
                        </div>
                        <div class="body_label">
                            <label>Apellidos Persona</label>
                        </div>
                        <div class="body_input">
                            <input class="textnameniveluno" type="text" name="lastperson2" id="lastperson2" placeholder="Apellidos Persona">
                        </div>
                    </div>

                    <div class="body_container_niveluno">
                        <div class="body_label">
                            <label>Fecha de Expedición Cédula</label>
                        </div>
                        <div class="body_input">
                            <input class="datetime" id="dateccperson2" name="dateccperson2" type="date">
                        </div>
                        <div class="body_label">
                            <label>Celular Persona</label>
                        </div>
                        <div class="body_input">
                            <input class="textnameniveluno" type="text" name="celperson2" id="celperson2" placeholder="Celular Persona">
                        </div>
                        <div class="body_label">
                            <label>Teléfono Persona</label>
                        </div>
                        <div class="body_input">
                            <input class="textnameniveluno" type="text" name="teleperson2" id="teleperson2" placeholder="Teléfono Persona">
                        </div>
                    </div>

                    <div class="body_container_niveldos">
                        <div class="body_label">
                            <label>Email Persona</label>
                        </div>
                        <div class="body_input">
                            <input class="emaildata" type="email" name="corperson2" id="corperson2" placeholder="correoelectronico@email.com">
                        </div>
                        <div class="body_label">
                            <label>Dirección Persona</label>
                        </div>
                        <div class="body_input">
                            <input class="textnameniveldos" type="text" name="direcperson2" id="direcperson2" placeholder="Dirección Persona">
                        </div>
                    </div>

                    <div class="body_container_niveldos">
                        <div class="body_label">
                            <label>Ciudad Persona</label>
                        </div>
                        <div class="body_input">
                            <input class="textnameniveldos" type="text" name="cityperson2" id="cityperson2" placeholder="Ciudad Persona">
                        </div>
                        <div class="body_label">
                            <label>Sexo Persona</label>
                        </div>
                        <div class="body_select">
                            <select class="selectitem" name="genperson2" id="genperson2">
                                <option value="" selected>Seleccione Sexo</option>
                                <option value="Masculino">Masculino</option>
                                <option value="Femenino">Femenino</option>
                                <option value="Otro">Otro</option>
                            </select>
                        </div>   
                    </div>

                    <div class="body_container_nivelcuatro">
                        <div class="body_label">
                            <label>Persona del Contrato Codeudor 2</label>
                        </div>
                        <div class="body_select">
                            <select class="selectitem" name="perscontractac2" id="perscontractac2">
                                <option value="" selected>Seleccione Persona del Contrato</option>
                                    <?php foreach($getipopers->read() as $r){?>
                                        <option value="<?php echo $r->getId_tip_pers();?>"><?php echo $r->getNom_tip_pers();?></option>
                                    <?php } ?>
                            </select>
                        </div>
                    </div>
                <!--Fin Actualizar Codeudor 2 -->

                    <div class="title_form_dos">
                        <div class="title_span"><span>Documentos Codeudor o Deudor 2</span></div>
                    </div>

                        <div class="body_container_nivelcuatro_documentsiete">
                            <!-- aca se cargan los documentos codeudor2-->
                        </div>

                <div class="title_form_uno">
                    <div class="title_span"><span>Requerimientos del Propietario</span></div>
                </div>

                <div class="body_container_nivelcuatro">
                        <div class="body_label">
                            <label>Subserie Documental</label>
                        </div>
                        <div class="body_select">
                            <select class="selectitem" name="subseriereqprop" id="subseriereqprop">
                               <option value="" selected>Seleccione Subserie Documental</option>
                            </select>
                        </div>   
                    </div>

                    <div class="body_container_niveldos">
                        <div class="body_label">
                            <label>Contrato de Mandato Propietario</label>
                        </div>
                        <div class="body_select">
                            <input type="hidden" name="cma" id="cma"/>
                            <select class="selectitem" name="contractpro" id="contractpro">
                            <option value="" selected>Contrato Mandato Propietario</option>
                                    <?php foreach($getmandate->readContractmandate() as $r){?>
                                        <option value="<?php echo $r->getCod_reg_oper_cm();?>"><?php echo $r->getCod_reg_oper_cm()."->".$r->getNom_pers_cm()." ".$r->getApe_pers_cm();?></option>
                                    <?php } ?>
                            </select>
                        </div>
                        <div class="body_label">
                            <label>Subserie Documental Contrato Mandato</label>
                        </div>
                        <div class="body_select">
                            <input type="hidden" name="idprop" id="idprop"/>
                            <select class="selectitem" name="subseriea" id="subseriea">
                            </select>
                        </div>   
                    </div>
                <div class="body_container_archivo">
                        <!--Acá se cargan las documentos -->
                </div>
                <div class="title_form_uno">
                <button type="button" id="update" name="update" class="button_session" value="update"><span>MODIFICAR</span></button>
                    <button type="button" id="delete" name="delete" class="button_session" value="delete"><span>ELIMINAR</span></button>
                </div>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript" language="javascript" src="../Libraries/contract/searchca.js" charset="utf-8"></script>
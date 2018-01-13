<!-- main content -->
<form id="customer-form" name="customer-form" enctype="multipart/form-data" method="post" action="<?php echo site_url()."dashboard/categorias/validate";?>">
<div id="main_content" class="span7">
    <div class="row-fluid">
        <div class="widget_container">
            <div class="well">
                <div class="navbar navbar-static navbar_as_heading">
                        <div class="navbar-inner">
                                <div class="container" style="width: auto;">
                                        <a class="brand"></i> Formulario Categorías</a>
                                </div>
                        </div>
                </div>
                <!--GET CUSTOMER ID-->
              <input type="hidden" name="category_id" id="category_id" value="<?php echo isset($obj_category)?$obj_category->category_id:"";?>">
              <br><br>
              <input type="text" id="name" name="name" value="<?php echo isset($obj_category->name)?$obj_category->name:"";?>" class="input-xlarge-fluid" placeholder="Nombre">
              <br><br>
              <textarea class="input-large" id="description" name="description" rows="5" style="width:97%;height:180px;" placeholder="Descripción"><?php echo isset($obj_category->description)?$obj_category->description:"";?></textarea>
              <br><br>
                    <div class="well nomargin">
                        <div class="inner">
                            <strong>Estado para el sistema:</strong><br/>
                            <select name="active" id="active">
                                        <option value="">[ Seleccionar ]</option>
                                        <option value="0" <?php if(isset($obj_category)){
                                            if($obj_category->active == 0){ echo "selected";}
                                        }else{echo "";} ?>>Inactivo</option>
                                        <option value="1" <?php if(isset($obj_category)){
                                            if($obj_category->active == 1){ echo "selected";}
                                        }else{echo "";} ?>>Activo</option>
                            </select>
                        </div>
                    </div>
                <br><br>
                <br><br>
            
                 
                <div class="subnav nobg">
                    <button class="btn btn-danger btn-small pull-left" type="reset" onclick="cancel_category();">Cancelar</button>                    
                    <button class="btn btn-primary btn-small pull-right"  type="submit">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</div><!-- main content -->
</form>
<script src="<?php echo site_url();?>static/cms/js/category.js"></script>

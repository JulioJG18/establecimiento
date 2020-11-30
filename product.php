<?php
  $page_title = 'Lista de establecimientos';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
  $products = join_product_table();
?>
<?php include_once('layouts/header.php'); ?>
  <div class="row">
     <div class="col-md-12">
       <?php echo display_msg($msg); ?>
     </div>
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading clearfix">
         <div class="pull-right">
           <a href="add_product.php" class="btn btn-primary">Agregar establecimiento</a>
         </div>
        </div>
        <div class="panel-body">
          <table class="table table-bordered">
            <thead>
              
                <th class="text-center" style="width: 50px;">
                <th class="text-center" style="width: 100%;">Nombre </th>
                <th class="text-center" style="width: 100%;"> Categor&iacute;a </th>
                <th class="text-center" style="width: 100%;"> Ubicaci&oacute;n </th>
                <th class="text-center" style="width: 100%;"> Agregado </th>
                <th class="text-center" style="width: 100px;"> Acciones </th>
                
              
            </thead>
            <tbody>
              <?php foreach ($products as $product):?>
              
                
                <td>
                  <?php if($product['media_id'] === '0'): ?>
               
                  <?php else: ?>
                  ">
                <?php endif; ?>
               
                <td> <?php echo remove_junk($product['name']); ?></td>
                <td class="text-center"> <?php echo remove_junk($product['categorie']); ?></td>
                <td class="text-center"> <?php echo remove_junk($product['quantity']); ?>
                  <?php echo remove_junk($product['location']); ?>
                <td class="text-center"> <?php echo read_date($product['date']); ?>
                <td class="text-center">
                  <div class="btn-group">
                    <a href="edit_product.php?id=<?php echo (int)$product['id'];?>" class="btn btn-info btn-xs"  title="Editar" data-toggle="tooltip">
                      <span class="glyphicon glyphicon-edit"></span>
                    </a>
                     <a href="delete_product.php?id=<?php echo (int)$product['id'];?>" class="btn btn-danger btn-xs"  title="Eliminar" data-toggle="tooltip">
                      <span class="glyphicon glyphicon-trash"></span>
                    </a>
                  </div>
                </td>
                <?php if ( remove_junk($product['quantity']) < 10 ): echo 
                	"<td class=\"text-center\" style=\"background-color: yellow; color: red;\">Nivel Bajo</td>"; else: echo "<td></td>"; endif; ?>
              </tr>
             <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <?php include_once('layouts/footer.php'); ?>

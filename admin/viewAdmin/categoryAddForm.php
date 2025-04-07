<?php ob_start(); ?>
 
<div class="container" style="min-height:400px;">
<div class="col-md-11">	
 
 <h2>Category Add </h2>
 <?php 
 if(isset($test)){
	if($test==true)
		{
?>
	<div class="alert alert-info">
		<strong>Запись добавлена. </strong><a href="categoryAdmin"> Список категорий</a>
	</div>
	<?php
		}
    else if($test==false)
    {
     ?>
		<div class="alert alert-warning">
			<strong>Ошибка добавления записи!</strong> <a href="categoryAdmin"> Список категорий</a>
		</div>
     <?php
        }	
 }
 else{
	?>
  <form method='POST' action="categoryAddResult" >
    <table class='table table-bordered'>
        <tr>
            <td>Category name</td>
            <td><input type='text' name='name' class='form-control' required></td>
        </tr>
        
		
		
        <tr>
            <td colspan="2">
                <button type="submit" class="btn btn-primary" name="save">
                    <span class="glyphicon glyphicon-plus"></span> Сохранить
                </button>  
                <a href="categoryAdmin" class="btn btn-large btn-success">
                <i class="glyphicon glyphicon-backward"></i> &nbsp;Назад к списку</a>
            </td>
        </tr>
    </table>
</form> 
<?php
}
?>
	</div>			
</div>
<?php $content = ob_get_clean(); ?>
<?php include "viewAdmin/templates/layout.php"; ?>



































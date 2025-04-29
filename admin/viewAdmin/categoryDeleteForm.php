<?php ob_start(); ?>
 
<div class="container" style="min-height:400px;">
<div class="col-md-11">	
 
 <h2>Kategooria Kustuta </h2>
 <?php 
 if(isset($test)){
	if($test==true)
		{
?>
	<div class="alert alert-info">
		<strong>Kirje on kustutatud. </strong><a href="categoryAdmin"> Kategooriate loend</a>
	</div>
	<?php
		}
    else if($test==false)
    {
     ?>
		<div class="alert alert-warning">
			<strong>Viga kirje kustutamisel!</strong> <a href="categoryAdmin"> Kategooriate loend</a>
		</div>
     <?php
        }	
 }
 else{
	?>
  <form method='POST' action="categoryDelResult?id=<?php echo $id; ?>" >
    <table class='table table-bordered'>
        <tr>
            <td>Kategooriate nimi</td>
            <td><input type='text' name='name' class='form-control' required value=<?php  echo $detail['name']; ?> readonly></td>
        </tr>
        
		
		
        <tr>
            <td colspan="2">
                <button type="submit" class="btn btn-primary" name="save">
                    <span class="glyphicon glyphicon-plus"></span> Kustuda
                </button>  
                <a href="categoryAdmin" class="btn btn-large btn-success">
                <i class="glyphicon glyphicon-backward"></i> &nbsp;Tagasi nimekirja</a>
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



































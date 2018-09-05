<!-- apps / frontend / modules / job / templates / showSuccess.php -->
 <?php use_stylesheet ( 'job.css' )  ?> 
<?php //use_helper ( 'Texto' )  ?>
<?php slot ( 
  'title' ,
   sprintf ( '% s está buscando un% s' , $job -> getCompany ( ) , $job -> getPosition ( ) ) ) 
?>
 
<div id = "job" >
  <h1> <?php echo  $job -> getCompany ( ) ?> </h1>
  <h2> <?php echo  $job -> getLocation ( ) ?> </h2>
  <h3>
    <?php  echo  $job -> getPosition ( )  ?> 
    <small> - <?php  echo  $job -> getType ( ) ?> </small>
  </h3>
 
  <?php  if  ( $job -> getLogo ( ) ) : ?> 
    <div class = "logo" >
      <a href= "<?php echo $job-> getUrl ()?> " >
        <img src = "/uploads/jobs/<?php echo $job-> getLogo ()?>" 
          alt = "<?php echo $job-> getCompany ()?> logo" />
      </a>
    </div>
  <?php  endif  ?>
 
  <div class = "description" >
     <?php  echo   $job -> getDescription ( )  ?>
  </div>
 
  <h4> ¿Cómo postular? </h4>
 
  <p class = "how_to_apply" > <?php echo  $job -> getHowToApply ( ) ?> </p>
 
  <div class = "meta" >
    <small> publicado en <?php  echo  $job -> getDateTimeObject ( 'created_at' ) -> format ( 'm / d / Y' ) ?> </small>
  </div>
 
  <div style = "relleno: 20px 0" >
    <a href= "<?php echo url_for('job/edit?id='.$job-> getId ())?> " >
      Editar
    </a>
  </div>
</div>



<!-- apps / frontend / modules / job / templates / indexSuccess.php -->
 <?php use_stylesheet ( 'jobs.css' )  ?>
 
<div id = "jobs" >
  <table class = "jobs" >
     <?php  foreach  ( $jobeet_jobs  as  $i => $job ) : ?> 
      <tr class = "<?php echo fmod ($i, 2)? 'even': 'impar' ?> " >
        <td class = "location" > <?php echo  $job -> getLocation ( ) ?> </td>
        <td class = "position" >
           <!-- <a href= "<?php //echo url_for('job/show?id='.$job-> getId ().'&company='.$job->getCompany().
          //'&location='.$job->getLocation().'&position='.$job->getPosition())?>" >
             <?php  //echo $job -> getPosition ( )  ?>
          </a>  -->
          <!-- simplificando la ruta a show por medio de routin.yml -->
           <a href= "<?php echo url_for('job_show_user', $job)?>" >
             <?php  echo  $job -> getPosition ( )  ?>
          </a> 
        </td>
        <td class = "company" > <?php echo  $job -> getCompany ( ) ?> </td>
      </tr>
    <?php  endforeach  ?>
  </table>
</div>
<a href= "<?php echo url_for('job/new') ?> " > Nuevo </a>
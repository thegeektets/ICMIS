<!DOCTYPE html>


<body>

  <!-- Fixed navbar -->
	
<div id="cl-wrapper">
		
	
<div class="container-fluid" id="pcont">
		 <div class="cl-mcont">
      <div class="row">
      
        <div class="col-md-6 col-sm-6">
				<div class="block-flat" style="padding:2px;margin-bottom:0px">
						<div class="header" style="background:#df0d8a;color:#fff;padding:5px;">							
							<h4 style="text-align:center;font-weight:300">ICRAF Fellowship Vacancies</h4>
						</div>
						</div>

					<?php for($i=0;count($fvacancies)>$i;$i++){?>

					<div class="block-flat" style="padding:2px">
						<div class="header" style="background:#df0d8a;color:#fff;padding:5px;">							
							<h4 style="text-align:center;font-weight:300">Vacancy Title:<?php echo $fvacancies[$i]['vacancy_title'] ?></h4>
						</div>
						<div class="content">

								<h4>Fellowship Dates : <?php echo $fvacancies[$i]['position_startdate'] .' to '.$fvacancies[$i]['position_enddate']?></h4>
								
								<h4>Description :</h4>
								<p><?php echo $fvacancies[$i]['vacancy_description']?></p>
								
								<h4>Application Deadline : <?php echo $fvacancies[$i]['application_deadline']?></h4>
								
								<div class="spacer2">
								<a href="<?php echo base_url('index.php/student/applyfellowship'.'/'.$fvacancies[$i]['vacancy_id']);?>"  type="button" class="btn btn-primary"><i class="fa fa-folder-open-o"></i> Apply Fellowship</a>
								</div>
                         </div>
         			</div>
         			<?php
         		}
         		?>



        </div>
         <div class="col-md-6 col-sm-6">
         		<div class="block-flat" style="padding:2px;margin-bottom:0px">
						<div class="header" style="background:#bad532;color:#fff;padding:5px;">							
							<h4 style="text-align:center;font-weight:300">ICRAF Internship Vacancies</h4>
						</div>
						</div>
	<?php for($i=0;count($ivacancies)>$i;$i++){?>

					<div class="block-flat" style="padding:2px">
						<div class="header" style="background:#bad532;color:#fff;padding:5px;">							
							<h4 style="text-align:center;font-weight:300">Vacancy Title:<?php echo $ivacancies[$i]['vacancy_title'] ?></h4>
						</div>
						<div class="content">

								<h4>Internship Dates : <?php echo $ivacancies[$i]['position_startdate'] .' to '.$ivacancies[$i]['position_enddate']?></h4>
								
								<h4>Description :</h4>
								<p><?php echo $ivacancies[$i]['vacancy_description']?></p>
								
								<h4>Application Deadline : <?php echo $ivacancies[$i]['application_deadline']?></h4>
								
								<div class="spacer2">
									<a href="<?php echo base_url('index.php/student/applyinternship'.'/'.$ivacancies[$i]['vacancy_id']);?>"  type="button" class="btn btn-primary"><i class="fa fa-folder-open-o"></i> Apply Internship</a>
								</div>
                         </div>
         			</div>
         			<?php
         		}
         		?>
     


      </div>
    </div>
	</div> 
	
</div>
	
</div>


</html>

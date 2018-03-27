<html>
<?php
	try
	{
		// On se connecte à MySQL
		$bdd = new PDO('mysql:host=localhost;dbname=kidshouse;charset=utf8', 'root', '');
	}
	catch(Exception $e)
	{
		// En cas d'erreur, on affiche un message et on arrête tout
			die('Erreur : '.$e->getMessage());
	}

?>
	<head>
		<title>Ajouter un enfant</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>		
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<style>
			body
			{
				margin:0;
				padding:0;
				background-color:#f1f1f1;
			}
			.box
			{
				width:1270px;
				padding:20px;
				background-color:#fff;
				border:1px solid #ccc;
				border-radius:5px;
				margin-top:25px;
			}
			table {
			 border-width:1px; 
			 border-style:solid; 
			 border-color:black;
			 width:100%;
			 }
			td { 
			 border-width:1px;
			 border-style:solid; 
			 border-color:white;
			 width:3%;
			 }
		.ma{
			margin:5px 5px 5px 5px;
			 
			
		}
		.ysar{
			align:left;
			background-color:green;
		}
		</style>
	</head>
	<body>
		<div class="container box">
			<h1 align="center">La liste <i>des enfants</i></h1>
			<br />
			<div class="table-responsive">
				<br />
				<div align="right">
					<button type="button" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-info btn-lg">Ajouter</button>
				</div>
				<br /><br />
				<!-- Test -->
<!--
				<div class="row">
					<div class="col-sm-6" style="float:left">
						<div class="dataTables_length" id="user_data_length">
							<label>Show 
								<select name="user_data_length" aria-controls="user_data" class="form-control input-sm">
									<option value="10">10</option>
									<option value="25">25</option>
									<option value="50">50</option>
									<option value="100">100</option>
								</select> entries
							</label>
						</div>
					</div>
				<div class="col-sm-6" style="float:right">
				<div id="user_data_filter" class="dataTables_filter">
					<label>Search:
						<input type="search" class="form-control input-sm" placeholder="" aria-controls="user_data">
					</label>
				</div>
			</div>
			</div>
-->
			<!-- Test -->
		
		
			<table style="width: 100%; height: 5%;">
			<tbody>
			<tr>
			<td style="width: 50%;">
				<label>Afficher
					<select name="user_data_length">
						<option value="10">10</option>
						<option value="25">25</option>
						<option value="50">50</option>
						<option value="100">100</option>
					</select>enfants
				</label>
			</td>
			<td style="width: 50%;" align="right">
				<div><label>chercher: <input type="search" placeholder="" aria-controls="user_data" /></label></div>
			</td>
			</tr>
			</tbody>
			</table>
		
		</br></br>
		
		
				<table id="user_data" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th width="10%">Image</th>
							<th width="35%">Nom</th>
							<th width="35%">Prenom</th>
							<th width="10%">Editer</th>
							<th width="10%">Supprimer</th>
							<th width="20%">Tâche journalière</th>
						</tr>
						<?php
							$reponse = $bdd->query('select * from enfant');
							while ($donnees = $reponse->fetch()){
						?>
						<tr>
							<td><img src="upload/<?php echo $donnees['photo'];?>" class="img-thumbnail" width="50" height="35" /></td>
							
							<!--<td><?php  echo $donnees['photo'];?></td>-->
							<td><?php  echo $donnees['Nom'];?></td>
							<td><?php  echo $donnees['Prenom'];?></td>
							<td>
								<button type="button" name="update" id="71" class="btn btn-warning btn-xs update">Mettre à jour</button>
							</td>
							<td>
								<button type="button" name="delete" id="71" class="btn btn-danger btn-xs delete">Supprimer</button>
							</td>
							<td>
								<button type="button" name="tache" id="71" class="btn btn-success btn-xs tache">Tâche journalière</button>
							</td>
						</tr>
							
						<?php
							}
						?>
					</thead>
				</table>
			
			
			<div class="col-sm-7"> 
				<div class="dataTables_paginate paging_simple_numbers" id="user_data_paginate">
					<!-- Un problèèèèèèèèmeeeeeeeeeeeeeee!!!!-->
					<table border="5"><tr><td align="left">
					<ul class="pagination">
						<li class="paginate_button previous disabled" id="user_data_previous">
							<a href="#" aria-controls="user_data" data-dt-idx="0" tabindex="0">Précédent</a>
						</li>
						<li class="paginate_button active">
							<a href="#" aria-controls="user_data" data-dt-idx="1" tabindex="0">1</a>
						</li>
						<li class="paginate_button ">
							<a href="#" aria-controls="user_data" data-dt-idx="2" tabindex="0">2</a>
						</li>
							<li class="paginate_button next" id="user_data_next">
								<a href="#" aria-controls="user_data" data-dt-idx="3" tabindex="0">Suivant</a>
							</li>
					</ul></td></tr></table>
				</div>
				
			</div>
			</div>
			
			</div>
		</div>
	</body>
</html>

<div id="userModal" class="modal fade">
	<div class="modal-dialog">
		<form method="post" id="user_form" enctype="multipart/form-data" action="insert.php">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Ajouter un enfant</h4>
				</div>
				<div class="modal-body">
					<label>Nom</label>
					<input type="text" name="first_name" id="first_name" class="form-control" />
					<br />
					<label>Prenom</label>
					<input type="text" name="last_name" id="last_name" class="form-control" />
					<br />
					<label>Date de Naissance</label>
					<input type="Date" name="dateNaiss" id="dateNaiss" class="form-control" />
					<br />
					
					<label>Sex </label></br>
						<table border="2">
						<tr>
							
							<td><input type="radio" id="choixFille" name="sex" value="fille" checked="true"/> fille</td>
							
							<td><input type="radio" id="choixGarcon" name="sex" value="Garçon"/> Garçon</td>
							<td></td>
						</tr>
						</table>
					<br/>
					<HR align=center size=8 width="50%">
					<label>Papa</label></br>
					<table>
						<tr>
							<td> CIN:  <input type="text" name="cinpapa" id="cinpapa" class="form-control" /> </td>
							<td> Tel:  <input type="text" name="telpapa" id="telpapa" class="form-control" /> </td>
						</tr>
						<tr>
							<td> Nom:  <input type="text" name="nompapa" id="nompapa" class="form-control" /> </td>
							<td> Prénom :<input type="text" name="prenompapa" id="prenompapa" class="form-control" /></td>
						</tr>
					</table>
					<HR align=center size=8 width="50%">
					<label>Maman</label></br>
					<table>
						<tr>
							<td> CIN:  <input type="text" name="cinmama" id="cinmama" class="form-control" /> </td>
							<td> tel:  <input type="text" name="telmama" id="telmama" class="form-control" /> </td>
						</tr>
						<tr>
							<td> Nom:  <input type="text" name="nommama" id="nommama" class="form-control" /> </td>
							<td> Prénom :<input type="text" name="prenommama" id="prenommama" class="form-control" /></td>
						</tr>
					</table>
					<label>Choisir une image </label>
					<input type="file" name="user_image" id="user_image" />
					<span id="user_uploaded_image"></span>
					
					
				</div>
				<div class="modal-footer">
					<input type="hidden" name="user_id" id="user_id" />
					<input type="hidden" name="operation" id="operation" />
					<input type="submit" name="action" id="action" class="btn btn-success" value="Ajouter" />
					<button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
				</div>
			</div>
		</form>
	</div>	
</div>

</body>
</html>
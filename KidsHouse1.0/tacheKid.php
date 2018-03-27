<html>
	<head>
		<title>Tâche journalière d'un enfant</title>
		<link href="css/styletache.css" type="text/css" rel="stylesheet" media="all">   
	</head>
	<body>
		<h1>Fiche </h1>
		<table border="2">
			<tr>
				<td width="10%">Nom </td>
				<td width="20%">Rafif</td>
				<td align ="right" rowspan=2> <img src="images/e2.jpg"/></td>
				
			</tr>	
			<tr>
				<td width="10%">Prénom </td>
				<td width="20%">chakroun</td>
				
			</tr>
		</table>
	<p align="center"> Date :<input type="date" id="maDate"></p>
	
	<table>
		<tr>
			<td></td>
		</tr>
	</table>
	
	<table>
		<tr>
			<td> Sommeil </td>
			<td> Activité </td>
			<td> Plat </td>
			<td> Sport </td>
		</tr>
		<tr>
			<td><img src="" id="taswira"/></td>
			<td><img src="images/Icone/dodo.png" id="taswira"/></td>
			<td><img src="images/Icone/dish.png" id="taswira"/></td>
			<td><img src="" alt=""/></td>
		</tr>
	</table>
	<textarea>Rien a mentionner pour ce jour!!	</textarea>
	</body>
	<script>

	function setInputDate(_id){
    var _dat = document.querySelector(_id);
    var hoy = new Date(),
        d = hoy.getDate(),
        m = hoy.getMonth()+1, 
        y = hoy.getFullYear(),
        data;

		if(d < 10){
			d = "0"+d;
		};
		if(m < 10){
			m = "0"+m;
		};

		data = y+"-"+m+"-"+d;
		console.log(data);
		_dat.value = data;
	};

	setInputDate("#maDate");
</script>
</html>
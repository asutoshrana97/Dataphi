<!DOCTYPE HTML>
<html>
	<head>
		<title>Coding Challenge - DataPhi Labs</title>
		<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
		<script type="text/javascript" src="js/materialize.min.js"></script>
		<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
		<style>
			body{
				background-image: url('images/bg.jpg');
				background-repeat: no-repeat;
				background-position: center;
				background-size: 100%;
			}
			#patient_list{
				background-color: white;
				margin-top: -40px;
			}
			#patient_list li{
				border-bottom : 1px solid #F0F0F0;
				padding : 10px;
				background : grey;
				position : relative;

			}	
			table
			{
				margin-left: 20%;
				position: relative;
			}
		</style>
	</head>

	<body>
	<!-- Top Navigation panel -->

		<div class="row">
			<header>
			  <nav class="blue">
			    <div class="container col s9">
			      <div class="nav-wrapper col offset-s1">
			        <a href="index.html" class="brand-logo">Patients</a>
			      </div>			      
			    </div>
			    <div class="right hide-on-med-and-down">
				      <ul id="nav-mobile">
				        <li><a href="index.html">Add Patient Details</a></li>
				        <li class="active"><a href="search.php">Search Patient Directory</a></li>
				       </ul>
			      </div>
			  </nav>
			</header>
			
        </div>
        <div class="container">
        <div class="row"><div class="col s10 offset-s1" style="border-style: outset;background-color: #f0f0f0;">
	        <center>
	        	<p style="font-family: 'Palatino Linotype';font-size: 35px;text-shadow: 2px 2px #fff0f0">
	        		Search Patient
	        	</p>
	        </center>
		    <!-- <form name="details" method="GET" onsubmit="return(validate());"> -->
		    	
				<div class="row">
					<div class="input-field col s6 offset-s3">
						<input name="name" id="search_box" type="text">
						<label class="blue-text" for="search_box">Search Name</label>
					</div>
				</div>
					<div class="row"><div id="suggesstion_box" class="col s6 offset-s3"></div></div>
					<button type="submit"\ hidden name="submit"></button>
				
				<center><button id="search" class="waves-effect waves-light btn" name="submit" type="submit">Search
				</button></center>
				<br>
		    <!-- </form> -->
		    
				
	  </div></div>
	  	<div class="row"><div id="display_box" class="col s10 offset-s1">
					
			</div></div>
	  </div>

	  <script type="text/javascript">
	  	
			$(document).ready(function() {
				$('select').material_select();
			    $("#search_box").keyup(function(){
			    	$("#search_box").css("background","#F0F0F0");
			    	$.ajax({
						type: "GET",
						url: "gethint.php",
						data:'keyword='+$(this).val(),
						beforeSend: function(){
							
						},
						success: function(data){
							$("#suggesstion_box").show();
							$("#suggesstion_box").html(data);
						}
					});
				});
				$('#search').click(function(){
					$.ajax({
						type: "GET",
						url: "getdetails.php",
						data:'keyword='+$("#search_box").val(),
						beforeSend: function(){
							
						},
						success: function(data){
							//$("#display_box").show();
							$("#display_box").html(data);
							$("#display_box").css("border-style", "solid");
							$("#display_box").css("background-color", "#f0f0f0")
							//$("#search_box").css("background","#0FF");
						}
					});
				});
			});

			function validate(){

				if( document.details.DOB.value=='')
		         {
		         	alert( "Enter Date of Birth!" );
		         	document.details.DOB.focus();
		         	return false;
		         }
				if( document.details.first_name.value == "" )
		         {
		            alert( "Please provide your first name!" );
		            document.details.first_name.focus() ;
		            return false;
		         }
		         if( document.details.last_name.value == "" )
		         {
		            alert( "Please provide a valid last name!" );
		            document.details.last_name.focus() ;
		            return false;
		         }
		         if( document.details.age.value=="" || document.details.age.value < 5 || document.details.age.value > 150 )
		         {
		         	alert( "Enter a Valid age!" );
		         	document.details.age.focus();
		         	return false;
		         }		         
		         if( document.details.phone.value == "" ||
			         isNaN( document.details.phone.value ) ||
			         document.details.phone.value.length < 10 )
		         {
		            alert( "Contact number is incorrect!" );
		            document.details.phone.focus() ;
		            return false;
		         }

			}

			function selectPatient(val) {
				$("#search_box").val(val);
				$("#search_box").css("background","#5FF");
				$("#suggesstion_box").hide();				
			}
	  	
	  </script>
	</body>

</html>
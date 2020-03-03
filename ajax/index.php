<!DOCTYPE html>
<html>
	<head>
		<title>Text AJAX</title>
	    <script src="../jquery.js"></script>
	    <style>
	    	*{
	    		padding: 0;
	    		margin: 0;
	    		color: white;
	    	}
	    	body{
	    		background-image: url("bg.jpg");
	    		background-size: cover;
	    		background-position: center;
	    		object-fit: cover;
	    		height:80vh;
	    	}
	    	form{
				padding: 20px;
	    	}
	    	p{
	    		margin-bottom: 5px;
	    		font-size: 18px;
	    	}
	    	.submit{
	    		margin-top: 10px;
	    		color: black;
	    		width: 75px;
	    		background-color: lightgreen;
	    		border:none;
	    		padding: 5px;
	    		border-radius: 4px;
	    	}
	    	.input{
	    		height:30px;
	    		background-color: transparent;
	    		border:none;
	    		border-bottom: 2px solid lightgreen;
	    		width: 100%;
	    		margin-bottom:8px;
	    	}

	    	.container{
				display: flex;
				justify-content: flex-start;
				flex-direction: column;
				box-sizing: border-box;
				padding: 10px 0 0;
	    		margin: 10% auto;
	    		width: 450px;
	    		height: 400px;
	    		background-color: rgba(0,0,0,0.9);
	    		border-radius: 10px;
	    		border:1px solid lightgreen;
	    	}
	    	#content{
				padding-left: 20px;
	    	}
	    	.title{
	    		font-size: 28px;
	    	}
	    </style>
	</head>
	<body>
		<div class="container">
			<center><p class="title">Intro grub</p></center>
			<form action="simpan.php" method="POST">
				<p>Nama</p><input class="input" type="text" name="nama" placeholder="Nama anda . . . "><br>
				<p>Alamat</p><input class="input" type="text" name="alamat" placeholder="Alamat anda . . ."><br>
				<input type="submit" class="submit" name="submit" value="SUBMIT">
			</form>
			<div id="hasil">
				<div id="content">
				</div>
			</div>
		</div>
		<script>
			$(document).ready(function () {
				loadData();

				$('form').on('submit',function(e){
					e.preventDefault();
					$.ajax({
						type:$(this).attr('method'),
						url:$(this).attr('action'),
						data:$(this).serialize(),
						success:function(){
							loadData();
							resetForm();
						}
					});
				})
			})

			function loadData(){
				$.get('data.php',function(data){
					$('#content').html(data);
					$('.hapusData').click(function(e){
						e.preventDefault();
						$.ajax({
						type:'get',
						url:$(this).attr('href'),
						success:function(){
							loadData();
						}
					});
					});
					$('.updateData').click(function(e){
						e.preventDefault();
						$('[name=nama]').val($(this).attr('nama'));
						$('[name=alamat]').val($(this).attr('alamat'));
						$('form').attr('action',$(this).attr('href'));
					});
				})
			}

			function resetForm(){
				$('[type=text]').val('');
				$('[name=nama]').focus();
				$('form').attr('action','simpan.php');
			}
		</script>
	</body>
</html>
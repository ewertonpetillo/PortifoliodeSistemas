<?php
	include "menu.php"
  ?>

  <form class="form-control"  action= "" method="post" >
      	<div class="text-center mb-4" >
			<h1 class="h2">Cadastro de Turma</h1>
      	</div>
	    <div class="row mb-3">
	     	<div class="col-md-6">
	     		<label>Série:</label>
	        	<select id="serie" class="form-control" placeholder="Série">
        			<option>1º PERÍODO</option>
        			<option>2º PERÍODO</option>
        			<option>1º ANO</option>
        			<option>2º ANO</option>
        			<option>3º ANO</option>
        			<option>4º ANO</option>
        			<option>5º ANO</option>
      			</select>
	        </div>	 
	        <div class="form-group col-md-6">
	        	<label>Turma:</label>
	        	<select id="turma" class="form-control" placeholder="Turma">
        			<option>A</option>
        			<option>B</option>
        			<option>C</option>
        			<option>D</option>
      			</select>
	        </div>
	               
	    </div>
	    <div class="row mb-3">
	     	<div class="col">
	     			<label>Professora:</label>
	        	<input id="nome_professora" class="form-control" placeholder="Professora" required="" autofocus="" type="name" name="nome_professora" >
	        </div>
	        <div class="form-group col-md-3">
	        	<label>Turno:</label>
	        	 <select id="turno" class="form-control" placeholder="Turno">
        			<option>Matutino</option>
        			<option>Vespertino</option>
      			</select>
	        </div>	
	        <div class="form-group col-md-3">
	        		<label>Sala:</label>
	        	<select id="sala" class="form-control" placeholder="Sala">
        			<option>01</option>
        			<option>02</option>
        			<option>03</option>
        			<option>04</option>
        			<option>05</option>
        			<option>06</option>
        			<option>07</option>
        			<option>08</option>
        			<option>09</option>
      			</select>
	        </div>	
	    </div>    
	    <div class="text-center mb-4" >
	        <button type="submit" class="btn btn-success">Salvar</button>
	      	<button type="button" class="btn btn-danger">Excluir</button>	
	      	<button type="button" class="btn btn-warning">Editar</button>
	      	<button type="button" class="btn btn-secondary">Cancelar</button>

	    </div>
	    </form>
  
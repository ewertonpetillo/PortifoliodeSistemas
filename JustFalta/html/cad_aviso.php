<?php
	include "menu.php";	
  ?>

  <form class="form-control"  action= "../Controller/aviso_control.php" method="post" >
      	<div class="text-center mb-4" >
			<h1 class="h2">Registrar um aviso</h1>
      	</div>
	    <div class="row mb-3">
	        <div class="col">
	        	 <input id="desc_aviso" class="form-control" placeholder="Aviso" autofocus="" type="text" name="desc_aviso">
	        </div>	        
	    </div>
	    <div class="row mb-3">
	        <div class="form-group col-md-6">
	        	 <input id="dtaviso" class="form-control" placeholder="Data do Aviso" autofocus="" type="date" name="dtaviso">
	        </div>	
	        <div class="form-group col-md-6">
	        	<select id="turma_aluno" class="form-control" placeholder="Turma" name="status_aviso">
	        		<option value="LIDO">LIDO</option>
	        		<option value="PENDENTE">PENDENTE</option>
       			</select>
	        </div>	
	    </div>    
	    <div class="text-center mb-4" >
	        <button type="submit" class="btn btn-success" name="crud" value="salvar">Salvar</button>
	      	<button type="submit" class="btn btn-secondary" name="crud" value="principal">Cancelar</button>

	    </div>
	    </form>
  



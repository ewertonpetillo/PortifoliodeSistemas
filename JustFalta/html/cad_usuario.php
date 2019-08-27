<?php
	include "menu.php"
  ?>

  <form class="form-control"  action= "../Controller/usuario_control.php" method="post" >
      	<div class="text-center mb-4" >
			<h1 class="h2">Manutenção de Usuários</h1>
      	</div>
	    <div class="row mb-3">
	     	<div class="form-group col-md-9">
	        	<input id="usuario" class="form-control " placeholder="Nome" autofocus="" type="name" name="nome" >
	        </div>
	        <div class="form-group col-md-3">
	        	<select id="funcao" class="form-control" placeholder="Função" name="funcao">
        			<option value="GESTOR(A)">Gestor(a)</option>
        			<option value="SECRETÁRIO(A)">Secretario(a)</option>
        			<option value="PEDAGOGO(A)">Pedagogo(a)</option>
        			<option value="ADMINISTRATIVO(A)">Administrativo(a)</option>
      			</select>
	        </div>      
	    </div>
	    <div class="row mb-6">
	     	<div class="col">
	        	<input id="inputEmail" class="form-control" placeholder="Email"  autofocus="" type="email" name="email" >
	        </div>
	        <div class="form-group col-md-6">
	        	<input id="inputSenha" class="form-control" placeholder="Senha"  autofocus="" type="password" name="senha" >
	        </div>	
	        
	    </div>    
	    <div class="text-center mb-4" >
	        <button type="submit" class="btn btn-success" name="crud" value="salvar">Salvar</button>
	       	<button type="submit" class="btn btn-warning" name="crud" value="altera">Alterar</button>
	      	<button type="submit" class="btn btn-secondary" name="crud" value="troca">Trocar Senha</button>

	    </div>
	    </form>
  
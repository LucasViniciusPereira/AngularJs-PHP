<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="row form-group">
	<label class="col-md-1 control-label">Descrição</label>
	<div class="col-md-5">
		<input type="text" class="form-control" ng-model="txtDescicaoProduto" />
	</div>
	
	<!-- Button trigger modal -->
	<button type="button" class="btn btn-info" id="myModal" data-toggle="modal" 
	data-target="#myModal" ng-click="openModal(myModal)">
	<i class="glyphicon glyphicon-plus"></i> Novo Produto
</button>

</div>
<hr>
<div class="row">
	<!-- Loading de Delete registro -->
	<div ng-show="loadingDelete" class="text-center">
		<img src="<?php echo base_url('content/preloader.gif') ?>" />&nbsp;&nbsp;Excluindo registro...
	</div>
	<!-- Loading de Delete registro -->
	<div ng-show="loadingGridView" class="text-center">
		<img src="<?php echo base_url('content/preloader.gif') ?>" />&nbsp;&nbsp;Buscando Registros...
	</div>
	<br>
	<div class="col-md-12" ng-show="lstProdutos.length > 0">
		<table class="table table-hover table-bordered">
			<thead>
				<tr>
					<td>ID</td>
					<td>Descrição</td>
					<td>Preço</td>
					<td>Data Cadastro</td>
					<td>Excluir</td>
				</tr>
			</thead>
			<tbody>
				<tr ng-repeat="item in lstProdutos | filter: txtDescicaoProduto">
					<td>{{item.id}}</td>
					<td>{{item.descricao}}</td>
					<td>{{item.preco | currency: 'R$ '}}</td>
					<td>{{item.dtVencimento | date}}</td>
					<td>
						<button type="button" class="btn btn-danger" 
						ng-click="removeProduto(item.id)" ng-disabled="loadingDelete">
						<i class="glyphicon glyphicon-trash"></i> Excluir</button>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
	
	<!-- Se não hover registros -->
	<div ng-show="lstProdutos.length == 0 && loadingGridView == false">
		<div class="alert alert-info" role="alert">Nenhum registro foi encontrado... </div>
	</div>
</div>
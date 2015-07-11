<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel"><i class="glyphicon glyphicon-pencil"></i> Cadastro de Produtos</h4>
			</div>
			<div class="modal-body" >
				<div ng-show="loadingSave" class="text-center">
					<img src="<?php echo base_url('content/preloader.gif') ?>" />&nbsp;&nbsp;Salvando registro...
				</div>
				<br>
				<form class="form-horizontal" ng-submit="addProduto()" >
					<div class="form-group">
						<label for="txtDescricao" class="col-sm-2 control-label">Descrição</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="descricao" id="txtDescricao" placeholder="Descrição do produto" 
							ng-model="Descricao" required>
						</div>
					</div>
					<div class="form-group">
						<label for="txtPreco" class="col-sm-2 control-label">Preço</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="preco" id="txtPreco" placeholder="R$ 10,00" ng-model="Preco" ui-money-mask="mdecimals" required>
						</div>
					</div>
					<div class="form-group">
						<label for="txtDtVencimento" class="col-sm-2 control-label">Data Cadastro</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="dtVencimento" id="txtDtVencimento" placeholder="" ng-model="DtVencimento" required>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10 pull-right">
							<button type="button" class="btn btn-danger" data-dismiss="modal" ng-disabled="loadingSave" ><i class="glyphicon glyphicon-remove"></i> Fechar</button>
							<button type="submit" class="btn btn-success" ng-disabled="loadingSave" ><i class="glyphicon glyphicon-ok"></i> Salvar</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
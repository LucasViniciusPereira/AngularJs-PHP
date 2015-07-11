<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Lista de Produtos</title>
	<!-- CARREGAMENTO CSS -->
	<link rel="stylesheet" href="<?php echo base_url('content/css/bootstrap.min.css') ?>"></link>
	<link rel="stylesheet" href="<?php echo base_url('content/css/toastr.min.css') ?>"></link>
</head>
<body ng-app="crudMVC">

	<section class="container" ng-controller="homeController">

		<!-- Carregamento do Modal de Cadastro -->
		<?php $this->load->view('_create'); ?>
		
		<header class="text-center">
			<h2>CRUD - <small>Angular.js com codeingniter PHP</small></h2>
			<hr>
		</header>
		
		<article>
			<div class="row">
				<div class="col-md-12">
					<!-- Carregamento da view -->
					<?php $this->load->view('_list'); ?>
				</div>
			</div>
		</article>

	</section>

	<!-- CARREGAMENTO JavaScript -->
	<script type="text/javascript" src="<?php echo base_url('content/js/jquery-2.1.4.min.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('content/js/bootstrap.min.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('content/js/angular.min.js') ?>"></script>
	
	<script type="text/javascript" src="<?php echo base_url('content/js/angular.local.pt-BR.min.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('content/js/bootstrap-datepicker.min.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('content/js/bootstrap-datepicker.pt-BR.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('content/js/masks.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('content/js/scale.fix.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('content/js/toastr.min.js') ?>"></script>
	
	<script type="text/javascript" src="<?php echo base_url('content/js/custom.js') ?>"></script>

	<script>
		/* Criando um modulo para aplicação */
		/* Definindo a Dependência do ngRoute */
		var module = angular.module('crudMVC', ['ui.utils.masks']);

		/*Criando um controller para a view*/
		module.controller('homeController', function homeController($scope, $http){

			/*Propriedades*/
			$scope.lstProdutos = [];
			$scope.loadingSave = false;
			$scope.loadingDelete = false;
			$scope.loadingGridView = false;

			/* Preenche a lista de produtos do BD */
			$scope.Atuliza = function(){
				$scope.loadingGridView = true;
				$http.get("<?php echo site_url('home/ajax_get_produtos'); ?>").success(function(data){
					$scope.loadingGridView = false;
					$scope.lstProdutos = data;
				});
			};

			/*Atualizar a lista de Produtos*/
			$scope.Atuliza();

			/*Adicionar produto da lista*/
			$scope.addProduto = function(){
				$scope.loadingSave = true;

				var obj = {descricao: $scope.Descricao, preco: $scope.Preco, dtVencimento: $scope.DtVencimento};
				var url = "<?php echo site_url('home/ajax_set_produtos'); ?>";
				
				postData(url, obj, 
					function(){ 
						$scope.loadingSave = false;
						$scope.clear();	
						$scope.Atuliza();

						toastr.success('Registro inserido com sucesso', 'Sucesso');
					}, 
					function(){
						toastr.error('Erro ao inserir registro, Tente novamente.', 'Error');
					} 
					);
			};

			/*Rmover produto da lista*/
			$scope.removeProduto = function(_id){
				$scope.loadingDelete = true;

				var obj = { id: _id };
				var url = "<?php echo site_url('home/ajax_exclude_produtos'); ?>";

				postData(url, obj, 
					function(){
						$scope.loadingDelete = false;
						$scope.Atuliza();
						toastr.success('Registro excluido com sucesso', 'Sucesso');
					}, 
					function(){
						toastr.error('Erro ao excluir o registro, Tente novamente.', 'Error');
					} 
				);
			}

			/*Limpar os campos do Modal*/
			$scope.clear = function(){
				$scope.Descricao = '',
				$scope.Preco = '',
				$scope.DtVencimento = ''
			}
		});
</script>
</body>
</html>
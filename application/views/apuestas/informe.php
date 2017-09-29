<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<html lang="es">
<head>
	<?php $this->load->view('overall/header'); ?>
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>public/plugins/datatables/css/dataTables.bootstrap.css">
</head>

<body class="components-page">
	<?php $this->load->view('overall/nav2'); ?>


	<div class="main main-raised">
		<div class="section">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-8 content col-md-offset-2">	
						<h2 align="center">Informe</h2>
						<table  width="100%">
							<tr>
								<td>
									<div class="form-group">
										<label for="fecha">Inicio : </label>
										<input type="date" class="form-control" id="from" >
									</div>
								</td>
								<td>
									<div class="form-group">
										<label for="fecha">Fin : </label>
										<input type="date" class="form-control" id="to">
									</div>
								</td>
								<td>
									<div>
										&nbsp;<button class="btn btn-Primary" id="go">Go</button>
									</div>
								</td>
							</tr>
						</table>	
						<table class="table table-striped table-hover dataTable" id="match" >
							<thead>
								<tr>
									<th colspan="9" class="text-center success">Apuestas</th>
								</tr>
								<tr>
									<th width=""># Tiquete</th>
									<th width="">Eventos</th>
									<th width="">Fecha</th>
									<th width="">Recaudos</th>
									<th width="">Premios</th>
									<th width="">Estado</th>
									<th width="">Resultado</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th colspan="3" style="text-align:right"></th>
									<th></th>
									<th  colspan="2"></th>
								</tr>
							</tfoot>
							<tbody> 
							</tbody>
						</table>									

					</div>
				</div>
				<?php $this->load->view('overall/footer'); ?>
				<script type="text/javascript" src="<?= base_url(); ?>public/plugins/datatables/js/jquery.dataTables.js"></script>
				<script type="text/javascript" src="<?= base_url(); ?>public/plugins/datatables/js/dataTables.bootstrap.js"></script>
				<script type="text/javascript">
					$(document).ready(function() {
						var url= '<?= base_url(); ?>';
						$("#from").val(moment().subtract(3, 'days').format('YYYY-MM-DD'));
						$("#to").val(moment().format('YYYY-MM-DD'));


						var table =   $('.dataTable').DataTable({
							"bPaginate": true,
							"bLengthChange": false,
							"bFilter": true,
							"bInfo": true,
							"bAutoWidth": false,
							"order": [[ 2, 'desc' ], [ 5, 'asc' ]],
							"lengthMenu": [[10, 50, 100, -1], [10, 50, 100, "All"]],
							"iDisplayLength": 100,
							"footerCallback": function ( row, data, start, end, display ) {
								var api = this.api(), data;


								var intVal = function ( i ) {
									return typeof i === 'string' ?
									i.replace(/[\$.]/g, '')*1 :
									typeof i === 'number' ?
									i : 0;
								};


								totalRecaudos = api
								.column( 3 )
								.data()
								.reduce( function (a, b) {
									return intVal(a) + intVal(b);
								}, 0 );

								totalPerdidas = api
								.column( 4 )
								.data()
								.reduce( function (a, b) {
									return intVal(a) + intVal(b);
								}, 0 );

								pageTotalRecaudos = api
								.column( 3, { page: 'current'} )
								.data()
								.reduce( function (a, b) {
									return intVal(a) + intVal(b);
								}, 0 );


								$( api.column( 3 ).footer() ).html(
            						//'$'+$.number(pageTotalRecaudos, 0, ',', '.' ) +' ( $'+ $.number(totalRecaudos, 0, ',', '.' )  +' total)'
            						'$'+ $.number(totalRecaudos, 0, ',', '.' )  
            						);
								$( api.column( 4 ).footer() ).html(
									'$'+ $.number(totalPerdidas, 0, ',', '.' )  
									);
							}
						});

						function get_apuestas (from, to) {
							$.ajax({
								dataType: 'json',
								async: true,
								url: url+'ajax/json_informe',
								type: 'post',
								data: {from: from, to:to},
								success: function(data){

									if (data!=null) {
										$.each(data, function(a, row) {
											var rowNode=   table.row.add( [ 
												''+row.FECHA+'',
												''+row.P_NOMBRE+' '+row.P_APELLIDO+'',
												''+row.FECHA+'',
												''+$.number(row.VALOR, 0, ',', '.' )+'',
												''+$.number(row.GANANCIA, 0, ',', '.' )+'',
												'<span class="label label-warning ">'+row.ESTADO+'</span>',
												'<span class="label label-warning ">'+row.RESULTADO+'</span>',
												
												] )
											.draw()
											.node();
										});
									}
									
								},
								error: function(e){
									console.log(e);
								}
							});
						}

						var from = $("#from").val();
						var to   = $("#to").val();

						get_apuestas(from, to);


						$( "#go" ).click(function() {
							table
							.clear()
							.draw();
							get_apuestas($('#from').val(), $('#to').val(), $( "#filtro option:selected" ).text());
						});





					} );
				</script>
				</html>

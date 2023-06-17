<div class="modal fade" id="dadosOS">
    <div class="modal-dialog modal-lg">
        <div class="modal-content bg-white">
            <div class="modal-header bg-primary">
                <h4 class="modal-title">Produtos e Serviços da Ordem</h4>

            </div>
            <div class="modal-body">
                <div class="row">

                    <div class="widget-header widget-header-large">
                        <h3 class="widget-title grey lighter">
                            <i class="ace-icon fa fa-leaf green"></i>
                            Dados da ordem de serviço
                        </h3>

                        <div class="widget-toolbar no-border invoice-info">
                            <input type="hidden" id="OsID">
                            <input type="hidden" id="status">
                            <span class="invoice-info-label">Numero da NF:</span>
                            <span id="nf" class="red"></span>

                            <br />
                            <span class="invoice-info-label">Data abertura:</span>
                            <span id="data_abertura" class="blue"></span>
                        </div>

                        <div class="widget-toolbar hidden-480">
                            <a href="#">
                                <i class="ace-icon fa fa-print"></i>
                            </a>
                        </div>
                    </div>

                    <div id="div_produto" class="col-sm-6">
                        <div class="row">
                            <div>
                                <button class="col-xs-11 label label-lg label-info arrowed-in arrowed-right" id="btn-toggle-div"><b>Adicionar produtos</b> </button>
                            </div>


                        </div>
                    </div><!-- /.col -->

                    <div id="div_servico" class="col-sm-6">
                        <div class="row">
                            <div>
                                <button class="col-xs-11 label label-lg label-info arrowed-in arrowed-right" id="btn-toggle-div-serv"><b>Adicionar servicos</b> </button>
                            </div>


                        </div>
                    </div><!-- /.col -->

                    <div class="col-md-12 col-xs-12">
                        <hr>


                        <div id="div-produtos" style="display: none;">
                            <h3 class="widget-title grey lighter">
                                <i class="ace-icon fa fa-shopping-cart green"></i>
                                Lista de produtos
                            </h3>

                            <table id="tabela-produtos" class="table table-striped table-bordered table-hover">

                                <thead>
                                    <tr class="list_prod">
                                        <th>Produto</th>
                                        <th>Estoque</th>
                                        <th>Valor</th>
                                        <th>Quantidade</th>
                                        <th>Selecionar</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                            <button style="float: right; margin-top: 10px;" id="btn-gravar" class="btn btn-success btn-xs" type="button">Incluir produto</button>

                        </div>
                    </div>

                    <div class="col-md-12 col-xs-12">



                        <div id="div-servicos" style="display: none;">
                            <h3 class="widget-title grey lighter">
                                <i class="ace-icon fa fa-cogs green"></i>
                                Lista de serviços
                            </h3>

                            <table id="tabela-servicos" class="table table-striped table-bordered table-hover">

                                <thead>
                                    <tr>
                                        <th>Serviços</th>
                                        <th>Valor</th>
                                        <th>Selecionar</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                            <button style="float: right; margin-top: 10px;" id="btn-gravar-serv" class="btn btn-success btn-xs" type="button">Incluir serviço</button>

                        </div>
                    </div>
                    <div class="col-md-12 col-xs-12" id="div_listagem_itens_os" style="display:none">
                        <h3 class="widget-title grey lighter">
                            <i class="ace-icon fa fa-list green"></i>
                            Produtos e serviços adicionados na ordem de serviço
                        </h3>
                        <div class="table-responsive">
                            <table id="tabela-itens_os" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Descrição</th>
                                        <th>Tipo</th>
                                        <th>Quantidade</th>
                                        <th>Valor Unitário</th>
                                        <th>Valor Total</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- As linhas dos itens serão adicionadas aqui dinamicamente -->
                                </tbody>
                                <!--  <tfoot>
                                <tr style="background-color:#ddd">
                                    <td colspan="5">Total Geral:</td>
                                    <td></td>
                                </tr>
                            </tfoot> -->
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" id="btnCancelar" onclick="FechandoModalOS()" class="btn btn-info" data-dismiss="modal">Salvar dados</button>

            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<script>
    /* $(window).on("load", function(){
   // página totalmente carregada (DOM, imagens etc.)
   $("#nome").focus();
   $("#nome").reset();
}); */
</script>
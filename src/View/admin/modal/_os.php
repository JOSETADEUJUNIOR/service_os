<div class="modal fade" id="ordem">
    <div class="modal-dialog modal-lg">
        <div class="modal-content bg-white">
            <div class="modal-header bg-primary">
                <h4 class="modal-title">Ordem de Serviço</h4>

            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Numero NF</label>
                            <input type="hidden" id="OsID">
                            <input class="form-control obg" id="numeroNF" name="numeroNF" placeholder="Numero NF">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Data da OS</label>
                            <input type="date" class="form-control obg" id="dtInicial" name="dtInicial" value="<?= date("Y-m-d") ?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control obg" id="status" name="status">
                                <option value="">Selecione</option>
                                <option value="<?= ORDEM_EM_ABERTO ?>">Em aberto</option>
                                <option value="<?= ORDEM_EM_ANDAMENTO ?>">Em andamento</option>
                                <option value="<?= ORDEM_CANCELADA ?>">Cancelada</option>
                                <option value="<?= ORDEM_CONCLUIDA ?>">Concluída</option>

                            </select>
                        </div>
                    </div>
                    <!-- <div class="col-md-12">
                        <div class="form-group">
                            <label>Titulo da OS</label>
                            <input class="form-control obg" id="titulo" name="titulo" placeholder="Titulo da OS">
                        </div>
                    </div> -->
                    <div class="col-md-12">
                        <!-- <input type="hidden" name="OsID" id="OsID" value="<?= $OsID != '' ? $ordemOS[0]['OsID'] : '' ?>">
                        <input type="hidden" name="ValorOS" id="ValorOS" value="<?= $ordemOS[0]['OsValorTotal'] ?>"> -->
                        <div class="form-group">
                            <label>Cliente</label>
                            <select class="form-control obg" id="Oscliente" name="Oscliente">
                                <option value="">Selecione</option>
                                <?php foreach ($clientes as $cliente) { ?>
                                    <option value="<?= $cliente['CliID'] ?>"><?= $cliente['CliNome'] ?></option>
                                <?php } ?>

                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Descrição</label>
                            <textarea class="form-control obg" id="descProd" name="descProd" style="resize: vertical" placeholder="Descreva aqui...."></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Defeito</label>
                            <textarea class="form-control obg" id="defeito" name="defeito" style="resize: vertical" placeholder="Defeito...."></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Observação</label>
                            <textarea class="form-control obg" id="obs" name="obs" style="resize: vertical" placeholder="Observação...."></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Laudo Técnico</label>
                            <textarea class="form-control" id="laudo" name="laudo" style="resize: vertical" placeholder="Laudo técnico...."></textarea>
                        </div>
                    </div>
                    <div id="DivProduto" style="display:none">
                        <div class="col-md-9">
                            <form id="form_itens_os">
                                <div class="form-group">
                                    <label>Produto</label>
                                    <select class="chosen-select" data-placeholder="Selecione o produto" id="produto" name="produto" style="width: 100%;">
                                        <option value="">Selecione...</option>
                                        <?php foreach ($produtos as $produto) { ?>
                                            <option value="<?= $produto['ProdID'] ?>"><?= $produto['ProdDescricao'] . '| Preço: ' . $produto['ProdValorVenda'] . '| Estoque: ' . $produto['ProdEstoque'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Quantidade</label>
                                <input class="form-control" name="qtdProd" id="qtdProd">
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group">
                                <label>Add</label>
                                <button class="form-control btn btn-success btn-xs" onclick="return InserirProd()" name="btnAddItem"><i class="fa fa-edit"></i></button>
                            </div>
                        </div>
                        </form>
                        <?php # aqui abaixo vai ser carregado os serviços 
                        ?>
                        <div class="col-md-9">
                            <form id="form_serv_os">
                                <div class="form-group">
                                    <label>Serviço</label>
                                    <select class="chosen-select" data-placeholder="Selecione o produto" id="servico" name="servico" style="width: 100%;">
                                        <option value="">Selecione...</option>
                                        <?php foreach ($servicos as $servico) { ?>
                                            <option value="<?= $servico['ServID'] ?>"><?= $servico['ServNome'] . '| Preço: ' . $servico['ServValor'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Quantidade</label>
                                <input class="form-control" name="qtdServ" id="qtdServ">
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group">
                                <label>Add</label>
                                <button class="form-control btn btn-success btn-xs" onclick="return InserirServ('form_serv_os')" name="btnAddItem"><i class="fa fa-edit"></i></button>
                            </div>
                        </div>
                        </form>




                    </div>




                </div>
                <div id="tabela_result_item">
                    <table id="dynamic-table" class="table table-striped table-bordered table-hover bg-primary">
                        <thead>
                            <tr>
                                <th class="sorting_desc">Nome produto</th>
                                <th class="hidden-480">Quantidade</th>
                                <th class="hidden-480">Valor</th>
                                <th class="hidden-480">Valor Total</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php for ($i = 0; $i < count($ProdOrdem); $i++) { ?>
                                <tr>
                                    <td>
                                        <?= $ProdOrdem[$i]['ProdDescricao'] ?>
                                    </td>
                                    <td class="hidden-480">
                                        <span class="label label-sm label-warning"><?= $ProdOrdem[$i]['ProdOsQtd'] ?></span>
                                    </td>
                                    <td class="hidden-480">
                                        <span class="label label-sm label-warning"><?= $ProdOrdem[$i]['ProdValorVenda'] ?></span>
                                    </td>
                                    <td class="hidden-480">
                                        <span class="label label-sm label-warning"><?= $ProdOrdem[$i]['ProdOsSubTotal'] ?></span>
                                    </td>
                                    <td>
                                        <input type="hidden" id="ExcluirID" name="ExcluirID">
                                        <input type="hidden" id="ExcluirOsID" name="ExcluirOsID">
                                        <input type="hidden" id="ExcluirProdID" name="ExcluirProdID">
                                        <input type="hidden" id="ExcluirQtd" name="ExcluirQtd">
                                        <div class="hidden-sm hidden-xs action-buttons">

                                            <a class="red" href="#modalExcluir" data-toggle="modal" onclick="ExcluirModal('<?= $ProdOrdem[$i]['ProdOsID'] ?>','<?= $ProdOrdem[$i]['ProdDescricao'] ?>')">
                                                <i title="Excluir Setor" class="ace-icon fa fa-trash-o bigger-130"></i>
                                            </a>
                                        </div>
                                        <div class="hidden-md hidden-lg">
                                            <div class="inline pos-rel">
                                                <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
                                                    <i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
                                                </button>

                                                <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                                    <li>
                                                        <a href="#modalExcluir" role="button" data-toggle="modal" class="tooltip-error" title="Delete" onclick="ExcluirModal('<?= $setor[$i]['id'] ?>', '<?= $setor[$i]['nome_setor'] ?>')">
                                                            <span class="red">
                                                                <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                                            </span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                </div>









            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" id="btnCancelar" onclick="FechandoModal('form_os')" class="btn btn-info" data-dismiss="modal">Cancelar</button>
                <button name="btnGravar" class="btn btn-success" onclick="return CadastrarOs('form_os')">Salvar</button>
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
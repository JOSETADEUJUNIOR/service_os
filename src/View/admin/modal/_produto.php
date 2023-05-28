<div class="modal fade" id="produto">
    <div class="modal-dialog modal-xs">
        <div class="modal-content bg-white">
            <div class="modal-header bg-primary">
                <h4 class="modal-title">Produto</h4>

            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group col-md-12">
                            <label>Nome/Descrição</label>
                            <input type="hidden" name="ProdID" id="ProdID">
                            <input type="hidden" name="OldImagem" id="OldImagem">
                            <input type="hidden" name="OldPath" id="OldPath">
                            <textarea class="form-control obg" id="ProdDescricao" maxlength="100" name="ProdDescricao" style="resize: vertical" placeholder="Digite aqui...." maxlength="1000"></textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <label>Código de Barra</label>
                            <input type="text" class="form-control obg num" id="ProdCodBarra" name="ProdCodBarra" placeholder="Digite aqui...." maxlength="100">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Valor Campra</label>
                            <input class="form-control obg dinheiro num" id="ProdValorCompra" name="ProdValorCompra" placeholder="Digite aqui....">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Valor Venda</label>
                            <input class="form-control obg dinheiro num" id="ProdValorVenda" name="ProdValorVenda" placeholder="Digite aqui....">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Estoque</label>
                            <input class="form-control obg num" id="ProdEstoque" name="ProdEstoque" placeholder="Digite aqui....">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Estoque Mínimo</label>
                            <input class="form-control obg num" id="ProdEstoqueMin" name="ProdEstoqueMin" placeholder="Digite aqui....">
                        </div>
                        <center>
                            <img style="display: none;" id="imgProd" height="100px" width="150px" alt="Photo 2" class="img-fluid obg">
                            <p>
                        </center>
                        <!-- <div class="form-group col-md-12">
                            <label class="ace-file-input">
                                <input type="file" class="form-control" id="ProdImagem" name="ProdImagem" placeholder="Digite aqui...." maxlength="100">
                                <span class="ace-file-container" data-title="Arquivo">
                                    <span class="ace-file-name" data-title="Selecione um arquivo">
                                        <i class=" ace-icon fa fa-upload"></i>
                                    </span>
                                </span>
                            </label>
                        </div> -->
                        <div class="form-group col-md-12">
                            <input type="file" class="form-control" id="ProdImagem" name="ProdImagem">
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" onclick="FechandoModal('form_produto'); LimparImgProdutoAjx();" class="btn btn-info" data-dismiss="modal">Cancelar</button>
            <button name="btnGravar" class="btn btn-success" onclick="return CadastrarProduto('form_produto')">Salvar</button>
        </div>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
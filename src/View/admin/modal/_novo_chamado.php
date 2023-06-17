<div class="modal fade" id="novoChamado">
    <div class="modal-dialog modal-xs">
        <div class="modal-content bg-white">
            <div class="modal-header bg-primary">
                <h4 class="modal-title">Novo Chamado</h4>

            </div>
            <div class="modal-body">
                <div class="row">
                <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label>Numero da NF</label>
                            <input class="form-control obg" id="numero_nf" name="numero_nf">
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label>Data abertura</label>
                            <input class="form-control obg" type="date" id="data_abertura" name="data_abertura" value="<?= date('Y-m-d') ?>" disabled>
                        </div>
                    </div>
                    <div class="col-md-12 col-xs-12">
                        <input type="hidden" name="idCliente" id="idCliente">
                        <div class="form-group">
                            <label>Escolha o Cliente</label>
                            <select class="form-control obg" id="cliente" name="cliente">

                            </select>
                        </div>
                    </div>
                    <!--  <div class="col-md-12">
                        <input type="hidden" name="idProduto" id="idProduto">
                        <div class="form-group">
                            <label>Escolha o Produto</label>
                            <select class="form-control" id="produto" name="produto">

                            </select>
                        </div>
                    </div> -->
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label>Descrição</label>
                            <textarea class="form-control obg" id="descricao_problema" name="descricao_problema" style="resize: vertical" placeholder="Digite o aqui...."></textarea>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label>Defeito</label>
                            <textarea class="form-control obg" id="defeito" name="defeito" style="resize: vertical" placeholder="Defeito...."></textarea>
                        </div>
                    </div>
                    <div class="col-md-12 col-xs-12">
                        <div class="form-group">
                            <label>Observação</label>
                            <textarea class="form-control obg" id="observacao" name="observacao" style="resize: vertical" placeholder="Observação...."></textarea>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" id="btnCancelar" onclick="FechandoModal('form_chamado')" class="btn btn-info" data-dismiss="modal">Cancelar</button>
                <button name="btnGravar" class="btn btn-success" onclick="return AbrirChamado('form_chamado')">Salvar</button>
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
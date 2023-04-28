<div class="modal fade" id="os">
    <div class="modal-dialog modal-xs">
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
                            <input type="date" class="form-control obg" id="dtInicial" name="dtInicial" value="<?= date("Y-m-d")?>">
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
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Titulo da OS</label>
                            <input class="form-control obg" id="titulo" name="titulo" placeholder="Titulo da OS">
                        </div>
                    </div>
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
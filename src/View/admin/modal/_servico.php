<div class="modal fade" id="servico">
    <div class="modal-dialog modal-xs">
        <div class="modal-content bg-white">
            <div class="modal-header bg-primary">
                <h4 class="modal-title">Servicos</h4>

            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Nome</label>
                            <input type="hidden" name="ServID" id="ServID">
                            <input class="form-control obg" id="ServNome" name="ServNome" placeholder="Digite o aqui....">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Valor</label>
                            <input class="form-control obg" id="ServValor" name="ServValor" placeholder="Digite o aqui....">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Descrição</label>
                            <textarea class="form-control obg" id="ServDescricao" name="ServDescricao" placeholder="Digite aqui...." rows="4" style="max-width: 100%; font-size: 1.5rem;"></textarea>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="modal-footer justify-content-between">
                <button type="button" id="btnCancelar" onclick="FechandoModal('form_servico')" class="btn btn-info" data-dismiss="modal">Cancelar</button>
                <button name="btn_cadastrar" class="btn btn-success" onclick="return CadastrarServico('form_servico')">Salvar</button>
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
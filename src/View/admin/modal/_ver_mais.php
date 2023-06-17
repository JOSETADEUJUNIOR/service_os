<div class="modal fade" id="verMais">
    <div class="modal-dialog modal-xs">
        <div class="modal-content bg-white">
            <div class="modal-header bg-primary">
                <h4 class="modal-title">Ver mais detalhes</h4>

            </div>
            <div class="modal-body">
                <div class="row">
                <div class="col-md-12 col-xs-12">
                        <div class="form-group">
                            <label>Numero da NF</label>
                            <input class="form-control obg" readonly id="numero_nf_alter">
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label>Data de atendimento</label>
                            <input class="form-control obg" readonly id="dt_atendimento">
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label>Data de encerramento</label>
                            <input class="form-control obg" readonly id="dt_encerramento">
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label>Tecnico que atendeu</label>
                            <input class="form-control obg" readonly id="tec_atendimento">
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label>Tecnico que encerrou</label>
                            <input class="form-control obg" readonly id="tec_encerramento">
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-6">
                        <div class="form-group">
                            <label>Defeito</label>
                            <textarea class="form-control obg" readonly id="defeito_alterar"></textarea>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-6">
                        <div class="form-group">
                            <label>Observação</label>
                            <textarea class="form-control obg" readonly id="observacao_alterar"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12 col-xs-12">
                        <div class="form-group">
                            <label>Laudo</label>
                            <textarea class="form-control obg" readonly id="laudo"></textarea>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" id="btnCancelar" onclick="FechandoModal('form_atendimento')" class="btn btn-info" data-dismiss="modal">Cancelar</button>
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
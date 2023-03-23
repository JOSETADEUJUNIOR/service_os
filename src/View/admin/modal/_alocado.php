<div class="modal fade" id="alocado">
    <div class="modal-dialog modal-xs">
        <div class="modal-content bg-white">
            <div class="modal-header bg-primary">
                <h4 class="modal-title">Equipamento</h4>

            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6" id="table_result_equip">
                        <input type="hidden" name="idEquip" id="idEquip">
                        <div class="form-group">
                            <label>Equipamento</label>
                            <select class="form-control obg" id="equipamento" name="equipamento">
                                <option value="">Selecione</option>
                                <?php foreach ($eqs as $eq) { ?>
                                    <option value="<?= $eq['id'] ?>"><?= $eq['nome_modelo'] ?></option>
                                <?php } ?>

                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group ">
                            <label>Setor</label>
                            <select class="form-control obg" id="setor" name="setor">
                                <option value="">Selecione</option>
                                <?php foreach ($setores as $setor) { ?>
                                    <option value="<?= $setor['id'] ?>"><?= $setor['nome_setor'] ?></option>
                                <?php } ?>

                            </select>
                        </div>
                    </div>

                </div>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" id="btnCancelar" onclick="FechandoModal('form_alocar')" class="btn btn-info" data-dismiss="modal">Cancelar</button>
                <button name="btnGravar" class="btn btn-success" onclick="return alocarEquipamento('form_alocar')">Salvar</button>
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
<div class="modal fade" id="modalExcluir">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-red" style="background-color:#D15B47">
                <h4 class="modal-title">Excluir Registro</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" id="ExcluirID" name="ExcluirID">
                <p>Deseja realmente excluir o registro: <span id="ExcluirNome"></span>?</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-info" data-dismiss="modal">fechar</button>
                <button name="btnExcluir" class="btn btn-danger" onclick="return Excluir()">Excluir registro</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
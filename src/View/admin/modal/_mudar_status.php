<div class="modal fade" id="modal_status">
    <div class="modal-dialog">
        <div class="modal-content bg-danger">
            <div class="modal-header">
                <h4 class="modal-title">Troca Status</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>

                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="id_status" name="id_status">
                <input type="hidden" id="status_atual" name="status_atual">
                <p>Deseja mudar o status do usuario: <span id="nome_user_status"></span>?</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">fechar</button>
                <button name="btnMudarStatus" class="btn btn-outline-light" onclick="return MudarStatus()">Sim</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
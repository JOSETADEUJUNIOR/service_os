<div class="modal fade" id="modalExcluirServ">
  <div class="modal-dialog">
    <div class="modal-content bg-danger">
      <div class="modal-header">
        <h4 class="modal-title">Excluir Registro</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>

        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" id="ExcluirID" name="ExcluirID">
        <input type="hidden" id="ExcluirOsID" name="ExcluirOsID">
        <input type="hidden" id="ExcluirServID" name="ExcluirServID">
        <input type="hidden" id="ExcluirQtd" name="ExcluirQtd">

        <p>Deseja realmente excluir o registro: <span id="ExcluirNomeServ"></span>?</p>

      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-outline-light" data-dismiss="modal">fechar</button>
        <button name="btnExcluirServ" class="btn btn-outline-light" onclick="return ExcluirServ()">Excluir registro</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
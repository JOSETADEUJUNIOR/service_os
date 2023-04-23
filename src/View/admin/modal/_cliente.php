<div class="modal fade" id="cliente">
    <div class="modal-dialog modal-xs">
        <div class="modal-content bg-white">
            <div class="modal-header bg-primary">
                <h4 class="modal-title">Cliente</h4>

            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group col-md-8">
                            <label>Nome</label>
                            <input type="hidden" name="CliID" id="CliID">
                            <input class="form-control obg" id="CliNome" name="CliNome" placeholder="Digite aqui...." maxlength="150">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Data de Nascimento</label>
                            <input type="date" class="form-control obg" id="CliDtNasc" name="CliDtNasc">
                        </div>
                        <div class="form-group col-md-8">
                            <label>CPF/CNPJ</label>
                            <input class="form-control obg" id="CliCpfCnpj" name="CliCpfCnpj" placeholder="Digite aqui...." maxlength="45">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Tipo</label>
                            <select class="form-control obg" id="CliTipo" name="CliTipo">
                            <option>Selecione</option>
                            <option>teste</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Telefone</label>
                            <input class="form-control obg" id="CliTelefone" name="CliTelefone" placeholder="Digite aqui...." maxlength="45">
                        </div>
                        <div class="form-group col-md-6">
                            <label>E-mail</label>
                            <input class="form-control obg" id="CliEmail" name="CliEmail" placeholder="Digite aqui...." maxlength="100">
                        </div>
                        <div class="form-group col-md-3">
                            <label>CEP</label>
                            <input class="form-control obg" id="CliCep" name="CliCep" placeholder="Digite aqui...." maxlength="45">
                        </div>
                        <div class="form-group col-md-9">
                            <label>Endereço</label>
                            <input class="form-control obg" id="CliEndereco" name="CliEndereco" placeholder="Digite aqui...." maxlength="150">
                        </div>
                        <div class="form-group col-md-8">
                            <label>Bairro</label>
                            <input class="form-control obg" id="CliBairro" name="CliBairro" placeholder="Digite aqui...." maxlength="100">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Número</label>
                            <input class="form-control obg" id="CliNumero" name="CliNumero" placeholder="Digite aqui...." maxlength="20">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Cidade</label>
                            <input class="form-control obg" id="CliCidade" name="CliCidade" placeholder="Digite aqui...." maxlength="100">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Estado</label>
                            <input class="form-control obg" id="CliEstado" name="CliEstado" placeholder="Digite aqui...." maxlength="100">
                        </div>
                        <div class="col-md-12">
                        <div class="form-group">
                            <label>Descrição</label>
                            <textarea class="form-control obg" id="CliDescricao" name="CliDescricao" style="resize: vertical" placeholder="Digite aqui...." maxlength="1000"></textarea>
                        </div>
                    </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" onclick="FechandoModal('form_setor')" class="btn btn-info" data-dismiss="modal">Cancelar</button>
                <button name="btnGravar" class="btn btn-success" onclick="return CadastrarSetor('form_setor')">Salvar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
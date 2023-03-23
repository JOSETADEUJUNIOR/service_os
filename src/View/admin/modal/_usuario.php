<div class="modal fade" id="usuario">
    <div class="modal-dialog modal-xs">
        <div class="modal-content bg-white">
            <div class="modal-header bg-primary">
                <h4 class="modal-title">Usuario</h4>

            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <input type="hidden" id="id_end" name="id_end">
                        <input type="hidden" id="id_user" name="id_user">
                        <div class="form-group">
                            <label>Tipo</label>
                            <select class="form-control obg" id="tipo" name="tipo" onchange="EscolherUsuario(this.value)">
                                <option value="">Selecione</option>
                                <option value="<?= PERFIL_ADM ?>">Administrador</option>
                                <option value="<?= PERFIL_FUNCIONARIO ?>">Funcionário</option>
                                <option value="<?= PERFIL_TECNICO ?>">Técnico</option>
                            </select>
                        </div>
                    </div>
                    <div id="divFunc" class="col-md-6 ocultar">
                        <div class="form-group">
                            <label>Setor</label>
                            <select class="form-control" id="setor" name="setor">
                                <option value="">Selecione</option>
                                <?php foreach ($setores as $ct) { ?>
                                    <option value="<?= $ct['id'] ?>"><?= $ct['nome_setor'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div id="divTecnico" class="ocultar">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Empresa do Técnico</label>
                                <input class="form-control" id="nome_empresa_tec" name="nome_empresa_tec" placeholder="Digite o aqui....">
                            </div>
                        </div>
                    </div>
                    <div id="divGeral" class="row col-md-12 ocultar">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nome</label>
                                <input class="form-control obg" id="nome" name="nome" placeholder="Digite o aqui....">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>E-mail</label>
                                <input class="form-control obg" id="email" name="email" onchange="VerficarEmail(this.value)" placeholder="Digite o aqui....">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Telefone</label>
                                <input class="form-control cel num obg" id="telefone" name="telefone" placeholder="Digite o aqui....">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>CEP</label>
                                <input class="form-control obg" id="cep" name="cep" onblur="BuscarCep()" placeholder="Digite o aqui....">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Rua</label>
                                <input class="form-control obg" id="endereco" name="endereco" placeholder="Digite o aqui....">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Bairro</label>
                                <input class="form-control obg" id="bairro" name="bairro" placeholder="Digite o aqui....">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Cidade</label>
                                <input class="form-control obg" id="cidade" name="cidade" placeholder="Digite o aqui....">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Estado</label>
                                <input class="form-control obg" id="estado" name="estado" placeholder="Digite o aqui....">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" id="btnCancelar" onclick="FechandoModal('form_usuario')" class="btn btn-info" data-dismiss="modal">Cancelar</button>
                <button name="btnGravar" class="btn btn-success" onclick="return CadastrarUsuario('form_usuario')">Salvar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<script>
    /* $(window).on("load", function(){
   // página totalmente carregada (DOM, imagens etc.)
$("#tipo").focus();
   $("#nome").reset();
}); */
</script>
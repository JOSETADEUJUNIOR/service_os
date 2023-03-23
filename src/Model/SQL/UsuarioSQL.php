<?php

namespace Src\Model\SQL;



class UsuarioSQL
{

    public static function INSERIR_USUARIO()
    {

        $sql = 'INSERT INTO tb_usuario (tipo, nome, login, senha, status, telefone, UserEmpID) Values (?,?,?,?,?,?,?)';
        return $sql;
    }
    public static function INSERIR_TECNICO()
    {
        $sql = 'INSERT INTO tb_tecnico (tecnico_id, empresa_tecnico) Values(?,?)';
        return $sql;
    }
    public static function INSERIR_FUNCIONARIO()
    {
        $sql = 'INSERT INTO tb_funcionario (funcionario_id, setor_id) Values (?,?)';
        return $sql;
    }

    public static function INSERIR_EMPRESA()
    {
        $sql = 'INSERT INTO tb_empresa (EmpDtCadastro) VALUES (?)';
        return $sql;
    }

    public static function ALTERAR_USUARIO()
    {
        $sql = 'UPDATE tb_usuario set tipo = ?, nome = ?, login = ?, telefone = ?
                    WHERE id = ?';

        return $sql;
    }

    public static function ALTERAR_TECNICO()
    {
        $sql = 'UPDATE tb_tecnico set empresa_tecnico  = ? WHERE tecnico_id = ?';
        return $sql;
    }
    public static function ALTERAR_FUNCIONARIO()
    {
        $sql = 'UPDATE tb_funcionario set setor_id = ? WHERE funcionario_id = ?';
        return $sql;
    }

    public function CadastrarPermissaoSQL()
    {
        $sql = 'INSERT INTO permissoes (admin, gerente, vendedor) VALUES (?,?,?)';
        return $sql;
    }


    public static function SelecionarEmailDuplicado($id)
    {
        $sql = 'SELECT login from tb_usuario WHERE login = ?';

        if (!empty($id)) {
            $sql .= " AND id != ?";
        }

        return $sql;
    }

    public static function FILTRAR_USUARIO($nome, $tipo)
    {
        $sql =  'SELECT usu.id as id,
        usu.tipo as tipo,
        usu.nome as nome,
        usu.login,
        usu.telefone,
        usu.status as status,
        end.rua,
        end.bairro,
        end.cep,
        end.id as id_end,
        cid.nome_cidade as cidade,
        est.sigla_estado,
        tec.empresa_tecnico,
        fun.setor_id,
        st.nome_setor
    FROM tb_usuario as usu
INNER JOIN tb_endereco as end
        ON usu.id = end.usuario_id
INNER JOIN tb_cidade as cid
        ON end.cidade_id = cid.id
INNER JOIN tb_estado as est
        ON cid.estado_id = est.id
LEFT JOIN tb_funcionario as fun
        ON usu.id = fun.funcionario_id
LEFT JOIN tb_tecnico as tec
        ON usu.id = tec.tecnico_id
        LEFT JOIN tb_setor as st
		ON fun.setor_id = st.id';

        if (!empty($nome)) {
            $sql .= ' WHERE nome LIKE ?';
        }
        if (!empty($tipo)) {
            $sql .= " WHERE usu.tipo = '$tipo'";
        }

        return $sql;
    }
    public static function RETORNAR_USUARIOS()
    {
        $sql =  'SELECT usu.id as id,
        usu.tipo as tipo,
        usu.nome as nome,
        usu.login,
        usu.telefone,
        usu.status as status,
        end.rua,
        end.bairro,
        end.cep,
        end.id as id_end,
        cid.nome_cidade as cidade,
        est.sigla_estado,
        tec.empresa_tecnico,
        fun.setor_id,
        st.nome_setor
    FROM tb_usuario as usu
INNER JOIN tb_endereco as end
        ON usu.id = end.usuario_id
INNER JOIN tb_cidade as cid
        ON end.cidade_id = cid.id
INNER JOIN tb_estado as est
        ON cid.estado_id = est.id
LEFT JOIN tb_funcionario as fun
        ON usu.id = fun.funcionario_id
LEFT JOIN tb_tecnico as tec
        ON usu.id = tec.tecnico_id
LEFT JOIN tb_setor as st
		ON fun.setor_id = st.id';

        return $sql;
    }

    public static function MUDAR_STATUS()
    {
        $sql = 'UPDATE tb_usuario
                    SET status = ?
                        WHERE id = ?';
        return $sql;
    }

    public static function DETALHAR_USUARIO()
    {
        $sql = 'SELECT usu.id as id_user,
                usu.tipo,
                usu.nome,
                usu.login,
                usu.telefone,
                end.rua,
                end.bairro,
                end.cep,
                end.id as id_end,
                cid.nome_cidade as cidade,
                est.sigla_estado,
                tec.empresa_tecnico,
                fun.setor_id,
                st.nome_setor
            FROM tb_usuario as usu
        INNER JOIN tb_endereco as end
                ON usu.id = end.usuario_id
        INNER JOIN tb_cidade as cid
                ON end.cidade_id = cid.id
        INNER JOIN tb_estado as est
                ON cid.estado_id = est.id
        LEFT JOIN tb_funcionario as fun
                ON usu.id = fun.funcionario_id
        LEFT JOIN tb_tecnico as tec
                ON usu.id = tec.tecnico_id
                LEFT JOIN tb_setor as st
		ON fun.setor_id = st.id
            WHERE usu.id = ?';

        return $sql;
    }

    public static function BUSCAR_DADOS_ACESSO()
    {

        $sql = 'SELECT id, nome, senha, tipo
                FROM tb_usuario
                    WHERE login = ? AND status = ?';

        return $sql;
    }

    public static function RECUPERARSENHAATUAL()
    {
        $sql = 'SELECT senha from tb_usuario Where id = ?';
        return $sql;
    }

    public static function ATUALIZAR_SENHA()
    {
        $sql = 'UPDATE tb_usuario
                    SET senha = ? WHERE id = ?';

        return $sql;
    }

    public static function VALIDAR_ACESSO()
    {
        $sql = 'SELECT  id,
                        nome,
                        senha,
                        tipo,
                        setor_id,
                        status
                FROM tb_usuario
                LEFT JOIN tb_funcionario
                    ON tb_usuario.id = tb_funcionario.funcionario_id
                    WHERE login = ?
                    AND status = ?
                    AND tipo = ?';
        return $sql;
    }
}

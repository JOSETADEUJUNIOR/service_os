<?php

namespace Src\Model\SQL;



class EquipamentoSQL
{

    public static function InserirEquipamentoSQL()
    {
        $sql = 'INSERT into tb_equipamento (identificacao, descricao, tipoequip_id, modeloequip_id) VALUES (?,?,?,?)';
        return $sql;
    }

    public static function AlterarEquipamentoSQL()
    {
        $sql = 'UPDATE tb_equipamento set identificacao = ?, descricao = ?, tipoequip_id = ?, modeloequip_id = ? WHERE id = ?';
        return $sql;
    }

    public static function ConsultarEquipamentoSQL()
    {
        $sql = 'SELECT tb_equipamento.id as idEquip, identificacao, descricao, tb_tipoequip.id as idTipo,
                       tb_modeloequip.id as idModelo, tb_tipoequip.nome as nomeTipo, tb_modeloequip.nome as nomeModelo
                            FROM tb_equipamento 
                                inner join tb_tipoequip on 
                                    tb_equipamento.tipoequip_id = tb_tipoequip.id	
                                inner join tb_modeloequip on 
                                    tb_equipamento.modeloequip_id = tb_modeloequip.id ';
        return $sql;
    }

    public static function FiltrarEquipamentoSQL($nome_filtro)
    {

        $sql = 'SELECT equip.id as idEquip,
        tb_tipoequip.nome as nomeTipo,
        tb_modeloequip.nome as nomeModelo,
        equip.identificacao as identificacao,
        equip.descricao as descricao
    FROM tb_equipamento as equip
        INNER JOIN tb_tipoequip on equip.tipoequip_id = tb_tipoequip.id
        INNER JOIN tb_modeloequip on equip.modeloequip_id = tb_modeloequip.id';

        if (!empty($nome_filtro))
            $sql = $sql . ' WHERE descricao LIKE ?';

        return $sql;
    }
    public static function AlocarEquipamento()
    {
        $sql = 'INSERT INTO tb_alocar (situacao, data_alocacao, equipamento_id, setor_id) VALUES (?,?,?,?)';
        return $sql;
    }

    public static function DetalharEquipamentoSQL()
    {
        $sql = 'SELECT id, identificacao, descricao, tipoequip_id, modeloequip_id
                    FROM tb_equipamento WHERE id = ?';
        return $sql;
    }
    public static function RetornarEquipamentoSQL()
    {
        $sql = 'SELECT id, identificacao, descricao, tipoequip_id, modeloequip_id
                    FROM tb_equipamento';
        return $sql;
    }
    public static function SelecionarEquipamentoNaoAlocado()
    {
        $sql = 'SELECT ti.nome as nome_tipo,
                       mo.nome as nome_modelo,
                       eq.identificacao,
                       eq.id
                    FROM tb_equipamento as eq
                    INNER JOIN tb_tipoequip as ti
                        ON eq.tipoequip_id = ti.id
                    INNER JOIN tb_modeloequip as mo
                        ON eq.modeloequip_id = mo.id
                    WHERE eq.id NOT IN (SELECT equipamento_id 
                                                FROM tb_alocar
                                                    WHERE situacao != ?)';

        return $sql;
    }

    public static function SelecionarEquipamentoAlocado($situacao)
    {
        $sql = 'SELECT ti.nome as nome_tipo,
                        mo.nome as nome_modelo,
                        eq.identificacao,
                        eq.descricao,
                        al.id as id_alocar,
                        st.nome_setor as nome_setor,
                        al.situacao
                            FROM tb_alocar as al
                        INNER JOIN tb_equipamento as eq
                                ON 	al.equipamento_id = eq.id
                        INNER JOIN tb_tipoequip as ti
                                ON eq.tipoequip_id = ti.id
                        INNER JOIN tb_modeloequip as mo
                                ON eq.modeloequip_id = mo.id
                                INNER JOIN tb_setor as st
                                ON al.setor_id = st.id
                       ';

        if (!empty($situacao)) {
            $sql .= ' WHERE eq.descricao = ?';
        }

        return $sql;
    }
    public static function ConsultarEquipamentoBuscaSQL($BuscarTipo, $filtro_palavra)
    {
        $sql = 'SELECT  equip.id as idEquip,
                        tb_tipoequip.nome as nomeTipo,
                        tb_tipoequip.id as idTipo,
                        tb_modeloequip.id as idModelo,
                        tb_modeloequip.nome as nomeModelo,
                        equip.identificacao as identificacao,
                        equip.descricao as descricao
                    FROM tb_equipamento as equip
                        INNER JOIN tb_tipoequip on equip.tipoequip_id = tb_tipoequip.id
                        INNER JOIN tb_modeloequip on equip.modeloequip_id = tb_modeloequip.id';

        switch ($BuscarTipo) {
            case FILTRO_TIPO:
                $sql .= ' WHERE tb_tipoequip.nome LIKE ?';
                break;
            case FILTRO_IDENTIFICACAO:
                $sql .= ' WHERE identificacao LIKE ?';
                break;
            case FILTRO_DESCRICAO:
                $sql .= ' WHERE descricao LIKE ?';
                break;
            case FILTRO_MODELO:
                $sql .= ' WHERE tb_modeloequip.nome LIKE ?';
                break;
        }
        return $sql;
    }
    public static function ConsultarEquipamento()
    {
        $sql = 'SELECT  equip.id as idEquip,
                        tb_tipoequip.nome as nomeTipo,
                        tb_tipoequip.id as idTipo,
                        tb_modeloequip.id as idModelo,
                        tb_modeloequip.nome as nomeModelo,
                        equip.identificacao as identificacao,
                        equip.descricao as descricao
                    FROM tb_equipamento as equip
                        INNER JOIN tb_tipoequip on equip.tipoequip_id = tb_tipoequip.id
                        INNER JOIN tb_modeloequip on equip.modeloequip_id = tb_modeloequip.id';

        return $sql;
    }

    public static function ExcluirEquipamentoSQL()
    {
        $sql = 'DELETE FROM tb_equipamento WHERE id = ?';
        return $sql;
    }

    public static function RemoverAlocamentoSQL()
    {
        $sql = 'UPDATE tb_alocar set situacao = ?, data_remocao = ? 
                    WHERE id = ?';

        return $sql;
    }

    public static function EQUIPAMENTOS_SETOR_LOGADO_API()
    {
        $sql = 'SELECT ti.nome as nome_tipo,
                        mo.nome as nome_modelo,
                        eq.identificacao,
                        eq.descricao,
                        al.id as id_alocar
                            FROM tb_alocar as al
                        INNER JOIN tb_equipamento as eq
                                ON 	al.equipamento_id = eq.id
                        INNER JOIN tb_tipoequip as ti
                                ON eq.tipoequip_id = ti.id
                        INNER JOIN tb_modeloequip as mo
                                ON eq.modeloequip_id = mo.id
                        WHERE al.setor_id = ?
                        AND al.situacao = ? ORDER BY nome_modelo';
        return $sql;
    }

    public static function SELECT_SERVICO_PARA_EQUIPAMENTO_SQL()
    {
        $sql = 'SELECT ServID, ServNome FROM tb_servico WHERE ServEmpID = ?';
        return $sql;
    }

    public static function SELECT_PRODUTO_PARA_EQUIPAMENTO_SQL()
    {
        $sql = 'SELECT ProdID, ProdDescricao FROM tb_produto WHERE ProdEmpID = ?';
        return $sql;
    }

    public static function INSERT_SERVICO_PARA_EQUIPAMENTO_SQL()
    {
        $sql = 'INSERT INTO tb_equipamento_servico (equipamento_id, servico_ServID) VALUE (?,?)';
        return $sql;
    }

    public static function INSERT_PRODUTO_PARA_EQUIPAMENTO_SQL()
    {
        $sql = 'INSERT INTO tb_equipamento_insumo (produto_ProdID, equipamento_id) VALUE (?,?)';
        return $sql;
    }

    public static function DELETE_PRODUTO_PARA_EQUIPAMENTO_SQL()
    {
        $sql = 'DELETE FROM tb_equipamento_insumo WHERE produto_ProdID = ?';
        return $sql;
    }

    public static function DELETE_SERVICO_PARA_EQUIPAMENTO_SQL()
    {
        $sql = 'DELETE FROM tb_equipamento_servico WHERE servico_ServID = ?';
        return $sql;
    }
}

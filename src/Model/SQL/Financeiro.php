<?php

namespace Src\Model\SQL;


class Financeiro
{

    public static function InserirLancamentoSQL()
    {
        $sql = 'INSERT into tb_lancamentos (LancDescricao, LancValor, LancDtVencimento, LancDtPagamento, LancBaixado, LancFormPgto, Tipo, LancClienteID, LancEmpID, LancUserID) VALUES (?,?,?,?,?,?,?,?,?,?)';
        return $sql;
    }

    public static function AlterarReceitaLancamentoSQL()
    {
        $sql = 'UPDATE tb_lancamentos set LancDescricao =?, LancValor =?, LancDtVencimento =?, LancDtPagamento =?,  LancFormPgto =?, Tipo =?, LancClienteID =?, LancEmpID =?, LancUserID =? WHERE LancID = ?';
        return $sql;
    }
    public static function ConsultarVendaOS()
    {
        $sql = 'SELECT LancID, VendaLancamentoID, VendaID, OsLancamentoID, OsID
		FROM tb_lancamentos
			left join tb_vendas on tb_lancamentos.LancID = tb_vendas.VendaLancamentoID
            left Join tb_os on tb_lancamentos.LancID = tb_os.OsLancamentoID
				Where LancID = ?';
        return $sql;
    }

    public static function AtualizaValorVendaSQL()
    {
        $sql = 'UPDATE tb_vendas set VendaDesconto = VendaDesconto + ? WHERE VendaID = ? and VendaEmpID = ?';
        return $sql;
    }
    public static function AtualizaValorOSSQL()
    {
        $sql = 'UPDATE tb_os set OsDesconto = OsDesconto + ? WHERE OsID = ? and OsEmpID = ?';
        return $sql;
    }

    public static function ExcluirLancamentoSQL()
    {
        $sql = 'DELETE from tb_lancamentos WHERE LancID = ?';
        return $sql;
    }
    public static function BuscarOsFaturadaSQL()
    {
        $sql = 'SELECT OsID from tb_os WHERE OsLancamentoID = ?';
        return $sql;
    }


    public static function AlterarDespesaLancamentoSQL()
    {
        $sql = 'UPDATE tb_lancamentos set LancDescricao =?, LancValor =?, LancDtVencimento =?, LancDtPagamento =?,  LancFormPgto =?, Tipo =?, LancClienteID =?, LancEmpID =?, LancUserID =? WHERE LancID = ?';
        return $sql;
    }


    public static function RetornaLancamentoSQL($tipo, $dtInicio, $dtFinal)
    {
        $sql = 'SELECT LancID, LancDescricao, LancValor, LancDtVencimento, LancDtPagamento, LancBaixado, LancFormPgto, Tipo, LancClienteID, CliNome
                    FROM tb_lancamentos
                        Inner Join tb_cliente on tb_lancamentos.LancClienteID =  tb_cliente.CliID
                           ';


        if ($tipo == 1) {
            $sql .= ' WHERE Tipo = 1 AND LancEmpID = ?';
        } else if ($tipo == 2) {
            $sql .= ' WHERE Tipo = 2 AND LancEmpID = ?';
        } else if ($tipo == 3) {
            $sql .= ' WHERE Tipo in (1,2) AND LancEmpID = ?';
        }

        if ($dtInicio != '' || $dtFinal != '') {
            $sql .= " AND LancDtVencimento between '$dtInicio' and '$dtFinal' ";
        }

        $sql .= ' Order By LancDtVencimento asc';

        return $sql;
    }

    public static function RetornaTodosLancamentoSQL()
    {
        $sql = 'SELECT LancID, LancDescricao, LancValor, LancDtVencimento, LancDtPagamento, LancBaixado, LancFormPgto, Tipo, LancClienteID, CliNome
                    FROM tb_lancamentos
                        Inner Join tb_cliente on tb_lancamentos.LancClienteID =  tb_cliente.CliID
                           WHERE LancEmpID = ? Order By LancDtVencimento asc';

        return $sql;
    }
    public static function RetornaVencimentoLancamentoSQL()
    {
        $sql = 'SELECT LancID
                    FROM tb_lancamentos
                           WHERE LancDtVencimento = ? AND LancEmpID = ?';

        return $sql;
    }

    public static function ConsultarEquipamentoBuscaSQL($BuscarTipo, $filtro_palavra)
    {
        $sql = 'SELECT  equip.id as idEquip,
                        tb_tipoequip.nome as nomeTipo,
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
            case FILTRO_DESCRICAO:
                $sql .= ' WHERE identificacao LIKE ?';
                break;
            case FILTRO_IDENTIFICACAO:
                $sql .= ' WHERE descricao LIKE ?';
                break;
            case FILTRO_MODELO:
                $sql .= ' WHERE tb_modeloequip.nome LIKE ?';
                break;
        }
        return $sql;
    }
}

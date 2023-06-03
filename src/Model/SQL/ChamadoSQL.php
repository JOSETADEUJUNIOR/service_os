<?php

namespace Src\Model\SQL;


class ChamadoSQL
{


    /*     SELECT tb_chamado.*, tb_empresa.*
FROM tb_chamado
INNER JOIN tb_empresa ON tb_chamado.empresa_EmpID = tb_empresa.EmpID
WHERE tb_empresa.EmpID = empID; */

    public static function AbrirChamadoSQL()
    {
        $sql = 'INSERT into tb_chamado (data_abertura, descricao_problema, funcionario_id, numero_nf, defeito, observacao, cliente_CliID, empresa_EmpID) VALUES (?,?,?,?,?,?,?,?)';
        return $sql;
    }

    public static function GravarDadosProdOsSQL()
    {

        $sql = 'INSERT into tb_referencia (chamado_id, produto_ProdID, empresa_EmpID, quantidade, valor) VALUES (?,?,?,?,?)';
        return $sql;
    }
    public static function GravarDadosServOsSQL()
    {

        $sql = 'INSERT into tb_referencia (chamado_id, servico_ServID, empresa_EmpID, quantidade, valor) VALUES (?,?,?,?,?)';
        return $sql;
    }

    public static function RemoveProdOsSQL()
    {
        $sql = 'DELETE from tb_referencia WHERE referencia_id = ? and empresa_EmpID = ?';
        return $sql;
    }

    public static function ConsultarSaldoProdutoSQL()
    {
        $sql = 'SELECT ProdEstoque 
                    FROM tb_produto
                        WHERE ProdID = ?';
        return $sql;
    }

    public static function AtualizarSaldoProdutoSQL()
    {
        return "UPDATE tb_produto SET ProdEstoque = ProdEstoque - ? WHERE ProdID = ?";
    }

    public static function AtualizarSaldoProdutoExcluirSQL()
    {
        return "UPDATE tb_produto SET ProdEstoque = ProdEstoque + ? WHERE ProdID = ?";
    }





    public static function ATUALIZAR_ALOCAMENTO()
    {
        $sql = 'UPDATE tb_alocar set situacao = ?
                where id = ?';
        return $sql;
    }

    public static function FILTRAR_CHAMADO($tipo)
    {

        $sql = 'SELECT DATE_FORMAT(ch.data_abertura, "%d/%m/%Y às %Hh%i") as data_abertura,
                       ch.descricao_problema,
                       DATE_FORMAT(ch.data_atendimento, "%d/%m/%Y às %Hh%i") as data_atendimento,
                       DATE_FORMAT(ch.data_encerramento, "%d/%m/%Y às %Hh%i") as data_encerramento,
                       ch.laudo_tecnico,
                       us_fu.nome as nome_funcionario,
                       us_te.nome as nome_tecnico,
                       (SELECT nome From tb_usuario Where id = ch.tecnico_encerramento) as tecnico_encerramento
	                    FROM
	                    tb_chamado as ch
	                    INNER JOIN tb_funcionario as fu
	                    on fu.funcionario_id = ch.funcionario_id	
	                    INNER JOIN tb_usuario as us_fu
	                    on us_fu.id = fu.funcionario_id
	                    LEFT JOIN tb_tecnico as te
	                    on te.tecnico_id = ch.tecnico_atendimento
	                    LEFT JOIN tb_usuario as us_te
	                    on us_te.id = te.tecnico_id
                        ';
        switch ($tipo) {
            case '1':
                $sql .= ' WHERE data_atendimento is null';
                break;
            case '2':
                $sql .= ' WHERE ch.data_atendimento is not null AND ch.data_encerramento is null';
                break;
            case '3':
                $sql .= ' WHERE ch.data_encerramento is not null';
                break;
        }
        return $sql;
    }
    public static function FILTRAR_CHAMADO_ABERTO()
    {
        $sql = 'SELECT count(0) as QuantidadeChamado 
        from tb_chamado
            where data_abertura is not null and data_atendimento is null and data_encerramento is null';

        return $sql;
    }
    public static function FILTRAR_CHAMADO_GERAL($tipo, $setorID)
    {

        $sql = 'SELECT ch.id as id,
        DATE_FORMAT(ch.data_abertura, "%d/%m/%Y às %Hh%i") as data_abertura,
        ch.descricao_problema,
        DATE_FORMAT(ch.data_atendimento, "%d/%m/%Y às %Hh%i") as data_atendimento,
        DATE_FORMAT(ch.data_encerramento, "%d/%m/%Y às %Hh%i") as data_encerramento,
        ch.laudo_tecnico,
        ch.tecnico_atendimento,
        ch.tecnico_encerramento,
        us_fu.nome as nome_funcionario,
        us_te.nome as nome_tecnico,
        cli.CliNome as nome_cliente,
        ch.numero_nf as numero_nf,
        cli.CliID as cliente_id,
        ch.defeito as defeito,
        ch.observacao as observacao,
        (SELECT nome From tb_usuario Where id = ch.tecnico_encerramento) as tecnico_encerramento
         FROM
         tb_chamado as ch
         INNER JOIN tb_funcionario as fu
         on fu.funcionario_id = ch.funcionario_id	
         INNER JOIN tb_usuario as us_fu
         on us_fu.id = fu.funcionario_id
         LEFT JOIN tb_tecnico as te
         on te.tecnico_id = ch.tecnico_atendimento
         LEFT JOIN tb_usuario as us_te
         on us_te.id = te.tecnico_id
         INNER JOIN tb_cliente as cli
         on ch.cliente_CliID = cli.CliID
         INNER JOIN tb_empresa as emp
         on ch.empresa_EmpID = emp.EmpID
         WHERE emp.EmpID = ?';

        switch ($tipo) {
            case '1':
                $sql .= ' AND data_atendimento is null';
                break;
            case '2':
                $sql .= ' AND data_atendimento is not null AND data_encerramento is null';
                break;
            case '3':
                $sql .= ' AND data_encerramento is not null';
                break;
        }
        if (!empty($setorID)) {
            $sql .= ' AND fu.setor_id = ?';
        }
        $sql .= ' Order by data_encerramento desc, data_abertura desc';
        return $sql;
    }

    public static function FILTRAR_NF()
    {

        $sql = 'SELECT ch.id as id,
        DATE_FORMAT(ch.data_abertura, "%d/%m/%Y às %Hh%i") as data_abertura,
        ch.descricao_problema,
        DATE_FORMAT(ch.data_atendimento, "%d/%m/%Y às %Hh%i") as data_atendimento,
        DATE_FORMAT(ch.data_encerramento, "%d/%m/%Y às %Hh%i") as data_encerramento,
        ch.laudo_tecnico,
        ch.tecnico_atendimento,
        ch.tecnico_encerramento,
        us_fu.nome as nome_funcionario,
        us_te.nome as nome_tecnico,
        cli.CliNome as nome_cliente,
        ch.numero_nf as numero_nf,
        ch.defeito as defeito,
        cli.CliID as cliente_id,
        ch.observacao as observacao,
        (SELECT nome From tb_usuario Where id = ch.tecnico_encerramento) as tecnico_encerramento
         FROM
         tb_chamado as ch
         INNER JOIN tb_funcionario as fu
         on fu.funcionario_id = ch.funcionario_id	
         INNER JOIN tb_usuario as us_fu
         on us_fu.id = fu.funcionario_id
         LEFT JOIN tb_tecnico as te
         on te.tecnico_id = ch.tecnico_atendimento
         LEFT JOIN tb_usuario as us_te
         on us_te.id = te.tecnico_id
         INNER JOIN tb_cliente as cli
         on ch.cliente_CliID = cli.CliID
         INNER JOIN tb_empresa as emp
         on ch.empresa_EmpID = emp.EmpID
         WHERE emp.EmpID = ? AND ch.numero_nf like ?';

       
        $sql .= ' Order by data_encerramento desc, data_abertura desc';
        return $sql;
    }

    public static function ATENDER_CHAMADO()
    {
        $sql = ' UPDATE tb_chamado set data_atendimento = ?, tecnico_atendimento = ? WHERE id = ?';
        return $sql;
    }
    public static function FINALIZAR_CHAMADO()
    {
        $sql = ' UPDATE tb_chamado set data_encerramento = ?, tecnico_encerramento = ?, laudo_tecnico = ? WHERE id = ?';
        return $sql;
    }

    public static function CarregarDadosChamadoSQL()
    {
        $sql = 'SELECT
            c.numero_nf,
            COUNT(c.id) AS Total,
            SUM(CASE WHEN c.data_atendimento IS NULL AND c.data_encerramento IS NULL THEN 1 ELSE 0 END) AS Aguardando,
            SUM(CASE WHEN c.data_atendimento IS NOT NULL AND c.data_encerramento IS NULL THEN 1 ELSE 0 END) AS Em_atendimento,
            SUM(CASE WHEN c.data_encerramento IS NOT NULL THEN 1 ELSE 0 END) AS Encerrando,
            r.valor
        FROM
            tb_chamado c
        INNER JOIN
            tb_empresa e ON c.empresa_EmpID = e.EmpID
        INNER JOIN
            tb_referencia r ON c.id = r.chamado_id
        WHERE
            e.EmpID = 32
        GROUP BY
            c.numero_nf';
    
        // Retorna a consulta SQL
        return $sql;
    }
    
    
    
    public static function DETALHAR_EMPRESA_OS()
    {
        $sql = 'SELECT * from tb_empresa where EmpID = ?';

        return $sql;
    }

    public static function DETALHAR_DADOS_OS()
    {
        $sql = 'SELECT * from tb_chamado where empresa_EmpID = ? AND id = ?';

        return $sql;
    }

    public static function ChamadosPorFuncionarioSQL()
    {
        $sql = 'SELECT us.nome, COUNT(*) as total_chamados, (SELECT SUM(total_chamados) FROM (SELECT COUNT(*) as total_chamados FROM tb_usuario us2 JOIN tb_chamado ch2 ON us2.id = ch2.funcionario_id GROUP BY us2.nome) as subquery) as total_geral
                FROM tb_usuario us
                     JOIN tb_chamado ch ON us.id = ch.funcionario_id
                            GROUP BY us.nome';
        return $sql;
    }

    public static function CarregarProdutoOSSQL()
    {
        $sql = 'SELECT referencia_id, chamado_id, produto_ProdID, ProdDescricao, quantidade, valor, (quantidade*valor) as valorTotal
                FROM tb_referencia as rf
                    INNER JOIN tb_produto as prod
                        on rf.produto_ProdID = prod.ProdID
                            Where rf.chamado_id = ?';
        return $sql;
    }
    public static function CarregarProdServOSSQL()
    {
        $sql = 'SELECT referencia_id, chamado_id, produto_ProdID, servico_ServID, ServDescricao, ServNome, ProdDescricao, quantidade, valor, (quantidade*valor) as valorTotal
        FROM tb_referencia as rf
            left JOIN tb_produto as prod
                on rf.produto_ProdID = prod.ProdID
                left JOIN tb_servico as serv
                on rf.servico_ServID = serv.ServID
                    Where rf.chamado_id = ?';
        return $sql;
    }




    public static function CarregarServicosOSSQL()
    {
        $sql = 'SELECT referencia_id, chamado_id, servico_ServID, ServDescricao, ServNome, valor
                FROM tb_referencia as rf
                    INNER JOIN tb_servico as serv
                        on rf.servico_ServID = serv.ServID
                            Where rf.chamado_id = ?';
        return $sql;
    }

    public static function ChamadosPorPeriodoSQL()
    {
        $sql = 'SELECT YEAR(data_abertura) AS ano, MONTH(data_abertura) AS mes, COUNT(*) AS total_chamados
                FROM tb_chamado
                    GROUP BY ano, mes
                    ORDER BY ano, mes;';
        return $sql;
    }

    public static function ChamadosPorSetorSQL()
    {

        $sql = 'SELECT tb_setor.nome_setor, COUNT(*) as quantidade_por_setor
                FROM tb_chamado
                    INNER JOIN tb_alocar ON tb_chamado.alocar_id = tb_alocar.id
                    INNER JOIN tb_setor ON tb_alocar.setor_id = tb_setor.id
                    GROUP BY tb_setor.nome_setor;';
        return $sql;
    }
}


/*

Considerando que quando um campo é utilizado para ligar uma tabela a outra, este campo terá como nome, o nome da segunda tabela.

 

Construa uma consulta SQL que liste uma relação contendo: 

========================   

    nome de cada banco (g)

    verba (g)

    data de inclusao do contrato mais antigo deste agrupamento

    data de inclusao do contrato mais novo deste agrupamento

    soma do valor dos contratos neste agrupamento

 

(g) = campos agrupados

========================

*/


select 
    banco.nome as banco, convenio.verba as verba, MIN(contrato.data_inclusao) as data_inclusao, SUM(contrato.valor) as valor 
        from contrato 
        join convenio_servico on convenio_servico = convenio_servico 
        join convenio on convenio = convenio_servico.convenio
        join banco on banco = convenio.banco
        group by banco, verba
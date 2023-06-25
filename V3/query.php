<?php
$conexaoPdo = new PDO('mysql:host=localhost','root','password');

function selecionarSchema(string $schema, \PDO $conexaoPdo):void {
    $query = $conexaoPdo->query("use {$schema}");
}

function mostrarTabelas(string $schema, \PDO $conexaoPdo): array {
    $tabelas = array();
    $queryTables = $conexaoPdo->query("select table_name from information_schema.tables where table_schema = '{$schema}' order by CREATE_TIME DESC");
    foreach ($queryTables->fetchAll(PDO::FETCH_ASSOC) as $index => $item) {
        $tabelas[] = $item['TABLE_NAME'];
    }
    return $tabelas;
}

function buscarTabela(array $dados, \PDO $conexaoPdo): bool {
    $queryTables = $conexaoPdo->query("select table_name from information_schema.tables where table_schema = '{$dados['cliente']}' and table_name = '{$dados['tabelas_log']}'");
    return !empty($queryTables->fetchAll(PDO::FETCH_ASSOC));
}

function criarTabelaLog(array $dados, \PDO $conexaoPdo): void {
    $queryCreateLog = "
            create table {$dados['cliente']}.{$dados['tabelas_log']}
            (
                id              int          not null
                    primary key,
                id_objeto       int          not null,
                nome_campo      varchar(500) not null,
                nome_campo_tela varchar(500) not null,
                valor_anterior  varchar(500) null,
                valor_posterior varchar(500) not null,
                data_alteracao  date         null,
                hora_alteracao  time         null,
                constraint {$dados['tabelas_log']}_{$dados['tabelas']}_id_fk
                    foreign key (id_objeto) references {$dados['cliente']}.{$dados['tabelas']} (id)
            )
                collate = utf8mb4_bin;
            
            create index {$dados['tabelas_log']}_data_alteracao_index
                on {$dados['cliente']}.{$dados['tabelas_log']} (data_alteracao);
            
            create index {$dados['tabelas_log']}_id_objeto_index
                on {$dados['cliente']}.{$dados['tabelas_log']} (id_objeto);
            
            create index {$dados['tabelas_log']}_nome_campo_index
                on {$dados['cliente']}.{$dados['tabelas_log']} (nome_campo);
            
            create index {$dados['tabelas_log']}_nome_campo_tela_index
                on {$dados['cliente']}.{$dados['tabelas_log']} (nome_campo_tela);
            
            create index {$dados['tabelas_log']}_valor_posterior_index
                on {$dados['cliente']}.{$dados['tabelas_log']} (valor_posterior);
        ";
    $queryTables = $conexaoPdo->query($queryCreateLog);
}

function buscarColunas(array $dados, \PDO $conexaoPdo): array {
    $colunas = "SHOW COLUMNS FROM {$dados['cliente']}.{$dados['tabelas']}";
    $queryColunas = $conexaoPdo->query($colunas);
    foreach ($queryColunas->fetchAll(PDO::FETCH_ASSOC) as $index => $item) {
        $arrayColunas[] = array(
            'coluna' => $item['Field'],
            'tipo' => $item['Type'],
        );
    }
    echo "<pre>";
    var_dump($arrayColunas);
    die();
    return $arrayColunas;
}

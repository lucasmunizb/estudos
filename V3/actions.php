<?php

switch ($_POST['acao']){
    case 'carregarTabelas':
        selecionarSchema($_POST['banco'],$conexaoPdo);
        $tabelas = mostrarTabelas($_POST['banco'],$conexaoPdo);
        $retorno = "<label for=\"tabelas_banco\" class=\"form-label\">Tabelas</label>
                    <select  id=\"tabelas_banco\" class=\"form-select\" name=\"tabelas\" required>
                        <option value=\"\">Selecione...</option>";
        foreach ($tabelas as $index => $tabela) {
            $retorno .= "<option value=\"{$tabela}\">{$tabela}</option>";
        }
        $retorno .= "</select>";
        echo($retorno);
        break;
}
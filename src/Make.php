<?php

namespace NFePHP\NFSe\PRESCON;

use stdClass;

class Make
{

    public $json;

    public function __construct()
    {

        $this->json = new \stdClass();
    }

    public function getJSON($obj)
    {
        if (empty($this->nota)) {

            $this->monta($obj);
        }

        return $this->nota;
    }

    public function monta($obj)
    {
        $this->json->im = 'inscrição municipal da empresa';
        $this->json->NumeroNota = $obj->Numero;
        $this->json->DataEmissao = $obj->DataEmissao;
        $this->json->NomeTomador = $obj->tomador->RazaoSocial;
        // $this->json->tipoDocTomador = $obj->tomador->;
        $this->json->documentoTomador = $obj->tomador->Cnpj;
        // $this->json->InscricaoEstadualTomador = $obj->tomador->;
        $this->json->logradouroTomador = $obj->tomador->Prefixo;
        $this->json->numeroTomador = $obj->tomador->Numero;
        $this->json->complementoTomador = $obj->tomador->Complemento;
        $this->json->bairroTomador = $obj->tomador->Bairro;
        // $this->json->cidadeTomador = $obj->tomador->;
        $this->json->ufTomador = $obj->tomador->Uf;
        // $this->json->PAISTomador = $obj->tomador->;
        $this->json->emailTomador = $obj->tomador->Email;
        // $this->json->logradouroServico = $obj->servico->;
        $this->json->CEPTomador = $obj->tomador->Cep;
        // $this->json->numeroServico = $obj->servico->;
        // $this->json->complementoServico = $obj->servico->;
        // $this->json->bairroServico = $obj->servico->;
        // $this->json->cidadeServico = $obj->servico->;
        // $this->json->ufServico = $obj->servico->;
        $this->json->issRetido = $obj->IssRetido;
        // $this->json->devidoNoLocal = $obj->;
        // $this->json->observacao = $obj->;
        $this->json->INSS = $obj->ValorInss;
        // $this->json->IRPJ = $obj->;
        $this->json->CSLL = $obj->ValorCsll;
        $this->json->COFINS = $obj->ValorCofins;
        // $this->json->PISPASEP = $obj->;
        // $this->json->CEPServico = $obj->servico->;
        // $this->json->PAISServico = $obj->servico->;
        $this->json->descricao = $obj->Observacao;
        // $this->json->atividade = $obj->;
        // $this->json->valor = $obj->servico->;
        $this->json->aliquota = $obj->Aliquota;
        // $this->json->deducaoMaterial = $obj->;
        $this->json->descontoCondicional = $obj->DescontoCondicionado;
        $this->json->descontoIncondicional = $obj->DescontoIncondicionado;
        $this->json->valorDeducao = $obj->ValorDeducoes;
        $this->json->baseCalculo = $obj->BaseCalculo;
        $this->json->valorIss = $obj->ValorIss;
        $this->json->valorTotalNota = $obj->ValorServicos;
        // $this->json->tipoEnquadramento = $obj->;
        // $this->json->tipoIss = $obj->;
        $this->json->hashMd5 = "";

        $this->nota = json_encode($this->json);

        return $this->nota;
    }



    public function cancelamento($std)
    {

        $this->json = json_encode($this->nota);

        return $this->json;
    }

    public function consulta($std, $codigoCidade)
    {

        $this->json = json_encode($this->nota);

        return $this->json;
    }
}

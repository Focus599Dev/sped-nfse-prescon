<?php

namespace NFePHP\NFSe\PRESCON\Common;

use NFePHP\NFSe\PRESCON\Soap\Soap;
use NFePHP\Common\Validator;

class Tools
{

    public $soapUrl;

    public $config;

    public $soap;

    public $pathSchemas;

    public function __construct($configJson)
    {
        $this->pathSchemas = realpath(
            __DIR__ . '/../../schemas'
        ) . '/';

        $this->config = json_decode($configJson);

        if ($this->config->tpAmb == '1') {
            $this->soapUrl = 'http://www.nfemontemor.com.br/ws.montemor/Servidor.php?wsdl';
        } else {
            $this->soapUrl = 'Não sei ainda';
        }$this->soapUrl = 'http://www.nfemontemor.com.br/ws.montemor/Servidor.php?wsdl';
    }

    protected function sendRequest($request, $soapUrl, $cnpj)
    {

        $soap = new Soap;

        $response = $soap->send($request, $soapUrl, $cnpj);

        return (string) $response;
    }

    public function envelopSoapXML($xml)
    {
        $this->xml =
            '<soapenv:Envelope  xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" 
                                xmlns:xsd="http://www.w3.org/2001/XMLSchema" 
                                xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" 
                                xmlns:proc="http://proces.wsnfe2.dsfnet.com.br">
                <soapenv:Header/>
                <soapenv:Body>' . $xml . '</soapenv:Body>
            </soapenv:Envelope>';

        return $this->xml;
    }

    protected function getCNPJ($xml)
    {

        $xml = simplexml_load_string($xml);

        return $cnpj = (string) $xml->Cabecalho->CPFCNPJRemetente;
    }
}

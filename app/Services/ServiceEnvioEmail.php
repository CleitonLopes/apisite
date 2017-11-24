<?php

namespace App\Services;

use \PHPMailer\PHPMailer\PHPMailer;
use App\Services\ServiceResponse;

class ServiceEnvioEmail
{

	protected $mail;
	protected $serviceResponse;

	public function __construct(PHPMailer $mail, ServiceResponse $serviceResponse)
	{
		$this->mail = $mail;
		$this->serviceResponse = $serviceResponse;
	}

	public function send(Array $params)
	{

		try
		{
			if (count($params) <= 0)
			{
				return;
			}

			$this->mail->isSMTP();

            $this->mail->SMTPDebug = 0;

            $this->mail->Debugoutput = 'html';

            $this->mail->Host = 'email-ssl.com.br';

            $this->mail->Port = '465';

            $this->mail->SMTPSecure = 'ssl';

            $this->mail->SMTPAuth = true;

            $this->mail->Username = 'bredas@bredas.com.br';

            $this->mail->Password = '154wqazc';

            $this->mail->setFrom('bredas@bredas.com.br', 'Contato do site Estância Bredas');

            $this->mail->addAddress('bredas@bredas.com.br', 'Contato do Site');

            $this->mail->Subject = '';

            $mensagemHTML = "";

           	$mensagemHTML .= '<b>Nome: '.                $params['nome'].'<br/>';
           	$mensagemHTML .= '<b>Data Inicial: '.        $params['dataInicial']. '<br/>';
           	$mensagemHTML .= '<b>Data Final: '.          $params['dataSaida'].'<br/>';
           	$mensagemHTML .= '<b>Telefone: '.            $params['telefone'].'<br/>';
           	$mensagemHTML .= '<b>Quantidade Adultos: '.  $params['qtdAdultos'].'<br/>';
           	$mensagemHTML .= '<b>Quantidade Crianças: '. $params['qtdCriancas'].'<br/>';
           	$mensagemHTML .= '<b>Texto: '.               $params['mensagem'].'<br/>';

            $this->mail->msgHTML(utf8_decode($mensagemHTML));

            $envio = $this->mail->send();

            if(!$envio)
            {

            	return $this->serviceResponse->getResponse(['Não foi possivel fazer o envio de e-mail, por favor tente mais tarde !', 400]);
            }

            return $this->serviceResponse->getResponse(['E-mail enviado com sucesso !', 200]);


		}
		catch (Exception $e) {

			return $this->serviceResponse->getResponse(['Temporariamente fora de serviço !', 400]);

		}

	}

}
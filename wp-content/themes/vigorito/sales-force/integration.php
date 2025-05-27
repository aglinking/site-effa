<?php

function autenticarSalesforce()
{
    if(isset($_POST['homolog'])){
        // homolog
    	$url = "https://test.salesforce.com/services/oauth2/token";
    
    	// homolog
    	$data = array(
    	'grant_type' => 'password',
    	'client_id' => '3MVG9R4W1j5vZNbzCNDPfBtUrpLc3k6pt58FscOZTBdBz2oJ1Kla8cLRg6r14U_AgofxxRReTFimWqSjBbgNb',
    	'client_secret' => '4B7AAFAE6278C01C443532F611F3A31CA5763C4F270D78DF847A3F95F7E329E4',
    	'username' => 'nextip@vigorito.com.br.sandbox',
    	'password' => '597O=wwfLa4!'
    		);

    }else{
        
    	// produção
    	$url = "https://login.salesforce.com/services/oauth2/token";
    
    	// Produção
    	$data = array(
    		'grant_type' => 'password',
    		'client_id' => '3MVG9JEx.BE6yifM0ssCexPdF51PUBUy3eeW7l58TJw1tD_j.2bnvThNfM5GLqrWBlzq2y4F1keHZNZGSE7wz',
    		'client_secret' => '593D5B9DA8D6A08B92611212E133DCFFAAAFAACE34CAB8FDFD86C29F56C983EB',
    		'username' => 'integrador-sites@vigorito.com.br',
    		'password' => '7QgLTuYJhFl14Fk'
    	);
    }


	$headers = array(
		'Content-Type: application/x-www-form-urlencoded',
		'Cookie: BrowserId=UmCbwz38Ee6IOadDEOkw6g; CookieConsentPolicy=0:0; LSKey-c$CookieConsentPolicy=0:0'
	);

	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

	$response = curl_exec($ch);
	$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

	curl_close($ch);

	if ($httpCode == 200) {

		$response = json_decode($response, true);

		$token = $response;

		if ($token['access_token']) {
			// Dados do lead
			if ($_POST['Formulário'] == "model-1") {
				$leadData = array(
					'name' => $_POST['Nome'],
					'email' => $_POST['Email'],
					'interestIn' => 'Novo',
					'mobilePhone' => $_POST['Telefone/WhatsApp'],
					'unitCNPJ' => $_POST['Unidade'],
					'carModel' => $_POST['modelo'],
					'message' => $_POST['Mensagem'],
					'pageLink' => $_POST['Pagina']
				);
			} else if ($_POST['Formulário'] == "model-pcd") {
				$leadData = array(
					'name' => $_POST['Nome'],
					'email' => $_POST['Email'],
					'interestIn' => $_POST['Assunto'],
					'mobilePhone' => $_POST['Telefone/WhatsApp'],
					'unitCNPJ' => $_POST['Unidade'],
					'carModel' => $_POST['modelo'],
					'message' => $_POST['Mensagem'],
					'pageLink' => $_POST['Pagina']
				);
			    
			} else if ($_POST['Formulário'] == "model-3") {
				// Adicionar campo unidades, estamos aguardando a confirmação do graner
				$leadData = array(
					'name' => $_POST['Nome'],
					'email' => $_POST['Email'],
					'interestIn' => 'Seminovo',
					'unitCNPJ' => $_POST['Unidade'],
					'mobilePhone' => $_POST['Telefone/Whatsapp'],
					'carModel' => $_POST['veiculo'],
					'message' => $_POST['Mensagem'],
					'pageLink' => $_POST['Pagina']
				);
			} else if ($_POST['Formulário'] == "model-5") {
				$leadData = array(
					'name' => $_POST['Nome'],
					'email' => $_POST['Email'],
					'mobilePhone' => $_POST['Telefone/WhatsApp'],
					'subject' => $_POST['Servico'],
					'message' => $_POST['Mensagem'],
					'pageLink' => $_POST['Pagina']
				);
			} else if ($_POST['Formulário'] == "model-6") {
				$leadData = array(
					'name' => $_POST['Nome'],
					'email' => $_POST['Email'],
					'mobilePhone' => $_POST['Telefone/WhatsApp'],
					'interestIn' => 'Novo',
					'unitCNPJ' => $_POST['Unidade'],
					'message' => $_POST['Mensagem'],
					'pageLink' => $_POST['Pagina']
				);
			} else if ($_POST['Formulário'] == "model-7") {
				$leadData = array(
					'name' => $_POST['Nome'],
					'email' => $_POST['Email'],
					'mobilePhone' => $_POST['Telefone/WhatsApp'],
					'subject' => $_POST['Assunto'],
					'contactBy' => $_POST['Contato-por'],
					'message' => $_POST['Mensagem'],
					'pageLink' => $_POST['Pagina']
				);
			}

			//   Definir endpoint (Cases or Leads)
			if ($_POST['Formulário'] == "model-7" || $_POST['Formulário'] == "model-4" ||  $_POST['Formulário'] == "model-5") {


				if ($_POST['Formulário'] == "model-4") {


					// Define as opções para Lead e Caso
					$opcoesLead = ["Blindagem", "Seguro", "Despachante"];
					$opcoesCaso = ["Alinhamento e Balanceamento", "Troca de Pneus", "Freios", "Estética", "Suspensão", "Funilaria e Pintura", "Troca de óleo", "Seguro de Proteção Mecânica"];


					// Verifica se o serviço corresponde a Lead ou Caso
					if (in_array($_POST['Servico'], $opcoesLead)) {

						$leadData = array(
							'name' => $_POST['Nome'],
							'email' => $_POST['Email'],
							'interestIn' => 'Novo',
							'mobilePhone' => $_POST['Telefone/WhatsApp'],
							'unitCNPJ' => $_POST['Unidade'],
							'service' => $_POST['Servico'],
							'message' => $_POST['Mensagem'],
							'pageLink' => $_POST['Pagina']
						);

						$endpointUrl = "/services/apexrest/v1/leads/linking_site";
					} else if (in_array($_POST['Servico'], $opcoesCaso)) {
						$leadData = array(
							'name' => $_POST['Nome'],
							'email' => $_POST['Email'],
							'mobilePhone' => $_POST['Telefone/WhatsApp'],
							'subject' => $_POST['Servico'],
							'message' => $_POST['Mensagem'],
							'pageLink' => $_POST['Pagina']
						);
						$endpointUrl = "/services/apexrest/v1/cases/linking_site";
					}
				} else {
					$endpointUrl = "/services/apexrest/v1/cases/linking_site";
				}
			} else {
				$endpointUrl = "/services/apexrest/v1/leads/linking_site";
			}
			
			$leadData['optInSite'] = true;
			
		
			$leadData['leadSource'] = "Linking site";
			
			
			// Adiciona utm_medium se não estiver vazio
            $utm_medium = isset($_POST['utm_medium']) ? sanitize_text_field($_POST['utm_medium']) : '';
            if (!empty($utm_medium)) {
                $leadData['utmMedium'] = $utm_medium;
            }
        
            // Adiciona utm_source se não estiver vazio
            $utm_source = isset($_POST['utm_source']) ? sanitize_text_field($_POST['utm_source']) : '';
            if (!empty($utm_source)) {
                $leadData['utmSource'] = $utm_source;
            }
            
            
            	// Adiciona utm_medium se não estiver vazio
			$utm_campaign = isset($_POST['utm_campaign']) ? $_POST['utm_campaign'] : '';
			if (!empty($utm_campaign)) {
				$leadData['utmCampaign'] = $utm_campaign;
			}
            
            

			$curl = curl_init();
			// curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

			curl_setopt_array($curl, [
				CURLOPT_URL =>  $token['instance_url'] . $endpointUrl,
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => "",
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 30,

				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => "POST",
				CURLOPT_POSTFIELDS => json_encode($leadData),
				CURLOPT_HTTPHEADER => [
					"Authorization: Bearer " . $token['access_token'],
					"Content-Type: application/json"
				],
			]);

			$response =  json_decode(curl_exec($curl));
			$err = curl_error($curl);

			curl_close($curl);

			if ($response->status == "Sucesso") {
			    var_dump($response);
				// echo "lead enviado com sucesso";
			} else {

				echo "Falha no envio do lead";
				// var_dump($response);
			}
		}
	} else {
		var_dump($response);
		return false;
	}

	wp_die();
}

add_action('wp_ajax_autenticarSalesforce', 'autenticarSalesforce');
add_action('wp_ajax_nopriv_autenticarSalesforce', 'autenticarSalesforce');
?>
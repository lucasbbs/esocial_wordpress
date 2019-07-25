<?php 

	//$meusResultados = $wpdb->get_var( "SELECT CNAE FROM wp_cnae" );
	// function formatCnpjCpf($value)
	// {
	//   $cnpj_cpf = preg_replace("/\D/", '', $value);
	  
	//   if (strlen($cnpj_cpf) === 11) {
	//     return preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4", $cnpj_cpf);
	//   } 
	  
	//   return preg_replace("/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/", "\$1.\$2.\$3/\$4-\$5", $cnpj_cpf);
	// }
	// function formatCnae($value)
	// {
	//     return preg_replace("/(\d{4})(\d{1})(\d{2})/", "\$1-\$2.\$3", $value);

	// }
	
	
	



/**
 *  Informnações do Estabelecimento ou Obra do Evebnto S-1005  
 */
$infoEstab = new Custom_Post_Type( 'Estabelecimento' );


$infoEstab->add_meta_box( 
    'Informações de identificação do estabelecimento', 
    array(
    	'tpInsc' => ['Tipo de Inscrição','select','options' => 
	        [
	        	["CNPJ", "1"],
				["CAEPF (Cadastro de Atividade Econômica de Pessoa Física","3"],
				["CNO (Cadastro Nacional de Obra)", "4"]
			]
		],
		'nrInsc'=> [ 'Número de Inscrição', 'text'],
		'iniValid'=>[ 'Início da Validade', 'month'],
		'fimValid'=>[ 'Fim da Validade', 'month'],
	)
);

global $wpdb;// $wpdb deve ser declarado global antes de ser utilizada

$arrCnae = $wpdb->get_results( "SELECT ID, CNAE, DESCRICAO FROM wp_cnae", ARRAY_A );// the optional parameter ARRAY_A turns the results into an array
// var_dump($arrCnae);
//////////Função para mostrar números com 7 caracteres, acrescentando 0s a direita////////////
function cnaeZeros($string)
{
	//str_repeat - função repete caracteres
	//strlen - função retorna o tamanho de uma string
	return str_repeat( '0',7 - strlen($string)).$string;
}
function cnaeFormatNumber($str)
{
	// Cada (\d{n})  representa uma subdivisão da string )
	return preg_replace("/(\d{4})(\d{1})(\d{2})/", "\$1-\$2.\$3",$str);
}

$outArray =[];
for ($i=0; $i < count($arrCnae); $i++) { 
		array_push($outArray, 
			[
				cnaeFormatNumber(cnaeZeros($arrCnae[$i]['CNAE'])).' - '. $arrCnae[$i]['DESCRICAO'],
				cnaeZeros($arrCnae[$i]['CNAE']), 'ID' => $arrCnae[$i]['ID']
		]);
}
$infoEstab->add_meta_box( 
    'Dados do Estabelecimento', 
    array(
    	'cnaePrep' => ['CNAE Preponderante','select','options' => $outArray
    	, 'class' =>	[ 'cnaeSelector']
    ],
    	'aliqRat' => [ 'Alíquota RAT', 'text'],
    	'fap' => [ 'Fator Acidentário de Prevenção - FAP', 'text' ],
    	'aliqRatAjust'=> [ 'Alíquota do RAT ajustad pelo FAP', 'text' ]
	)
);
$infoEstab->add_meta_box(
	'Informações sobre o processo administrativo ou judicial em que houve decisão/sentença favorável ao contribuinte modificando a alíquota RAT da empresa',
	[
		'tpProc'=>[ 'Tipo de processo', 'select', 'options'=>[
				['Administrativo', 1],
				['Judicial', 2]
			]
		],
		'nrProc'=>['Número do Processo', 'text'],
		'codSusp'=>[ 'Código do Indicativo da Suspensão', 'text' ]
	]
);
$infoEstab->add_meta_box(
	'Informações sobre o processo administrativo ou judicial em que houve decisão/sentença favorável ao contribuinte modificando a alíquota FAP aplicável ao contribuinte',
	[
		'tpProc'=>[ 'Tipo de processo', 'select', 'options'=>[
				['Administrativo', 1],
				['Judicial', 2],
				['Processo FAP', 4]
			]
		],
		'nrProc'=>['Número do Processo', 'text'],
		'codSusp'=>[ 'Código do Indicativo da Suspensão', 'text' ]
	]
);
$infoEstab->add_meta_box(
	'Informações relativas ao Cadastro da Atividade Econômica da Pessoa Física - CAEPF',
	[
		'tpCaepf' => ['Tipo de CAEPF','select', 'options' =>[
				['Contribuinte Individual', 1],
				['Produtor Rural', 2],
				['Segurado Especuial', 3]
			]
		]
	]
);
$infoEstab->add_meta_box(
	'Informações relacionadas a estabelecimentos inscritos no CNO',
	[
		'indSubstPatrObra'=>['Indicativo de Substituição da Contribuição Patronal de Obra de Construição Civil', 'select', 'options'=>[
				['Contrbuição Patronal Substituída', 1],
				['Contribuição Patronal não Substituída', 2]
			]
		]
	]
);
$infoEstab->add_meta_box(
	'Informações Trabalhistas Relativas ao Estabelecimento',
	[
		'regPt'=>['Opção de Registro de Ponto (jornada) adotada pelo estabelecimento', 'select', 'options'=>[
				['Não utiliza', '0'],
				['Manual',1],
				['Mecânico','2'],
				['Eletrônico (Portaria MTE 1.510/2009)', '3'],
				['Não Eletrônico alternativo (art. 1o. da Portaria MTE 373/2011)', '4'],
				['Eletrônico Alternativo (art. 2o. da Portaria MTE 373/2011)', '5'],
				['Eletrônico - outros', '6']
			]
		],
		'contApr'=>['Indicativo de Contratação de Aprendiz', 'select', 'options'=>[
				['Dispensado de acordo com a lei', '0'],
				['Dispensado, mesmo que parcialmente, em virtude de processo judicial', '1'],
				['Obrigado', '2']
			]
		],
		'nrProcJud'=>['Número do Processo Judicial', 'text'],
		'contEntEd'=>['Informar se o estabelecimento realiza a contratação de aprendiz por intermédio', 'select', 'options'=>[
				['Sim', 'S'],
				['Não', 'N']
			]
		]
	]
);
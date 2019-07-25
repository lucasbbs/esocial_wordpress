<?php
$empregador = new Custom_Post_Type( 'Empregador' );
 
$empregador->add_meta_box( 
    'Inscrição do Empregador', 
    array(
        'tpInsc'=> ['Tipo de Inscrição', 'select','options' => [[ 'CNPJ',  '1' ],[ 'CPF', '2' ]] ],
        'nrInsc'=> ['Número da Inscrição','text']
    )
);
 
$empregador->add_meta_box( 
    'Informações do Empregador', 
    array(
        'nmRazao' => ['Nome','text'],
        'classTrib' => ['Classificação Tributária ','select','options' => 
	        [
	        	["Empresa   enquadrada   no   regime   de   tributação   Simples   Nacional   com   tributação   previdenciária substituída", 1],
				["Empresa  enquadrada  no  regime  de  tributação  Simples  Nacional  com  tributação  previdenciária  não substituída",2],
				["Empresa   enquadrada   no   regime   de   tributação   Simples   Nacional   com   tributação   previdenciária substituída e não substituída", 3],
				["MEI - Micro Empreendedor Individual", 4],
				["Agroindústria", 6],
				["Produtor Rural Pessoa Jurídica", 7],
				["Consórcio Simplificado de Produtores Rurais", 8],
				["Órgão Gestor de Mão de Obra", 9],
				["Entidade Sindical a que se refere a Lei 12.023/2009", 10],
				["Associação Desportiva que mantém Clube de Futebol Profissional", 11],
				["Banco,  caixa  econômica,  sociedade  de  crédito,  financiamento  e  investimento  e  demais  empresas relacionadas no parágrafo 1º do art. 22 da Lei 8.212./91", 13],
				["Sindicatos em geral, exceto aquele classificado no código [10] - Lei 12.023/2009", 14],
				["Pessoa Física, exceto Segurado Especial", 21],
				["Segurado Especial, inclusive quando for empregador doméstico", 22],
				["Missão Diplomática ou Repartição Consular de carreira estrangeira", 60],
				["Empresa de que trata o Decreto 5.436/2005", 70],
				["Entidade Beneficente de Assistência Social isenta de contribuições sociais", 80],
				["Administração  Direta  da  União,  Estados,  Distrito  Federal  e  Municípíos;  Autarquias  e  Fundações Públicas", 85],
				["Pessoas Jurídicas em Geral", 99]
			]
		],
        'natJurid' => ['Natureza Jurídica' ,'select', 'options' =>
        	[
				["Órgão Público do Poder Executivo Federal","101-5","natjur1"],
				["Órgão Público do Poder Executivo Estadual ou do Distrito Federal","102-3","natjur1"],
				["Órgão Público do Poder Executivo Municipal","103-1","natjur1"],
				["Órgão Público do Poder Legislativo Federal","104-0","natjur1"],
				["Órgão Público do Poder Legislativo Estadual ou do Distrito Federal","105-8","natjur1"],
				["Órgão Público do Poder Legislativo Municipal","106-6","natjur1"],
				["Órgão Público do Poder Judiciário Federal","107-4","natjur1"],
				["Órgão Público do Poder Judiciário Estadual","108-2","natjur1"],
				["Autarquia Federal","110-4","natjur1"],
				["Autarquia Estadual ou do Distrito Federal","111-2","natjur1"],
				["Autarquia Municipal","112-0","natjur1"],
				["Fundação Pública de Direito Público Federal","113-9","natjur1"],
				["Fundação Pública de Direito Público Estadual ou do Distrito Federal","114-7","natjur1"],
				["Fundação Pública de Direito Público Municipal","115-5","natjur1"],
				["Órgão Público Autônomo Federal","116-3","natjur1"],
				["Órgão Público Autônomo Estadual ou do Distrito Federal","117-1","natjur1"],
				["Órgão Público Autônomo Municipal","118-0","natjur1"],
				["Comissão Polinacional","119-8","natjur1"],
				["Fundo Público","120-1","natjur1"],
				["Consórcio Público de Direito Público (Associação Pública)","121-0","natjur1"],
				["Consórcio Público de Direito Privado","122-8","natjur1"],
				["Estado ou Distrito Federal","123-6","natjur1"],
				["Município","124-4","natjur1"],
				["Fundação Pública de Direito Privado Federal","125-2","natjur1"],
				["Fundação Pública de Direito Privado Estadual ou do Distrito Federal","126-0","natjur1"],
				["Fundação Pública de Direito Privado Municipal","127-9","natjur1"],
				["Empresa Pública","201-1","natjur2"],
				["Sociedade de Economia Mista","203-8","natjur2"],
				["Sociedade Anônima Aberta","204-6","natjur2"],
				["Sociedade Anônima Fechada","205-4","natjur2"],
				["Sociedade Empresária Limitada","206-2","natjur2"],
				["Sociedade Empresária em Nome Coletivo","207-0","natjur2"],
				["Sociedade Empresária em Comandita Simples","208-9","natjur2"],
				["Sociedade Empresária em Comandita por Ações","209-7","natjur2"],
				["Sociedade em Conta de Participação","212-7","natjur2"],
				["Empresário (Individual)","213-5","natjur2"],
				["Cooperativa","214-3","natjur2"],
				["Consórcio de Sociedades","215-1","natjur2"],
				["Grupo de Sociedades","216-0","natjur2"],
				["Estabelecimento, no Brasil, de Sociedade Estrangeira","217-8","natjur2"],
				["Estabelecimento, no Brasil, de Empresa Binacional Argentino-Brasileira","219-4","natjur2"],
				["Empresa Domiciliada no Exterior","221-6","natjur2"],
				["Clube/Fundo de Investimento","222-4","natjur2"],
				["Sociedade Simples Pura","223-2","natjur2"],
				["Sociedade Simples Limitada","224-0","natjur2"],
				["Sociedade Simples em Nome Coletivo","225-9","natjur2"],
				["Sociedade Simples em Comandita Simples","226-7","natjur2"],
				["Empresa Binacional","227-5","natjur2"],
				["Consórcio de Empregadores","228-3","natjur2"],
				["Consórcio Simples","229-1","natjur2"],
				["Empresa Individual de Responsabilidade Limitada (de Natureza Empresária)","230-5","natjur2"],
				["Empresa Individual de Responsabilidade Limitada (de Natureza Simples)","231-3","natjur2"],
				["Sociedade Unipessoal de Advogados","232-1","natjur2"],
				["Cooperativas de Consumo","233-0","natjur2"],
				["Serviço Notarial e Registral (Cartório)","303-4","natjur3"],
				["Fundação Privada","306-9","natjur3"],
				["Serviço Social Autônomo","307-7","natjur3"],
				["Condomínio Edilício","308-5","natjur3"],
				["Comissão de Conciliação Prévia","310-7","natjur3"],
				["Entidade de Mediação e Arbitragem","311-5","natjur3"],
				["Entidade Sindical","313-1","natjur3"],
				["Estabelecimento, no Brasil, de Fundação ou Associação Estrangeiras","320-4","natjur3"],
				["Fundação ou Associação Domiciliada no Exterior","321-2","natjur3"],
				["Organização Religiosa","322-0","natjur3"],
				["Comunidade Indígena","323-9","natjur3"],
				["Fundo Privado","324-7","natjur3"],
				["Órgão de Direção Nacional de Partido Político","325-5","natjur3"],
				["Órgão de Direção Regional de Partido Político","326-3","natjur3"],
				["Órgão de Direção Local de Partido Político","327-1","natjur3"],
				["Comitê Financeiro de Partido Político","328-0","natjur3"],
				["Frente Plebiscitária ou Referendária","329-8","natjur3"],
				["Organização Social (OS)","330-6","natjur3"],
				["Demais Condomínios","331-0","natjur3"],
				["Associação Privada","399-9","natjur3"],
				["Empresa Individual Imobiliária","401-4","natjur4"],
				["Segurado Especial","402-2","natjur4"],
				["Contribuinte individual","408-1","natjur4"],
				["Candidato a Cargo Político Eletivo","409-0","natjur4"],
				["Leiloeiro","411-1","natjur4"],
				["Produtor Rural (Pessoa Física)","412-4","natjur4"],
				["Organização Internacional","501-0","natjur5"],
				["Representação Diplomática Estrangeira","502-9","natjur5"],
				["Outras Instituições Extraterritoriais","503-7","natjur5"]
			]
        ],
        'indCoop' => ['Indicativo de Cooperativa','select','options' => 
	        [
	        	["Não é Cooperativa", "0"],
				["Cooperativa de Trabalho","1"],
				["Cooperativa de Produção", "2"],
				["Outras Cooperativas", "3"]
			]
		],
		'indConstr' => ['Indicativo de Construtora','select','options' => 
	        [
	        	["Não é Construtora", "0"],
				["Empresa Construtora","1"]
			]
		],
		'indDesFolha' => ['Indicativo de Desoneração de Folha','select','options' => 
	        [
	        	["Não Aplicável", "0"],
				["Empresa enqudrada nos art. 7o. e 9o. da Leiu 12.456/2011","1"]
			]
		],
		'indOpcCP' => ['Indicativo da opção pelo produtor rural pela forma de tributação da contribuição previdenciária, nos termos do art. 25, §13, da Lei 8.212/1991 e do art. 25, §7°, da Lei 8.870/1994','select','options' => 
	        [
	        	["Sobre a comercialização de sua produçáo", "1"],
				["Sobre a folha de pagamentos","2"]
			]
		],
		'indOptRegEletron' => ['Indicativo se houve opção pelo registro eletrônico de empregados','select','options' => 
	        [
	        	["Não optou pelo registro eletrônico de empregados", "0"],
				["Optou pelo registro eletrônico de empregados","1"]
			]
		],
		'indEntEd' => ['Indicativo de entidade educativa','select','options' => 
	        [
	        	["Não", "N"],
				["Sim","S"]
			]
		],
		'indEtt' => ['Indicativo de Empresa de Trabalho Temporário','select','options' => 
	        [
	        	["Não é Empresa de Trabalho Temporário", "N"],
				["Empresa de Trabalho Temporário","S"]
			]
		],
		'nrRegEtt' => ['Número do registro da Empresa de Trabalho Temporário no Ministério do Trabalho','text']
	)
);

// $book->add_meta_box( 
//     'Info', 
//     array(
//         'Rating'=> ['select','options' => [[ 'Um',  '1' ],[ 'Dois', '2' ]] ],
//         'Rating International'=> ['radio','options' => [[ 'Um',  '1' ],[ 'Dois', '2' ]] ]
//     )
// );

<?php
	include "../model/conexao.php";
	
	$plano = isset($_GET['plano']) ? $_GET['plano'] : NULL;


	if($plano === "1"){
		echo "
			<label class='col-sm-12 control-label padding-top-7px'>
	            Nós da SearchFood queremos que nossos usuários tenham sempre um leque com uma grande variedade de 
	            serviços oferecidos por você! Só assim poderemos garantir ótimas opções em  qualquer campo seja custo-beneficio, 
	            qualidade ou distancia. Vale lembrar que nossos anúncios  são rotativos e quantos mais cliques seu anúncio 
	            receber mais ele será disponibilizado na tela dos usuários, além é claro de sempre ter prioridade quando o tipo de especialidade 
	            de seu anúncio for pesquisado.
			</label>

			<div class='borda-ver-admin'>
				<p style='font-weight: bold;font-size: 18px;margin-left: 13px;'>Descrição:</p>

				<p style='font-weight: bold;font-size: 15px;margin-left: 13px;'> <u>Plano Basic R$19,90:</u> </br>
				O Plano Básico é o ideal pra você que quer iniciar seu marketing na SearchFood e ver na prática os resultados de nossa rede de anúncios!
				Quantidade de Anúncios: <u> 5 Anuncios </u> rotativos na especialidade escolhida. 
				<u>Validade: 30 dias corridos</u> a contar da data da contratação do plano. </p> 
			</div>";
	}elseif($plano === "2"){
		echo "
			<label class='col-sm-12 control-label padding-top-7px'>
	            Nós da SearchFood queremos que nossos usuários tenham sempre um leque com uma grande variedade de 
	            serviços oferecidos por você! Só assim poderemos garantir ótimas opções em  qualquer campo seja custo-beneficio, 
	            qualidade ou distancia. Vale lembrar que nossos anúncios  são rotativos e quantos mais cliques seu anúncio 
	            receber mais ele será disponibilizado na tela dos usuários, além é claro de sempre ter prioridade quando o tipo de especialidade 
	            de seu anúncio for pesquisado.
			</label>

			<div class='borda-ver-admin'>
				<p style='font-weight: bold;font-size: 18px;margin-left: 13px;'>Descrição:</p>

				<p style='font-weight: bold;font-size: 15px;margin-left: 13px;'> <u>Plano Standart R$39,90:</u> </br>
				Nosso Plano Standart além de trazer o dobro da quantidade de anúncios e mais que o dobro da validade, é possível a edição dos anúncios. Isso mesmo! Se você optar pelo Standart poderá editar todos os campos de seus anúncios! Você poderá mensurar o retorno de cada anúncio e adequa-los da maneira que desejar, sejam as fotos, valores, titulos ou descrições.
				Quantidade de Anúncios: <u> 10 Anúncios</u> rotativos editáveis na especialidade escolhida. 
				<u>Validade: 70 dias corridos</u> a contar da data da contratação do plano. </p> 
			</div>";
	}elseif($plano === "3"){
		echo "
			<label class='col-sm-12 control-label padding-top-7px'>
	            Nós da SearchFood queremos que nossos usuários tenham sempre um leque com uma grande variedade de 
	            serviços oferecidos por você! Só assim poderemos garantir ótimas opções em  qualquer campo seja custo-beneficio, 
	            qualidade ou distancia. Vale lembrar que nossos anúncios  são rotativos e quantos mais cliques seu anúncio 
	            receber mais ele será disponibilizado na tela dos usuários, além é claro de sempre ter prioridade quando o tipo de especialidade 
	            de seu anúncio for pesquisado.
			</label>

			<div class='borda-ver-admin'>
				<p style='font-weight: bold;font-size: 18px;margin-left: 13px;'>Descrição:</p>

				<p style='font-weight: bold;font-size: 15px;margin-left: 13px;'> <u>Plano Gold R$55,90: </u> </br>
				O Plano Gold sem dúvidas oferece o melhor custo benefício dentre os planos. Além de superar todas as vantagens do plano standart como a quantidade de anúncios e maior validade, só os assinantes do Plano Gold tem direito ao anúncio HOT! Não entendeu? Anúncios HOT são os anúncios de maior evidência na rede SearchFood, aqueles que independente da busca do usuário sempre serão sugestão aos nossos usuários, se você preza por qualidade e um bom marketing, esse é o seu plano!
				Quantidade de Anúncios: <u>15 Anúncios</u> rotativos editáveis na especialidade escolhida e 3 Anúncios rotativos HOT. 
				<u>Validade: 100 dias corridos</u> a contar da data da contratação do plano.  </p> 
			</div>";
	}else{
		echo "
			<label class='col-sm-12 control-label borda-ver-admin padding-top-7px'>
	            Nós da SearchFood queremos que nossos usuários tenham sempre um leque com uma grande variedade de 
	            serviços oferecidos por você! Só assim poderemos garantir ótimas opções em  qualquer campo seja custo-beneficio, 
	            qualidade ou distancia. Vale lembrar que nossos anúncios  são rotativos e quantos mais cliques seu anúncio 
	            receber mais ele será disponibilizado na tela dos usuários, além é claro de sempre ter prioridade quando o tipo de especialidade 
	            de seu anúncio for pesquisado.
			</label>
		";
	}

?> 		

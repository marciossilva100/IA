# CHATBOT API

    API para CHATBOT
    Sua função é simular um chat. Quando é enviado uma conversa a API retorna uma mensagem de texto simulando um bate-papo. 


## Configurações: 

Para consumo da API é necessário passar os parametros necessários na URL: https://papoartificial.com.br/api/chat. É necessário fazer a requisição utilizando o metodo POST.

### Dados passados como parâmetro

* 'msg': mensagem de texto
* 'person': 1(masculino) ou 2(feminino)
* 'id_cliente': número inteiro para identificar o usuário

Exemplo: https://papoartificial.com.br/api/chat?msg=ola tudo bem&person=2&id_cliente=1

### Dados retornados

* 'resposta': resposta do chat
* 'min': minuto atual da resposta
* 'sec': segundo atual da resposta

Exemplo:
{
    "resposta": "Olá, prazer em conhece-lo",
    "min": 5,
    "sec": "48"
}



### Tecnologias usadas
* LARAVEL
* PHP
* HTML5
* CSS
* BANCO DE DADOS RELACIONAL
* JAVASCRIPT
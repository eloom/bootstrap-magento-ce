# Bootstrap para Magento - élOOm

## Funcionalidades

- Log com Log4php;

- Conector com os **Métodos de Pagamento** da élOOm;

- Auto-complete de endereços;

- Carregamento das Bibliotecas jQuery e suas dependências.

## Dependências

[Apache Ant](https://ant.apache.org/) para publicar o projeto no **ambiente de desenvolvmento** e gerar os pacotes para o **ambiente de produção**.

## Compatibilidade

Magento 1.9.3.x

PHP/PHP-FPM 5.6

## Começando

- Publicando no **ambiente local**

	- no arquivo **build-desenv.properties**, informe o path do **Document Root** na propriedade "projetos.path";
	
	- na raiz deste projeto, execute, no prompt, o comando ```ant -f build-desenv.xml```.
	
	
	> A tarefa Ant irá copiar todos os arquivos do projeto no seu Magento e limpar a cache.
	

- Publicando para o **ambiente de produção**

	- na raiz deste projeto, execute, no prompt, o comando ```ant -f build-producao.xml```.
	
	
	> A tarefa Ant irá gerar um pacote no formato .zip, no caminho definido na propriedade "projetos.path", do arquivo **build-producao.properties**.


### Release Notes

1.0.0 - Lançamento

1.0.4 - Added: Suporte aos blocos de totais para todos os Métodos de Pagamento da élOOm.

1.0.5 - Added: Suporte ao Método de Pagamento Yapay.
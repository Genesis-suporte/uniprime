
<p align="center">&nbsp;</p>
<p align="center">
  <a href="https://uniprime.com.br/">
    <img alt="Uniprime" src="./web/app/themes/uniprime/assets/images/UniPrime-logo-branco.png" height="45">
  </a>
</p>

<p align="center">Este projeto é uma instalação do WordPress utilizando o **Bedrock** como estrutura de organização de arquivos e configuração, em um ambiente **multisite** com subdiretórios. O WordPress Multisite permite gerenciar múltiplos sites a partir de uma única instalação, enquanto o Bedrock melhora a organização, controle de dependências e segurança.</p>

## Pré-requisitos

- PHP >= 8.0
- Composer
- Servidor web (Nginx ou Apache)
- Banco de dados MySQL/MariaDB

## Instalação

Siga as instruções abaixo para configurar o ambiente de desenvolvimento local.

### 1. Instalar Dependências do Composer

Navegue até a pasta `app/bedrock` e rode o seguinte comando para instalar as dependências do projeto:

```bash
composer install
```


Nota: Antes de rodar o comando, recomenda-se remover a pasta vendor e o arquivo composer.lock para evitar conflitos de versão.

### 2. Configurar o Banco de Dados
O banco de dados de desenvolvimento local está incluído em app/sql/local.sql. Siga estes passos para importar e configurar corretamente:

#### 1. Importe o arquivo local.sql para seu banco de dados.
#### 2. Após a importação, use uma ferramenta como WP-CLI ou um script SQL para substituir as URLs do site antigo pelo novo endereço local. Exemplo:

```bash
wp search-replace 'uniprime.local' 'novouniprime.local' --all-tables
```

#### 3. Atualize as informações de conexão com o banco de dados no arquivo .env.

### 4. Configuração do Nginx
Para configurar o Nginx, há dois arquivos de configuração na pasta app/sql que servem como modelos. Esses arquivos contêm as configurações recomendadas para o Nginx funcionar com o Bedrock e o WordPress multisite.

### 5. Concluir a Configuração
Acesse o site pelo navegador para verificar se tudo está funcionando corretamente. Caso veja erros de reescrita de URL, pode ser necessário ajustar as configurações de permalinks ou do Nginx.

## Estrutura do Projeto
app/bedrock: Arquivos principais do WordPress com a estrutura do Bedrock.
app/sql: Scripts SQL e arquivos de configuração do Nginx para facilitar a configuração do projeto.
web: Pasta raiz onde os arquivos do WordPress são servidos, configurada pelo Bedrock.

## Notas sobre o WordPress Multisite e Bedrock
Este projeto utiliza o WordPress em modo multisite, que permite a criação e gerenciamento de vários sites na mesma instalação. A estrutura do Bedrock é utilizada para organizar o projeto de forma mais modular e segura, separando as dependências do Composer e as configurações de ambiente, além de melhorar o fluxo de deploy e controle de versões.

Para mais informações sobre o Bedrock, consulte a documentação oficial em <a href="https://roots.io/bedrock/">Roots Bedrock</a>.

#

<p align="center">
  <a href="https://uniprime.local">Website</a> &nbsp;&nbsp; <a href="https://uniprime.local/wp-admin/">Admin</a>
</p>
<p align="center">
  <a href="../docs/Manual do usuário - admin.pdf">Manual do usuário - Admin</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="../docs/Manual do usuário - autor.pdf">Manual do usuário - Autor</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="../docs/Manual do usuário - super-admin.pdf">Manual do usuário - Super Admin</a>
</p>

## Desenvolvimento

Planejado e desenvolvido por [GENESiS](https://www.genesis.digital).

<div align="center">
<a href="https://www.genesis.digital"><img src="https://genesis.digital/wp-content/uploads/2024/06/genesis-Agencia-de-Marketing-Digital-Porto-Alegre-Logo.webp" alt="GENESiS" width="147" height="39"></a> 
</div>

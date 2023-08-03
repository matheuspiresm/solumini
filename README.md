# Projeto Solumini

Este projeto é um site de cadasto que permite ao usuário fazer o gerencimento de empresas cadastradas

Para informações mais detalhadas leia o arquivo: [solumini.md](https://github.com/matheuslpiresm/solumini/blob/main/solumini.md)
 
## 🔨 Funcionalidades do usuário

### Deslogado do sistema:

- Pode listar todas empresas e consultar suas categorias, ver a data de vencimento dos contratos, sendo inativos ou ativos

- Ver detalhes gerais das empresas como: nome, cidade, estado, telefone, descrição...

### Logado no sistema:

- Os usuários após conectados no sistema, passam a ter acesso a duas novas abas que são: 

- Empresas: Os usuários podem cadastrar empresas, editar registros e excluir do banco de dados

- Contratos: Os usuários pode cadastrar contratos, editar registros e excluir do banco de dados


## 🛠️ Técnologias utilizadas

- [HTML](https://developer.mozilla.org/pt-BR/docs/Web/HTML)
- [CSS](https://developer.mozilla.org/pt-BR/docs/Web/CSS)
- [PHP](https://www.php.net/)
- [Booststrap](https://getbootstrap.com/)
- [XAMPP](https://www.apachefriends.org/pt_br/index.html)


## 📦 Baixar e acessar o projeto

### Baixando os arquivos
```bash
# Clone esse repositório em seu computador

❯ git clone https://github.com/matheuslpiresm/solumini.git
```

### Criando o banco de dados

1. Configure seu servidor web para apontar para a pasta raiz do projeto.

2. Crie um banco de dados MySQL para o projeto e importe o arquivo solumini.sql disponível na pasta sql.

3. Configure as informações do banco de dados no arquivo config.php, localizado na pasta includes.

```bash
$servername = "seu_servidor";
$username = "seu_usuario";
$password = "sua_senha";
$dbname = "seu_banco_de_dados";
````
4. Crie uma tabela com nome usuarios com os campos, id, nome, email e senha e preencha os dados

5. Faça login e pronto.


## ⚙️ Requisitos do Sistema

Para executar este projeto localmente, você precisará das seguintes ferramentas:

1. Servidor Web (Apache, Nginx, XAMPP)
2. PHP (versão 5.6 ou superior)
3. MySQL ou outro servidor de banco de dados compatível com SQL



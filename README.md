<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Daisy Garden é especializada na venda de flores e plantas, oferecendo uma plataforma online para uma experiência de compra intuitiva e segura.">
    <meta name="keywords" content="flores, plantas, e-commerce, Daisy Garden, compra online">
    <meta name="author" content="Ana Alice Rodrigues">
    
</head>
<body>

<header>
    <h1>Daisy´s Garden</h1>
    <img src="/img/loja.jpg" alt="Fachada da loja Daisy's Garden" width="300" height="200">
</header>

<details>
    <summary>Índice</summary>
    <ol>
        <li><a href="#sobre-o-projeto">Sobre o projeto</a></li>
        <li><a href="#parte-tecnica">Parte Técnica</a></li>
        <li><a href="#estrutura-dos-arquivos">Estrutura dos Arquivos</a></li>
        <li><a href="#casos-de-uso">Casos de Uso</a></li>
        <li><a href="#ferramentas">Ferramentas</a></li>
        <li><a href="#contato">Contato</a></li>
    </ol>
</details>

<section id="sobre-o-projeto">
    <h2>Sobre o projeto</h2>
    <p>
       Daisy Garden é especializada na venda de flores e plantas. O sistema oferece uma interface intuitiva onde os clientes podem navegar, selecionar e comprar flores, facilitando a experiência de compra online. A plataforma também inclui funcionalidades como registro de usuário, login, gestão de carrinho de compras, busca de produtos e pagamento seguro.
    </p>
    <p>
        Público-Alvo: Clientes interessados em comprar flores para diversas ocasiões, como decoração de ambientes, eventos especiais ou presente para entes queridos.
    </p>
    <p>
        Proposta de Valor: Oferecer uma experiência de compra conveniente, com uma seleção diversificada de flores, facilidade de navegação e processos de compra e entrega eficientes.
    </p>
</section>

<section id="parte-tecnica">
    <h2>Parte Técnica</h2>
    <ul>
        <li>Backend: PHP é utilizado para a lógica do servidor, gerenciamento de sessões, autenticação de usuários, e manipulação do carrinho de compras.</li>
        <li>Frontend: HTML5, CSS3 e Bootstrap são utilizados para criar uma interface responsiva e atraente. JavaScript é usado para dinamizar interações do usuário sem recarregar a página.</li>
        <li>Banco de Dados: MySQL para armazenar dados de usuários, produtos, pedidos e detalhes de pagamento.</li>
    </ul>
</section>

<section id="estrutura-dos-arquivos">
    <h2>Estrutura dos Arquivos</h2>
    <ul>
        <li>auth_check.php: Autenticação de usuário, verificando se o usuário está logado antes de permitir acesso a páginas restritas.</li>
        <li>carrinho.php: Gerencia adições, remoções e listagem de itens no carrinho de compras.</li>
        <li>endereco.php: Formulário para os usuários inserirem ou atualizarem informações de entrega.</li>
        <li>limpar_carrinho.php: Permite aos usuários esvaziar o carrinho de compras.</li>
        <li>login-cadastro.php: Página combinada para login e registro de novos usuários.</li>
        <li>login.php e logout.php: Gerenciamento de sessões de login e logout.</li>
        <li>pagamento.php: Interface para processamento de pagamentos.</li>
        <li>processar_endereco.php: Backend para processar as informações de endereço submetidas.</li>
        <li>produtos.php: Exibição e busca de produtos disponíveis.</li>
        <li>registro.php: Registro de novos usuários.</li>
        <li>index.php: Página inicial do site, com carrossel de imagens e links rápidos para outras áreas do site.</li>
    </ul>
</section>

<section id="casos-de-uso">
    <h2>Casos de Uso</h2>
    <ul>
        <li>Compra de Produtos: Usuários podem buscar, selecionar e comprar produtos diretamente pelo site, usando o sistema de carrinho de compras e checkout seguro.</li>
        <li>Gerenciamento de Usuário: Usuários podem se registrar, fazer login/logout, e gerenciar suas informações pessoais através de uma interface segura.</li>
        <li>Administração: Administração do site pode adicionar, remover ou modificar informações de produtos, gerenciar pedidos e interagir com dados de usuários.</li>
    </ul>
</section>

<section id="ferramentas">
    <h2>Ferramentas</h2>
    <ul>
        <li><img src="https://img.shields.io/badge/HTML-239120?style=for-the-badge&logo=html5&logoColor=white" alt="Badge HTML5"></li>
        <li><img src="https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white" alt="Badge CSS3"></li>
        <li><img src="https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black" alt="Badge JavaScript"></li>
        <li><img src="https://img.shields.io/badge/Bootstrap-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white" alt="Badge Bootstrap"></li>
        <li><img src="https://img.shields.io/badge/GIT-E44C30?style=for-the-badge&logo=git&logoColor=white" alt="Badge Git"></li>
        <li><img src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="Badge PHP"></li>
    </ul>
</section>

<section id="contato">
    <h2>Contato</h2>
    <ul>
        <li><a href="https://linktr.ee/anaeanali5" target="_blank"><img src="https://img.shields.io/badge/Ana_Alice_Rodrigues-blue?style=for-the-badge" alt="Perfil de Ana Alice Rodrigues"></a></li>
        <li><a href="" target="_blank"><img src="https://img.shields.io/badge/Vercel-000000?style=for-the-badge&logo=vercel&logoColor=white" alt="Hospedado na Vercel"> clique para acessar o projeto</a></li>
    </ul>
</section>

</body>
</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{% block title %}{% endblock %}</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{BASE}}img/favicon.ico">
    <!-- CSS -->
    <link rel="stylesheet" href="{{BASE}}css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{BASE}}css/styles.css">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    {% block head %}{% endblock %}
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-primary navbar-dark">
        <div class="container-fluid px-4 max-width">
            <!-- Logo + nome -->
            <a class="navbar-brand col-3" href="#">
                <img src="{{BASE}}img/logo.png" alt="Logo My Receitas" width="25" height="25" class="logo-topo d-inline-block align-text-top">
                My Receitas
            </a>

            <!-- Botão mobile -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Menu colapsável -->
            <div class="collapse navbar-collapse" id="navbarColor01">
                <!-- Itens à esquerda -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{BASE}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{BASE}}categoria/">Categoria</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{BASE}}receita/">Nova Receita</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{BASE}}sobre/">Sobre</a>
                    </li>
                </ul>

                <!-- Formulário de busca à direita -->
                <form class="d-flex" role="search">
                    <input class="form-control me-2 " type="search" placeholder="Pesquise uma receita..." aria-label="Search">
                    <button class="btn btn-secondary" type="submit">Pesquisar</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="max-width mt-4 p-2">
        {% block body %}
        {% endblock %}
    </div>


    <script src="{{BASE}}js/script.js"></script>

</body>

</html>
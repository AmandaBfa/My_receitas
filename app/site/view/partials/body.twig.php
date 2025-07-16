{% apply spaceless %}
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{% block title %}{% endblock %}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{BASE}}img/favicon.ico">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{BASE}}css/bootstrap.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{BASE}}css/styles.css">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    {% block head %}{% endblock %}
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-primary navbar-dark shadow-sm">
        <div class="container px-4">
            <!-- Logo e nome -->
            <a class="navbar-brand d-flex align-items-center gap-2" href="{{BASE}}">
                <img src="{{BASE}}img/logo.png" alt="Logo My Receitas" width="30" height="30" class="d-inline-block">
                <span class="fw-bold">My Receitas</span>
            </a>

            <!-- Botão mobile -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Itens do menu -->
            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <!-- <li class="nav-item"><a class="nav-link active" href="{{BASE}}">Home</a></li> -->
                    <li class="nav-item"><a class="nav-link" href="{{BASE}}categoria/">Categoria</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{BASE}}receita/">Receitas</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{BASE}}sobre/">Sobre</a></li>
                </ul>

                <!-- Busca -->

                <form class="d-flex" method="get" action="{{BASE}}pesquisa/" id="frmPesquisa" onsubmit="return pesquisar();">
                    <div class="input-group">
                        <input class="form-control" type="search" placeholder="Pesquise uma receita.." minlength="2" required name="txtPesquisa" id="txtPesquisa">
                        <button class="btn btn-outline-light" type="submit">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </form>
                <!-- <form class="d-flex" method="get" action="{{BASE}}pesquisa/" id="frmPesquisa" onsubmit="return pesquisar();">
                    <input class="form-control mr-sm-2" type="text" placeholder="Pesquise uma receita..." minlength="2" required name="txtPesquisa" id="txtPesquisa">
                    <button class="btn btn-outline-light" type="button" onclick="pesquisar();"><i class="bi bi-search me-2"></i>Pesquisar</button>
                </form> -->
            </div>
        </div>
    </nav>

    <div class="container mt-4 p-2">
        {% block body %}
        {% endblock %}
    </div>

    <script src="{{BASE}}js/script.js"></script>
    <script src="{{BASE}}js/bootstrap.bundle.min.js"></script>

</body>

</html>

{% endapply %}
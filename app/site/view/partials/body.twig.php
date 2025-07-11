<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{% block title %}{% endblock %}</title>
    <link rel="shortcut icon" href="{{BASE}}public/img/favicon.ico">
    <link rel="stylesheet" href="{{BASE}}public/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{BASE}}public/css/styles.css">
    {% block head %}{% endblock %}
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-primary navbar-dark">
        <div class="container-fluid px-4 max-width">
            <!-- Logo + nome -->
            <a class="navbar-brand col-3" href="#">
                <img src="{{BASE}}public/img/logo.png" alt="Logo My Receitas" width="25" height="25" class="logo-topo d-inline-block align-text-top">
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
                        <a class="nav-link active" aria-current="page" href="{{BASE}}public/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{BASE}}public/categoria/">Categoria</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{BASE}}public/receita/">Nova Receita</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{BASE}}public/sobre/">Sobre</a>
                    </li>
                    <!-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Separated link</a></li>
                        </ul>
                    </li> -->
                </ul>

                <!-- Formulário de busca à direita -->
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-secondary" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="max-width mt-4 p-2">
        {% block body %}
        {% endblock %}
    </div>

</body>

</html>
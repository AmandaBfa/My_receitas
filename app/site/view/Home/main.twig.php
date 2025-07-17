{% extends "partials/body.twig.php" %}

{% block title %}Home - My Receitas{% endblock %}

{% block head %}
{% endblock %}

{% block body %}

<div class="text-center mb-4">
    <h1 class="fw-bold"> My Receitas </h1>
    <!-- 🍳 -->
    <p class="lead text-muted">Receitas simples, rápidas e deliciosas para o seu dia a dia!</p>
</div>

<hr class="my-4">

<h2 class="text-center mb-4">Receitas em destaque 🍽️</h2>

{% for receitas in listaReceitas %}
<div class="row g-4">
    {% for receita in receitas %}
    <div class="col-md-4">
        <div class="card h-100 shadow-sm border-0">
            <a href="{{BASE}}receita/ver/{{receita.slug}}">
                <img src="{{receita.thumb}}" alt="{{receita.titulo}}" class="card-img-top img-thumb">
            </a>
            <div class="card-body d-flex flex-column">
                <h5 class="card-title fw-semibold">{{receita.titulo}}</h5>
                <p class="card-text text-muted small flex-grow-1">{{receita.linhafina}}</p>
                <a href="{{BASE}}receita/ver/{{receita.slug}}" class="btn btn-primary mt-3 w-100">
                    Ver Receita
                </a>
            </div>
        </div>
    </div>
    {% endfor %}
</div>
{% endfor %}

{% endblock %}
{% extends "partials/body.twig.php" %}

{% block title %}Home - My Receitas{% endblock %}

{% block head %}
{# Conteúdo específico para o head, se houver. Por exemplo, CSS ou JS. #}
{% endblock %}

{% block body %}

<h1 class="mb-4">Bem-vindo ao <strong>My Receitas</strong> 🥘</h1>

<p class="lead">Aqui você encontra receitas simples, rápidas e deliciosas para o dia a dia!</p>

<hr>

<h2 class="mt-5">Receitas em destaque 🍽️</h2>

{% for receitas in listaReceitas %}
<div class="row mt-4">
    {% for receita in receitas %}
    <div class="col-md-4 d-flex mb-3">
        <div class="card h-100 shadow-sm">
            <div class="card-header">{{receita.titulo}}</div>
            <div class="card-body d-flex flex-column">
                <p class="card-text flex-grow-1">{{receita.linhafina}}</p>
                <a href="{{BASE}}receita/ver/{{receita.slug}}">
                    <img src="{{receita.thumb}}" alt="{{receita.titulo}}" class="w-100 img-thumb" />
                </a>
            </div>
            <a href="{{BASE}}receita/ver/{{receita.slug}}" class="btn btn-outline-info w-100 mt-2">Acessar</a>
        </div>
    </div>
    {% endfor %}
</div>
{% endfor %}


{% endblock %}
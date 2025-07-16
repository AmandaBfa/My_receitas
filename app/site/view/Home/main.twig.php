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

<div class="row mt-3">
    {% set receitas = [
        {'img': 'bolo_de_cenoura.webp', 'titulo': 'Bolo de Cenoura', 'descricao': 'Um clássico fofinho com cobertura de chocolate!'},
        {'img': 'lasanha_de_carne.webp', 'titulo': 'Lasanha de Carne', 'descricao': 'Camadas de sabor que agradam toda a família.'},
        {'img': 'salada_tropical_1.jpg', 'titulo': 'Salada Tropical', 'descricao': 'Refrescante, colorida e cheia de vitaminas.'}
    ] %}

    {% for receita in receitas %}
    <div class="col-md-4 d-flex">
        <div class="card h-100 shadow-sm">
            <img src="{{BASE}}img/{{receita.img}}" class="card-img-top" alt="{{receita.titulo}}">
            <div class="card-body d-flex flex-column">
                <h5 class="card-title">{{receita.titulo}}</h5>
                <p class="card-text flex-grow-1">{{receita.descricao}}</p>
                <a href="#" class="btn btn-primary mt-auto">Ver receita</a>
            </div>
        </div>
    </div>
    {% endfor %}
</div>

{% endblock %}
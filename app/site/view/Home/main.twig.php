{% extends "partials/body.twig.php" %}

{% block title %}Home - My Receitas{% endblock %}

{% block head %}
{# Conteúdo específico para o head, se houver. Por exemplo, CSS ou JS. #}
{% endblock %}

{% block body %}
<!-----------------------------------------------------------------------
            Exemplo pratico para home feita pelo chatgpt 
 ------------------------------------------------------------------------>
<h1 class="mb-4">Bem-vindo ao <strong>My Receitas</strong> 🥘</h1>

<p class="lead">Aqui você encontra receitas simples, rápidas e deliciosas para o dia a dia!</p>

<hr>

<h2 class="mt-5">Receitas em destaque 🍽️</h2>

<div class="row mt-3">
    <div class="col-md-4">
        <div class="card">
            <img src="{{BASE}}img/bolo.jpg" class="card-img-top" alt="Bolo de Cenoura">
            <div class="card-body">
                <h5 class="card-title">Bolo de Cenoura</h5>
                <p class="card-text">Um clássico fofinho com cobertura de chocolate!</p>
                <a href="#" class="btn btn-primary">Ver receita</a>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <img src="{{BASE}}img/lasanha.jpg" class="card-img-top" alt="Lasanha de carne">
            <div class="card-body">
                <h5 class="card-title">Lasanha de Carne</h5>
                <p class="card-text">Camadas de sabor que agradam toda a família.</p>
                <a href="#" class="btn btn-primary">Ver receita</a>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <img src="{{BASE}}img/salada.jpg" class="card-img-top" alt="Salada tropical">
            <div class="card-body">
                <h5 class="card-title">Salada Tropical</h5>
                <p class="card-text">Refrescante, colorida e cheia de vitaminas.</p>
                <a href="#" class="btn btn-primary">Ver receita</a>
            </div>
        </div>
    </div>
</div>


{% endblock %}
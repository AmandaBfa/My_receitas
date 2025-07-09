{% extends "partials/body.twig.php" %}

{% block title %} Nova Categoria - My Receitas{% endblock %}

{% block head %}
{# Conteúdo específico para o head, se houver. Por exemplo, CSS ou JS. #}
{% endblock %}

{% block body %}
<h1>Nova Categoria</h1>

<hr>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="txtTitulo">Título</label>
            <input type="text" class="form-control" id="txtTitulo" name="Titulo" placeholder="">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="txtSlug">Slug</label>
            <input type="text" class="form-control" id="txtSlug" name="Slug" placeholder="">
        </div>
    </div>
</div>


{% endblock %}
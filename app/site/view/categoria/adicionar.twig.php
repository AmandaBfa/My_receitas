{% extends "partials/body.twig.php" %}

{% block title %} Nova Categoria - My Receitas {% endblock %}

{% block head %}
{# Conteúdo específico para o head, se houver. Por exemplo, CSS ou JS. #}
{% endblock %}

{% block body %}
<h1>Nova Categoria</h1>

<hr>

<form action="{{BASE}}categoria/insert" onsubmit="return validar(false)" method="post">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="txtTitulo">Título</label>
                <input type="text" class="form-control" id="txtTitulo" name="Titulo" placeholder="Título aqui" value="{{categoria.titulo}}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="txtSlug">Slug</label>
                <input type="text" class="form-control" id="txtSlug" name="Slug" placeholder="Titulo aqui" value="{{categoria.slug}}">
            </div>
        </div>
    </div>

    <div class="col-md-12 mt-3">
        <div id="dvAlert">
            <div class="text-warning"><i class="bi bi-exclamation-circle me-1 w-25"></i>Preencha corretamente todos os campos</div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-12 text-end">
            <button type="submit" value="Adicionar" class="btn btn-primary w-25">Adicionar</button>
        </div>
    </div>
</form>

<script src="{{BASE}}js/categoria.js"></script>

{% endblock %}
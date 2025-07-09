{% extends "partials/body.twig.php" %}

{% block title %}Home - My Receitas{% endblock %}

{% block head %}
{# Conteúdo específico para o head, se houver. Por exemplo, CSS ou JS. #}
{% endblock %}

{% block body %}
<h1>Categorias</h1>
<a href="{{BASE}}categoria/add/" class="btn btn-primary">Nova Categoria</a>
<!-- <a href="{{BASE}}public/categoria/edit/" class="btn btn-primary">Editar</a> -->

<hr>

<div class="overflow-auto">
    <table class="table table-houver table-dark">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Slug</th>
            </tr>
        </thead>
    </table>
</div>

{% endblock %}
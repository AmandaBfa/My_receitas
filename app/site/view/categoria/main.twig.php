{% extends "partials/body.twig.php" %}

{% block title %}Home - My Receitas{% endblock %}

{% block head %}
{# Conteúdo específico para o head, se houver. Por exemplo, CSS ou JS. #}
{% endblock %}

{% block body %}
<h1>Categorias</h1>
<a href="{{BASE}}categoria/adicionar/" class="btn btn-primary w-25">Nova Categoria</a>
<!-- <a href="{{BASE}}categoria/edit/" class="btn btn-primary">Editar</a> -->
<!-- <a href="{{BASE}}categoria/editar/{{categoriaId}}" class="btn btn-primary w-25">Editar</a> -->

<hr>

<div class="overflow-auto">
    <table class="table table-houver">
        <thead>
            <tr>
                <th>#ID</th>
                <th>Nome</th>
                <th>Slug</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            {% for categoria in listaCategoria %}
            <tr>
                <td>{{categoria.id}}</td>
                <td>{{categoria.titulo}}</td>
                <td>{{categoria.slug}}</td>
                <td>
                    <a href="{{BASE}}categoria/editar/{{categoria.id}}" class="btn btn-primary">Editar</a>
                    <!-- <a href="{{BASE}}categoria/excluir/{{categoria.id}}" class="btn btn-danger">Excluir</a> -->
                </td>
            </tr>
            {% else %}
            <tr>
                <td colspan="4" class="text-center">Nenhuma categoria encontrada.</td>
            </tr>
            {% endfor %}
        </tbody>
    </table>
</div>

{% endblock %}
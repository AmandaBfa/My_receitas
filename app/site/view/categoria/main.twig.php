{% extends "partials/body.twig.php" %}

{% block title %}Home - My Receitas{% endblock %}

{% block head %}
{# Se precisar, adicione CSS ou JS específico aqui #}
{% endblock %}

{% block body %}

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="fw-bold">Categorias</h1>
    <a href="{{BASE}}categoria/adicionar/" class="btn btn-success btn-lg">
        <i class="bi bi-plus-circle me-2"></i>Nova Categoria
    </a>
</div>

<div class="card shadow-sm rounded-4 p-3">
    <div class="table-responsive">
        <table class="table table-striped table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>#ID</th>
                    <th>Nome</th>
                    <th>Slug</th>
                    <th class="text-end"></th>
                </tr>
            </thead>
            <tbody>
                {% for categoria in listaCategoria %}
                <tr>
                    <td>{{categoria.id}}</td>
                    <td>{{categoria.titulo}}</td>
                    <td>{{categoria.slug}}</td>
                    <td class="text-end">
                        <a href="{{BASE}}categoria/editar/{{categoria.id}}" class="btn btn-primary btn-sm me-2">
                            <i class="bi bi-pencil-square"></i> Editar
                        </a>
                        {# Caso queira ativar excluir depois: #}
                        {# <a href="{{BASE}}categoria/excluir/{{categoria.id}}" class="btn btn-danger btn-sm">
                            <i class="bi bi-trash"></i> Excluir
                        </a> #}
                    </td>
                </tr>
                {% else %}
                <tr>
                    <td colspan="4" class="text-center text-muted">Nenhuma categoria encontrada.</td>
                </tr>
                {% endfor %}
            </tbody>
        </table>
    </div>
</div>

{% endblock %}
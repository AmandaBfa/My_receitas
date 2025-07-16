{% extends "partials/body.twig.php" %}

{% block title %} {{receita.titulo}} - My Receitas {% endblock %}

{% block body %}

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="fw-bold">
            <i class="bi bi-receipt"></i> {{receita.titulo}}
        </h1>
        <p class="text-muted mt-3">{{receita.linhaFina}}</p>
    </div>
    <div class="col-md-4 text-end">
        <a href="{{ BASE }}receita/editar/{{ receita.id }}" class="btn btn-outline-primary me-2 w-50">
            <i class="bi bi-pencil"></i> Editar Receita
        </a>
        <a href="{{ BASE }}receita/" class="btn btn-outline-primary w-25">
            <i class="bi bi-box-arrow-left"></i> Voltar
        </a>
    </div>
</div>

<div class="card shadow-sm rounded-4 p-4 mb-4">
    <h5 class="fw-bold mb-3">Informações da Receita</h5>
    <table class="table table-striped table-hover align-middle">
        <thead class="table-dark">
            <tr>
                <th>#ID</th>
                <th>Slug</th>
                <th>Categoria</th>
                <th>Data de Publicação</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{receita.id}}</td>
                <td>{{receita.slug}}</td>
                <td>{{receita.categoriaTitulo}}</td>
                <td>{{receita.data | date('d/m/Y H:i:s')}}</td>
            </tr>
        </tbody>
    </table>
</div>

<div class="card shadow-sm rounded-4 p-4">
    <h5 class="fw-bold mb-3">Descrição</h5>
    <div class="descricao-receita">
        {{receita.descricao | raw}}
    </div>
</div>

{% endblock %}
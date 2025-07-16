{% extends "partials/body.twig.php" %}

{% block title %} Receitas - My Receitas {% endblock %}

{% block head %}
{# Se quiser, adicione CSS ou JS customizado aqui. #}
{% endblock %}

{% block body %}
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="fw-bold">Receitas</h1>
    <a href="{{BASE}}receita/adicionar/" class="btn btn-success btn-lg">
        <i class="bi bi-plus-circle me-2"></i>Nova Receita
    </a>
</div>

<form action="{{BASE}}receita/" method="post">
    <div class="row">
        <div class="col-md-8">
            <select name="slCategoria" id="slCategoria" class="form-select" required>
                <option value="">Selecione uma categoria...</option>
                {% for categoria in listaCategorias %}
                <option value="{{categoria.id}}" {{categoria.id == categoriaId ? 'selected' : ''}}>{{categoria.titulo}}</option>
                {% endfor %}
            </select>
        </div>
        <div class="col-md-4">
            <input type="submit" value="Buscar" class="btn btn-success w-100" />
        </div>
    </div>
</form>

<div class="card shadow-sm rounded-4 p-3 mt-4">
    <div class="table-responsive">
        <table class="table table-striped table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Slug</th>
                    <th scope="col">categoria</th>
                    <th scope="col">Publicado</th>
                    <!-- <th scope="col">Data</th> -->
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                {% for receita in receitas %}
                <tr>
                    <td>{{receita.id}}</td>
                    <td>{{receita.titulo}}</td>
                    <td>{{receita.slug}}</td>
                    <td>{{receita.categoriaTitulo}}</td>
                    <!-- <td>
                        {% if receita.publicado %}
                        <span class="badge bg-success">Sim</span>
                        {% else %}
                        <span class="badge bg-secondary">Não</span>
                        {% endif %}
                    </td> -->
                    <td>{{receita.data|date("d/m/Y")}}</td>
                    <td class="text-end">
                        <a href="{{BASE}}receita/editar/{{receita.id}}" class="btn btn-primary w-25" title="Editar">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <a href="{{BASE}}receita/ver/{{receita.id}}" class="btn btn-info w-25" title="Visualizar">
                            <i class="bi bi-eye"></i>
                        </a>
                    </td>
                </tr>
                {% else %}
                <tr>
                    <td colspan="6" class="text-center">Nenhuma receita encontrada.</td>
                </tr>
                {% endfor %}
            </tbody>
        </table>
    </div>
</div>

{% endblock %}
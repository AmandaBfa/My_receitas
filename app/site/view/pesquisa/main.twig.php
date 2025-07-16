{% extends "partials/body.twig.php" %}

{% block title %} Pesquisa - My Receitas {% endblock %}

{% block body %}
<h1>Pesquisa</h1>

<p>Exibindo <span class="font-weight-bold">{{quantidadeResultado}}</span> resultado(s) para o termo <span class="font-weight-bold">{{termo}}</span>.</p>
<hr>

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

<!-- <div class="overflow-auto">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>#ID</th>
                <th>Nome</th>
                <th>Slug</th>
                <th>Categoria</th>
                <th>Publicado</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            {% for receita in receitas %}
            <tr>
                <td>{{ receita.id }}</td>
                <td>{{ receita.titulo }}</td>
                <td>{{ receita.slug }}</td>
                <td>{{ receita.categoriaTitulo }}</td>
                <td>{{ receita.data|date('d/m/Y H:i:s') }}</td>
                <td>
                    <a href="{{BASE}}receita/editar/{{receita.id}}" class="btn btn-warning">Editar</a>
                    <a href="{{BASE}}receita/ver/{{receita.id}}" class="btn btn-info ml-2">Ver</a>
                </td>
            </tr>
            {% endfor %}
        </tbody>
    </table>
</div> -->
{% endblock %}
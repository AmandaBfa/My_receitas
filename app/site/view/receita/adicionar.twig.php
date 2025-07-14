{% extends "partials/body.twig.php" %}

{% block title %} Nova Receita - My Receitas {% endblock %}

{% block head %}
{# Conteúdo específico para o head, se houver. Por exemplo, CSS ou JS. #}
{% endblock %}

{% block body %}
<h1>Nova Receita</h1>

<hr>

<form action="{{BASE}}receita/inserir" onsubmit="return validar(false)" method="post">
    <div class="row mt-4">
        <div class="col-md-5 mt-3">
            <div class="form-group">
                <label for="txtTitulo">Título</label>
                <input type="text" class="form-control" id="txtTitulo" name="Titulo" placeholder="Título aqui" value="{{categoria.titulo}}">
            </div>
        </div>
        <div class="col-md-4 mt-3">
            <div class="form-group">
                <label for="txtSlug">Slug</label>
                <input type="text" class="form-control" id="txtSlug" name="Slug" placeholder="Titulo aqui" value="{{categoria.slug}}">
            </div>
        </div>
        <div class="col-md-3 mt-3">
            <div class="form-group">
                <label for="slCategoria">Categoria</label>
                <select name="slCategoria" id="slCategoria" class="form-control">
                    <option value="">Selecione uma categoria</option>
                    {% for categoria in listaCategorias %}
                    <option value="{{categoria.id}}">{{categoria.titulo}}</option>
                    {% endfor %}
                </select>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-12 mt-3">
            <div class="form-group">
                <label for="txtLinhaFina">Linha Fina</label>
                <input type="text" class="form-control" id="txtLinhaFina" name="txtLinhaFina" placeholder="Descreva a receita" minlength="10" maxlength="250">
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-12 mt-3">
            <div class="form-group">
                <label for="txtDescricao">Conteúdo</label>
                <textarea id="txtDescricao" name="txtDescricao"></textarea>
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

<script src="{{BASE}}js/receita.js"></script>

<script src="{{BASE}}vendor/ckeditor/ckeditor.js"></script>

<script>
    CKEDITOR.replace('txtDescricao');
</script>

{% endblock %}
{% extends "partials/body.twig.php" %}

{% block title %} Nova Receita - My Receitas {% endblock %}

{% block head %}
{# Adicione estilos ou scripts específicos aqui, se necessário. #}
{% endblock %}

{% block body %}
<h1 class="mb-4 text-center">Nova Receita</h1>

<div class="card shadow-sm rounded-4 p-4">
    <form action="{{BASE}}receita/inserir" onsubmit="return validar(false)" method="post">
        <div class="row g-4">
            <div class="col-md-5">
                <label for="txtTitulo" class="form-label">Título da Receita</label>
                <input type="text" class="form-control" id="txtTitulo" name="txtTitulo" placeholder="Ex: Lasanha de Frango" value="" autocomplete="off" required>
            </div>

            <div class="col-md-4">
                <label for="txtSlug" class="form-label">Slug (URL)</label>
                <input type="text" class="form-control" id="txtSlug" name="txtSlug" placeholder="Ex: lasanha-de-frango" value="" autocomplete="off" required>
            </div>

            <div class="col-md-3">
                <label for="slCategoria" class="form-label">Categoria</label>
                <select name="slCategoria" id="slCategoria" class="form-select" required>
                    <option value="">Selecione...</option>
                    {% for categoria in listaCategorias %}
                    <option value="{{categoria.id}}">{{categoria.titulo}}</option>
                    {% endfor %}
                </select>
            </div>

            <div class="col-md-12">
                <label for="txtLinhaFina" class="form-label">Linha Fina</label>
                <input type="text" class="form-control" id="txtLinhaFina" name="txtLinhaFina" placeholder="Descrição breve da receita (até 250 caracteres)" minlength="10" maxlength="250" required>
            </div>

            <div class="col-md-12">
                <label for="txtDescricao" class="form-label">Modo de Preparo</label>
                <textarea id="txtDescricao" name="txtDescricao"></textarea>
            </div>
        </div>

        <div id="dvAlert" class="mt-4 d-none">
            <div class="alert alert-warning d-flex align-items-center" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                Preencha corretamente todos os campos.
            </div>
        </div>

        <div class="mt-5 text-end">
            <button type="submit" class="btn btn-success w-25">
                <i class="bi bi-plus-circle me-2"></i>Adicionar Receita
            </button>
        </div>
    </form>
    <div class="mt-4 text-end">
        <a href="{{BASE}}receita/" class="btn btn-outline-secondary w-25">
            <i class="bi bi-box-arrow-left me-2"></i>Voltar
        </a>
    </div>
</div>

<script src="{{BASE}}js/receita.js"></script>
<script src="{{BASE}}vendor/ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace('txtDescricao');
</script>

{% endblock %}
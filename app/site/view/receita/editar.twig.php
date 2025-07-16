{% extends "partials/body.twig.php" %}

{% block title %} Alterar Receita - My Receitas {% endblock %}

{% block head %}
{# Adicione estilos específicos se quiser. #}
{% endblock %}

{% block body %}
<h1 class="mb-4 text-center">Alterar Receita</h1>

<div class="card shadow-sm rounded-4 p-4">
    <form action="{{BASE}}receita/alterar/{{receitaId}}" onsubmit="return validar(true)" method="post">
        <input type="hidden" id="txtId" name="txtId" value="{{receitaId}}" />

        <div class="row g-4">
            <div class="col-md-5">
                <label for="txtTitulo" class="form-label">Título da Receita</label>
                <input type="text" class="form-control" id="txtTitulo" name="txtTitulo" placeholder="Ex: Bolo de Chocolate" value="{{receita.titulo}}" autocomplete="off" required>
            </div>

            <div class="col-md-4">
                <label for="txtSlug" class="form-label">Slug (URL)</label>
                <input type="text" class="form-control" id="txtSlug" name="txtSlug" placeholder="Ex: bolo-de-chocolate" value="{{receita.slug}}" autocomplete="off" required>
            </div>

            <div class="col-md-3">
                <label for="slCategoria" class="form-label">Categoria</label>
                <select name="slCategoria" id="slCategoria" class="form-select" required>
                    <option value="">Selecione...</option>
                    {% for categoria in listaCategorias %}
                    <option value="{{categoria.id}}" {{categoria.id == receita.categoriaId ? 'selected' : ''}}>
                        {{categoria.titulo}}
                    </option>
                    {% endfor %}
                </select>
            </div>

            <div class="col-md-12">
                <label for="txtLinhaFina" class="form-label">Linha Fina</label>
                <input type="text" class="form-control" id="txtLinhaFina" name="txtLinhaFina" placeholder="Descrição breve da receita (até 250 caracteres)" minlength="10" maxlength="250" value="{{receita.linhaFina}}" required>
            </div>

            <div class="col-md-12">
                <label for="txtDescricao" class="form-label">Modo de Preparo</label>
                <textarea id="txtDescricao" name="txtDescricao">{{receita.descricao|raw}}</textarea>
            </div>
        </div>

        <div id="dvAlert" class="mt-4 d-none">
            <div class="alert alert-warning d-flex align-items-center" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                Preencha corretamente todos os campos.
            </div>
        </div>

        <div class="mt-5 text-end">
            <button type="submit" class="btn btn-success btn-lg px-5">
                <i class="bi bi-check-circle me-2"></i>Salvar Alterações
            </button>
        </div>
    </form>
</div>

<script src="{{BASE}}js/receita.js"></script>
<script src="{{BASE}}vendor/ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace('txtDescricao');
</script>

{% endblock %}
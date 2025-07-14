function validar(validateId) {

    getById('dvAlert').innerHTML = '';

    var valid = true;

    if(getValueById('txtTitulo').length < 2) {
        appendHTMLById('dvAlert', '<div class="text-warning"><i class="bi bi-exclamation-circle me-1 w-25"></i>Título inválido. min 2</div>');
        valid = false;
    }

    if(getValueById('txtSlug').length < 3) {
        appendHTMLById('dvAlert', '<div class="text-warning"><i class="bi bi-exclamation-circle me-1 w-25"></i>Slug inválido. min 3</div>');
        valid = false;
    }

    if(validateId && getValueById('txtId') <= 0) {
        appendHTMLById('dvAlert', '<div class="text-warning"><i class="bi bi-exclamation-circle me-1 w-25"></i>ID nao encontrado.</div>');
        valid = false;
    }

    return valid;
}
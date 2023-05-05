$('#modal-imagem').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Botão que disparou o modal
    var imagemPath = button.data('imagem') // Extrai o valor de "data-imagem"

    // Atualiza a imagem no modal
    var img = $(this).find('.modal-body img')
    img.attr('src', '../../Resource/dataview/' + imagemPath)
    img.attr('alt', imagemPath)
})
